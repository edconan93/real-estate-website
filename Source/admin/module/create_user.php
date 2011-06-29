<?php
	if($_SESSION["curUser"][8] != 1)
		header("Location: index.php");
?>
<div id="toolbar">
	<div class="tl"></div>
	<div class="tr"></div>
	<div class="tm"></div>
	<div class="mid">
		<div class="title icon_user">Thành viên: <span class="subTitle">[ Thêm mới ]</span></div>
		<div class="icon">
			<a href="index.php?view=user" id="aCancel">
				<img src="images/icon_32_cancel.png" alt="Hủy"  border="0" title="Hủy" /><br />Hủy</a>
		</div>
		<div class="icon">
			<a href="#" id="aSave">
				<img src="images/icon_32_apply.png" alt="Lưu" border="0" title="Lưu" /><br />Lưu</a>
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
		<script language="javascript">
			function checkSDT1()
			{
				if (document.getElementById("sdt1").value != "")
					document.getElementById("sdt2").disabled = false;
				else
				{
					document.getElementById("sdt2").disabled = true;
					document.getElementById("sdt2").value = "";
				}
			}
			function press_LoaiThanhVien()
			{
				var oLoaiTV = document.getElementById("id_LoaiTV");
				var oCDNV = document.getElementById("id_CapDoNV");
				var oCDKH = document.getElementById("id_CapDoKH");

				if (oLoaiTV.value == "0")
				{
					oCDNV.style.display = "inherit";
					oCDKH.style.display = "none";
				}
				else
				{
					oCDNV.style.display = "none";
					oCDKH.style.display = "inherit";
				}
				
				return true;
			}
			function passwordStrength(password)
			{
				var desc = new Array();
				desc[0] = "Very Weak";
				desc[1] = "Weak";
				desc[2] = "Better";
				desc[3] = "Medium";
				desc[4] = "Strong";
				desc[5] = "Strongest";

				var score   = 0;

				//if password bigger than 6 give 1 point
				if (password.length > 6) score++;

				//if password has both lower and uppercase characters give 1 point	
				if ( ( password.match(/[a-z]/) ) && ( password.match(/[A-Z]/) ) ) score++;

				//if password has at least one number give 1 point
				if (password.match(/\d+/)) score++;

				//if password has at least one special caracther give 1 point
				if ( password.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/) )	score++;

				//if password bigger than 12 give another 1 point
				if (password.length > 12) score++;

				 document.getElementById("passwordDescription").innerHTML = desc[score];
				 document.getElementById("passwordStrength").className = "strength" + score;
			}
		</script>
		<form action="index.php?view=user" method="post" name="frmRegister" id="frmRegister" >
			<div style="float:left;width:50%;">
				<table width="90%" align="center" border="0" cellpadding="0" cellspacing="0">
					<tr>
						<td width="100px">Loại thành viên: <span style="color:red;">(*)</td>
						<td>
							<select id="id_LoaiTV" onchange="return press_LoaiThanhVien();">
								<option value="0">Nhân viên</option>
								<option value="1">Khách hàng</option>
							</select>
						</td>
					</tr>
					<tr>
						<td width="100px">Cấp độ: <span style="color:red;">(*)</td>
						<td>
							<select id="id_CapDoNV">
								<option value="1">Cấp bậc 1</option>
								<option value="2">Cấp bậc 2</option>
								<option value="3">Cấp bậc 3</option>
							</select>
							<select id="id_CapDoKH" style="display:none;">
								<option value="1">Tài khoản VIP</option>
								<option value="0">Tài khoản thường</option>
							</select>
						</td>
					</tr>
					<tr>
						<td width="100px">Họ tên: <span style="color:red;">(*)</td>
						<td><input type="text" style="width:400px;" onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
					</tr>
					<tr>
						<td>Giới tính:</td>
						<td>
							<input type="radio" value="1" name="gender" checked="true"> Nam
							<input type="radio" value="0" name="gender"> Nữ
						</td>
					</tr>
					<tr>
						<td>Số điện thoại 1: <span style="color:red;">(*)</span></td>
						<td>
							<input id="sdt1" style="width:100px;" type="text" value="" onkeypress="return keypress(event);" onkeyup="checkSDT1();" />
						</td>
					</tr>
					<tr>
						<td>Số điện thoại 2:</td>
						<td>
							<input id="sdt2" style="width:100px;" type="text" value="" onkeypress="return keypress(event);" disabled="disabled" />
						</td>
					</tr>
					<tr>
						<td>Địa chỉ:</td>
						<td><input type="text" style="width:400px;"></td>
					</tr>
				</table>
			</div>
			<div style="float:left; width:50%;">
				<table width="90%" align="center" border="0" cellpadding="0" cellspacing="0">
					<tr>
						<td width="130px">Email đăng nhập: <span style="color:red;">(*)</span></td>
						<td>
							<input type="text" style="width:280px;"></td>
						<td><div id="messUsername" class="mess"></div></td>
					</tr>
					<tr>
						<td valign="top" style="padding-top:6px;">
							Mật khẩu:<span style="color:red;"> (*)</span></td>
						<td>
							<input name="txtPassword" id="txtPassword" style="width:280px;" onkeyup="passwordStrength(this.value)" type="password">
							<div style="float:left;">
								<span style="font-size:10px;font-weight:bold;">Mật khẩu truy cập phải lớn hơn 5 và nhỏ hơn 50 ký tự</span>
							</div>
						</td>
					</tr>
					<tr>
						<td valign="top" style="padding-top:6px;">
							Độ an toàn mật khẩu</td>
						<td>
							<div id="passwordDescription">Very Weak</div>
							<div id="passwordStrength" class="strength0"></div>
						</td>
					</tr>
					<tr>
						<td valign="top" style="padding-top:6px;">
							Nhập lại mật khẩu:<span style="color:red;"> (*)</span></td>
						<td>
							<input type="password" style="width:280px;" maxlength="50" name="txtRePassword" id="txtRePassword">
							<div style="float:left;width:300px;">
								<span style="font-size:10px;">Nhập lại mật khẩu như đã điền ở ô trên</span>
							</div>
						</td>
					</tr>
					<tr>
						<td valign="top" style="padding-top:10px;">
							Mã an toàn:<span style="color:red;"> (*)</span></td>
						<td>
							<img class="border" border="0" align="left" alt="Ma an toan" src="http://www.nhaban.com/member/security.php?rand=795392">
							<input type="text" style="width:180px; font-weight:bold;">
							<div style="position:relative; left:-100px;font-weight:bold;"><span style="font-size:10px;">Hãy điền năm chữ số của hình bên cạnh vào ô này</span></div>
						</td>
					</tr>
				</table>
			</div>
		</form>
		<br class="clr" />
    </div>
    <div class="bl"></div>
    <div class="br"></div>
    <div class="bm"></div>
</div>