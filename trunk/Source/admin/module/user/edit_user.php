<?php
	if($_SESSION["curUser"][8] != 1)
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
	<div class="title icon_user">Thành viên: <span class="subTitle">[ Chỉnh sửa]</span> </div>
     <div class="icon">
   	  <a href="index.php?view=user" id="aCancel">
   	  <img src="images/icon_32_cancel.png" alt="Hủy"  border="0" title="Hủy" />
             <br />
            Hủy
      </a>
    </div>
    <div class="icon">
		<input type="submit" value="Lưu" style="background:url('images/icon_32_apply.png') no-repeat;
			cursor:pointer;border:0;height:50px;width:32px;padding-top:36px;" />
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
	</script>	
		<input name="btUpdate" type="hidden" value="Cập nhật" />
		<input name="uid" id="uid" type="hidden" value="<?php echo $user[0]; ?>" />	
		<table align="center" border="0" cellpadding="0" cellspacing="0">
			<tr style="height:30px;">
				<td width="130px"><b>Email đăng nhập: </b><span style="color:red;">(*)</span></td>
				<td width="280px">
					<input name="txtUsername" type="text" disabled id="txtUsername" style="font-weight:bold;width:270px;" value="<?php echo $user["email"]; ?>"></td>
			</tr>
			<tr style="height:30px;">
				<td><b>Họ tên:</b> <span style="color:red;">(*)</td>
				<td><input name="txtHoten" type="text" id="txtHoten" value="<?php echo $user["hoten"]; ?>" size="50"></td>
			</tr>
			<tr style="height:30px;">
				<td><b>Giới tính:</b></td>
				<td>
					<input type="radio" value="1" name="gender" <?php if ($user["gioitinh"]==1) echo "checked"; ?>> Nam
					<input type="radio" value="0" name="gender" <?php if ($user["gioitinh"]==0) echo "checked"; ?>> Nữ
				</td>
			</tr>
			<tr style="height:30px;">
				<td><b>Địa chỉ:</b></td>
				<td><input name="txtDiachi" type="text" id="txtDiachi" value="<?php echo $user["diachi"]; ?>" size="50"></td>
			</tr>
			<tr style="height:30px;">
				<td><b>Số ĐT 1:</b> <span style="color:red;">(*)</td>
				<td><input name="txtSdt1" type="text" id="txtSdt1" value="<?php echo $user["sdt1"]; ?>" size="50"></td>
			</tr>
			<tr style="height:30px;">
				<td><b>Số ĐT 2:</b></td>
				<td><input name="txtSdt2" type="text" id="txtSdt2" value="<?php echo $user["sdt2"]; ?>" size="50"></td>
			</tr>
			<tr style="height:30px;">
				<td><b>Vai trò:</b></td>
				<td>
					<?php
						if ($user["role"] == 2)
							echo "Khách hàng";
						else
						{
					?>
					<select id="id_LoaiTV" name="role" onchange="return press_LoaiThanhVien();">
					<?php
							include_once($PATH . "../../../BUS/RoleBUS.php");
							$listRole = RoleBUS::GetAllRole();
							for ($i=0;$i<count($listRole);$i++)
							{
								if ($listRole[$i][0] == $user["role"])
									echo "<option value='".$listRole[$i][0]."' selected>".$listRole[$i][1]."</option>";
								else
									echo "<option value='".$listRole[$i][0]."'>".$listRole[$i][1]."</option>";
							}
						}
					?>
					</select>
				</td>
			</tr>
			<?php
				if ($user["role"] == 3)
				{
			?>
			<tr style="height:30px;">
				<td><b>Cấp độ:</b></td>
				<td>
					<select name="level">
					<?php
						include_once($PATH . "../../../BUS/LevelBUS.php");
						$listLevel = LevelBUS::GetLevelByNhanVien();
						for ($i=0;$i<count($listLevel);$i++)
						{
							if ($listLevel[$i][0] == $user["level"])
								echo "<option value='".$listLevel[$i][0]."' selected>".$listLevel[$i][2]."</option>";
							else
								echo "<option value='".$listLevel[$i][0]."'>".$listLevel[$i][2]."</option>";
						}
					?>
					</select>
				</td>
			</tr>
			<?php
				}
			?>
			<tr style="height:30px;">
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
    <br class="clr" />
    </div>
    <div class="bl"></div>
    <div class="br"></div>
    <div class="bm"></div>
</div>
</form>