<?php
	if($_SESSION["curUser"][8] != 1)
		header("Location: index.php");
		
	$PATH = str_replace('//','/',dirname(__FILE__).'/');
?>
<script>
	function saveNewQuangCao1()
	{
		if (document.getElementById("txtChuSoHuu").value == "")
		{
			alert("Tên chủ sở hữu không được rỗng. Vui lòng kiểm tra lại.");
			document.getElementById("txtChuSoHuu").focus();
			return false;
		}
		if (document.getElementById("txtSDT").value == "")
		{
			alert("Số điện thoại không được rỗng. Vui lòng kiểm tra lại.");
			document.getElementById("txtSDT").focus();
			return false;
		}
		if (document.getElementById("txtEmail").value == "")
		{
			alert("Email không được rỗng. Vui lòng kiểm tra lại.");
			document.getElementById("txtEmail").focus();
			return false;
		}
		if (confirm("Bạn có chắc muốn lưu thông tin quảng cáo mới?"))
			return true;
		
		return false;
	}
</script>
<form action="module/quangcao/xulyquangcao.php" method="post" enctype="multipart/form-data">
<div id="toolbar">
	<div class="tl"></div>
	<div class="tr"></div>
	<div class="tm"></div>
	<div class="mid">
		<div class="title icon_user">Quảng cáo: <span class="subTitle">[ Thêm mới ]</span></div>
		<div class="icon">
			<a href="index.php?view=advertisement">
				<img src="images/icon_32_cancel.png" /><br />Quay lại</a>
		</div>
		<div class="icon">
			<input type="submit" value="Lưu" style="background:url('images/icon_32_apply.png') no-repeat;
				cursor:pointer;border:0;height:46px;width:32px;padding-top:34px;" onclick="return saveNewQuangCao();" />
		</div>
		<br class="clr" />
	</div>
	<div class="bl"></div>
	<div class="br"></div>
	<div class="bm"></div>
</div>
<div style="margin:10px">
    <div class="tl"></div>
    <div class="tr"></div>
    <div class="tm"></div>
    <div class="mid">
		<input type="hidden" name="action" value="add" />
		<table align="center" border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td width="130px">Chủ sở hữu: <span style="color:red;">(*)</span></td>
				<td><input type="text" id="txtChuSoHuu" name="txtChuSoHuu" style="width:270px;" onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
			</tr>
			<tr id="id_CapDoNV" style="visibility:inherit;">
				<td width="100px">Số điện thoại: <span style="color:red;">(*)</span></td>
				<td><input type="text" id="txtSDT" name="txtSDT" onkeypress="return keypress(event);" onkeyup="checkSDT1();" /></td>
			</tr>
			<tr>
				<td>Email: <span style="color:red;">(*)</span></td>
				<td><input type="text" id="txtEmail" name="txtEmail" style="width:270px;"></td>
			</tr>
			<tr>
				<td>Địa chỉ:</td>
				<td><input type="text" id="txtDiaChi" name="txtDiaChi" style="width:270px;"></td>
			</tr>
			<tr>
				<td width="100px">Thời hạn quảng cáo:</td>
				<td><input type="text" id="txtThang" name="txtThang" onkeypress="return keypress(event);" onkeyup="checkSDT1();" value="1" /> Tháng</td>
			</tr>
			<tr>
				<td>Hình ảnh:</td>
				<td><input type="file" size="50" id="fileUpQuangCao" name="fileUpQuangCao"> Kích thước hình upload (180x180)</td>
			</tr>
			<tr>
				<td>Link:</td>
				<td><input type="text" id="txtLink" name="txtLink" style="width:270px;"></td>
			</tr>
		</table>
		<br class="clr" />
    </div>
    <div class="bl"></div>
    <div class="br"></div>
    <div class="bm"></div>
</div>
</form>