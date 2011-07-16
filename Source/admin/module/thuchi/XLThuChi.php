<?php
include_once("../../../BUS/ThuChiBUS.php");
include_once("../../../BUS/UsersBUS.php");
include_once("../../../BUS/DonviTienBUS.php");
require_once("../Utils/Utils.php");

function display($business)
{
    $str=null;
    $str.='<table width="70%" border="0" align="center" cellspacing="0" cellpadding="0" id="tblist">';
	$str.='<tr class="title">';
	$str.='<td width="30px" align="center">#</td>';
	$str.='<td width="30px" align="center">';
	$str.='<input type="checkbox" name="cbAll" id="cbAll" onclick="checkALL()"/></td>';
	$str.='<td width="70px" align="center">Ngày thu</td>';
	$str.='<td align="center">Công việc</td>';
	$str.='<td width="20%">Nhân viên thu</td>';
	$str.='<td align="right" width="100px">Số tiền</td>';
	$str.='</tr>';
    for($i=0;$i<count($business);$i++)
    {
        $user=UsersBUS::GetUserByID($business[$i]['nhanvien']);
        $dvTien=DonViTienBUS::selectId($business[$i]['donvi']);
    	$str.= '<tr>';
    	$str.= '<td align="center">'.($i+1).'</td>';
    	$str.= '<td align="center"><input type="checkbox" name="cbId[]" id="cbId[]" value="'.$business[$i]['id'].'"></td>';
    	$str.= '<td align="center">'.$business[$i]["ngay"].'</td>';
    	$str.= '<td>'.$business[$i]["congviec"].'</td>';
    	$str.= '<td>'.$user['hoten'].'</td>';
    	$str.= '<td align="right">'.number_format($business[$i]["sotien"]).' '.$dvTien['ten'].'</td>';
    	$str.= '</tr>';
    }
    $str.='</table>';
    $str.="<script>$(\"table[id='tblist'] tr:even\").css('background-color', '#EFEFEF');</script>";
    return $str;
}
function displayWithSumRow($business,$loai,$monthFrom,$monthTo,$year)
{
    
    
    $str=null;
    $str.='<table width="70%" border="0" align="center" cellspacing="0" cellpadding="0" id="tblist">';
	$str.='<tr class="title">';
	$str.='<td width="30px" align="center">#</td>';
	$str.='<td width="30px" align="center">';
	$str.='<input type="checkbox" name="cbAll" id="cbAll" onclick="checkALL()"/></td>';
	$str.='<td width="70px" align="center">Ngày thu</td>';
	$str.='<td align="center">Công việc</td>';
	$str.='<td width="20%">Nhân viên thu</td>';
	$str.='<td align="right" width="100px">Số tiền</td>';
	$str.='</tr>';
    for($i=0;$i<count($business);$i++)
    {
        $user=UsersBUS::GetUserByID($business[$i]['nhanvien']);
        $dvTien=DonViTienBUS::selectId($business[$i]['donvi']);
    	$str.= '<tr>';
    	$str.= '<td align="center">'.($i+1).'</td>';
    	$str.= '<td align="center"><input type="checkbox" name="cbId[]" id="cbId[]" value="'.$business[$i]['id'].'"></td>';
    	$str.= '<td align="center">'.$business[$i]["ngay"].'</td>';
    	$str.= '<td>'.$business[$i]["congviec"].'</td>';
    	$str.= '<td>'.$user['hoten'].'</td>';
    	$str.= '<td align="right">'.number_format($business[$i]["sotien"]).' '.$dvTien['ten'].'</td>';
    	$str.= '</tr>';
        
        
    }
    $str.='<tr>';
	$str.='<td align="right" colspan="5"><b>Tổng thu:</b></td>';
    $sumRow=null;
    if($monthTo==null&&$monthFrom==null&&$year==null)
        $sumRow=ThuChiBUS::SumTongTien($loai);
    else
        $sumRow=ThuChiBUS::SumTongTienByMonth($loai,$monthFrom,$monthTo,$year);
	$str.='<td align="right"><b>'.$sumRow[0].' vnd</b></td>';
	$str.='</tr>';
    $str.='</table>';
    $str.="<script>$(\"table[id='tblist'] tr:even\").css('background-color', '#EFEFEF');</script>";
    return $str;
}
function loadBusiness($loai)
{
    $strLink = "";
    $curPage=1;   
    $totalItems =null;  
    $business = null; 
    if(isset($_REQUEST['page']))
        $curPage=$_REQUEST['page'];
    $maxItems = 3;
    $maxPages = 25;      
    $offset=($curPage-1)*$maxItems; 
    
        $totalItems=ThuChiBUS::count($loai);
        $business=ThuChiBUS::getALL($offset,$maxItems,$loai);
        $display=display($business,$loai);
        $strPaging =Utils::paging ($strLink,$totalItems[0],$curPage,$maxPages,$maxItems);
        
        return $display.$strPaging;
               
} 
function loadBusinesswithSumRow($loai,$monthFrom,$monthTo,$year)
{
    $strLink = "";
    $curPage=1;   
    $totalItems =null;  
    $business = null; 
    if(isset($_REQUEST['page']))
        $curPage=$_REQUEST['page'];
    $maxItems = 3;
    $maxPages = 25;      
    $offset=($curPage-1)*$maxItems; 
    
        $totalItems=ThuChiBUS::count($loai);
        $business=ThuChiBUS::getALL($offset,$maxItems,$loai);
        $display=displayWithSumRow($business,$loai,$monthFrom,$monthTo,$year);
        $strPaging =Utils::paging ($strLink,$totalItems[0],$curPage,$maxPages,$maxItems);
        return $display.$strPaging;
               
} 
function loadBusinessByMonth($loai,$monthFrom,$monthTo,$year)
{
    $strLink = "";
    $curPage=1;   
    $totalItems =null;  
    $business = null; 
    if(isset($_REQUEST['page']))
        $curPage=$_REQUEST['page'];
    $maxItems = 3;
    $maxPages = 25;      
    $offset=($curPage-1)*$maxItems; 
    
        $totalItems=ThuChiBUS::countByMonth($loai,$monthFrom,$monthTo,$year);
        $business=ThuChiBUS::getAllByMonth($offset,$maxItems,$loai,$monthFrom,$monthTo,$year);
        $display=displayWithSumRow($business,$loai,$monthFrom,$monthTo,$year);
        $strPaging =Utils::paging ($strLink,$totalItems[0],$curPage,$maxPages,$maxItems);
        return $display.$strPaging;           
} 
?>
<?php

if(isset($_REQUEST['do'])&&$_REQUEST['do']=="import")
{
    
    if(isset($_REQUEST['action'])&&$_REQUEST['action']=="add")
    {
        $sotien1=$_REQUEST['sotien'];
		$sotien ="";
		for($i=0;$i<strlen($sotien1);$i++)
		{
			if($sotien1[$i] != ",")
				$sotien.=$sotien1[$i];
		}
        $congviec=$_REQUEST['congviec'];
        $nhanvien=$_REQUEST['nhanvien'];
        $ngay=$_REQUEST['ngay'];
        $donvi=$_REQUEST['donvi'];
        $loai=$_REQUEST['loai'];
        ThuChiBUS::Add($sotien,$donvi,$congviec,$ngay,$nhanvien,0);
        
    }
    echo loadBusiness(0);
}
if(isset($_REQUEST['do'])&&$_REQUEST['do']=="export")
{
    
    if(isset($_REQUEST['action'])&&$_REQUEST['action']=="add")
    {
        $sotien1=$_REQUEST['sotien'];
		$sotien ="";
		for($i=0;$i<strlen($sotien1);$i++)
		{
			if($sotien1[$i] != ",")
				$sotien.=$sotien1[$i];
		}
        $congviec=$_REQUEST['congviec'];
        $nhanvien=$_REQUEST['nhanvien'];
        $ngay=$_REQUEST['ngay'];
        $donvi=$_REQUEST['donvi'];
        $loai=$_REQUEST['loai'];
        ThuChiBUS::Add($sotien,$donvi,$congviec,$ngay,$nhanvien,1);
        
    }
    echo loadBusiness(1);
}
if(isset($_REQUEST['do'])&&$_REQUEST['do']=="rpim")
{
    echo loadBusinesswithSumRow(0,null,null,null);
}
if(isset($_REQUEST['do'])&&$_REQUEST['do']=="rpex")
{
    echo loadBusinesswithSumRow(1,null,null,null);
}
if(isset($_REQUEST['action'])&&$_REQUEST['action']=="showreport")
{
        $loai=$_REQUEST['loai'];
        $nam=$_REQUEST['nam'];
        $quy=$_REQUEST['quy'];
        $thang=$_REQUEST['thang'];
        $option=$_REQUEST['radio'];
        if($option==1)
            echo loadBusinessByMonth($loai,$thang,$thang,$nam);
        elseif($option==0)
        {
            switch($quy)
            {
            case 1:
                echo loadBusinessByMonth($loai,1,3,$nam);
            break;
            case 2:
                echo loadBusinessByMonth($loai,4,6,$nam);
            break;
            case 3:
                echo loadBusinessByMonth($loai,7,9,$nam);
            break;
            case 4:
                echo loadBusinessByMonth($loai,10,12,$nam);
            break;
            }
        }
        else
        {
            loadBusinessByMonth($loai,1,12,$nam);
        }
}
    
if(isset($_REQUEST['action'])&&$_REQUEST['action']=="remove")
    {
        $loai=$_REQUEST['loai'];
        $ids=$_REQUEST['id'];
        $tokens="|";
        $val = array();
        $v = strtok($ids, $tokens);
        do $val[] = $v;
        while($v = strtok($tokens));
        
        for($i=0;$i<count($val);$i++)
        {
            ThuChiBUS::delete($val[$i]);      
        }
         echo loadBusinesswithSumRow($loai,null,null,null);
    }
 
if(isset($_REQUEST['do'])&&$_REQUEST['do']=="exExcel")
{  
    $loai=$nam=$quy=$thang=$option=null;
    if(isset($_REQUEST['loai']))
        $loai=$_REQUEST['loai'];
    if(isset($_REQUEST['nam']))
        $nam=$_REQUEST['nam'];
    if(isset($_REQUEST['quy']))
        $quy=$_REQUEST['quy'];
    if(isset($_REQUEST['thang']))
        $thang=$_REQUEST['thang'];
    if(isset($_REQUEST['radio']))
        $option=$_REQUEST['radio'];
    $business=null;
    $totalItems=null;
    if($option==1)
            {
                $totalItems=ThuChiBUS::countByMonth($loai,$thang,$thang,$nam);
                $business=ThuChiBUS::getAllByMonth(0,$totalItems[0],$loai,$thang,$thang,$nam);
            }
    elseif($option==0)
        {
            switch($quy)
            {
             case 1:
            $totalItems=ThuChiBUS::countByMonth($loai,1,3,$nam);
            $business=ThuChiBUS::getAllByMonth(0,$totalItems[0],$loai,1,3,$nam);
            break;
            case 2:
            $totalItems=ThuChiBUS::countByMonth($loai,4,6,$nam);
            $business=ThuChiBUS::getAllByMonth(0,$totalItems[0],$loai,4,6,$nam);
            break;
            case 3:
            $totalItems=ThuChiBUS::countByMonth($loai,7,9,$nam);
            $business=ThuChiBUS::getAllByMonth(0,$totalItems[0],$loai,7,9,$nam);
            break;
            case 4:
            $totalItems=ThuChiBUS::countByMonth($loai,10,12,$nam);
            $business=ThuChiBUS::getAllByMonth(0,$totalItems[0],$loai,10,12,$nam);
            break;
            }
         }
        else
        {
            $totalItems=ThuChiBUS::countByMonth($loai,1,12,$nam);
            $business=ThuChiBUS::getAllByMonth(0,$totalItems[0],$loai,1,12,$nam);
        }
    
    $array=array();
    
    $array[0][0]="Ngày thu";
    $array[0][1]="Công việc";
    $array[0][2]="Nhân viên thu";
    $array[0][3]="Số tiền";
    
   for($i=0;$i<count($business);$i++)
    {
        $user=UsersBUS::GetUserByID($business[$i]['nhanvien']);
        $dvTien=DonViTienBUS::selectId($business[$i]['donvi']);
        //$array[$i]=array();
        $array[$i+1][0]=$business[$i]["ngay"];
        $array[$i+1][1]=$business[$i]["congviec"];
        $array[$i+1][2]=$user['hoten'];
        $array[$i+1][3]=$business[$i]["sotien"].' '.$dvTien['ten'];    
    } 
   // load library 
require '../Utils/php-excel.class.php'; 

// generate file (constructor parameters are optional) 
$xls = new Excel_XML('UTF-8', false, 'Workflow Management'); 
$xls->addArray($array); 
$xls->generateXML('Output_Report_WFM');   
}
?>