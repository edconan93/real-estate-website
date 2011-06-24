﻿<?php
	include("../include/header.php");
?>
<script src="../js/common.js" language="javascript" type="text/javascript"></script>
<script type="text/javascript">
function copy()
{
 document.frmRegister.txtAccess.value = document.frmRegister.txtEmail.value;
}
$(document).ready(function()
	{
		$("#frmRegister").submit(function()
		{
			var strUsername = $("#txtUsername").attr("value");
			var strPassword = $("#txtPassword").attr("value");
			var strRePassword = $("#txtRePassword").attr("value");
			var strEmail = $("#txtEmail").attr("value");
			var strAnswer = $("#txtAnswer").attr("value");
			
			var flag=true;
			if(strUsername.length<6 || strUsername.length > 50)
			{				
				flag=false;
				$("#messUsername").attr("innerHTML","tên đăng nhập từ 6-50 ký tự");
				$("#messUsername").css("color","red");
			}
			else if(HaveSpecialChar(strUsername))
			{
				flag=false;
				$("#messUsername").attr("innerHTML", "tên đăng nhập có chứa ký tự lạ");
				$("#messUsername").css("color","red");
			}
			
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
		
		$("#txtUsername").blur(function ()
		{
			var strUsername = $("#txtUsername").attr("value");
			if(strUsername.length<6 || strUsername.length > 50)
			{				
				flag=false;
				$("#messUsername").attr("innerHTML","tên đăng nhập từ 6-50 ký tự");
				$("#messUsername").css("color","red");
			}
			else if(HaveSpecialChar(strUsername))
			{
				flag=false;
				$("#messUsername").attr("innerHTML", "tên đăng nhập có chứa ký tự lạ");
				$("#messUsername").css("color","red");
			}
			else
			{
				var serverURL = "modules/home_modules/checkUsername.php?txtUsername=" + strUsername;
				$("#messUsername").load(serverURL);
			}
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
				var serverURL = "modules/home_modules/checkEmail.php?txtEmail=" + strEmail;
				$("#messEmail").load(serverURL);
			}
		});
	});
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
							<div class="box_left">
								<table width="100%">
									<tr>
										<td width="30px">
											<img src="../images/search.png">
										</td>
										<td align="left">
											<p style="font-size:20pt;"><b>TÌM KIẾM ĐỊA ỐC</b></p>
										</td>
									</tr>
									<tr>
										<td colspan="2">
											<select style="width:226px;">
												<option>---------- Chọn Loại Hình ----------</option>
												<option>Cần Mua</option>
												<option>Cần Bán</option>
												<option>Cần Thuê</option>
												<option>Cho Thuê</option>
											</select>
										</td>
									</tr>
									<tr style="height:24px;">
										<td colspan="2">
											<select style="width:226px;">
												<option>------ Chọn Tỉnh/Thành phố ------</option>
												<option value="27">An Giang</option>
												<option value="44">Bà Rịa Vũng Tàu</option>
												<option value="12">Bình Dương</option>
												<option value="32">Bình phước</option>
												<option value="39">Bình Thuận</option>
												<option value="33">Bình Định</option>
												<option value="26">Bạc Liêu</option>
												<option value="35">Bắc Cạn</option>
												<option value="20">Bắc Giang</option>
												<option value="19">Bắc Ninh</option>
												<option value="55">Bến Tre</option>
												<option value="25">Cà Mau</option>
												<option value="36">Cao Bằng</option>
												<option value="6">Cần Thơ</option>
												<option value="41">Gia Lai</option>
												<option value="67">Hà Giang</option>
												<option value="15">Hà Nam</option>
												<option value="2">Hà Nội</option>
												<option value="11">Hà Tĩnh</option>
												<option value="51">Hòa Bình</option>
												<option value="17">Hải Dương</option>
												<option value="7">Hải Phòng</option>
												<option value="52">Hậu Giang</option>
												<option value="4">Huế</option>
												<option value="18">Hưng Yên</option>
												<option value="13">Khánh Hoà</option>
												<option value="47">Kiên Giang</option>
												<option value="66">Kon Tum</option>
												<option value="43">Lâm Đồng</option>
												<option value="70">Lào Cai</option>
												<option value="34">Lạng Sơn</option>
												<option value="24">Long An</option>
												<option value="8">Nam Định</option>
												<option value="9">Nghệ An</option>
												<option value="16">Ninh Bình</option>
												<option value="38">Ninh Thuận</option>
												<option value="22">Phú Thọ</option>
												<option value="54">Phú Yên</option>
												<option value="65">Quảng Bình</option>
												<option value="64">Quảng Nam</option>
												<option value="57">Quảng Ngãi</option>
												<option value="23">Quảng Ninh</option>
												<option value="63">Quảng Trị</option>
												<option value="46">Sóc Trăng</option>
												<option value="62">Sơn La</option>
												<option value="45">Tây Ninh</option>
												<option value="59">Thái Bình</option>
												<option value="58">Thái Nguyên</option>
												<option value="10">Thanh Hoá</option>
												<option value="48">Tiền Giang</option>
												<option value="3">TP. Hồ Chí Minh</option>
												<option value="56">Trà Vinh</option>
												<option value="60">Tuyên Quang</option>
												<option value="49">Vĩnh Long</option>
												<option value="21">Vĩnh Phúc</option>
												<option value="37">Yên Bái</option>
												<option value="5">Đà Nẵng</option>
												<option value="42">Đắc Lắc</option>
												<option value="40">Đắc Nông</option>
												<option value="50">Đồng Nai</option>
												<option value="68">Đồng Tháp</option>
												<option value="69">Điện Biên</option>
											</select>
										</td>
									</tr>
									<tr style="height:24px;">
										<td colspan="2">
											<select style="width:226px;">
												<option>-------- Chọn Quận/Huyện --------</option>
												<option>Quận 1</option>
												<option>Quận 2</option>
												<option>Quận 3</option>
												<option>Quận Tân Bình</option>
											</select>
										</td>
									</tr>
									<tr style="height:24px;">
										<td colspan="2">
											<select style="width:226px;">
												<option>------------ Khoảng Giá ------------</option>
												<option value="5.000.000">Dưới 5 Triệu</option>
												<option value="50.000.000"> 5 Triệu - 50 Triệu</option>
												<option value="500.000.000">50 Triệu - 500 Triệu</option>
												<option value="1.000.000.000">500 Triệu - 1 Tỷ</option>
												<option value="1.500.000.000">1 Tỷ - 1,5 Tỷ</option>
												<option value="3.000.000.000">1,5 Tỷ - 3 Tỷ</option>
												<option value="10.000.000.000">3 Tỷ - 10 Tỷ</option>
												<option value="1">Trên 10 tỷ</option>
											</select>
										</td>
									</tr>
									<tr>
										<td colspan="2" align="center" style="padding-top:8px;">
											<img src="../images/btSearch.png" />
										</td>
									</tr>
								</table>
							</div>
							<div class="box_left">
								<table width="100%">
									<tr>
										<td width="30px">
											<img src="../images/megaphone.png">
										</td>
										<td>
											<p style="font-size:20pt;"><b>THÔNG TIN QUẢNG CÁO</b></p>
										</td>
									</tr>
									<tr>
										<td colspan="2" align="center">
											<embed type="application/x-shockwave-flash" src="../admin/upload/quangcao/ad1.swf" id="mymovie"
												name="mymovie" bgcolor="#000000" quality="high" loop="true" wmode="transparent" width="180px" height="160px">
										</td>
									</tr>
									<tr>
										<td colspan="2" align="center">
											<embed type="application/x-shockwave-flash" src="../admin/upload/quangcao/ad2.swf" id="mymovie"
												name="mymovie" bgcolor="#000000" quality="high" loop="true" wmode="transparent" width="180px" height="160px">
										</td>
									</tr>
									<tr>
										<td colspan="2" align="center">
											<img src="../admin/upload/quangcao/ad_noimage.jpg" />
										</td>
									</tr>
									<tr>
										<td colspan="2" align="center">
											<img src="../admin/upload/quangcao/ad_noimage.jpg" />
										</td>
									</tr>
								</table>
							</div>
							
						</td>
						<td style="padding: 10px;" valign="top">
							<div style="width: 686px;">
								<div style="margin-left: 10px; margin-top: 10px; font-family: tahoma; font-size: 18px;
									font-weight: bold; color:#890C29; text-transform:uppercase;">
									Đăng Ký Thành Viên</div>
								
								<hr style="color: rgb(211, 232, 248);" width="680" size="1">	
								<div style="margin-top:10px;padding:8px;background:#FFFFCC;border:solid 2px red;color:#ff0000;">
									<b>Chú ý:</b>
									<br>
									+ Hãy điền vào Họ và tên phải lớn hơn 5 ký tự
									<br>
									+ Hãy điền vào địa chỉ liên lạc phải lớn hơn 10 ký tự
									<br>
									+ Hãy điền vào số điện thoại, chỉ nhập vào là số không dùng khoảng trắng, dấu chấm, dấu phẩy...
									<br>
									+ Hãy điền vào email liên lạc
									<br>
									+ Hãy điền vào Tên truy cập, tên truy cập phải lớn hơn 5 ký tự
									<br>
									+ Hãy điền vào mật khẩu truy cập, mật khẩu truy cập phải lớn hơn 5 ký tự
									<br>
									+ Hãy điền 5 số mã an toàn trên hình vào ô bên cạnh
									<br>
								</div>
							<div style="padding:20px 0;" id="frmRegister">
							<form action="" method="post" name="frmRegister" id="frmRegister" >
								
									<table id="nhaban_box" cellspacing="0" cellpadding="5" border="0" width="700"></br>
									<tbody>
									<tr>
										<td align="left" colspan="2">
										<p></p>
										<h5>
										Nếu bạn đã đăng ký tài khoản thành viên tại realestate_hoaphuong.com? 
										<a style="color:red;" href="" onclick="return press_DangNhap();">Nhấn đăng nhập</a>
										</h5>
										<p></p>
										</td>
									</tr>
									<tr>
										<td align="left" colspan="2">
										<h1>THÔNG TIN LIÊN LẠC</h1>
										</td>
									</tr>
									<tr>
										<td align="right">
										Họ và tên:<span style="color:red;"> (*)</span>
										</td>
										<td align="left">
										<input type="text" style="width:280px;" value="" name="txtUsername" id="txtUsername">
										</td>
										<td width="166"><div id="messHoTen" class="mess">(6-50 ký tự)</div></td>
									</tr>
									
									<tr>
										<td align="right">
										Địa chỉ liên lạc:<span style="color:red;"> (*)</span>
										</td>
										<td align="left">
										<input type="text" style="width:280px;" value="" name="realtor_address">
										</td>
										<td><div id="messAdress" name="messAdress" class="mess"></div></td>
									</tr>
									
									<tr>
										<td align="right">
										Điện thoại:<span style="color:red;"> (*)</span>
										</td>
										<td align="left">
										<input type="text" style="width:115px;" maxlength="15" value="" name="txtPhone">
										Di động:
										<input type="text" style="width:102px;" maxlength="15" value="" name="txtMobile">
										</td>
										<td><div id="messPhone" name="messPhone" class="mess"></div></td>
									</tr>
									
									<tr>
										<td align="right" valign="top" style="padding-top:6px;">
										E-mail liên lạc:<span style="color:red;"> (*)</span>
										</td>
										<td align="left">
										<input type="text" name="txtEmail" onkeyup="copy()" value="" style="width:280px;" maxlength="50">
										<br>
										<span style="font-size:10px;">Hãy điền chính xác địa chỉ email để nhận được thư kích hoạt</span>
										</td>
										<td><div id="messEmail" class="mess"></div></td>
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
										<input type="text" name="txtAccess" style="width:280px;" maxlength="50" value="" >
										<br>
										<span style="font-size:10px;">Tên truy cập phải lớn hơn 5 và nhỏ hơn 50 ký tự</span>
										</td>
									</tr>
									
									<tr>
										<td align="right" valign="top" style="padding-top:6px;">
										Mật khẩu:<span style="color:red;"> (*)</span>
										</td>
										<td align="left">
										<input type="password" style="width:280px;" maxlength="50" name="txtPassword">
										<br>
										<span style="font-size:10px;">Mật khẩu truy cập phải lớn hơn 5 và nhỏ hơn 50 ký tự</span>
										</td>
										<td><div id="messPassword" class="mess"></div></td>
									</tr>
									
									<tr>
										<td align="right" valign="top" style="padding-top:6px;">
										Nhập lại mật khẩu:<span style="color:red;"> (*)</span>
										</td>
										<td align="left">
										<input type="password" style="width:280px;" maxlength="50" name="txtRePassword">
										<br>
										<span style="font-size:10px;">Nhập lại mật khẩu như đã điền ở ô trên</span>
										</td>
										<td><div id="messPassword2" class="mess"></div></td>
									</tr>
									
									<tr>
										<td align="right" valign="top" style="padding-top:10px;">
										Mã an toàn:<span style="color:red;"> (*)</span>
										</td>
										<td align="left">
										<img class="border" border="0" align="left" alt="Ma an toan" src="http://www.nhaban.com/member/security.php?rand=795392">
										<input type="text" style="width:175px; height:18px;font-size:18px; font-wieght:bold;" maxlength="5" value="" name="security" size="12">
										<div style="position:relative; left:-100px;"><span style="font-size:10px;">Hãy điền năm chữ số của hình bên cạnh vào ô này</span></div>
										</td>
									</tr>
									
									<tr>
										<td align="right"></td>
										<td align="left">
										<input type="checkbox" checked="" name="cbAgree" id="cbAgree">
										<a onclick="Terms_Of_Service();" href="#">Tôi đồng ý với các quy định của realestate_hoaphuong.com</a>
										</td>
									</tr>
									
									<tr>
										<td align="right"></td>
										<td align="left" style="padding-left:100px;">
										<span class="action-button-left"></span>
										<input class="submitYellow" type="Submit" value="Đăng ký thành viên" name="submit_realtor">
										<span class="action-button-right"></span>
										</td>
									</tr>


									</tbody>
										
									</table><br/>
									
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