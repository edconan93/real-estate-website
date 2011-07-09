<?php
include_once("../../../BUS/ThuChiBUS.php");
include_once("../../../BUS/UsersBUS.php");
include_once("../../../BUS/DonviTienBUS.php");
require_once("../Utils/Utils.php");
?>
<?php
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
    	$str.= '<td align="right">'.$business[$i]["sotien"].' '.$dvTien['ten'].'</td>';
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
    	$str.= '<td align="right">'.$business[$i]["sotien"].' '.$dvTien['ten'].'</td>';
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
        $sotien=$_REQUEST['sotien'];
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
        $sotien=$_REQUEST['sotien'];
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
    if(isset($_REQUEST['action'])&&$_REQUEST['action']=="getMonth")
    {
        echo loadBusinessByMonth(0,$_REQUEST['month'],$_REQUEST['month'],date("Y"));
    }
    elseif(isset($_REQUEST['action'])&&$_REQUEST['action']=="getQuy")
    {
        switch($_REQUEST['quy'])
        {
            case 1:
                echo loadBusinessByMonth(0,1,3,date("Y"));
            break;
            case 2:
                echo loadBusinessByMonth(0,4,6,date("Y"));
            break;
            case 3:
                echo loadBusinessByMonth(0,7,9,date("Y"));
            break;
            case 4:
                echo loadBusinessByMonth(0,10,12,date("Y"));
            break;
        }
    }
    elseif(isset($_REQUEST['action'])&&$_REQUEST['action']=="getYear")
    {
        $year=$_REQUEST['year'];
        echo loadBusinessByMonth(0,1,12,$year);
    }
    elseif(isset($_REQUEST['action'])&&$_REQUEST['action']=="remove")
    {
        $ids=$_REQUEST['id'];
        $tokens="|";
        $val = array();
        $v = strtok($ids, $tokens);
        do $val[] = $v;
        while($v = strtok($tokens));
        
        for($i=0;$i<count($val);$i++)
        {
            ThuChiBUS::delete($val[$i]);
            echo loadBusinesswithSumRow(0,null,null,null);
        }
    }
    else
    echo loadBusinesswithSumRow(0,null,null,null);
}
if(isset($_REQUEST['do'])&&$_REQUEST['do']=="rpex")
{
    if(isset($_REQUEST['action'])&&$_REQUEST['action']=="getMonth")
    {
        echo loadBusinessByMonth(1,$_REQUEST['month'],$_REQUEST['month'],date("Y"));
    }
    elseif(isset($_REQUEST['action'])&&$_REQUEST['action']=="getQuy")
    {
        switch($_REQUEST['quy'])
        {
            case 1:
                echo loadBusinessByMonth(1,1,3,date("Y"));
            break;
            case 2:
                echo loadBusinessByMonth(1,4,6,date("Y"));
            break;
            case 3:
                echo loadBusinessByMonth(1,7,9,date("Y"));
            break;
            case 4:
                echo loadBusinessByMonth(1,10,12,date("Y"));
            break;
        }
    }
    elseif(isset($_REQUEST['action'])&&$_REQUEST['action']=="getYear")
    {
        $year=$_REQUEST['year'];
        echo loadBusinessByMonth(1,1,12,$year);
    }
    elseif(isset($_REQUEST['action'])&&$_REQUEST['action']=="remove")
    {
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
        echo loadBusinesswithSumRow(1,null,null,null);
    }
    else
    echo loadBusinesswithSumRow(1,null,null,null);
}
if(isset($_REQUEST['do'])&&$_REQUEST['do']=="exExcel")
{
    $loai=$_REQUEST['loai'];
    $business=null;
    if(isset($_REQUEST['action'])&&$_REQUEST['action']=="getMonth")
    {
        $totalItems=ThuChiBUS::countByMonth($loai,$_REQUEST['month'],$_REQUEST['month'],date("Y"));
        $business=ThuChiBUS::getAllByMonth(0,$totalItems[0],$loai,$_REQUEST['month'],$_REQUEST['month'],date("Y"));
    }
    elseif(isset($_REQUEST['action'])&&$_REQUEST['action']=="getQuy")
    {
        switch($_REQUEST['quy'])
        {
            case 1:
            $totalItems=ThuChiBUS::countByMonth($loai,1,3,date("Y"));
            $business=ThuChiBUS::getAllByMonth(0,$totalItems[0],$loai,1,3,date("Y"));
            break;
            case 2:
            $totalItems=ThuChiBUS::countByMonth($loai,4,6,date("Y"));
            $business=ThuChiBUS::getAllByMonth(0,$totalItems[0],$loai,4,6,date("Y"));
            break;
            case 3:
            $totalItems=ThuChiBUS::countByMonth($loai,7,9,date("Y"));
            $business=ThuChiBUS::getAllByMonth(0,$totalItems[0],$loai,7,9,date("Y"));
            break;
            case 4:
            $totalItems=ThuChiBUS::countByMonth($loai,10,12,date("Y"));
            $business=ThuChiBUS::getAllByMonth(0,$totalItems[0],$loai,10,12,date("Y"));
            break;
        }
    }
    elseif(isset($_REQUEST['action'])&&$_REQUEST['action']=="getYear")
    {
        $year=$_REQUEST['year'];
        $totalItems=ThuChiBUS::countByMonth($loai,1,12,$year);
        $business=ThuChiBUS::getAllByMonth(0,$totalItems[0],$loai,1,12,$year);
    }
    else 
    $totalItems=ThuChiBUS::count($loai);
    $business=ThuChiBUS::getALL(0,$totalItems[0],$loai);
    
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