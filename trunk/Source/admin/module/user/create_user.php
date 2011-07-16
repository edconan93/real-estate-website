<?php
	if (!isset($_SESSION["curUser"]))
		header("Location: index.php");
	$flag = 0;
	if ($_SESSION["curUser"][8] == 1) $flag = 1;
	
	if ($flag == 0) // Khong duoc phep di tiep
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
<form action="module/user/xulyuser.php?action=add" method="post" onsubmit="return validate();">
<div id="toolbar">
	<div class="tl"></div>
	<div class="tr"></div>
	<div class="tm"></div>
	<div class="mid">
		<div class="title icon_user">Thành viên: <span class="subTitle">[ Thêm mới ]</span></div>
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
	
		<script src="../../js/common.js" language="javascript" type="text/javascript"></script>
		<script src="../../js/jquery-1.js" language="javascript" type="text/javascript"></script>
		<script type="text/javascript">
			$(document).ready(function()
			{
			
				$("#frmCreateUser").submit(function()
				{
					var strEmail = $("#txtEmail").attr("value");
					var strPassword = $("#txtPassword").attr("value");
					var strRePassword = $("#txtRePassword").attr("value");
					
					var flag=true;			
					if (strPassword.length < 6 || strPassword.length > 50)
					{
						flag=false;
						$("#messPassword").attr("innerHTML","6< Password <50");
						$("#messPassword").css("color","red");
					}
					else if (HaveSpecialChar(strPassword))
					{
						flag=false;
						$("#messPassword").attr("innerHTML","Mật khẩu có chứa ký tự lạ");
						$("#messPassword").css("color","red");
					}			
					if (strPassword != strRePassword)
					{
						flag=false;
						$("#messRePassword").attr("innerHTML","Mật khẩu nhập không khớp");
						$("#messRePassword").css("color","red");
					}			
					else
					 {
						var serverURL = "checkPassword.php?txtRePassword=" + strRePassword;
						$("#messRePassword").load(serverURL);
					}
					if (IsEmail(strEmail)==false)
					{
						flag=false;
						$("#messEmail").attr("innerHTML","Email không hợp lệ");
						$("#messEmail").css("color","red");
					}
					else
					{
						var serverURL = "checkEmail.php?txtEmail=" + strEmail;
						$("#messEmail").load(serverURL);
					}
					
					return flag;
				});
				
				$("#txtPassword").blur(function ()
				{
					var txtPassword = $("#txtPassword").attr("value");
					//alert(strUsername);
					//alert("passwr	!"+txtPassword.length);
					if(txtPassword.length <6 || txtPassword.length > 50)
					{				//alert(strUsername);
						flag=false;
						$("#messPassword").attr("innerHTML","5< Password <50");
						$("#messPassword").css("color","red");
					}
					
					else
					{
						//$("#messPassword").attr("innerHTML", "");
						var serverURL = "../../module/checkPassword.php?txtPassword=" + txtPassword;
						$("#messPassword").load(serverURL);
					}
				});
				$("#txtRePassword").blur(function ()
				{
					//alert("pass	!");
					var txtPassword = $("#txtPassword").attr("value");
					var txtRePassword = $("#txtRePassword").attr("value");
					//alert(strUsername);
					if(txtPassword != txtRePassword)
					{				//alert(strUsername);
						flag=false;
						$("#messRePassword").attr("innerHTML","Mật khẩu không khớp !");
						$("#messRePassword").css("color","red");
					}
					else
					{
						//$("#messPassword").attr("innerHTML", "");
						var serverURL = "../module/checkPassword.php?txtRePassword=" + txtRePassword;
						$("#messRePassword").load(serverURL);
					}
				});
				
				$("#txtEmail").blur(function ()
				{
					var strEmail = $("#txtEmail").attr("value");
					
					if(IsEmail(strEmail)==false)
					{
						flag=false;
						$("#messEmail").attr("innerHTML","Email không hợp lệ");
						$("#messEmail").css("color","red");
					}
					else
					{
						var strEmail = $("#txtEmail").attr("value");
						var serverURL = "../module/checkEmail.php?txtEmail=" + strEmail;
						$("#messEmail").load(serverURL);
					}
				});
				
				function IsEmail(email)
				{
					if (email=="")
						return false;

					if (email.indexOf ("@")==-1)
						return false;
					var i = 1;
					var sLength = email.length;
					if (email.indexOf (".")==-1)
						return false;
					if (email.indexOf ("..")!=-1)
						return false;
					if (email.indexOf ("@")!= email.lastIndexOf ("@"))
						return false;
					if (email.lastIndexOf (".")==sLength-1)
						return false;
					var str="abcdefghijklmnopqrstuvwxyz-@._1234567890";
					for (var i=0;i<email.length;i++)
						if (str.indexOf (email.charAt(i))==-1)
							return false;
					return true;
				}
			});
		</script>
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

				if (oLoaiTV.value == "3")
					oCDNV.style.visibility = "inherit";
				else
					oCDNV.style.visibility = "hidden";
				
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
			<div style="float:left;width:50%;">
				<table width="90%" align="center" border="0" cellpadding="0" cellspacing="0">
					<tr>
						<td width="100px">Loại thành viên: <span style="color:red;">(*)</td>
						<td>
							<select id="id_LoaiTV" name="role" onchange="return press_LoaiThanhVien();">
							<?php
								include_once ($PATH . "../../../BUS/RoleBUS.php");
								$listRole = RoleBUS::GetRoleMember();
								for ($i=0;$i<count($listRole);$i++)
								{
									echo "<option value='".$listRole[$i][0]."'>".$listRole[$i][1]."</option>";
								}
							?>
							</select>
						</td>
					</tr>
					<tr id="id_CapDoNV" style="visibility:inherit;">
						<td width="100px">Cấp độ: <span style="color:red;">(*)</td>
						<td>
							<select name="level">
							<?php
								include_once ($PATH . "../../../BUS/LevelBUS.php");
								$listLevel = LevelBUS::GetLevelByNhanVien();
								for ($i=0;$i<count($listLevel);$i++)
								{
									echo "<option value='".$listLevel[$i][0]."'>".$listLevel[$i][2]."</option>";
								}
							?>
							</select>
						</td>
					</tr>
					<tr>
						<td width="100px">Họ tên: <span style="color:red;">(*)</td>
						<td><input type="text" id="txtHoten" name="txtHoten" style="width:400px;" onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
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
							<input id="sdt1" name="sdt1" style="width:100px;" type="text" value="" onkeypress="return keypress(event);" onkeyup="checkSDT1();" />
						</td>
					</tr>
					<tr>
						<td>Số điện thoại 2:</td>
						<td>
							<input id="sdt2" name="sdt2" style="width:100px;" type="text" value="" onkeypress="return keypress(event);" disabled="disabled" />
						</td>
					</tr>
					<tr>
						<td>Địa chỉ:</td>
						<td><input type="text" name="txtDiaChi" style="width:400px;"></td>
					</tr>
				</table>
			</div>
			<div style="float:left; width:50%;">
				<table width="90%" align="center" border="0" cellpadding="0" cellspacing="0">
					<tr>
						<td width="130px">Email đăng nhập: <span style="color:red;">(*)</span></td>
						<td>
							<input type="text" name="txtEmail" id="txtEmail" style="width:280px;">
							<span id="messEmail" name="messEmail" class="mess"></span>
						</td>
					</tr>
					<tr>
						<td valign="top" style="padding-top:6px;">
							Mật khẩu:<span style="color:red;"> (*)</span></td>
						<td>
							<input id="txtPassword" name="txtPassword" style="width:280px;" onkeyup="passwordStrength(this.value)" type="password">
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
				</table>
			</div>
		<br class="clr" />
    </div>
    <div class="bl"></div>
    <div class="br"></div>
    <div class="bm"></div>
</div>
</form>
</div>