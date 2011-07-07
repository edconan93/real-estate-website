<?php 
	session_start();
 	$do="";
	if (isset($_GET["do"]))
		$do=$_GET["do"];
	if($do=="logout")
	{
		unset($_SESSION["curUser"]);
		header("Location:../index.php");
	}
	
	if (isset($_POST["btLogin"]))
	{
		include ("../BUS/UsersBUS.php");
		$username = $_POST["txtUsername"];
		$password = $_POST["txtPassword"];
		$curUser = UsersBUS::Login($username,$password);

		if($curUser != null && $curUser[8] == 1)
		{
			$now = date ("Y-m-d H-i-s");
			//UsersBUS::SetLastVisited($curUser[0],$now);
			$_SESSION["curUser"] = $curUser;
		}
		else
			$login="false";
	}
	if(isset($_SESSION["curUser"]) && $_SESSION["curUser"][8] == 1)
		$bodyFile="include/controlpanel.php";
	else
		$bodyFile= "module/login.php";
	
	if(isset ($_GET["view"]))
	{
		switch ($_GET["view"])
		{
			case "user":
			{
				switch($do)
				{
					case "add":
						$bodyFile= "module/user/create_user.php";
						break;
					case "edit":
						$bodyFile= "module/user/edit_user.php";
						break;
					default:
						$bodyFile= "module/user/user.php";
						break;
				}
				break;
			}
			case "article":
			{
				switch($do)
				{
					case "edit":
						$bodyFile= "module/edit_article.php";
						break;
					default:
						$bodyFile= "module/article.php";
						break;
				}
				break;
			}
			case "business":
				switch($do)
				{
					case "import":
						$bodyFile= "module/importBusiness.php";
						break;
					case "export":
						$bodyFile= "module/exportBusiness.php";
						break;
					case "rpim":
						$bodyFile= "module/rpimBusiness.php";
						break;
					case "rpex":
						$bodyFile= "module/rpexBusiness.php";
						break;
					default:
						$bodyFile= "module/business.php";
						break;
				}
				break;
			case "statistic":
				switch($do)
				{
					case "profit":
						$bodyFile= "module/statistic_profit.php";
						break;
					case "evaluate":
						$bodyFile= "module/statistic_evaluate.php";
						break;
					case "house":
						$bodyFile= "module/statistic_house.php";
						break;
					case "vip":
						$bodyFile= "module/statistic_vip.php";
						break;
					case "adv":
						$bodyFile= "module/statistic_adv.php";
						break;
					default:
						$bodyFile= "module/statistic.php";
						break;
				}
				break;
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="css/admin.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="css/ui-lightness/jquery-ui-1.8.9.custom.css" />
	<script type="text/javascript" src="js/jquery-1.4.4.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui-1.8.9.custom.min.js"></script>
	<script type="text/javascript" src="js/utilities.js"></script>
	<LINK REL="SHORTCUT ICON" HREF="images/icon.png">
	<title>Bảng điều khiển</title>
</head>

<body>
<div id="container">
<div id="header">
	<?php include("include/top_admin.php");?>
</div>
<div id="body">
<?php
	include($bodyFile);
?>
</div>
<div id="footer">
Copyright© 2011 realestate_hoaphuong.com<br />
</div>
</div>
</body>
</html>
