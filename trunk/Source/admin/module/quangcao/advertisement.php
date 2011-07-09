<?php
	$PATH = str_replace('//','/',dirname(__FILE__).'/');
	if(isset($_POST["btRegister"]))
	{
		include_once ($PATH . "../../BUS/UsersBUS.php");
		include_once ($PATH . "../../BUS/User_Personal_InformationBUS.php");
		include_once ($PATH . "../../BUS/User_Contact_InformationBUS.php");
		include_once ($PATH . "../../BUS/User_Basic_InformationBUS.php");
		include_once ($PATH . "../../BUS/AlbumsBUS.php");
		include_once ($PATH . "../../BUS/PicturesBUS.php");
		$username = $_POST["txtUsername"];
		$email = $_POST["txtEmail"];
		$password = $_POST["txtPassword"];
		$repassword = $_POST["txtRePassword"];
		$sex = (int) $_POST["lbSex"];
		$day = (int) $_POST["lbDay"];
		$month = (int) $_POST["lbMonth"];
		$year = (int) $_POST["lbYear"];
		$birthday = sprintf ("%d-%d-%d",$year,$month,$day);
		$now = date ("Y-m-d H:i:s");
		$security_question = $_POST["lbSecurityQuestion"];
		$answer = $_POST["txtAnswer"];
		$type = $_POST["lbType"];
		$status = $_POST["lbStatus"];
		$user_id = UsersBUS::Add($username,$password,$email,null,$now,$security_question,$answer,null,$status,$type);
		if(!empty ($user_id))
		{	
			User_Personal_InformationBUS::Add($user_id, null, null, null, null, null, null, null);
			User_Contact_InformationBUS::Add($user_id, null, null, null, null);
			User_Basic_InformationBUS::Add($user_id, null, null, null, $username, $sex, $birthday);
			AlbumsBUS::Add("Avatar",null,$now,$user_id,null);
		}		
	}
	if(isset($_POST["btUpdate"]))
	{
		include_once ($PATH . "../../BUS/UsersBUS.php");
		$uid = $_POST["uid"];
		$user = UsersBUS::GetUserByID($uid);
	
		if($_POST["txtEmail"] != $user[3])
			UsersBUS::SetEmail($uid,$_POST["txtEmail"]);
		if(!empty($_POST["txtPassword"]))
			UsersBUS::SetPassword($uid,$_POST["txtPassword"]);
		if(!empty($_POST["txtAnswer"]) && !empty($_POST["lbSecurityQuestion"]))
		{
			$_POST["lbSecurityQuestion"] ;
			UsersBUS::SetSecurityQuestion($uid,$_POST["lbSecurityQuestion"],$_POST["txtAnswer"]);
		}
		
		UsersBUS::SetStatus($uid,$_POST["lbStatus"]);
		UsersBUS::SetType($uid,$_POST["lbType"]);	
	}
?>
<script language="javascript">
	$(document).ready (function ()
	{
		$("#aDisable").click (function ()
		{
			var url = "modules/forms/listUser.php";
			var data = $("#frmListItem").serialize() + "&btDisable=true";
			$("#listItem").load(url,data);
		});
		$("#aEnable").click (function ()
		{
			var url = "modules/forms/listUser.php";
			var data = $("#frmListItem").serialize() + "&btEnable=true";
			$("#listItem").load(url,data);
		});
		$("#aDelete").click (function ()
		{
			var url = "modules/forms/listUser.php";
			var data = $("#frmListItem").serialize() + "&btDelete=true";
			$("#listItem").load(url,data);
		});
	});
	function lockUser()
	{
		if (confirm("Bạn có chắc muốn khóa các thành viên này?"))
		{
			var e = document.frmListItem.elements.length;
			var cnt = 0;
			var uid = new Array();
			var i = 0;
			for (cnt=0;cnt<e;cnt++)
			{
				var tmp = document.frmListItem.elements[cnt];
				if (tmp.name=="cbUser" && tmp.checked==true)
					uid[i++] = document.frmListItem.elements[cnt].value;
			}
			var type = document.getElementById("type");
			var status = document.getElementById("status");
			window.location = "module/user/xulyuser.php?action=lock&uid=" + uid + "&type=" + type.value + "&status=" + status.value;
			return true;
		}
		
		return false;
	}
	function unlockUser()
	{
		if (confirm("Bạn có chắc muốn mở khóa các thành viên này?"))
		{
			var e = document.frmListItem.elements.length;
			var cnt = 0;
			var uid = new Array();
			var i = 0;
			for (cnt=0;cnt<e;cnt++)
			{
				var tmp = document.frmListItem.elements[cnt];
				if (tmp.name=="cbUser" && tmp.checked==true)
					uid[i++] = document.frmListItem.elements[cnt].value;
			}
			var type = document.getElementById("type");
			var status = document.getElementById("status");
			window.location = "module/user/xulyuser.php?action=unlock&uid=" + uid + "&type=" + type.value + "&status=" + status.value;
			return true;
		}
		
		return false;
	}
	function deleteUser()
	{
		if (confirm("Bạn có chắc muốn xóa các thành viên này?"))
		{
			var e = document.frmListItem.elements.length;
			var cnt = 0;
			var uid = new Array();
			var i = 0;
			for (cnt=0;cnt<e;cnt++)
			{
				var tmp = document.frmListItem.elements[cnt];
				if (tmp.name=="cbUser" && tmp.checked==true)
					uid[i++] = document.frmListItem.elements[cnt].value;
			}
			var type = document.getElementById("type");
			var status = document.getElementById("status");
			window.location = "module/user/xulyuser.php?action=delete&uid=" + uid + "&type=" + type.value + "&status=" + status.value;
			return true;
		}
		
		return false;
	}
</script>
<div id="toolbar">
<div class="tl"></div>
<div class="tr"></div>
<div class="tm"></div>
<div class="mid">
	<div class="title icon_advertisement">Quản lý quảng cáo</div>
    <div class="icon">
    	<a href="index.php?view=advertisement&do=add">
        	<img src="images/icon_32_new.png" alt="Thêm mới" border="0" title="Thêm mới" /><br />Thêm mới</a></div>
    <div class="icon">
    	<a onclick="return deleteUser();">
        	<img src="images/icon_32_delete.png" alt="Xóa" border="0" title="Xóa" /><br />Xóa</a></div>
    <br class="clr" />
</div>
<div class="bl"></div>
<div class="br"></div>
<div class="bm"></div>
</div>
<div style="margin:10px">
<?php include_once ($PATH . "listAdv.php"); ?>
</div>