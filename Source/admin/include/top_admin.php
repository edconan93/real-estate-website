<div class="left"></div>
<div class="right"></div>
<div class="mid">
    	<div class="logo">Administrator</div>
        <div class="mess"></div>
</div>
<div style="padding:5px;border-left:1px solid #CCCCCC;border-right:1px solid #CCCCCC;text-align:right;">
	<?php
		if(isset($_SESSION["curUser"]) && $_SESSION["curUser"][8] == 1)
			echo "<div id='greeting'>";
		else
			echo "<div id='greeting' style='visibility:hidden;'>";
	?>
	<div id="greeting">
		Chào, <b style="color:#3E92E0;font-weight:bold;">Nguyễn Đức Thịnh</b> 
		(<a href="" style="color:red;">Đăng xuất)</a></div></div>