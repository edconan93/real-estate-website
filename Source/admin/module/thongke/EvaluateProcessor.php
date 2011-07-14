<?php
include_once("../../../BUS/KhenThuongBUS.php");
include_once("../../../BUS/UsersBUS.php");
include_once("../../../BUS/LevelBUS.php");
require_once("../Utils/Utils.php");
?>
<?php
class EvaluateProcessor
{
    
    public static function displayNewRow($index,$id,$nhanvien,$email,$gioitinh,$capdo,$thanhtich,$khenthuong,$ngay)
    {
        $str="<div id='trNewRow' align='center'>";
        $str.='<table align="center" border="0" cellspacing="0" cellpadding="0">';
           
            $str.="<tr class='title'>";
    		$str.="<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
    		$str.='<td>';
            $str.='<select style="font-size:12px;width:150px;" id="cbbAddRow" onchange="selectUser()">';
            $users=UsersBUS::getUsersByRole(3);
            for($i=0;$i<count($users);$i++)
                $str.="<option style='font-size:12px;' value='".$users[$i]['id']."'>".$users[$i]['hoten']."</option>";
            $str.='</select>';
            $str.='</td>';
    		$str.='<td width="155px" style="color:blue;">'.$email.'</td>';
    		$str.='<td align="center" width="50px">';
            if($gioitinh==1)
                $str.='Nam';
                else
                $str.='Nữ';
            $str.='</td>';
    		$str.='<td align="center" width="60px">'.$capdo.'</td>';
    		$str.='<td align="center">';
    		$str.='<select id="cbbLoai_'.$id.'">';
            $str.='<option value="-1" selected>---Chọn thành tích---</option>';
            if($thanhtich==1)
    		  $str.='<option value="1" selected>Trung bình</option>';
              else
              $str.='<option value="1">Trung bình</option>';
            if($thanhtich==2)
    		  $str.='<option value="2" selected>Khá</option>';
              else
              $str.='<option value="2">Khá</option>';
            if($thanhtich==3)
    		  $str.='<option value="3" selected>Xuất sắc</option>';
              else
              $str.='<option value="3">Xuất sắc</option>';
    		$str.='</select>';
    		$str.='</td>';
    		$str.='<td>';
    		$str.='<input id="txtKhenThuong_'.$id.'" type="text" style="width:300px;" value="'.$khenthuong.'" />';
    		$str.='</td>';
            $str.='<td>';
            $str.='<script>';
			$str.='$(function() {';
			$str.='$( "#txtDate_'.$id.'" ).datepicker({dateFormat:"yy-mm-dd", showButtonPanel: true})';
			$str.='});';
			$str.='</script>';
			$str.='<input id="txtDate_'.$id.'" type="text" style="width:70px;" value="'.$ngay.'">';
            $str.='</td>';
    		$str.='</tr>'; 
            $str.="</table>";
            $str.="</div>"; 
            return $str;  
    }
    public static function display($index,$id,$nhanvien,$email,$gioitinh,$capdo,$thanhtich,$khenthuong,$ngay)
    {
            $str="<input type='hidden' name='txtID[]' value='".$id."'>";
            $str.="<tr>";
    		$str.='<td align="center">'.$index.'</td>';
    		$str.='<td class="m_name"><a href="index.php?view=user&do=edit&uid='.$id.'">'.$nhanvien.'</a></td>';
    		$str.='<td style="color:blue;">'.$email.'</td>';
    		$str.='<td align="center">';
            if($gioitinh==1)
                $str.='Nam';
                else
                $str.='Nữ';
            $str.='</td>';
    		$str.='<td align="center">'.$capdo.'</td>';
    		$str.='<td align="center">';
    		$str.='<select id="cbbLoai_'.$id.'">';
            $str.='<option value="-1" selected>---Chọn thành tích---</option>';
            if($thanhtich==1)
    		  $str.='<option value="1" selected>Trung bình</option>';
              else
              $str.='<option value="1">Trung bình</option>';
            if($thanhtich==2)
    		  $str.='<option value="2" selected>Khá</option>';
              else
              $str.='<option value="2">Khá</option>';
            if($thanhtich==3)
    		  $str.='<option value="3" selected>Xuất sắc</option>';
              else
              $str.='<option value="3">Xuất sắc</option>';
    		$str.='</select>';
    		$str.='</td>';
    		$str.='<td>';
    		$str.='<input id="txtKhenThuong_'.$id.'" type="text" style="width:300px;" value="'.$khenthuong.'" />';
    		$str.='</td>';
            $str.='<td>';
            $str.='<script>';
			$str.='$(function() {';
			$str.='$( "#txtDate_'.$id.'" ).datepicker({dateFormat:"yy-mm-dd", showButtonPanel: true})';
			$str.='});';
			$str.='</script>';
			$str.='<input id="txtDate_'.$id.'" type="text" style="width:70px;" value="'.$ngay.'">';
            $str.='</td>';
    		$str.='</tr>';  
            return $str;  
    }
    
    public static function displayHeader($numRow)
    {
        $str="";
        $str.='<table align="center" border="0" cellspacing="0" cellpadding="0">';
        $str.='<tr><td colspan="8"><b>Có '.$numRow.' mẫu tin</b></td></tr>';
		$str.='<tr class="title">';
		$str.='<td width="30px" align="center">#</td>';
		$str.='<td align="center"  width="150px">Nhân viên</td>';
		$str.='<td align="center" width="100px">Email đăng nhập</td>';
		$str.='<td align="center" width="50px">Giới tính</td>';
		$str.='<td align="center" width="60px">Cấp độ</td>';
		$str.='<td align="center" width="100px">Đạt thành tích</td>';
		$str.='<td align="center">Khen thưởng</td>';
        $str.='<td align="center">Ngày duyệt</td>';
		$str.='</tr>';
        return $str;
    }
    public static function displayFooter()
    {
        return '</table>';
    }
    public static function load( $curPage,$level)
    {  
        $totalItems =null;  
        $business = null; 
        $constMaxItem=5;
        $maxItems = $constMaxItem;
        $maxPages = 25;      
        $offset=($curPage-1)*$maxItems; 
        if($level>0)
        {
            $users=UsersBUS::getAllBySQL("select * from user where role=3 and level=$level and user.id not in (select iduser from khenthuong)  limit $offset,$maxItems");
            $totalUsers=UsersBUS::countAllBySQL("select count(*) from user where role=3 and level=$level and user.id not in (select iduser from khenthuong)");
        }else
        {
            $users=UsersBUS::getAllBySQL("select * from user where role=3  and user.id not in (select iduser from khenthuong)  limit $offset,$maxItems");
            $totalUsers=UsersBUS::countAllBySQL("select count(*) from user where role=3 and user.id not in (select iduser from khenthuong)");
        }
        
        $maxItems=$maxItems-count($users);
        $offset=$offset- $totalUsers;
        if($offset<0)
            $offset=0;
        if($level>0)
        {
            $evaluate=KhenThuongBUS::selectByUserLevel($offset,$maxItems,$level);
            $totalEvaluate=KhenThuongBUS::countByUserLevel($level);
        }
        else
        {
            $evaluate=KhenThuongBUS::select($offset,$maxItems);
            $totalEvaluate=KhenThuongBUS::count();
        }
        
        $display="";
        $display.=EvaluateProcessor::displayHeader($totalUsers+$totalEvaluate[0]);
        $index=0;
        for($i=0;$i<count($users);$i++)
        {
            $index++;
            $display.=EvaluateProcessor::display($index,$users[$i]['id'],$users[$i]['hoten'],$users[$i]['email'],$users[$i]['gioitinh'],$users[$i]['level'],-1,"","");
        } 
        for($i=0;$i<count($evaluate);$i++)
        {
            $index++;
            $user=UsersBUS::GetUserByID($evaluate[$i]['iduser']);
            $display.=EvaluateProcessor::display($index,$evaluate[$i]['iduser'],$user['hoten'],$user['email'],$user['gioitinh'],$user['level'],$evaluate[$i]['loai'],$evaluate[$i]['thuong'],$evaluate[$i]['ngay']);
        }
        
        $display.=EvaluateProcessor::displayFooter();
        $display.=EvaluateProcessor::displayNewRow("","","","","","","","","");
   
        $strPaging =Utils::paging ('',$totalUsers+$totalEvaluate[0],$curPage,$maxPages,$constMaxItem);
        return $display.$strPaging;
    }
}

if(isset($_REQUEST['action'])&&$_REQUEST['action']=='show')
{
    $page=$_REQUEST['page'];
    $level=$_REQUEST['level'];
    echo EvaluateProcessor::load($page,$level);
}
elseif(isset($_REQUEST['action'])&&$_REQUEST['action']=='loadrow')
{
    $id=$_REQUEST['id'];
    $users=UsersBUS::GetUserByID($id);
    echo EvaluateProcessor::displayNewRow("",$users['id'],$users['hoten'],$users['email'],$users['gioitinh'],$users['level'],-1,"","");
}
elseif(isset($_REQUEST['action'])&&$_REQUEST['action']=='save')
{
    $id=$_REQUEST['id'];
    $loai=$_REQUEST['loai'];
    $khenthuong=$_REQUEST['khenthuong'];
    $ngay=$_REQUEST['ngay'];
    KhenThuongBUS::update($id,$loai,$khenthuong,$ngay);
}
elseif(isset($_REQUEST['action'])&&$_REQUEST['action']=='export')
{
   
    $page=$_REQUEST['page'];
    $level=$_REQUEST['level'];
    $users=null;
    $totalEvaluate=0;
    $evaluate=null;
     
    if($level>0)
        {
            $users=UsersBUS::getAllBySQL("select * from user where role=3 and level=$level and user.id not in (select iduser from khenthuong)");
            $totalEvaluate=KhenThuongBUS::countByUserLevel($level);
            $evaluate=KhenThuongBUS::selectByUserLevel(0,$totalEvaluate[0],$level);
        }
        else
        {
            $users=UsersBUS::getAllBySQL("select * from user where role=3  and user.id not in (select iduser from khenthuong)");
            $totalEvaluate=KhenThuongBUS::count();
            $evaluate=KhenThuongBUS::select(0,$totalEvaluate[0]);           
        }
            $array=array();
   
            $array[0][0]="Nhân viên";
            $array[0][1]="Email đăng nhập";
            $array[0][2]="Giới tính";
            $array[0][3]="Cấp độ";
            $array[0][4]="Đạt thành tích";
            $array[0][5]="Khen thưởng";
    $index=0;
       
    for($i=0;$i<count($users);$i++)
    {
      
        $index++;
            $array[$index][0]=$users[$i]['hoten'];
            $array[$index][1]=$users[$i]['email'];
            $array[$index][2]=$users[$i]['gioitinh'];
            $array[$index][3]=$users[$i]['level'];
            $array[$index][4]="-1";
            $array[$index][5]="Chưa duyệt";
    }
     for($i=0;$i<count($evaluate);$i++)
        {
            
            $index++;
            $user=UsersBUS::GetUserByID($evaluate[$i]['iduser']);
            $array[$index][0]=$user['hoten'];
            $array[$index][1]=$user['email'];
            $array[$index][2]=$user['gioitinh'];
            $array[$index][3]=$user['level'];
            $array[$index][4]=$evaluate[$i]['loai'];
            $array[$index][5]=$evaluate[$i]['thuong'];
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
    echo EvaluateProcessor::load($page,-1);
}
?>