<?php
	if (isset($PATH))
		include_once ($PATH . "forms/menu.php"); ?>
<div id="news">
<script language="javascript">
	$(document).ready(function ()
	{
		$("#hVisitedUsers").click(function ()
		{
			var url = "modules/visited_users.php";
			$("#sVisitedUsers").load(url );
		
			$("#visitedUsers").css("display","block");
			$("#newUsers").css("display","none");
			$("#newEntries").css("display","none");
		});
		
		$("#hNewUsers").click(function ()
		{
			var url = "modules/new_users.php";
			$("#sNewUsers").load(url );
			
			$("#visitedUsers").css("display","none");
			$("#newUsers").css("display","block");
			$("#newEntries").css("display","none");
		});
		
		$("#hNewEntries").click(function ()
		{
			var url = "modules/new_users.php";
			$("#sNewEntries").load(url );
			
			$("#visitedUsers").css("display","none");
			$("#newUsers").css("display","none");
			$("#newEntries").css("display","block");
		});
	});
</script>
<?php
	if (isset($PATH))
	{
		include_once($PATH ."visited_users.php");
		include_once($PATH ."new_users.php");
		include_once($PATH ."new_entries.php");
	}
?>
</div>
<div id="groupIcon">
	<div class="icon">
    	<a href="index.php?view=user">
    	<img src="images/icon-48-user.png" alt="Quản lý thành viên" border="0" /><br />
        <span>Quản lý thành viên</span>
        </a>
    </div>
    <div class="icon">
    	<a href="index.php?view=article">
    	<img src="images/icon-48-article.png" alt="Quản lý bài viết" border="0" /><br />
        <span>Quản lý bài viết</span>
        </a>
    </div>
    <div class="icon">
    	<a href="index.php?view=business">
    	<img src="images/Emblem-Money-48.png" alt="Quản lý thu chi" border="0" /><br />
        <span>Quản lý thu chi</span>
        </a>
    </div>
     <div class="icon">
    	<a href="index.php?view=statistics">
    	<img src="images/icon-48-stats.png" alt="Thống kê" border="0" /><br />
        <span>Thống kê</span>
        </a>
    </div>
</div>
<br class="clr" />