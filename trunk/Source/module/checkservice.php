<?php 
	$PATH_BASE = str_replace('//','/',dirname(__FILE__).'/');
	include_once ($PATH_BASE . '../BUS/QuanBUS.php');
	include_once ($PATH_BASE . '../BUS/PhuongBUS.php');
	//echo"id=".$_REQUEST["cbbTinhTP"];
	//echo"id=sá";//echo "aaaaaaaaaaaaaaaaaaaaaaaaa";
	if(isset($_REQUEST["cbbTinhTP"]) && $_REQUEST["cbbTinhTP"] !="-1")
	{
		$id = $_REQUEST["cbbTinhTP"];
		$rs=QuanBUS::GetAllQuanById($id);
		
		echo"<select id='cbbQuanHuyen' name='cbbQuanHuyen' style='width:220px;' onchange='clickQuanHuyen()'>";
			 echo"<option value='-1' selected>--Chọn quận/huyện--</option>";
			 for($i=0;$i<count($rs);$i++)
			 {		
				 echo "<option value='".($i+1)."'>".$rs[$i][1]."</option>";
			 }
	   echo "</select></div>";
	}
	if(isset($_REQUEST["cbbPhuongXa"]) && $_REQUEST["cbbPhuongXa"] !="-1")
	{
		$id = $_REQUEST["cbbPhuongXa"];
		//echo "id=".$id;
		
		$rs=PhuongBUS::GetAllPhuongById($id);
		//echo "id=".count($rs);
		echo"<select id='cbbPhuongXa' name='cbbPhuongXa' style='width:220px;' onchange='clickPhuongXa()'>";
			 echo"<option value='-1' selected>--Chọn Phường/ Xã--</option>";
			 for($i=0;$i<count($rs);$i++)
			 {		
				 echo "<option value='".($i+1)."'>".$rs[$i][1]."</option>";
			 }
	   echo "</select></div>";
	}
	
	if(isset($_REQUEST["txtTieuDeTin"]) && !empty($_REQUEST["txtTieuDeTin"]))
	{

			echo "<img src='../images/user/valid.png' alt='Hợp lệ' title='Hợp lệ' width=20 height=20>";

	}
	
?>