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
</script>
<div id="toolbar">
<div class="tl"></div>
<div class="tr"></div>
<div class="tm"></div>
<div class="mid">
	<div class="title icon_user">Quản lý thành viên </div>
    <div class="icon">
    	<a href="index.php?view=user&do=add" id="aAdd">
        	 <img src="images/icon_32_new.png" alt="Thêm mới" border="0" title="Thêm mới" />
             <br />
             Thêm mới
      </a>
    </div>
   
     <div class="icon">
    	<a href="#" id="aDelete">
        	 <img src="images/icon_32_delete.png" alt="Xóa" border="0" title="Xóa" />
             <br />
             Xóa
       </a>
    </div>
      <div class="icon">
    	<a href="#" id="aDisable"> 
        	 <img src="images/icon_32_cancel.png" alt="Khóa"  border="0" title="Khóa" />
             <br />
             Khóa
        </a>
    </div>
      <div class="icon">
    	<a href="#" id="aEnable">
        	 <img src="images/icon_32_help.png" alt="Mở khóa" border="0" title="Mở khóa" />
             <br />
            Mở khóa
        </a>
    </div>
    <br class="clr" />
</div>
<div class="bl"></div>
<div class="br"></div>
<div class="bm"></div>
</div>
<div style="margin:10px">
<?php include_once ($PATH . "listUser.php"); ?>
</div>