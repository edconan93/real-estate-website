<?php
include_once("../../../BUS/KhenThuongBUS.php");
include_once("../../../BUS/UsersBUS.php");
include_once("../../../BUS/LevelBUS.php");
require_once("../Utils/Utils.php");
?>
<?php
class EvaluateProcessor
{
    public static function display($index,$id,$nhanvien,$email,$gioitinh,$capdo,$thanhtich,$khenthuong)
    {
            $str="<input type='hidden' name='txtID[]' value='".$id."'>";
            $str.="<tr>";
    		$str.='<td align="center">'.$index.'</td>';
    		$str.='<td class="m_name"><a href="index.php?view=user&do=edit&uid=1">'.$nhanvien.'</a></td>';
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
    		$str.='</tr>';  
            return $str;  
    }
    public static function displayHeader()
    {
        $str="";
        $str.='<table align="center" border="0" cellspacing="0" cellpadding="0">';
        $str.='<tr><td colspan="7"><b>Có 2 mẫu tin</b></td></tr>';
		$str.='<tr class="title">';
		$str.='<td width="30px" align="center">#</td>';
		$str.='<td align="center">Nhân viên</td>';
		$str.='<td align="center">Email đăng nhập</td>';
		$str.='<td align="center" width="50px">Giới tính</td>';
		$str.='<td align="center" width="60px">Cấp độ</td>';
		$str.='<td align="center" width="100px">Đạt thành tích</td>';
		$str.='<td align="center">Khen thưởng</td>';
		$str.='</tr>';
        return $str;
    }
    public static function displayFooter()
    {
        return '</table>';
    }
    public static function load( $curPage)
    {  
        $totalItems =null;  
        $business = null; 
        $constMaxItem=5;
        $maxItems = $constMaxItem;
        $maxPages = 25;      
        $offset=($curPage-1)*$maxItems; 
    
        $users=UsersBUS::getAllBySQL("select * from user where role=3 and user.id not in (select iduser from khenthuong)  limit $offset,$maxItems");
        $totalUsers=UsersBUS::countAllBySQL("select count(*) from user where role=3 and user.id not in (select iduser from khenthuong)");
        $maxItems=$maxItems-count($users);
        $offset=$offset- $totalUsers;
        if($offset<0)
            $offset=0;
        $evaluate=KhenThuongBUS::select($offset,$maxItems);
        $totalEvaluate=KhenThuongBUS::count();
        $display="";
        $display.=EvaluateProcessor::displayHeader();
        $index=0;
        for($i=0;$i<count($users);$i++)
        {
            $index++;
            $display.=EvaluateProcessor::display($index,$users[$i]['id'],$users[$i]['hoten'],$users[$i]['email'],$users[$i]['gioitinh'],$users[$i]['level'],-1,"");
        } 
        for($i=0;$i<count($evaluate);$i++)
        {
            $index++;
            $user=UsersBUS::GetUserByID($evaluate[$i]['iduser']);
            $display.=EvaluateProcessor::display($index,$evaluate[$i]['iduser'],$user['hoten'],$user['email'],$user['gioitinh'],$user['level'],$evaluate[$i]['loai'],$evaluate[$i]['thuong']);
        }
        $display.=EvaluateProcessor::displayFooter();
   
        $strPaging =Utils::paging ('',$totalUsers+$totalEvaluate[0],$curPage,$maxPages,$constMaxItem);
        return $display.$strPaging;
    }
}
if(isset($_REQUEST['action'])&&$_REQUEST['action']=='show')
{
    
}
elseif(isset($_REQUEST['action'])&&$_REQUEST['action']=='save')
{
    $id=$_REQUEST['id'];
    $loai=$_REQUEST['loai'];
    $khenthuong=$_REQUEST['khenthuong'];
    KhenThuongBUS::update($id,$loai,$khenthuong,date('Y'));
}
else
{
    $page=$_REQUEST['page'];
    echo EvaluateProcessor::load($page);
}
?>