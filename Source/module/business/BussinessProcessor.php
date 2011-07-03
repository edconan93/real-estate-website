﻿<?php 
	include_once ("../BUS/DichVuBUS.php");
    include_once ("../BUS/HinhAnhBUS.php");
    include_once ("../BUS/DonviDichVuBUS.php");
    include_once ("../BUS/DonViTienBUS.php");
    include_once ("../BUS/LoaiDichVuBUS.php");
    include_once ("../BUS/TinhBUS.php");
    include_once ("../BUS/QuanBUS.php");
    include_once ("../BUS/PhuongBUS.php");
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
            $totalItems=DichVuBUS::countAllDichVuByLoai($_REQUEST['loaidv']);
            $business=DichVuBUS::getALLDichVuByLoai($_REQUEST['loaidv'],$offset,$maxItems);
        }
        else
        {
            $totalItems=DichVuBUS::countAll();
            $business=DichVuBUS::getAll($offset,$maxItems);
        }
       
        return BusinessProcessor::display($business,$totalItems,$curPage,$maxPages,$maxItems);
    }
    public static function findBusiness($strSQL)
    {
        $curPage=1;      
        if(isset($_REQUEST['page']))
              $curPage=$_REQUEST['page'];
        $maxItems = 5;
    	$maxPages = 25;      
        $offset=($curPage-1)*$maxItems; 
        $totalItems=DichVuBUS::countAllBySQL($strSQL);          
        $business=DichVuBUS::getAllBySQL($strSQL);
        return BusinessProcessor::display($business,$totalItems,$curPage,$maxPages,$maxItems);
    }
    public static function findBussiness()
    {
        //create string sql
        
        if(isset($_REQUEST['btnSearch']))
        {
            
            
            $strSQL="select * from ";
            $strTable="dichvu";
            $strWhere=" where 1=1 ";
            
            if(isset($_REQUEST['cbbLoaidv'])&&$_REQUEST['cbbLoaidv']!=-1)
            {
                echo"alibaba";
                $strWhere.=" and dichvu.loaidv=".$_REQUEST['cbbLoaidv'];
            }
            if(isset($_REQUEST['cbbLoaiBDS'])&&$_REQUEST['cbbLoaiBDS']!=-1)
            {
                $strWhere.=" and dichvu.loainha=".$_REQUEST['cbbLoaiBDS'];
            }
            if(isset($_REQUEST['cbbTinh'])&&$_REQUEST['cbbTinh']!=-1)
            {
                $strWhere.=" and dichvu.tinh=".$_REQUEST['cbbTinh'];
            }
            if(isset($_REQUEST['cbbQuanHuyen'])&&$_REQUEST['cbbQuanHuyen']!=-1)
            {
                $strWhere.=" and dichvu.quan=".$_REQUEST['cbbQuanHuyen'];
            }
            /**
 * if(isset($_REQUEST['cbbGia'])&&$_REQUEST['cbbGia']=!-1)
 *             {
 *                 $strTable.=",gia";
 *                 $strWhere.=" and dichvu.tinh=tinh.id ";
 *             }
 */
            $strSQL.=$strTable.$strWhere;
            echo $strSQL;
            return BusinessProcessor::findBusiness($strSQL);
        } 
        return null;              
    }
    public static function  display($business,$totalItems,$curPage,$maxPages,$maxItems)
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
       
        include_once("Utils/Utils.php");
        $strLink = "dichvu.php?";
  		$strPaging =Utils::paging ($strLink,$totalItems,$curPage,$maxPages,$maxItems);
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