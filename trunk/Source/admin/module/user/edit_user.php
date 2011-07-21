<?php
	if (!isset($_SESSION["curUser"]))
		header("Location: index.php");
	$flag = 0;
	if ($_SESSION["curUser"][8] == 1) $flag = 1;
	if ($_SESSION["curUser"][8] == 4) $flag = 1;
	
	if ($flag == 0) // Khong duoc phep di tiep
		header("Location: index.php");
		
	$uid = (int) $_GET["uid"];
	if(empty($uid))
		return;
		
	$PATH = str_replace('//','/',dirname(__FILE__).'/');
	include_once($PATH . "../../../BUS/UsersBUS.php");
	$user = UsersBUS::GetUserByID($uid);
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
		if (document.getElementById("txtSdt1").value == "")
		{
			alert("Số điện thoại 1 không được rỗng. Vui lòng kiểm tra lại.");
			document.getElementById("txtSdt1").focus();
			return false;
		}

		return true;
	}
</script>
<form action="module/user/xulyuser.php?action=update&uid=<?php echo $_GET["uid"] ?>" method="post" name="frmRegister" id="frmRegister" onsubmit="return validate();">
<div id="toolbar">
<div class="tl"></div>
<div class="tr"></div>
<div class="tm"></div>
<div class="mid">
	<div class="title icon_user">Thành viên: <span class="subTitle">[ Chi tiết ]</span></div>
    <div class="icon">
		<a href="index.php?view=user" id="aCancel">
			<img src="images/icon_32_cancel.png" border="0" /><br />Quay lại</a>
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
	<script src="js/common.js" language="javascript"></script>
	<script language="javascript">
	$(document).ready(function()
	{
		$("#frmRegister").submit(function()
		{
			var strPassword = $("#txtPassword").attr("value");
			var strRePassword = $("#txtRePassword").attr("value");
			var strEmail = $("#txtEmail").attr("value");
			var strAnswer = $("#txtAnswer").attr("value");
			
			var flag=true;
			if(strPassword!= "")
			{
				if(strPassword.length<6 || strPassword.length > 50)
				{
					flag=false;
					$("#messPassword").attr("innerHTML","mật khẩu từ 6-50 ký tự");
					$("#messPassword").css("color","red");
				}
				else if(HaveSpecialChar(strPassword))
				{
					flag=false;
					$("#messPassword").attr("innerHTML","mật khẩu có chứa ký tự lạ");
					$("#messPassword").css("color","red");
				}
			}
			if(strPassword != strRePassword)
			{
				flag=false;
				$("#messRePassword").attr("innerHTML","mật khẩu nhập lại không khớp");
				$("#messRePassword").css("color","red");
			}
			
			if(IsEmail(strEmail)==false)
			{
				flag=false;
				$("#messEmail").attr("innerHTML","email không hợp lệ");
				$("#messEmail").css("color","red");
			}
			if(trim(strAnswer) == "")
			{
				flag=false;
				$("#messAnswer").attr("innerHTML","nhập câu trả lời");
				$("#messAnswer").css("color","red");
			}
			if(flag==false)
				alert ("Có lỗi trong thông tin đăng ký. Xin kiểm tra lại");
			if(flag==true && $("#hdError").attr("value") == "true")
			{
				flag=false;
				alert ("Tên đăng nhập đã này đã được sử dụng. Xin chọn tên khác");
			}
			if(flag==true && $("#hdEmailError").attr("value") == "true")
			{
				flag=false;
				alert ("Email này đã được sử dụng. Xin chọn email khác");
			}
			
			if(flag==true && $("#cbAgree").attr("checked") == false)
			{
				flag=false;
				alert ("Bạn phải đồng ý với thỏa thuận sử dụng");
			}
			return flag;
		});
		
		$("#aSave").click(function()
		{
			$("#frmRegister").trigger("submit");
		});	
		
		$("#txtEmail").blur(function ()
		{
			var strEmail = $("#txtEmail").attr("value");
			if(IsEmail(strEmail)==false)
			{
				flag=false;
				$("#messEmail").attr("innerHTML","email không hợp lệ");
				$("#messEmail").css("color","red");
			}
			else
			{
				var serverURL = "modules/forms/checkEmail.php?txtEmail=" + strEmail;
				serverURL += "&uid=" + $("#uid").attr("value");
				$("#messEmail").load(serverURL);
			}
		});
	});
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
		<fieldset style="width:500px;float:left;margin-left:50px;">
			<legend style="font-weight:bold;font-size:15px;color:maroon;">Thông tin thành viên:</legend>
			<table align="center" border="0" cellpadding="0" cellspacing="0">
				<tr style="height:30px;background:#F1F1F1">
					<td width="130px"><b>Email đăng nhập:</td>
					<td width="280px" style="font-weight:bold;color:blue;"><?php echo $user["email"]; ?></td>
				</tr>
				<tr style="height:30px;">
					<td><b>Họ tên:</td>
					<td><?php echo $user["hoten"]; ?></td>
				</tr>
				<tr style="height:30px;background:#F1F1F1">
					<td><b>Giới tính:</b></td>
					<td><?php if ($user["gioitinh"]==1) echo "Nam"; else echo "Nữ"; ?></td>
				</tr>
				<tr style="height:30px;">
					<td><b>Địa chỉ:</b></td>
					<td><?php echo $user["diachi"]; ?></td>
				</tr>
				<tr style="height:30px;background:#F1F1F1">
					<td><b>Số ĐT 1:</b></td>
					<td><?php echo $user["sdt1"]; ?></td>
				</tr>
				<tr style="height:30px;">
					<td><b>Số ĐT 2:</b></td>
					<td><?php echo $user["sdt2"]; ?></td>
				</tr>
				<tr style="height:30px;background:#F1F1F1">
					<td><b>Vai trò:</b></td>
					<td>
						<?php
							include_once($PATH . "../../../BUS/RoleBUS.php");
							$role = RoleBUS::GetRoleByID($user["role"]);
							echo $role[1];
						?>
					</td>
				</tr>
				<?php
					if ($user["role"] == 3)
					{
				?>
				<tr style="height:30px;">
					<td><b>Cấp độ:</b></td>
					<td>
						<?php
							include_once($PATH . "../../../BUS/LevelBUS.php");
							$level = LevelBUS::GetLevelByID($user["level"]);
							echo $level[2];
						?>
					</td>
				</tr>
				<?php
					}
				?>
				<tr style="height:30px;background:#F1F1F1">
					<td><b>Ngày cập nhật:</b></td>
					<?php
						if ($user["ngaycapnhat"] != null)
						{
							include_once($PATH . "../../../module/Utils/Utils.php");
							$date = Utils::convertTimeDMY($user["ngaycapnhat"]);
							echo "<td>".$date."</td>";
						}
						else
							echo "<td></td>";
					?>
				</tr>
			</table>
		</fieldset>
		<fieldset style="width:500px;float:left;margin-left:50px;">
			<legend style="font-weight:bold;font-size:15px;color:maroon;">Đổi mật khẩu:</legend>
			<table align="center" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td width="130px" valign="top" style="padding-top:4px;">
						<b>Mật khẩu:</b><span style="color:red;"> (*)</span>
					</td>
					<td align="left">
						<div style="float:left;">
							<input name="txtPassword" id="txtPassword" style="width:280px;"  onkeyup="passwordStrength(this.value)" type="password">
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
						<b>Nhập lại mật khẩu:</b><span style="color:red;"> (*)</span>
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
		</fieldset>
    <br class="clr" />
    </div>
    <div class="bl"></div>
    <div class="br"></div>
    <div class="bm"></div>
</div>
</form>