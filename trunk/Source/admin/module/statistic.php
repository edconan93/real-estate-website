<?php
	$flag = 0;
	if ($_SESSION["curUser"][8] == 1) $flag = 1;
	if ($_SESSION["curUser"][8] == 4) $flag = 1;
	
	if ($flag == 0) // Khong duoc phep di tiep
		header("Location: index.php");
?>
<div id="toolbar">
	<div class="tl"></div>
	<div class="tr"></div>
	<div class="tm"></div>
	<div class="mid">
		<div class="title icon_statistic">Thống kê</div>
		
		<div class="icon" style="width:60px;">
			<a href="index.php?view=statistic&do=adv">
				 <img src="images/kblogger.png" width="32px" border="0" />
				 <br />Quảng cáo</a>
		</div>
		<div class="icon">
			<a href="index.php?view=statistic&do=vip">
				 <img src="images/vip.png" width="32px" border="0" />
				 <br />VIP</a>
		</div>
		<div class="icon">
			<a href="index.php?view=statistic&do=house">
				 <img src="images/home.png" width="32px" border="0" />
				 <br />Nhà</a>
		</div>
		<div class="icon" style="width:70px;">
			<a href="index.php?view=statistic&do=evaluate">
				 <img src="images/user_group.png" width="32px" border="0" />
				 <br />Đánh giá NV</a>
		</div>
		<div class="icon">
			<a href="index.php?view=statistic&do=profit">
				 <img src="images/US-dollar.png" width="32px" border="0" />
				 <br />Lợi nhuận</a>
		</div>
		<br class="clr" />
	</div>
	<div class="bl"></div>
	<div class="br"></div>
	<div class="bm"></div>
</div>