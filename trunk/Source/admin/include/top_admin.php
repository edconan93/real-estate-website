<div class="left"></div>
<div class="right"></div>
<div class="mid">
	<div class="logo">Administrator</div>
	<div class="mess"></div>
</div>
<?php
	if(isset($_SESSION["curUser"]) && $_SESSION["curUser"][8] != 2)
	{
?>
<div id="menu">
	<ul>
		<li><a href="index.php" class="item">Bảng điều khiển</a></li>
		<?php
			if ($_SESSION["curUser"][8] == 1 || $_SESSION["curUser"][8] == 4)
				echo "<li><a href='index.php?view=user' class='item'>Quản lý thành viên</a></li>";
			if ($_SESSION["curUser"][8] == 1 || $_SESSION["curUser"][8] == 3)
				echo "<li><a href='index.php?view=article' class='item'>Quản lý tin đăng</a></li>";
			if ($_SESSION["curUser"][8] == 1 || $_SESSION["curUser"][8] == 5)
				echo "<li><a href='index.php?view=business' class='item'>Quản lý thu chi</a></li>";
			if ($_SESSION["curUser"][8] == 1 || $_SESSION["curUser"][8] == 3)
				echo "<li><a href='index.php?view=advertisement' class='item'>Quản lý quảng cáo</a></li>";
			if ($_SESSION["curUser"][8] == 1 || $_SESSION["curUser"][8] == 4)
				echo "<li><a href='index.php?view=statistic' class='item'>Thống kê</a></li>";
		?>
	</ul>
	<div class="mess">
		<img src="images/info_staff.png" /> <a href="../admin/index.php?view=private_info"><?php echo $_SESSION["curUser"][3]; ?></a>&nbsp;&nbsp;
		<img src="images/icon-16-frontpage.png" /> <a href="../index.php">Tiền sảnh</a>&nbsp;&nbsp;
		<img src="images/icon-16-logout.png" /> <a href="index.php?do=logout">Thoát</a>
	</div>
</div>
<?php
	}
?>