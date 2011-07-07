<?php
	include("../include/header.php");
?>
<script src="../js/common.js" language="javascript" type="text/javascript"></script>
<script src="../js/jquery-1.js" language="javascript" type="text/javascript"></script>

<script type="text/javascript">


$(document).ready(function()
	{
		$("#frmRegister").submit(function()
		{
		   
			var strUsername = $("#txtUsername").attr("value");
			var strPassword = $("#txtPassword").attr("value");
			var strRePassword = $("#txtRePassword").attr("value");
			var strEmail = $("#txtEmail").attr("value");
			
			var flag=true;			
			// alert("aaa");
			if(strUsername.length<3 || strUsername.length > 50)
			{				//alert(strUsername);
			
				flag=false;
				$("#messUsername").attr("innerHTML","Tên đăng nhập từ 6-50 ký tự");
				$("#messUsername").css("color","red");
				//alert ("Tên đăng nhập từ 6-50 ký tự");
			}
			
			 if(strPassword.length <6 || strPassword.length > 50)
			 {
				flag=false;
				$("#messPassword").attr("innerHTML","6< Password <50");
				$("#messPassword").css("color","red");
			 }
			 else if(HaveSpecialChar(strPassword))
			 {
				flag=false;
				$("#messPassword").attr("innerHTML","Mật khẩu có chứa ký tự lạ");
				$("#messPassword").css("color","red");
			 }			

			
			if(strPassword != strRePassword)
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
			if(IsEmail(strEmail)==false)
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
			
			
			if(flag==false)
				alert ("Có lỗi trong thông tin đăng ký. Xin kiểm tra lại");

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
		
		$("#txtUsername").blur(function ()
		{

			var strUsername = $("#txtUsername").attr("value");
			//alert(strUsername);
			if(strUsername.length< 6 || strUsername.length > 50)
			{				//alert(strUsername);
				flag=false;
				$("#messUsername").attr("innerHTML","Nhập từ 6-50 ký tự");
				$("#messUsername").css("color","red");
			}		
			else
			{
			  //  flag=true;
			    $("#messUsername").attr("innerHTML","");
				var serverURL = "checkPassword.php?txtPassword=" + strUsername;
				$("#messUsername").load(serverURL);
			}

		});
		
		$("#txtPhone").blur(function ()
		{
			//alert("phone!");
			var strPhone = $("#txtPhone").attr("value");
			var strMobile = $("#txtMobile").attr("value");
			//alert(strUsername);
			if(strPhone.length < 10 || strPhone.length > 12 )
			{	
			   // alert("<10");
				flag=false;
				$("#messPhone").attr("innerHTML","10 <= SDT <= 12");
				$("#messPhone").css("color","red");
			}
			else if(CheckPhoneNumber(strPhone))
			{
				flag=false;
				$("#messPhone").attr("innerHTML", "Số điện thoại ko hợp lệ");
				$("#messPhone").css("color","red");
			}
			else
			{
				
				$("#messPhone").attr("innerHTML", "");
			}
		});
		
		function CheckPhoneNumber(strText)
		{
			var strTemp="0123456789./\_-()";
			for (var i=0; i<strText.length; i++)
			if (strTemp.indexOf (strText.charAt(i))==-1)//==-1 ko bao gio xay ra
			{
				return true;
			}	
			return false;

		}
	
		$("#txtMobile").blur(function ()
		{
			//alert("mobile	!");
			var strPhone = $("#txtPhone").attr("value");
			var strMobile = $("#txtMobile").attr("value");
			
			if (strMobile == "")
				return;
			//alert(strPhone +" "+strMobile );
			if(strPhone.length<10 || strPhone.length > 12 || strMobile.length<10 || strMobile.length>12)
			{				//alert(strUsername);
				flag=false;
				$("#messPhone").attr("innerHTML","10 <= SDT <= 12");
				$("#messPhone").css("color","red");
			}
			else if(CheckPhoneNumber(strMobile))
			{
				flag=false;
				$("#messPhone").attr("innerHTML", "Số điện thoại ko hợp lệ");
				$("#messPhone").css("color","red");
			}
			else
			{
				$("#messPhone").attr("innerHTML", "");
			}
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
				var serverURL = "checkPassword.php?txtPassword=" + txtPassword;
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
				var serverURL = "checkPassword.php?txtRePassword=" + txtRePassword;
				$("#messRePassword").load(serverURL);
			}
		});
		
		$("#txtEmail").blur(function ()
		{
			var strEmail = $("#txtEmail").attr("value");
			
			//$("#messEmail").attr("innerHTML","Email không hợp lệ");
			if(IsEmail(strEmail)==false)
			{
				flag=false;
				$("#messEmail").attr("innerHTML","Email không hợp lệ");
				$("#messEmail").css("color","red");
			}
			else
			{
				document.frmRegister.txtAccess.value = document.frmRegister.txtEmail.value;
				var serverURL = "checkEmail.php?txtEmail=" + strEmail;
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
	<table bgcolor="black" border="0" cellpadding="0" cellspacing="0" width="986">
		<tr>
			<td width="986">
				<div style="width: 986px; height: 177px;" id="contentslide">
					<embed type="application/x-shockwave-flash" src="../images/contentslide.swf" id="mymovie"
						name="mymovie" bgcolor="#000000" quality="high" loop="true" wmode="transparent"
						width="986" height="177">
				</div>
				<table bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" width="986;">
					<tr>
						<td style="border-right: 1px solid rgb(180, 215, 232); background-repeat: repeat-y;"
							background="1_files/menubg_all.jpg" valign="top" width="270">
							<?php include("../include/box_left.php"); ?>
						</td>
						<td style="padding: 10px;" valign="top">
							<div style="width: 686px;">
								<div style="margin-left: 10px; margin-top: 10px; font-family: tahoma; font-size: 18px;
									font-weight: bold; color:#890C29; text-transform:uppercase;">
									Đăng Ký Thành Viên</div>
								<hr style="color: rgb(211, 232, 248);" width="680" size="1">	
							<div style="padding:20px;" id="frmRegister" name="frmRegister">
<!--form -->					<form action="user/xulydangky.php" method="post" name="frmRegister" id="frmRegister" >
								<table border="0" id="nhaban_box" cellspacing="0" cellpadding="5" border="0" width="700">
									<tr>
										<td align="left" colspan="2" style="font-size:13px;">
										Nếu bạn đã đăng ký tài khoản thành viên tại realestate_hoaphuong.com? 
										<a style="color:red;" href="" onclick="return press_DangNhap();">Nhấn đăng nhập</a>
										</td>
									</tr>
									<tr>
										<td align="left" colspan="2">
											<h1>THÔNG TIN LIÊN LẠC</h1>
										</td>
									</tr>
									<tr>
										<td align="right" valign="top" style="padding-top:6px;">
										Họ và tên:<span style="color:red;"> (*)</span>
										</td>
										<td align="left">
										<div style="float:left;">
										<input type="text" style="width:280px;" name="txtUsername" id="txtUsername" onkeyup="javascript:this.value=this.value.toUpperCase();"></div>
										<div id="messUsername" name="messUsername" class="mess"></div>
										<div style="float:left;">
												<span style="font-size:10px;">Họ tên phải lớn hơn 3 và nhỏ hơn 50 ký tự</span>
											</div>
										</td>
									</tr>
									<tr>
										<td align="right">
										Địa chỉ liên lạc:<span style="color:red;"> (*)</span>
										</td>
										<td align="left">
										<div style="float:left;">
										<input type="text" style="width:280px;" value="" name="txtAddress">
										<div id="messAdress" name="messAddress" class="mess"></div>
										</div>
										</td>
									</tr>
									<tr>
										<td align="right">
										Điện thoại:<span style="color:red;"> (*)</span>
										</td>
										<td align="left">
										<div style="float:left;">
											<input type="text" style="width:115px;" maxlength="15" value="" name="txtPhone" id="txtPhone" onkeypress="return keypress(event);">
											Di động:
											<input type="text" style="width:102px;" maxlength="15" value="" name="txtMobile" id="txtMobile" onkeypress="return keypress(event);">											
										</div>
										<div id="messPhone" name="messPhone" style="width:140px;float:left;" class="mess"></div>
										</td>
										
									</tr>
									<tr>
										<td align="right" valign="top" style="padding-top:6px;">
										E-mail liên lạc:<span style="color:red;"> (*)</span>
										</td>
										<td align="left">
											<div style="float:left;">
												<input type="text" name="txtEmail" id="txtEmail"  value="" style="width:280px;" maxlength="50">
											</div>
											<div id="messEmail" style="width:140px;float:left;" class="mess"></div>
										<br>
										<div>
										<span style="font-size:10px;float:left;">Hãy điền chính xác địa chỉ email để nhận được thư kích hoạt</span>
										</div>
										</td>
									</tr>
									<tr>
										<td align="right" valign="top" style="padding-top:6px;">
										Giới tính:</span>
										</td>
										<td align="left">
											<input type="radio" value="1" name="gender" checked> Nam
											<input type="radio" value="0" name="gender"> Nữ
										</td>
									</tr>
									<tr>
										<td align="left" colspan="2">
										<h1>THÔNG TIN TÀI KHOẢN TRUY CẬP</h1>
										</td>
									</tr>
									<tr>
										<td align="right" valign="top" style="padding-top:6px;">
										Tên truy cập:<span style="color:red;"> (*)</span>
										</td>
										<td align="left">
										<div style="float:left;">
										<input type="text" disabled="disabled"  id="txtAccess" name="txtAccess"  style="width:280px;" maxlength="50" value="" >
										</div>
										<br>
										
										</td>
									</tr>
									
									<tr>
										<td align="right" valign="top" style="padding-top:6px;">
										Mật khẩu:<span style="color:red;"> (*)</span>
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
										<td align="right" valign="top" style="padding-top:6px;">
											Độ an toàn mật khẩu</td>
										<td>
											<div id="passwordDescription">Very Weak</div>
											<div id="passwordStrength" class="strength0"></div>
										</td>
									</tr>
									<tr>
										<td align="right" valign="top" style="padding-top:6px;">
										Nhập lại mật khẩu:<span style="color:red;"> (*)</span>
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
									<tr>
										<td colspan="2">
										<input type="checkbox" checked="" name="cbAgree" id="cbAgree">
										Tôi đồng ý với các quy định của realestate_hoaphuong.com
										</td>
									</tr>
									<tr>
										<td align="right"></td>
										<td align="left" style="padding-left:30px;">
										<span class="action-button-left"></span>
										<input class="submitYellow" type="Submit" value="Đăng ký thành viên" id="btSubmit" name="btSubmit" />
										<span class="action-button-right"></span>
										</td>
									</tr>
								</table><br>
									</form>
							</div>
							</div>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
<?php
	include("../include/footer.php");
?>