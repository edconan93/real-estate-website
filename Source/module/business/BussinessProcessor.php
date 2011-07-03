<?php 
	include_once ("../BUS/DichVuBUS.php");
    include_once ("../BUS/HinhAnhBUS.php");
    include_once ("../BUS/DonviDichVuBUS.php");
    include_once ("../BUS/DonViTienBUS.php");
    include_once ("../BUS/LoaiDichVuBUS.php");
    include_once ("../BUS/TinhBUS.php");
    include_once ("../BUS/QuanBUS.php");
    include_once ("../BUS/PhuongBUS.php");
    require_once("Utils/Utils.php");
?>
<?php

/**
 * @author panda
 * @copyright 2011
 */
class BusinessProcessor
{
    public static function loadAllBusiness()
    {
        $strLink = "dichvu.php?";
        $curPage=1;   
        $totalItems =null;  
        $business = null; 
        if(isset($_REQUEST['page']))
            $curPage=$_REQUEST['page'];
        $maxItems = 3;
	    $maxPages = 25;      
        $offset=($curPage-1)*$maxItems; 
        if(isset($_REQUEST['loaidv']))
        {
            $strLink.="loaidv=".$_REQUEST['loaidv']."&";
            $totalItems=DichVuBUS::countAllDichVuByLoai($_REQUEST['loaidv']);
            $business=DichVuBUS::getALLDichVuByLoai($_REQUEST['loaidv'],$offset,$maxItems);
        }
        else
        {
            $totalItems=DichVuBUS::countAll();
            $business=DichVuBUS::getAll($offset,$maxItems);
        }
       
        return BusinessProcessor::display($strLink,$business,$totalItems,$curPage,$maxPages,$maxItems);
    }
    public static function findPrice($business,$from,$to)
    {
        $array=array();
        for($i=0;$i<count($business);$i++)
        {
            $money=Utils::getMoneyPerHouse($business[$i]);
            if($from<=$money&&$money<=$to)
                array_push($array,$business[$i]);
        }
        return $array;
    }
    public static function findBusiness($strLink,$strSQL)
    {
        $curPage=1;      
        if(isset($_REQUEST['page']))
              $curPage=$_REQUEST['page'];
        $maxItems = 3;
    	$maxPages = 25;      
        $offset=($curPage-1)*$maxItems; 
        $strCountSQL=str_replace("*"," count(*) ",$strSQL);
        $totalItems=DichVuBUS::countAllBySQL($strCountSQL); 
        $strSQL.=" limit $offset,$maxItems";
          
        
        $business=DichVuBUS::getAllBySQL($strSQL);
        if(isset($_REQUEST['cbbGia'])&&$_REQUEST['cbbGia']!=-1)
        {           
            $array=null;
            switch($_REQUEST['cbbGia'])
            {
                case 1:
                        $array=BusinessProcessor::findPrice($business,0,5000000);
                break;
                case 2:
                        $array=BusinessProcessor::findPrice($business,5000000,50000000);
                break;
                case 3:
                        $array=BusinessProcessor::findPrice($business,50000000,500000000);
                break;
                case 4:
                        $array=BusinessProcessor::findPrice($business,500000000,1000000000);
                break;
                case 5:
                        $array=BusinessProcessor::findPrice($business,1000000000,1500000000);
                break;
                case 6:
                        $array=BusinessProcessor::findPrice($business,1500000000,3000000000);
                break;
                case 7:
                        $array=BusinessProcessor::findPrice($business,3000000000,10000000000);
                break;
                case 8:
                        $array=BusinessProcessor::findPrice($business,10000000000,999999999999999);
                break;
            }
            
                $business=$array;
                $totalItems=count($business);
            
        }
       
        return BusinessProcessor::display($strLink,$business,$totalItems,$curPage,$maxPages,$maxItems);
    }
    public static function findBussiness()
    {
        //create string sql
        
        if(isset($_REQUEST['btnSearch']))
        {
            
            $strLink= "dichvu.php?";
            $strSQL="select * from ";
            $strTable="dichvu";
            $strWhere=" where 1=1 ";
            
            if(isset($_REQUEST['cbbLoaidv'])&&$_REQUEST['cbbLoaidv']!=-1)
            {
                $strLink.="cbbLoaidv=".$_REQUEST['cbbLoaidv']."&";
                $strWhere.=" and dichvu.loaidv=".$_REQUEST['cbbLoaidv'];
            }
            if(isset($_REQUEST['cbbLoaiBDS'])&&$_REQUEST['cbbLoaiBDS']!=-1)
            {
                $strLink.="cbbLoaiBDS=".$_REQUEST['cbbLoaiBDS']."&";
                $strWhere.=" and dichvu.loainha=".$_REQUEST['cbbLoaiBDS'];
            }
            if(isset($_REQUEST['cbbTinh'])&&$_REQUEST['cbbTinh']!=-1)
            {
                $strLink.="cbbTinh=".$_REQUEST['cbbTinh']."&";
                $strWhere.=" and dichvu.tinh=".$_REQUEST['cbbTinh'];
            }
            if(isset($_REQUEST['cbbQuanHuyen'])&&$_REQUEST['cbbQuanHuyen']!=-1)
            {
                $strLink.="cbbQuanHuyen=".$_REQUEST['cbbQuanHuyen']."&";
                $strWhere.=" and dichvu.quan=".$_REQUEST['cbbQuanHuyen'];
            }
            
            
 
            $strSQL.=$strTable.$strWhere;
            
            return BusinessProcessor::findBusiness($strLink,$strSQL);
        } 
        return null;              
    }
    public static function  display($strLink,$business,$totalItems,$curPage,$maxPages,$maxItems)
    {     
               
        $strResult="";
        $strResult.="<table id='tblist' width='100%' border='0' style='border:solid 1px #D3D3D3;' cellpadding='0' cellspacing='0'>";	    
       	$strResult.= "<tr style='height:36px; font-weight:bold; font-size:13px; background:#8BC5F4;'>";
  		$strResult.= "<td style='border-right:solid 1px #D3D3D3; padding:4px;' align='center'>Hình Ảnh</td>";
        $strResult.= "<td style='border-right:solid 1px #D3D3D3; padding:4px;'>Mô Tả</td>";
  		$strResult.= "<td style='border-right:solid 1px #D3D3D3; padding:4px;'>Loại Hình</td>";
  		$strResult.="<td style='border-right:solid 1px #D3D3D3; padding:4px;'>Ngày Cập Nhật</td>";
  		$strResult.="<td style='padding:4px;' align='center'>Giá</td>";
  		$strResult.="</tr>";
        for($i=0;$i<count($business);$i++)
        {
        $images=HinhAnhBUS::getAllHinhAnhByDichVu($business[$i]['id']);
        $donviDV=DonviDichVuBUS::selectId($business[$i]['donvidv']);
        $donviTien=DonviTienBUS::selectId($business[$i]['donvitien']);
        $loaidv=LoaiDichVuBUS::getById($business[$i]['loaidv']);
        $tinh=TinhBUS::getTinhById($business[$i]['tinh']);
        $quan=QuanBUS::getQuanById($business[$i]['quan']);
        $phuong=PhuongBUS::getPhuongById($business[$i]['phuong']);
  		$strResult.="<tr>";
  		$strResult.="<td style='border-right:solid 1px #D3D3D3; padding:4px;' width='150px'>";
  		$strResult.="<a href='chitietdiaoc.php?iddichvu=".$business[$i]['id']."'><img src='../".$images[0]['path']."' width='150px' /></a></td>";
  		$strResult.="<td style='border-right:solid 1px #D3D3D3; padding:4px;'>";
  		$strResult.="<a href='chitietdiaoc.php?iddichvu=".$business[$i]['id']."'><b style='color:blue;'>".$business[$i]['tieude']."</b></a><br>";
  		$strResult.="Vị trí: ".$business[$i]['duong'].", ".$phuong['ten'].", ".$quan['ten'].", ".$tinh['ten']."<br>";
        $strResult.="Diện tích: ".$business[$i]['dai']." X ".$business[$i]['rong']."<br>";
  		$strResult.="Số phòng ngủ:".$business[$i]['sophongngu']."<br>";
        $strResult.="Tầng: ".$business[$i]['tang']."<br><br>";
        if($business[$i]['khuyenmai']!=null)
           $strResult.="<img src='../images/icon_promotion.gif' /> <span style='position:relative; top:-6px;'>".$business[$i]['khuyenmai']."</span>";
  		$strResult.="</td>";
  		$strResult.="<td style='border-right:solid 1px #D3D3D3; padding:4px;'>".$loaidv['ten']."</td>";
        $strResult.="<td style='border-right:solid 1px #D3D3D3; padding:4px;'>".$business[$i]['ngaydang']."</td>";
  		$strResult.="<td style='padding:4px;'>".$business[$i]['giaban']."<br>".$donviTien['ten']."/".$donviDV['ten']."</td>";
  		$strResult.="</tr>";
        }
        $strResult.="</table>";
        $strResult.="<script>$(\"table[id='tblist'] tr:odd\").css('background-color', '#EFEFEF');</script>";
       
        
       
  		$strPaging =Utils::paging ($strLink,$totalItems,$curPage,$maxPages,$maxItems);
        //echo $strPaging;
  		$strResult.=$strPaging; 

        return $strResult;
    }
    public static function getLoaiDichVu()
    {
        if(isset($_REQUEST['loaidv'])) 
        {
            $loaidv= LoaiDichVuBUS::getById($_REQUEST['loaidv'])   ;   
            return $loaidv['ten'];
        }      
               
        return "TẤT CẢ CÁC LOẠI HÌNH";
    }
    
}



?>