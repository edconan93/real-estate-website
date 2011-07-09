<?php
	if($_SESSION["curUser"][8] != 1)
		header("Location: index.php");
		
	$PATH = str_replace('//','/',dirname(__FILE__).'/');
?>
<script>
	function validate()
	{
		if (document.getElementById("txtHoten").value == "")
		{
			alert("Bạn chưa điền họ tên. Vui lòng kiểm tra lại.");
			document.getElementById("txtHoten").focus();
			return false;
		}
		if (document.getElementById("sdt1").value == "")
		{
			alert("Số điện thoại 1 không được rỗng. Vui lòng kiểm tra lại.");
			document.getElementById("sdt1").focus();
			return false;
		}
		if (document.getElementById("txtEmail").value == "")
		{
			alert("Email đăng nhập không được rỗng. Vui lòng kiểm tra lại.");
			document.getElementById("txtEmail").focus();
			return false;
		}
		if (document.getElementById("txtPassword").value == "")
		{
			alert("Mật khẩu không được rỗng. Vui lòng kiểm tra lại.");
			document.getElementById("txtPassword").focus();
			return false;
		}
		else
		{
			if (document.getElementById("txtPassword").value.length < 6)
			{
				alert("Mật khẩu truy cập phải lớn hơn 5 và nhỏ hơn 50 ký tự!");
				document.getElementById("txtPassword").focus();
				return false;
			}
		}
		if (document.getElementById("txtRePassword").value == "")
		{
			alert("Mật khẩu nhập lại không được rỗng. Vui lòng kiểm tra lại.");
			document.getElementById("txtRePassword").focus();
			return false;
		}
		if (document.getElementById("txtRePassword").value != document.getElementById("txtPassword").value)
		{
			alert("Mật khẩu nhập lại không khớp. Vui lòng kiểm tra lại.");
			document.getElementById("txtRePassword").focus();
			return false;
		}
		
		return true;
	}
</script>
<div id="frmCreateUser" name="frmCreateUser">
<form action="module/quangcao/.php?action=add" method="post" onsubmit="return validate();">
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
</form>
</div>