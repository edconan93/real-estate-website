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
        //$str="<div id='trNewRow' align='center'>";
       // $str.='<table align="center" border="0" cellspacing="0" cellpadding="0">';
           
            
    		$str='<td>';
            $str.="<input type='hidden' id='txtNewID' value='".$id."'>";
            $str.="</td>";
    		$str.='<td>';
            $str.='<select style="font-size:12px;width:150px;text-align: center;" id="cbbAddRow" onchange="selectUser()">';
            $str.='<option value="-1">---Chọn nhân viên---</option>';
            $users=UsersBUS::getUsersByRole(3);
            for($i=0;$i<count($users);$i++)
            {
                if($users[$i]['id']==$id)
                    $str.="<option selected style='font-size:12px;' value='".$users[$i]['id']."'>".$users[$i]['hoten']."</option>";
                else
                    $str.="<option style='font-size:12px;' value='".$users[$i]['id']."'>".$users[$i]['hoten']."</option>";
            }
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
    		$str.='<select id="cbbNewThanhTich">';
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
    		$str.='<input id="txtNewKhenThuong" type="text" style="width:300px;" value="'.$khenthuong.'" />';
    		$str.='</td>';
            $str.='<td>';
            $str.='<script>';
			$str.='$(function() {';
			$str.='$( "#txtDate_New" ).datepicker({dateFormat:"yy-mm-dd", showButtonPanel: true})';
			$str.='});';
			$str.='</script>';
            if($ngay!="")
			     $str.='<input id="txtDate_New" type="text" style="width:70px;" value="'.$ngay.'">';
            else
                $str.='<input id="txtDate_New" type="text" style="width:70px;" value="'.date("Y-m-d").'">';  
            $str.='</td>';
            $str.='<td><a href="#" onclick="addNew();"><img src="images/icon_32_new.png"></a></td>';
           // $str.="</table>";
           // $str.="</div>"; 
            return $str;  
    }
    public static function display($index,$id,$nhanvien,$email,$gioitinh,$capdo,$thanhtich,$khenthuong,$ngay)
    {
            $str="<input type='hidden' name='txtID[]' value='".$index."'>";
            $str.="<tr>";
    		$str.='<td align="center">'.$index.'</td>';
    		$str.='<td class="m_name"><a href="index.php?view=user&do=edit&uid='.$id.'">'.$nhanvien.'</a></td>';
    		$str.='<td style="color:blue;">'.$email.'</td>';
    		$str.='<td align="center">';
            if($gioitinh==1)
                $str.='Nam';
            elseif($gioitinh==0)
                $str.='Nữ';
            $str.='</td>';
    		$str.='<td align="center">'.$capdo.'</td>';
    		$str.='<td align="center">';
    		$str.='<select id="cbbLoai_'.$index.'">';
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
    		$str.='<input id="txtKhenThuong_'.$index.'" type="text" style="width:300px;" value="'.$khenthuong.'" />';
    		$str.='</td>';
            $str.='<td>';
            $str.='<script>';
			$str.='$(function() {';
			$str.='$( "#txtDate_'.$index.'" ).datepicker({dateFormat:"yy-mm-dd", showButtonPanel: true})';
			$str.='});';
			$str.='</script>';
			$str.='<input id="txtDate_'.$index.'" type="text" style="width:70px;" value="'.$ngay.'">';
            $str.='</td>';
            $str.='<td><a href="#" onclick="update('.$index.');"><img  src="images/icon_yes.png"></a></td>';
    		$str.='</tr>'; 
             
            return $str;  
    }
    
    public static function displayHeader($numRow)
    {
        $str="";
        $str.='<table align="center" border="0" cellspacing="0" cellpadding="0">';
        $str.='<tr><td colspan="9" align="left"><b>Có '.$numRow.' mẫu tin</b></td></tr>';
		$str.='<tr class="title">';
		$str.='<td width="30px" align="center">#</td>';
		$str.='<td align="center"  width="150px">Nhân viên</td>';
		$str.='<td align="center" width="100px">Email đăng nhập</td>';
		$str.='<td align="center" width="50px">Giới tính</td>';
		$str.='<td align="center" width="60px">Cấp độ</td>';
		$str.='<td align="center" width="100px">Đạt thành tích</td>';
		$str.='<td align="center">Khen thưởng</td>';
        $str.='<td align="center">Ngày duyệt</td>';
        $str.='<td align="center"></td>';
		$str.='</tr>';
        return $str;
    }
    public static function displayFooter($index,$id,$nhanvien,$email,$gioitinh,$capdo,$thanhtich,$khenthuong,$ngay)
    {
        $footer="<tr class='title' id='trNewRow'>";
        $footer.=EvaluateProcessor::displayNewRow($index,$id,$nhanvien,$email,$gioitinh,$capdo,$thanhtich,$khenthuong,$ngay);
        $footer.='</tr>';
        return $footer.'</table>';
    }
    public static function getkhenthuongCondition($level,$nam,$thangfrom,$thangto)
    {
        $str="";
        if($level>0)
            $str.="and user.level=$level ";
        if($nam>0)
            $str.="and YEAR(khenthuong.ngay)=$nam ";
        if($thangfrom>0)
             $str.="and MONTH(khenthuong.ngay)>=$thangfrom ";
        if($thangto>0)
            $str.="and MONTH(khenthuong.ngay)<=$thangto ";
        return $str;
    }
    public static function load( $curPage,$level,$nam,$thangfrom,$thangto)
    {  
        $totalItems =null;  
        $business = null; 
        $constMaxItem=5;
        $maxItems = $constMaxItem;
        $maxPages = 25;      
        $offset=($curPage-1)*$maxItems; 
        $condition=EvaluateProcessor::getkhenthuongCondition($level,$nam,$thangfrom,$thangto);
        $strSQL="select * from khenthuong,user where khenthuong.iduser=user.id ".$condition." limit $offset,$maxItems";
        $evaluate=KhenThuongBUS::selectByIdSQL($strSQL);
        $strSQL="select count(*) from khenthuong,user where khenthuong.iduser=user.id ".$condition;
        $totalEvaluate=KhenThuongBUS::countBySQL($strSQL);
        
        
        $display="";
        $display.=EvaluateProcessor::displayHeader($totalEvaluate[0]);
        for($i=0;$i<count($evaluate);$i++)
        {
            $user=UsersBUS::GetUserByID($evaluate[$i]['iduser']);
            $display.=EvaluateProcessor::display($i+1,$evaluate[$i]['iduser'],$user['hoten'],$user['email'],$user['gioitinh'],$user['level'],$evaluate[$i]['loai'],$evaluate[$i]['thuong'],$evaluate[$i]['ngay']);
        }
        
        $display.=EvaluateProcessor::displayFooter("",-1,"","",-1,"","","","");
        $strPaging =Utils::paging ('',$totalEvaluate[0],$curPage,$maxPages,$constMaxItem);
        return $display.$strPaging;
    }
}

if(isset($_REQUEST['action'])&&$_REQUEST['action']=='show')
{
    $page=$_REQUEST['page'];
    $loai=$nam=$quy=$thang=$option=-1;
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
     if($option==1)
            {
                echo EvaluateProcessor::load($page,$loai,$nam,$thang,$thang);
            }
     elseif($option==0)
        {
            switch($quy)
            {
             case 1:
            echo EvaluateProcessor::load($page,$loai,$nam,1,3);
            break;
            case 2:
            echo EvaluateProcessor::load($page,$loai,$nam,4,6);
            break;
            case 3:
            echo EvaluateProcessor::load($page,$loai,$nam,7,9);
            break;
            case 4:
            echo EvaluateProcessor::load($page,$loai,$nam,10,12);
            break;
            default:
             echo EvaluateProcessor::load($page,$loai,$nam,1,12);
            break;
            }
         }
        else
        {
            echo EvaluateProcessor::load($page,$loai,$nam,1,12);
        }
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
elseif(isset($_REQUEST['action'])&&$_REQUEST['action']=='add')
{
    $id=$_REQUEST['id'];
    $loai=$_REQUEST['loai'];
    $khenthuong=$_REQUEST['khenthuong'];
    $ngay=$_REQUEST['ngay'];
    KhenThuongBUS::insert($id,$loai,$khenthuong,$ngay);
}
elseif(isset($_REQUEST['action'])&&$_REQUEST['action']=='export')
{
   
    $page=$_REQUEST['page'];
    $loai=$nam=$quy=$thang=$option=-1;
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
        
    $evaluate=null;
    
     if($option==1)
            {
                $condition=EvaluateProcessor::getkhenthuongCondition($loai,$nam,$thang,$thang);
                $strSQL="select * from khenthuong,user where khenthuong.iduser=user.id ".$condition;
                $evaluate=KhenThuongBUS::selectByIdSQL($strSQL);
            }
     elseif($option==0)
        {
            switch($quy)
            {
             case 1:
            $condition=EvaluateProcessor::getkhenthuongCondition($loai,$nam,1,3);
                $strSQL="select * from khenthuong,user where khenthuong.iduser=user.id ".$condition;
                $evaluate=KhenThuongBUS::selectByIdSQL($strSQL);
            break;
            case 2:
            $condition=EvaluateProcessor::getkhenthuongCondition($loai,$nam,4,6);
                $strSQL="select * from khenthuong,user where khenthuong.iduser=user.id ".$condition;
                $evaluate=KhenThuongBUS::selectByIdSQL($strSQL);
            break;
            case 3:
            $condition=EvaluateProcessor::getkhenthuongCondition($loai,$nam,7,9);
                $strSQL="select * from khenthuong,user where khenthuong.iduser=user.id ".$condition;
                $evaluate=KhenThuongBUS::selectByIdSQL($strSQL);
            break;
            case 4:
            $condition=EvaluateProcessor::getkhenthuongCondition($loai,$nam,10,12);
                $strSQL="select * from khenthuong,user where khenthuong.iduser=user.id ".$condition;
                $evaluate=KhenThuongBUS::selectByIdSQL($strSQL);
            break;
            default:
             $condition=EvaluateProcessor::getkhenthuongCondition($loai,$nam,10,12);
                $strSQL="select * from khenthuong,user where khenthuong.iduser=user.id ".$condition;
                $evaluate=KhenThuongBUS::selectByIdSQL($strSQL);
            break;
            }
         }
        else
        {
           $condition=EvaluateProcessor::getkhenthuongCondition($loai,$nam,1,12);
                $strSQL="select * from khenthuong,user where khenthuong.iduser=user.id ".$condition;
                echo $strSQL;
                $evaluate=KhenThuongBUS::selectByIdSQL($strSQL);
        }    
       require '../Utils/php-excel.class.php';      
            $array=array(); 
            $array[0]="Nhân viên";
            $array[1]="Email đăng nhập";
            $array[2]="Giới tính";
            $array[3]="Cấp độ";
            $array[4]="Đạt thành tích";
            $array[5]="Khen thưởng";
    $headerColumn=new  TableHeaderColumn(null,$array);
    $headerColumn->setColumnWidth(0,200);    
    $headerColumn->setColumnWidth(1,300); 
    $headerColumn->setColumnWidth(4,100); 
    $headerColumn->setColumnWidth(5,100);    
    $array=array(); 
     for($i=0;$i<count($evaluate);$i++)
        {
            $user=UsersBUS::GetUserByID($evaluate[$i]['iduser']);
            $array[$i][0]=$user['hoten'];
            $array[$i][1]=$user['email'];
            $array[$i][2]=$user['gioitinh'];
            $array[$i][3]=$user['level'];
            $array[$i][4]=$evaluate[$i]['loai'];
            $array[$i][5]=$evaluate[$i]['thuong'];
        }
       
            
           //  generate file (constructor parameters are optional) ;
            $xls = new Excel_XML('UTF-8', false, 'Workflow Management');
            $xls->setTableHeaderColumn($headerColumn); 
            $xls->setTile("s57","Thống kê đánh giá nhân viên");
            $xls->setAutoData($array);
            $xls->getXML("Output_Report_WFM");
}
else
{
    $page=$_REQUEST['page'];
    echo EvaluateProcessor::load($page,-1,-1,-1,-1);
}
?>