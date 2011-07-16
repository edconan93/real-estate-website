<?php
include_once("../../../BUS/DichVuBUS.php");
include_once("../../../BUS/LoaiDichVuBUS.php");
include_once("../../../BUS/LoaiNhaBUS.php");
require_once("../Utils/Utils.php");
?>
<?php
class HouseProcessor
{
    public static function displayHeader($count)
    {
        $str='<table align="center" border="0" cellspacing="0" cellpadding="0" id="tblist">';
		$str.='<tr><td colspan="6"><b>Có '.$count.' mẫu tin</b></td></tr>';
		$str.='<tr class="title">';
		$str.='<td width="30px" align="center">#</td>';
		$str.='<td align="center">Loại nhà</td>';
		$str.='<td align="center" width="200px">Địa chỉ</td>';
        $str.='<td align="center">Thời hạn (ngày)</td>';
		$str.='<td align="center">Trạng thái</td>';
		$str.='<td align="center">Loại dịch vụ</td>';
		$str.='</tr>';
        return $str;
    }
    public static function displayFooter()
    {
        $str="</table>";
        $str.="<script>$(\"table[id='tblist'] tr:odd\").css('background-color', '#EFEFEF');</script>";
        return $str;
    }
    public static function display($business)
    {
        
        $str="";
        for($i=0;$i<count($business);$i++)
        {
            $loaidv=LoaiDichVuBUS::getById($business[$i]['loaidv']);
            $loainha=LoaiNhaBUS::getById($business[$i]['loainha']);
    		$str.='<tr>';
    		$str.='<td align="center">'.($i+1).'</td>';
    		$str.='<td>'.$loainha['ten'].'</td>';
    		$str.='<td>'.$business[$i]['sonha'].'/'.$business[$i]['duong'].', '.$business[$i]['phuong'].', '.$business[$i]['quan'].', '.$business[$i]['tinh'].'</td>';
    		$str.='<td align="center">'.$business[$i]['thoihantin'].'</td>';
            $str.='<td align="center" style="color:green;">';
            switch($business[$i]['status'])
            {
                case 0:
                $str.="Tin chờ duyệt";
                break;
                case 1:
                $str.="Tin đã duyệt";
                break;
                case 2:
                $str.="Tin đăng VIP";
                break;
                case 3:
                $str.="Tin hết hạn";
                break;
                default:
                $str.="Tin bị xóa";
                break;
            }
            $str.='</td>';
    		$str.='<td align="center">'.$loaidv['ten'].'</td>';
    		$str.='</tr>';
		}
       
        return $str;
    }
     public static function loadByType( $curPage,$type)
    {  
        $totalItems =null;  
        $business = null; 
        $maxItems = 5;
        $maxPages = 25;      
        $offset=($curPage-1)*$maxItems; 
        if($type>0)
        {
            $business=DichVuBUS::getAllBySQL("select * from dichvu where loaidv=$type limit $offset,$maxItems");
            $totalItems=DichVuBUS::countAllBySQL("select count(*) from dichvu where loaidv=$type");
        }      
        else{
            $business=DichVuBUS::getAllBySQL("select * from dichvu limit $offset,$maxItems");
            $totalItems=DichVuBUS::countAllBySQL("select count(*) from dichvu");
        }
        
        $display=HouseProcessor::displayHeader($totalItems);
        $display.=HouseProcessor::display($business);
        $display.=HouseProcessor::displayFooter();
        $strPaging =Utils::paging ('',$totalItems,$curPage,$maxPages,$maxItems);
        
        return $display.$strPaging;
    }
}
 if(isset($_REQUEST['do'])&&$_REQUEST['do']=='house')
 {
        $page=$_REQUEST['page'];
        if(isset($_REQUEST['action'])&&$_REQUEST['action']=='view')
        {
            $loaidv=$_REQUEST['loaidv'];
            echo HouseProcessor::loadByType($page,$loaidv);
        }
        elseif(isset($_REQUEST['action'])&&$_REQUEST['action']=='export')
        {
            $business=null;
            if(isset($_REQUEST['loaidv']))
            {
                $loaidv=$_REQUEST['loaidv'];
                $business=DichVuBUS::getAllBySQL("select * from dichvu where loaidv=$loaidv");
            }
            else
                $business=DichVuBUS::getAllBySQL("select * from dichvu");
            
            $array=array();
    
            $array[0][0]="Loại nhà";
            $array[0][1]="Địa chỉ";
            $array[0][2]="Thời hạn (ngày)";
            $array[0][3]="Trạng thái";
            $array[0][4]="Loại dịch vụ";
            
           for($i=0;$i<count($business);$i++)
            {
                $loaidv=LoaiDichVuBUS::getById($business[$i]['loaidv']);
                $loainha=LoaiNhaBUS::getById($business[$i]['loainha']);
                //$array[$i]=array();
                $array[$i+1][0]=$loainha['ten'];
                $array[$i+1][1]=$business[$i]['sonha'].'/'.$business[$i]['duong'].', '.$business[$i]['phuong'].', '.$business[$i]['quan'].', '.$business[$i]['tinh'];
                $array[$i+1][2]=$business[$i]['thoihantin'];
                switch($business[$i]['status'])
                {
                case 0:
                $array[$i+1][3]="Tin chờ duyệt";
                break;
                case 1:
                $array[$i+1][3]="Tin đã duyệt";
                break;
                case 2:
                $array[$i+1][3]="Tin đăng VIP";
                break;
                case 3:
                $array[$i+1][3]="Tin hết hạn";
                break;
                default:
                $array[$i+1][3]="Tin bị xóa";
                break;
                }
                $array[$i+1][4]=$loaidv['ten'];    
            } 
           // load library 
            require '../Utils/php-excel.class.php'; 
            
            // generate file (constructor parameters are optional) 
            $xls = new Excel_XML('UTF-8', false, 'Workflow Management'); 
            $xls->addArray($array); 
            $xls->generateXML('Output_Report_WFM');   
        }
        else echo HouseProcessor::loadByType($page,-1);
 }
?>