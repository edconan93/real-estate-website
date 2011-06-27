<?php 
	$PATH_BASE = str_replace('//','/',dirname(__FILE__).'/');
	include_once ($PATH_BASE . '../BUS/QuanBUS.php');
	//echo"id=".$_REQUEST["cbbTinhTP"];
	if(isset($_REQUEST["cbbTinhTP"]) && $_REQUEST["cbbTinhTP"]!="-1")
	{
	$id = $_REQUEST["cbbTinhTP"];
	//echo"check service";
	//include("../BUS/QuanBUS.php");
    $rs=QuanBUS::GetAllQuanById($id);
	//echo"id=".$id;
    //echo"check service=".count($rs);
	echo "$('#messQuanHuyen').attr('innerHTML', '<select id='cbbQuanHuyen' name='cbbQuanHuyen' style='width:220px;' ><option value='-1'>Chọn quận/huyện</option></select>');";
    // echo "<div style='width:310px;float:left;'>";
	// echo"<select id='cbbQuanHuyen' name='cbbQuanHuyen' style='width:220px;' >";
		// echo"<option value='-1'>Chọn quận/huyện</option>";

		// for($i=0;$i<count($rs);$i++)
		// {		
			// echo "<option value='".($i+1)."'>".$rs[$i][1]."</option>";
		// }

	// echo "</select></div>";										
																							

	}
	
	if(isset($_REQUEST["txtTieuDeTin"]) && !empty($_REQUEST["txtTieuDeTin"]))
	{
		//$PATH_BASE = str_replace('//','/',dirname(__FILE__).'/');
		//echo $PATH_BASE;
		//include_once ($PATH_BASE . '../BUS/UsersBUS.php');
		//$user = UsersBUS::GetUserByEmail($txtEmail);
		//if(empty($user))
		//{
			echo "<img src='../images/user/valid.png' alt='Hợp lệ' title='Hợp lệ' width=20 height=20>";
	//		echo "<span class='correct'> bạn có thể dùng tên này</span>";
		//}
		// else
		// {
			// echo "<img src='../images/user/incorrect.png' alt='Đã được sử dụng' title='Đã được sử dụng' width=20 height=20>";
			// echo "<span style='position:relative;top:-6px;color:red;'> đã được sử dụng</span>";
			// echo "<input type='hidden' id='hdEmailError' value='true' />";
		// }
	}
	
?>