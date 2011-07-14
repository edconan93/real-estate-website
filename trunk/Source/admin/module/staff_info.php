<?php
	if($_SESSION["curUser"][8] != 1)
		header("Location: index.php");
		
	$PATH = str_replace('//','/',dirname(__FILE__).'/') ;
	include_once($PATH . "../../BUS/UsersBUS.php");
	$user = UsersBUS::GetUserByID($_SESSION["curUser"]["id"]);
?>

<script>
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
<div id="toolbar">
	<div class="tl"></div>
	<div class="tr"></div>
	<div class="tm"></div>
	<div class="mid">
		<div class="title icon_info">Thông tin cá nhân: <span class="subTitle">[ Chỉnh sửa ]</span></div>
		<div class="icon">
			<a href="index.php?view=statistic" id="aCancel">
				<img src="images/icon_32_cancel.png" /><br />Quay lại</a></div>
		<div class="icon">
			<a href="#" id="aSave">
				<img src="images/icon_32_apply.png" alt="Lưu" border="0" title="Lưu" /><br />Lưu</a></div>
		<br class="clr" />
	</div>
	<div class="bl"></div>
	<div class="br"></div>
	<div class="bm"></div>
</div>
<div id="listItem" style="margin:10px">
    <div class="tl"></div>
    <div class="tr"></div>
    <div class="tm"></div>
    <div class="mid">
		<form action="index.php?view=user" method="post" name="frmRegister" id="frmRegister">
			<div class="list" style="float:left;margin:0 10%;">
				<table align="center" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td width="120px"><b>Email đăng nhập:</b></td>
						<td style="padding-left:8px;"><b style="color:blue;"><?php echo $user["email"]; ?></b></td>
					</tr>
					<tr>
						<td><b>Loại thành viên:</b></td>
						<td style="padding-left:8px;">
						<?php
							include_once($PATH . "../../BUS/RoleBUS.php");
							$role = RoleBUS::GetRoleByID($user["role"]);
							echo $role[1];
						?>
						</td>
					</tr>
					<?php
						include_once($PATH . "../../BUS/LevelBUS.php");
						$level = LevelBUS::GetLevelByID($user["level"]);
						if ($level != "")
						{
					?>
					<tr>
						<td><b>Cấp độ:</b></td>
						<td>
						<?php
							echo $level[2];
						?>
						</td>
					</tr>
					<?php
						}
					?>
					<tr>
						<td><b>Họ tên:</b></td>
						<td><input type="text" value="<?php echo $user["hoten"]; ?>" size="50" /></td>
					</tr>
					<tr>
						<td><b>Giới tính:</b></td>
						<td>
							<input type="radio" value="1" name="gender" <?php echo $user["gioitinh"]==1?"checked='true'":"" ?>> Nam
							<input type="radio" value="0" name="gender" <?php echo $user["gioitinh"]==0?"checked='true'":"" ?>> Nữ
						</td>
					</tr>
					<tr>
						<td><b>Địa chỉ:</b></td>
						<td><input type="text" value="<?php echo $user["diachi"]; ?>" size="50" /></td>
					</tr>
					<tr>
						<td><b>Số điện thoại 1:</b></td>
						<td><input type="text" id="sdt1" value="<?php echo $user["sdt1"]; ?>" size="50" onkeypress="return keypress(event);" onkeyup="checkSDT1();" /></td>
					</tr>
					<tr>
						<td><b>Số điện thoại 2:</b></td>
						<td><input type="text" id="sdt2" value="<?php echo $user["sdt2"]; ?>" size="50" onkeypress="return keypress(event);" onkeyup="checkSDT1();" /></td>
					</tr>
				</table>
			</div>
			<div class="list" style="float:left;margin-top:0;">
				<table align="center" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td colspan="2"><b style="color:maroon;">Đổi mật khẩu:</b></td>
					</tr>
					<tr>
						<td width="130px">
							<b>Mật khẩu cũ:</b>
						</td>
						<td>
							<input name="txtOldPassword" id="txtOldPassword" size="50" onkeyup="passwordStrength(this.value)" type="password">
						</td>
					</tr>
					<tr>
						<td width="130px" valign="top" style="padding-top:4px;">
							<b>Mật khẩu mới:</b>
						</td>
						<td align="left">
							<div style="float:left;">
								<input name="txtPassword" id="txtPassword" size="50" onkeyup="passwordStrength(this.value)" type="password">
							</div>
							<div id="messPassword" name="messPassword" style="width:140px;float:left;" class="mess"></div>
							<br>
							<div style="float:left;">
								<span style="font-size:10px;">Mật khẩu truy cập phải lớn hơn 5 và nhỏ hơn 50 ký tự</span>
							</div>
						</td>
					</tr>
					<tr>
						<td valign="top" style="padding-top:4px;">
							<b>Độ an toàn mật khẩu</b></td>
						<td>
							<div id="passwordDescription">Very Weak</div>
							<div id="passwordStrength" class="strength0"></div>
						</td>
					</tr>
					<tr>
						<td valign="top" style="padding-top:4px;">
							<b>Nhập lại mật khẩu mới:</b>
						</td>
						<td align="left">
							<div style="float:left;">
								<input type="password" style="width:280px;" maxlength="50" name="txtRePassword" id="txtRePassword">
							</div>
							<div id="messRePassword" name="messRePassword" style="width:140px;float:left;" class="mess"></div>
							<br>
							<div style="float:left;width:300px;">
								<span style="font-size:10px;">Nhập lại mật khẩu như đã điền ở ô trên</span>
							</div>
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