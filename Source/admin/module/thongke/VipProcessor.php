<?php
include_once("../../../BUS/DichVuBUS.php");
include_once("../../../BUS/LoaiDichVuBUS.php");
include_once("../../../BUS/LoaiNhaBUS.php");
include_once("../../../BUS/UsersBUS.php");
require_once("../Utils/Utils.php");
?>
<?php
class VipProcessor
{
    public static function displayHeader($count)
    {
        $str='<table align="center" border="0" cellspacing="0" cellpadding="0" id="tblist">';
		$str.='<tr><td colspan="9"><b>Có '.$count.' mẫu tin</b></td></tr>';
		$str.='<tr class="title">';
		$str.='<td width="30px" align="center">#</td>';
        $str.='<td align="center">Khách hàng</td>';
        $str.='<td align="center">Tiêu đề</td>';
		$str.='<td align="center">Loại nhà</td>';
		$str.='<td align="center" width="200px">Địa chỉ</td>';
        $str.='<td align="center">Thời gian đăng</td>';
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
    public static function getCondition($loaidv,$ngayfrom,$ngayto)
    {
        $str="";
        if($loaidv>0)
            $str.=" and loaidv=$loaidv";
        if($ngayfrom>0)
            $str.=" and DATE(ngaydang)>='$ngayfrom'";
        if($ngayto>0)
            $str.=" and DATE(ngaydang)<='$ngayto'";
        return $str;
    }
    public static function display($business)
    {
        
        $str="";
        for($i=0;$i<count($business);$i++)
        {
            $loaidv=LoaiDichVuBUS::getById($business[$i]['loaidv']);
            $loainha=LoaiNhaBUS::getById($business[$i]['loainha']);
            $user=UsersBUS::GetUserByID($business[$i]['chusohuu']);
    		$str.='<tr>';
    		$str.='<td align="center">'.($i+1).'</td>';
            $str.='<td>'.$user['hoten'].'</td>';
            $str.='<td>'.$business[$i]['tieude'].'<img src="images/vip.gif"></td>';
    		$str.='<td>'.$loainha['ten'];
            if($business[$i]["rank"] == 1)
				$str.="&nbsp;&nbsp;<img src='images/hot.gif' />";
            $str.='</td>';
    		$str.='<td>'.$business[$i]['sonha'].'/'.$business[$i]['duong'].', '.$business[$i]['phuong'].', '.$business[$i]['quan'].', '.$business[$i]['tinh'].'</td>';
    		$str.='<td align="center">'.$business[$i]['ngaydang'].'</td>';
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
     public static function loadByType( $curPage,$loaidv,$ngayfrom,$ngayto)
    {  
        $totalItems =null;  
        $business = null; 
        $maxItems = 5;
        $maxPages = 25;      
        $offset=($curPage-1)*$maxItems; 
        
        $condition=VipProcessor::getCondition($loaidv,$ngayfrom,$ngayto);        
        $business=DichVuBUS::getAllBySQL("select * from dichvu where status=2 ".$condition." limit $offset,$maxItems");
        $totalItems=DichVuBUS::countAllBySQL("select count(*) from dichvu where status=2 ".$condition);
             
        
        
        $display=VipProcessor::displayHeader($totalItems);
        $display.=VipProcessor::display($business);
        $display.=VipProcessor::displayFooter();
        $strPaging =Utils::paging ('',$totalItems,$curPage,$maxPages,$maxItems);
        
        return $display.$strPaging;
    }
}
 if(isset($_REQUEST['do'])&&$_REQUEST['do']=='vip')
 {
        $page=$_REQUEST['page'];
        $loaidv=$_REQUEST['loaidv'];
        $ngayfrom=$_REQUEST['ngayfrom'];
        $ngayto=$_REQUEST['ngayto'];
        
        if(isset($_REQUEST['action'])&&$_REQUEST['action']=='view')
        {
            $loaidv=$_REQUEST['loaidv'];
            echo VipProcessor::loadByType($page,$loaidv,$ngayfrom,$ngayto);
        }
        elseif(isset($_REQUEST['action'])&&$_REQUEST['action']=='export')
        {
            $business=null;
            $condition=VipProcessor::getCondition($loaidv,$ngayfrom,$ngayto);        
            $business=DichVuBUS::getAllBySQL("select * from dichvu where status=2 ".$condition);
            
             // load library 
            require '../Utils/php-excel.class.php'; 
            $array=array();
            $array[0]="Khách hàng";
            $array[1]="Tiêu đề";
            $array[2]="Loại nhà";
            $array[3]="Địa chỉ";
            $array[4]="Thời gian đăng";
            $array[5]="Thời hạn (ngày)";
            $array[6]="Trạng thái";
            $array[7]="Loại dịch vụ";
            $headerColumn=new  TableHeaderColumn(null,$array);
            $headerColumn->setColumnWidth(0,200);    
            $headerColumn->setColumnWidth(1,300); 
            $headerColumn->setColumnWidth(2,100); 
            $headerColumn->setColumnWidth(3,100); 
            $headerColumn->setColumnWidth(4,150); 
            $headerColumn->setColumnWidth(5,150); 
            $headerColumn->setColumnWidth(6,100); 
            $headerColumn->setColumnWidth(7,100);    
            $array=array(); 
           for($i=0;$i<count($business);$i++)
            {
                $loaidv=LoaiDichVuBUS::getById($business[$i]['loaidv']);
                $loainha=LoaiNhaBUS::getById($business[$i]['loainha']);
                $user=UsersBUS::GetUserByID($business[$i]['chusohuu']);
                //$array[$i]=array();
                $array[$i][0]=$user['hoten'];
                $array[$i][1]=$business[$i]['tieude'];
                $array[$i][2]=$loainha['ten'];
                $array[$i][3]=$business[$i]['sonha'].'/'.$business[$i]['duong'].', '.$business[$i]['phuong'].', '.$business[$i]['quan'].', '.$business[$i]['tinh'];
                $array[$i][4]=$business[$i]['ngaydang'];
                $array[$i][5]=$business[$i]['thoihantin'];
                switch($business[$i]['status'])
                {
                case 0:
                $array[$i][6]="Tin chờ duyệt";
                break;
                case 1:
                $array[$i][6]="Tin đã duyệt";
                break;
                case 2:
                $array[$i][6]="Tin đăng VIP";
                break;
                case 3:
                $array[$i][6]="Tin hết hạn";
                break;
                default:
                $array[$i][6]="Tin bị xóa";
                break;
                }
                $array[$i][7]=$loaidv['ten'];    
            } 
          
            
            // generate file (constructor parameters are optional) 
           $xls = new Excel_XML('UTF-8', false, 'Workflow Management');
            $xls->setTableHeaderColumn($headerColumn); 
            $xls->setTile("s57","Thống kê tin VIP");
            $xls->setAutoData($array);
            $xls->getXML("Output_Report_WFM"); 
        }
        else echo VipProcessor::loadByType($page,$loaidv,$ngayfrom,$ngayto);
 }
?>