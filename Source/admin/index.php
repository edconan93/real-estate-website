<?php 
	session_start();
 	$do="";
	if (isset($_GET["do"]))
		$do=$_GET["do"];
	if($do=="logout")
		unset($_SESSION["curUser"]);
		
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
						$bodyFile= "module/create_user.php";
						break;
					case "edit":
						$bodyFile= "module/edit_user.php";
						break;
					default:
						$bodyFile= "module/user.php";
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
			case "statistics":
				$bodyFile= "module/statistics.php";
				break;
			case "database":
				$bodyFile= "module/database.php";
				break;
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/admin.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../js/jquery-1.3.2.min.js"></script>
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
