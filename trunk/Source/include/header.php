<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Real Estate - Hoa Phuong</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<link rel="stylesheet" type="text/css" href="../css/default.css">
	<link rel="stylesheet" type="text/css" href="../css/user.css">
	<link rel="stylesheet" type="text/css" href="../css/ui-lightness/jquery-ui-1.8.13.custom.css" />
	<link rel="stylesheet" type="text/css" href="../css/button_style.css">
	<script type="text/javascript" src="../js/utilities.js"></script>
	<script type="text/javascript" src="../js/jquery-1.4.4.min.js"></script>
	<script type="text/javascript" src="../js/jquery-ui-1.8.9.custom.min.js"></script>
	<script type="text/javascript" src="../js/custom.js"></script>
</head>
<?php
	session_start();
	include ("../DAO/config.php");
	include_once ("../BUS/QuanBUS.php");
   	if(isset($_GET["do"])&&$_GET["do"]=="logout")
	{
        unset($_SESSION["curUser"]);
		//session_destroy(); 
	}
	$curUser=null;
	$curUserEmail=null;
	$curUserAddress=null;
	
	
	// if(isset($_SESSION["timeout"]) && $_SESSION["timeout"] == true ) 
	// {
		// unset($_SESSION["timeout"]);
	// }
	
	if(isset($_SESSION["curUser"]) && !empty($_SESSION["curUser"]))
	{
		$curUserEmail=$_SESSION["curUser"][2];
		$curUserId=$_SESSION["curUser"]["id"];
        $curUser=$_SESSION["curUser"];
		$curUserAddress = $_SESSION["curUser"]["diachi"];
		$curUserHoTen = $_SESSION["curUser"]["hoten"];
		//process timeout
		$timeout=ini_get("session.gc_maxlifetime");
		$current_time=time();
		$time_start =$_SESSION["time_start"];
		//echo "<br>".;
		if(($time_start+ $timeout) -$current_time < 0 )
		{
			unset($_SESSION["curUser"]);
			// echo  "<br>login again";
			//$flag_Timeout =false;
			$_SESSION["timeout"] = true;
		    header("Location:dichvu.php");
			//echo"<body onload='press_DangNhap();'>";
		}
		else
			$_SESSION["time_start"] = time();
	}
	// if($flag_Timeout == null ||$flag_Timeout ==  false) 
	// {		
		//	echo"<body onload='timeOut();'>";
			//$_SESSION["timeout"] == true;
			//unset($_SESSION["timeout"]);
			
	// }
	
	if(isset($_SESSION["flag"]) && $_SESSION["flag"] == true ) 
	{
		//echo "<script>alert('Thinh');</script>";
	    echo"<body onload='timeOut();'>";
		//$_SESSION["timeout"] = true;
	}

	
	if(isset($_GET["do"])&& $_GET["do"]=="login")
		echo"<body onload='press_DangNhapRegister();'>";
?>
<body style="margin: 0pt; padding: 0pt;" bgcolor="#000c1c">
	<?php if($_SESSION["timeout"] == null) echo "flag_Timeout=".$_SESSION["timeout"]; ?>
	<div style="width: 100%; background-image: url(&quot;../images/bg_top.gif&quot;); background-repeat: repeat-x; text-align: center;">
		<center>
            <div style="clear: both; width: 1100px; text-align: center; background-image: url(&quot;../images/logo_top.gif&quot;);
                background-repeat: no-repeat;">
                <div style="padding-left: 140px;">
                    <center>
                        <div style="height: 60px;">
                            <table border="0" cellpadding="0" cellspacing="0">
								<tr>
									<td>
										<div id="slogan" style="margin-left: 100px; margin-bottom: 3px;">
											<embed type="application/x-shockwave-flash" src="../images/slogan.swf" id="mymovie"
												name="mymovie" bgcolor="#000000" quality="high" loop="true" wmode="transparent"
												width="530" height="48"></div>
										<script type="text/javascript">
											var fo = new FlashObject("../images/slogan.swf", "mymovie", "600", "48", "6", "#000000"); 
											fo.addParam("loop", "true"); 
											fo.addParam("wmode", "transparent"); 
											fo.write("slogan"); 
										</script>
									</td>
									<td valign="bottom">
										<div style="margin-bottom: 3px;">
											<img src="../images/home.png" style="vertical-align: middle;"/>
											<a href="dichvu.php" class="a_small">Home</a>&nbsp;&nbsp;&nbsp;
											<img src="../images/kgpg_key1.png" style="vertical-align: middle;"/>
                                            <?php
                                            if ($curUser == null)                                  
                                           	    echo "<a href='' class='a_small' onclick='return press_DangNhap();'>Đăng Nhập</a>";
                                            else
                                                echo "<a href='dichvu.php?do=logout' class='a_small'>Đăng Xuất</a>";

											echo "&nbsp;&nbsp;&nbsp;";
                                            if ($curUser == null)                                      
											{
												echo "<img src='../images/sign-up.png' style='vertical-align: middle;'/>";
												echo "<a href='dangky.php' class='a_small'> Đăng Ký</a>";
											}
											else
											{
												if ($curUser["role"] == 1)
												{
													echo "<img src='../images/personal.png' style='vertical-align: middle;'/>";
													echo "<a href='../admin/index.php' class='a_small'> Administrator</a>";
												}
												else
												{
													echo "<img src='../images/personal.png' style='vertical-align: middle;'/>";
													echo "<a href='thanhvien.php' class='a_small'> Thành viên</a>";
												}
											}
                                            ?>
										</div>
									</td>
								</tr>
                            </table>
                        </div>
						<?php
							$url = (!empty($_SERVER['HTTPS'])) ? "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] : "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
							$gioithieu = strpos($url, "gioithieu.php");
							$phongthuy = strpos($url, "phongthuy.php");
							$lienhe = strpos($url, "lienhe.php");
							$dichvu = strpos($url, "dichvu.php");
							$chitiet= strpos($url, "chitietdiaoc.php");
							if ($chitiet > -1)
								$dichvu = $chitiet;
						?>
                        <table border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td>
									<a href="gioithieu.php" onmouseover='bt("t1","../images/menu1_on.gif")'
										onmouseout='bt("t1","../images/menu1.gif")' onfocus="this.blur();">
										<img src="../images/menu1<?php echo ($gioithieu>-1)?"_hover":""; ?>.gif" id="t1" style="" border="0"></a>
								</td>
								<td>
									<a href="dichvu.php" onmouseover='bt("t2","../images/menu/e/menu2_on.gif")'
										onmouseout='bt("t2","../images/menu2.gif")' onfocus="this.blur();">
										<img src="../images/menu2<?php echo ($dichvu>-1)?"_hover":""; ?>.gif" id="t2" style="" border="0"></a>
								</td>
								<td>
									<a href="phongthuy.php?" onmouseover='bt("t3","../images/menu/e/menu3_on.gif")'
										onmouseout='bt("t3","../images/menu3.gif")' onfocus="this.blur();">
										<img src="../images/menu3<?php echo ($phongthuy>-1)?"_hover":""; ?>.gif" id="t3" style="" border="0"></a>
								</td>
								<td>
									<a href="lienhe.php" onmouseover='bt("t4","../images/menu4_on.gif")'
										onmouseout='bt("t4","../images/menu4.gif")' onfocus="this.blur();">
										<img src="../images/menu4<?php echo ($lienhe>-1)?"_hover":""; ?>.gif" id="t4" style="" border="0"></a>
								</td>
							</tr>
                        </table>
                    </center>
                </div>
                <center>