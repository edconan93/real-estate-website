<?php
	if (!isset($_SESSION["curUser"]))
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
	function checkPassword(obj)
	{
		if (obj.value.length < 6)
		{
			alert("Mật khẩu phải lớn hơn 5 và nhỏ hơn 50 ký tự!");
			return false;
		}
		
		return true;
	}
	function checkReNewPassword()
	{
		if (document.getElementById("txtReNewPassword").value != document.getElementById("txtNewPassword").value)
		{
			alert("Mật khẩu không khớp. Vui lòng kiểm tra lại!");
			return false;
		}
		
		return true;
	}
	function saveInfo()
	{
		var hoten = document.getElementById("txtHoTen");
		if (hoten.value == "")
		{
			alert("Họ tên không được rỗng. Vui lòng kiểm tra lại!");
			hoten.focus();
			return false;
		}
		
		// Thong tin ca nhan
		var url = "index.php?view=private_info&update=1&hoten=" + hoten.value;
		url += (document.getElementById("gtNam").checked == true)?"&gioitinh=1":"&gioitinh=0";
		url += "&diachi=" + document.getElementById("txtDiaChi").value;
		url += "&sdt1=" + document.getElementById("sdt1").value;
		if (document.getElementById("sdt2").value != "")
			url += "&sdt2=" + document.getElementById("sdt2").value;
		
		// Thay doi mat khau
		var mkcu = document.getElementById("txtOldPassword").value;
		var mkmoi = document.getElementById("txtNewPassword").value;
		var mkmoinl = document.getElementById("txtReNewPassword").value;
		
		if (Trim(mkcu) != "" && Trim(mkmoi) != "" && Trim(mkmoinl) != "")
			url += "&newpass=" + document.getElementById("txtNewPassword").value;
		
		if (confirm("Bạn có chắc muốn lưu những thay đổi thông tin cá nhân?"))
			window.location = url;
		
		return false;
	}
</script>
<?php
	if (isset($_GET["update"]))
	{
		$hoten = isset($_GET["hoten"])?$_GET["hoten"]:-1;
		$gioitinh = isset($_GET["gioitinh"])?$_GET["gioitinh"]:-1;
		$diachi = isset($_GET["diachi"])?$_GET["diachi"]:-1;
		$sdt1 = isset($_GET["sdt1"])?$_GET["sdt1"]:"";
		$sdt2 = isset($_GET["sdt2"])?$_GET["sdt2"]:"";
		$newpass = isset($_GET["newpass"])?$_GET["newpass"]:-1;
		$ngaycapnhat = date("Y-m-d");
		
		UsersBUS::Update2($user["id"], $hoten, $gioitinh, $diachi, $sdt1, $sdt2, $newpass, $ngaycapnhat);
		header("Location:index.php?view=private_info");
	}
?>
<div id="toolbar">
	<div class="tl"></div>
	<div class="tr"></div>
	<div class="tm"></div>
	<div class="mid">
		<div class="title icon_info">Thông tin cá nhân: <span class="subTitle">[ Chỉnh sửa ]</span></div>
		<div class="icon">
			<a href="index.php">
				<img src="images/icon_32_cancel.png" /><br />Quay lại</a></div>
		<div class="icon">
			<a href="">
				<img src="images/icon_32_apply.png" onclick="return saveInfo();" /><br />Lưu</a></div>
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
		<div style="float:left;margin:0 10%;">
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
					<td><input type="text" id="txtHoTen" value="<?php echo $user["hoten"]; ?>" size="50" onkeyup="javascript:this.value=this.value.toUpperCase();" /></td>
				</tr>
				<tr>
					<td><b>Giới tính:</b></td>
					<td>
						<input type="radio" value="1" id="gtNam" name="gender" <?php echo $user["gioitinh"]==1?"checked='true'":"" ?>> Nam
						<input type="radio" value="0" id="gtNu" name="gender" <?php echo $user["gioitinh"]==0?"checked='true'":"" ?>> Nữ
					</td>
				</tr>
				<tr>
					<td><b>Địa chỉ:</b></td>
					<td><input type="text" id="txtDiaChi" value="<?php echo $user["diachi"]; ?>" size="50" /></td>
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
		<div style="float:left;margin-top:0;">
			<table align="center" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td colspan="2"><b style="color:maroon;">Đổi mật khẩu:</b></td>
				</tr>
				<tr>
					<td width="130px">
						<b>Mật khẩu cũ:</b>
					</td>
					<td>
						<input name="txtOldPassword" id="txtOldPassword" size="50" type="password">
					</td>
				</tr>
				<tr>
					<td valign="top" style="padding-top:4px;">
						<b>Mật khẩu mới:</b>
					</td>
					<td>
						<div style="float:left;">
							<input name="txtNewPassword" id="txtNewPassword" size="50" onkeyup="passwordStrength(this.value)" onchange="return checkPassword(this);" type="password">
						</div>
						<div id="messPassword" name="messPassword" style="float:left;" class="mess"></div>
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
					<td>
						<div style="float:left;">
							<input type="password" size="50" id="txtReNewPassword" onchange="return checkReNewPassword();">
						</div>
						<div id="messRePassword" name="messRePassword" style="float:left;" class="mess"></div>
						<br>
						<div style="float:left;">
							<span style="font-size:10px;">Nhập lại mật khẩu như đã điền ở ô trên</span>
						</div>
					</td>
				</tr>
			</table>
		</div>
		<br class="clr" />
    </div>
    <div class="bl"></div>
    <div class="br"></div>
    <div class="bm"></div>
</div>