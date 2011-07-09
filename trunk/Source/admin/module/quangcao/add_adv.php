<?php
	if($_SESSION["curUser"][8] != 1)
		header("Location: index.php");
		
	$PATH = str_replace('//','/',dirname(__FILE__).'/');
?>
<div id="frmCreateUser" name="frmCreateUser">
<div id="toolbar">
	<div class="tl"></div>
	<div class="tr"></div>
	<div class="tm"></div>
	<div class="mid">
		<div class="title icon_user">Quảng cáo: <span class="subTitle">[ Thêm mới ]</span></div>
		<div class="icon">
			<a href="index.php?view=advertisement" id="aCancel">
				<img src="images/icon_32_cancel.png" alt="Hủy"  border="0" title="Hủy" /><br />Hủy</a>
		</div>
		<div class="icon">
			<input type="submit" value="Lưu" style="background:url('images/icon_32_apply.png') no-repeat;
				cursor:pointer;border:0;height:46px;width:32px;padding-top:34px;" />
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
		<table align="center" border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td width="130px"><b>Chủ sở hữu:</b> <span style="color:red;">(*)</span></td>
				<td><input type="text" name="txtChuSoHuu" style="width:270px;" onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
			</tr>
			<tr id="id_CapDoNV" style="visibility:inherit;">
				<td width="100px"><b>Số điện thoại:</b> <span style="color:red;">(*)</span></td>
				<td><input type="text" onkeypress="return keypress(event);" onkeyup="checkSDT1();" /></td>
			</tr>
			<tr>
				<td width="100px"><b>Thời hạn quảng cáo:</b> <span style="color:red;">(*)</span></td>
				<td><input type="text" onkeypress="return keypress(event);" onkeyup="checkSDT1();" /> Tháng</td>
			</tr>
			<tr>
				<td><b>Hình ảnh: </b> <span style="color:red;">(*)</span></td>
				<td><input type="file" size="50" name="fupQuangCao"></td>
			</tr>
			<tr>
				<td><b>Link:</b> <span style="color:red;">(*)</span></td>
				<td><input type="text" name="txtLink" style="width:270px;"></td>
			</tr>
		</table>
		<div>
			(Xem xong xoa the div nay)<br>
			CSDL: QUANGCAO (id, chusohuu, dienthoai, ngaydangky, sothang, hinhanh, link, status)
		</div>
		<br class="clr" />
    </div>
    <div class="bl"></div>
    <div class="br"></div>
    <div class="bm"></div>
</div>
</div>