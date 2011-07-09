<script language="javascript">
	function deleteTinDang()
	{
		var flag = 0;
		var e = document.frmListItem.elements.length;
		var cnt = 0;
		var uid = new Array();
		var i = 0;
		for (cnt=0;cnt<e;cnt++)
		{
			var tmp = document.frmListItem.elements[cnt];
			if (tmp.name=="cbTinDang" && tmp.checked==true)
			{
				uid[i++] = document.frmListItem.elements[cnt].value;
				flag = 1;
			}
		}
		var type = document.getElementById("type");
		var url = "module/tindang/xulytindang.php?action=delete&uid=" + uid + "&type=" + type.value;
		
		if (flag == 1 && confirm("Bạn có chắc muốn xóa các tin đăng này?"))
		{
			window.location = url;
			return true;
		}
		else if (flag == 0)
		{
			alert("Bạn chưa chọn loại tin cần xóa!");
			return false;
		}
		
		return false;
	}
</script>
<div id="toolbar">
<div class="tl"></div>
<div class="tr"></div>
<div class="tm"></div>
<div class="mid">
	<div class="title icon_article">Quản lý tin đăng</div>
    <div class="icon">
    	<a onclick="return deleteTinDang();">
        	<img src="images/icon_32_delete.png" alt="Xóa" border="0" title="Xóa" /><br />Xóa</a>
    </div>
    <br class="clr" />
</div>
<div class="bl"></div>
<div class="br"></div>
<div class="bm"></div>
</div>
<div style="margin:10px">
<?php
	$PATH = str_replace('//','/',dirname(__FILE__).'/');
	include_once ($PATH . "listArticle.php");
?>
</div>