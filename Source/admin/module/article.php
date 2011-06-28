<script language="javascript">
	$(document).ready (function ()
	{
		$("#aDisable").click (function ()
		{
			var url = "modules/forms/listArticle.php";
			var data = $("#frmListItem").serialize() + "&btDisable=true";
			$("#listItem").load(url,data);
		});
		$("#aEnable").click (function ()
		{
			var url = "modules/forms/listArticle.php";
			var data = $("#frmListItem").serialize() + "&btEnable=true";
			$("#listItem").load(url,data);
		});
		$("#aDelete").click (function ()
		{
			var url = "modules/forms/listArticle.php";
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
	<div class="title icon_article">Quản lý bài viết </div>

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
<?php include_once ($PATH . "listArticle.php"); ?>
</div>

