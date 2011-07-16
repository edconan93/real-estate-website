<?php
	include_once("../../../BUS/QuangCaoBUS.php");
	require_once("../Utils/Utils.php");
?>
<?php
class AdvertisementProcessor
{
    public static function displayHeader($count)
    {
        $str='<table align="center" border="0" cellspacing="0" cellpadding="0" id="tblist">';
		$str.='<tr><td colspan="7"><b>Có '.$count.' mẫu tin</b></td></tr>';
		$str.='<tr class="title">';
		$str.='<td width="30px" align="center">#</td>';
		$str.='<td align="center">Chủ sở hữu</td>';
		$str.='<td align="center" width="200px">Địa chỉ</td>';
        $str.='<td align="center" width="200px">Đường dẫn banner</td>';
        $str.='<td align="center">Ngày đăng ký</td>';
		$str.='<td align="center">Thời hạn (tháng)</td>';
		$str.='<td align="center">Trạng thái</td>';
		$str.='</tr>';
        return $str;
    }
    public static function displayFooter()
    {
        $str="</table>";
        $str.="<script>$(\"table[id='tblist'] tr:odd\").css('background-color', '#EFEFEF');</script>";
        return $str;
    }
    public static function display($advertisement)
    {
        
        $str="";
        for($i=0;$i<count($advertisement);$i++)
        {
    		$str.='<tr>';
    		$str.='<td align="center">'.($i+1).'</td>';
    		$str.='<td>'.$advertisement[$i]['chusohuu'].'</td>';
    		$str.='<td>'.$advertisement[$i]['diachi'].'</td>';
            $str.='<td align="center">'.$advertisement[$i]['hinhanh'].'</td>';
    		$str.='<td align="center">'.$advertisement[$i]['ngaydang'].'</td>';
            $str.='<td align="center">'.$advertisement[$i]['sothang'].'</td>';
            $str.='<td align="center" style="color:green;">';
            switch($advertisement[$i]['status'])
            {
                case 0:
                $str.="Tin hết hạn";
                break;
                case 1:
                $str.="Tin đang hoạt động";
                break;
                case 2:
                $str.="Tin bị xóa";
                break;
                default:
                 $str.="Tin bị xóa";
                break;
            }
            $str.='</td>';
    		$str.='</tr>';
		}
       
        return $str;
    }
    public static function load($curPage,$status)
    {
        $totalItems =null;  
        $advertisement = null; 
        $maxItems = 5;
        $maxPages = 25;      
        $offset=($curPage-1)*$maxItems; 
        if($status==-1)
        {
            $advertisement=QuangCaoBUS::getBySQL("select * from quangcao limit $offset,$maxItems");
            $totalItems=QuangCaoBUS::countBySQL("select count(*) from quangcao");
        }
        else
        {
            $advertisement=QuangCaoBUS::getBySQL("select * from quangcao where status=$status limit $offset,$maxItems");
            $totalItems=QuangCaoBUS::countBySQL("select count(*) from quangcao where status=$status");
        }      
        $display=AdvertisementProcessor::displayHeader($totalItems);
        $display.=AdvertisementProcessor::display($advertisement);
        $display.=AdvertisementProcessor::displayFooter();
        $strPaging =Utils::paging ('',$totalItems,$curPage,$maxPages,$maxItems);
        
        return $display.$strPaging;
    }
    
}
if(isset($_REQUEST['action'])&&$_REQUEST['action']=="view")
{
    $page=$_REQUEST['page'];
    $loai=$_REQUEST['loai'];
    echo AdvertisementProcessor::load($page,$loai);
}
elseif(isset($_REQUEST['action'])&&$_REQUEST['action']=="export")
{
    $advertisement=null;
    $loai=$_REQUEST['loai'];
    if($loai==-1)
        {
            $advertisement=QuangCaoBUS::getBySQL("select * from quangcao ");
        }
        else
        {
            $advertisement=QuangCaoBUS::getBySQL("select * from quangcao where status=$loai ");
        }
    $array=array();
    $array[0][0]="Chủ sở hữu";
    $array[0][1]="Địa chỉ";
    $array[0][2]="Đường dẫn banner";
    $array[0][3]="Ngày đăng ký";
    $array[0][4]="Trạng thái";
            
    for($i=0;$i<count($advertisement);$i++)
    { 
        $array[$i+1][0]=$advertisement[$i]['chusohuu'];
        $array[$i+1][1]=$advertisement[$i]['diachi'];
        $array[$i+1][2]=$advertisement[$i]['hinhanh'];
        $array[$i+1][3]=$advertisement[$i]['ngaydang'];
        $array[$i+1][4]=$advertisement[$i]['sothang'];
        switch($advertisement[$i]['status'])
        {
                case 0:
                $array[$i+1][5]="Tin hết hạn";
                break;
                case 1:
                $array[$i+1][5]="Tin đang hoạt động";
                break;
                case 2:
                $array[$i+1][5]="Tin bị xóa";
                break;
                default:
                $array[$i+1][5]="Tin bị xóa";
                break;
        }
        
    }
    require '../Utils/php-excel.class.php'; 
            
            // generate file (constructor parameters are optional) 
            $xls = new Excel_XML('UTF-8', false, 'Workflow Management'); 
            $xls->addArray($array); 
            $xls->generateXML('Output_Report_WFM');   
}
else
{
    $page=$_REQUEST['page'];
    echo AdvertisementProcessor::load($page,-1);
}
?>