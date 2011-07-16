<script src="../js/common.js" language="javascript" type="text/javascript"></script>
<script src="../../js/jquery-1.js" language="javascript" type="text/javascript"></script>
<script type="text/javascript">
<?php $_SESSION["formLogin"]=true;?>
$(document).ready(function()
{
	$("#formForgotPassword").submit(function()
	{
		var flag = true;
		var strEmail = $("#txtEmail").attr("value");
		if(IsEmail(strEmail)==false)
		{
			flag=false;
			$("#messLoadEmail").attr("innerHTML","Email không hợp lệ");
			$("#messLoadEmail").css("color","red");
			
		}
		if(flag==false)
			alert ("Có lỗi trong thông tin đăng ký. Xin kiểm tra lại");
		return flag;
	});
});
</script>
<script>

function swapform()
{
	document.getElementById('formForgotPassword').style.display='inherit';
	document.getElementById('formLogIn').style.display='none';
	document.getElementById("txtEmail").focus();
}
function swapform1()
{
	var errorLogIn = document.getElementById("errorLogIn");
	if (errorLogIn != null)
		document.getElementById("errorLogIn").style.display = "none";
	document.getElementById("txtUsername").value = "";
	document.getElementById("txtPassword").value = "";
	document.getElementById('formForgotPassword').style.display='none';
	document.getElementById('formLogIn').style.display='inherit';
	document.getElementById("txtUsername").focus();
	// var url = "index.php";
	// window.location = url;	
}
function checkEmail()
{
	var strEmail = $("#txtEmail").attr("value");
	var flag =true;
	if(IsEmail(strEmail)==false)
	{
		flag=false;
		$("#messLoadEmail").attr("innerHTML","Email không hợp lệ");
		$("#messLoadEmail").css("color","red");
		return false;
	}
	if(flag==false)
		alert ("Có lỗi trong thông tin đăng ký. Xin kiểm tra lại");
	var url = "index.php?sendemail="+strEmail;
	if (confirm("Bạn có reset mật khẩu hay không?"))
		window.location = url;	
	return flag;
}
</script>
<?php
	if (isset($_GET["sendemail"]) && isset($_GET["sendemail"]) != null)
	{
		$txtEmail = $_GET["sendemail"];
		include_once("../BUS/UsersBUS.php");
		include_once("../module/PHPMailer/email.php");
		$checkstatus = UsersBUS::GetUser_StatusByEmail($txtEmail);
		if($checkstatus !== null)
		{
			$random = rand (1,1000000);
			$changePass = UsersBUS::SetPassword($checkstatus['id'],$random);
			if($changePass == true )
			{
				$tag="";
				$content_Subject="RealEstate_HoaPhuong.com";
				$content_Body="
				<div id='yiv1540714745'>
					Xin chào, ".$checkstatus['hoten']."
					<br><br>
					Website RealEstate_HoaPhuong.com có nhận được yêu cầu thay đổi mật khẩu cùa quý khách vào ngày ".date('d-m-Y , h:i:s')."
					<br>
					Mật khẩu đã được thay đổi:<b style='color:#336699;'>".$random."</b>
					<br>
					<br>
					Quí khách vui lòng quay trở lại trang web để đăng nhập lại.
					<br>

					<br>
					<br>
					__________________________________________________
					<br>
					Bộ phận kỹ thuật:
					<br>
					Điện thoại : (08) 38777939. - Fax : (08) 62602665
					<br>
					E-mail: support@realestate_hoaphuong.com
					<br>
				</div>";
				for($i=strlen($txtEmail)-9;$i<strlen($txtEmail);$i++)
				{
					$tag.=$txtEmail[$i];
				}
				if($tag == "yahoo.com")
					$type  = 1;
				else if($tag == "gmail.com")
						$type = 2;
					 else 
						$type = 3;
				
				$rs=SendEmail::send_Email($txtEmail,$content_Subject,$content_Body,$type);
				//echo "<br>rs=".$rs;
				if($rs == true)
				{
					echo "sendmail trong sasas";
					header("Location:index.php?email=".$txtEmail."&send=success");
				}
				else
					header("Location:index.php?email=".$txtEmail."&send=failed");
			}
			else
			{
				header("Location:index.php?email=".$txtEmail."&send=failed&changepass=failed");
			}
		}
		else
		{
			header("Location:index.php?email=".$txtEmail."&send=failed&checkemail=failed");
		}
	}
?>
<div id="login">
<!--form login-->
<?php 
if(!isset($_GET['email']))
{
?>
	<div id="formLogIn">
		<div class="top"></div>
		<div class="content">
			<h1>Đăng nhập</h1>
			<?php
				if(isset($login) && $login =="false")
					echo "<p id='errorLogIn' class='error'> Tên đăng nhập và mật khẩu không đúng</p>";
			?>
			<div class="frmLogin">
				<div class="_top"></div>
				<div class="_content">
					<form id="formLogin" name="formLogin" method="post" action="">
						<div class="p"><span class="text">Email đăng nhập</span>
							<input type="text" class="input" id="txtUsername" name="txtUsername" />
						</div>
						<div class="p"><span class="text">Mật khẩu</span>
							<input type="password" class="input" id="txtPassword" name="txtPassword" />
						</div>
						<div class="bt" style="width:200px;">
							<table>
								<tr>
									<td><div align="left" valign="button">
										<a onclick="swapform();">
											Quên mật khẩu</a></div></td>
									<td><div class="rightbutton"></div>
										<input class="button" type="submit" name="btLogin" id="btLogin" value="Đăng nhập" /></td>
								</tr>
							</table>
						</div>
					</form>
					<br class="clr" />
				</div>
				<div class="_bot"></div>
			</div>
			Dùng một tên đăng nhập và mật mã hợp lý để đăng nhập vào khu vực quản trị.
			<img src="images/login_lock.jpg" alt="Login" />
			<br class="clr">
		</div>
		<div class="bot"></div>
	</div>
<?php 
} 
?>
<?php 


if(isset($_GET['email']))
{
	echo "<div id='formForgotPassword' style='display:inherit;'>";
}
else
{
?>
<!--form forget-->
	<div id="formForgotPassword" style="display:none;">
<?php } ?>
		<div class="top"></div>
		<div class="content">
			<h1>Quên mật khẩu</h1>
			<div class="frmLogin">
				<div class="_top"></div>
				<div class="_content">
					<form id="formForgetPass" name="formForgetPass" method="post" action="">
						<div class="p"> <span class="text">Email đăng nhập</span>
							<input type="text" class="input" id="txtEmail" name="txtEmail" />
						</div>
						<div class="bt" style="width:200px;">
							<!--div class="rightbutton" style="margin-right:16px;"></div-->
							<table>
								<tr>
									<td width="110px"><div align="right" valign="button">
										<a onclick="swapform1();">
											Đăng nhập</a></div></td>
									<td><div class="rightbutton"></div>
										<input class="button" type="button" value="Gửi" id="btnForgetPass" name="btnForgetPass" onclick="return  checkEmail();"/>
								</tr>
							</table>
								
							<div id="messLoadEmail" name=="messLoadEmail"></div>
						</div>
					</form>
					<br class="clr" />
				</div>
				<div class="_bot"></div>
			</div>
			<?php 
			if(isset($_GET['send']) && $_GET['send'] == "success" )
			{
				echo "<b style='color:#336699;'>Thư thay đổi mật khẩu mới đã được gửi tới địa chỉ email.Bạn hãy vào email để lấy mật khẩu</b>";
			}
			else if(isset($_GET['send']) && $_GET['send'] == "failed")
			{
				echo "Lỗi đã xảy ra trong quá trình cài đặt lại mật khẩu với địa chỉ email ".$_GET['email']." này. Xin quý khách thử lại.";
			}
			else
			{
			?>
			Hệ thống sẽ tự động gửi vào email của bạn một mật khẩu tạm thời để bạn đăng nhập.
			<?php } ?>
			<img src="images/icon_question.png" width="112px" alt="Login" />
			<br class="clr">
		</div>
		<div class="bot"></div>
	</div>
</div>