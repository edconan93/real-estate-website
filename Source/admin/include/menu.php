<?php 
	$PATH = str_replace('//','/',dirname(__FILE__).'/') ;
	//include_once($PATH ."../../../BUS/UsersBUS.php");
	//include_once($PATH ."../../../BUS/EntriesBUS.php");
	$totalUsers = 6;//UsersBUS::Count();
	$totalEntries = 12;//EntriesBUS::Count();
?>
<div id="menu">
	<ul>
    <li><a href="index.php" class="item">Bảng điều khiển</a></li>
    <li><a href="index.php?view=user" class="item">Quản lý thành viên</a></li>
    <li><a href="index.php?view=article" class="item">Quản lý bài viết</a></li>
    <li><a href="index.php?view=statistics" class="item">Thống kê</a></li>
    <li><a href="index.php?view=database" class="item">Sao lưu & Phục hồi</a></li>
    </ul>
   <div class="mess">
   <span class="frontpage"> <a href="../index.php"> Tiền sảnh </a> </span>
   <span class="article"><?php  echo $totalEntries;  ?></span>
   <span class="user"><?php  echo $totalUsers;  ?></span>
   <span class="logout"><a href="index.php?do=logout"> Thoát</a></span>
   </span>
	</div>
</div>
<br class="clr" />