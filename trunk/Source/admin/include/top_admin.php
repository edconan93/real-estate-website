<div class="left"></div>
<div class="right"></div>
<div class="mid">
	<div class="logo">Administrator</div>
	<div class="mess"></div>
</div>
<?php
	if(isset($_SESSION["curUser"]) && $_SESSION["curUser"][8] == 1)
	{
?>
<div id="menu">
	<ul>
		<li><a href="index.php" class="item">Bảng điều khiển</a></li>
		<li><a href="index.php?view=user" class="item">Quản lý thành viên</a></li>
		<li><a href="index.php?view=article" class="item">Quản lý tin đăng</a></li>
		<li><a href="index.php?view=business" class="item">Quản lý thu chi</a></li>
		<li><a href="index.php?view=statistic" class="item">Thống kê</a></li>
	</ul>
	<div class="mess">
		<img src="images/icon-16-frontpage.png" /> <a href="../index.php">Tiền sảnh</a>&nbsp;&nbsp;
		<img src="images/icon-16-article.png" /> 6&nbsp;&nbsp;
		<img src="images/icon-16-user.png" /> 7&nbsp;&nbsp;
		<img src="images/icon-16-logout.png" /> <a href="index.php?do=logout">Thoát</a>
	</div>
</div>
<?php
	}
?>
