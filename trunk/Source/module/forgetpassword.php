<?php
	include("../include/header.php");
?>
<script src="../js/common.js" language="javascript" type="text/javascript"></script>
<script src="../js/jquery-1.js" language="javascript" type="text/javascript"></script>
<script type="text/javascript">


$(document).ready(function()
{
	$("#frmForgetPassword").submit(function()
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
<?php
if(isset($curUserId))
	header("Location:thanhvien.php");
?>
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
						<div style="padding:20px;" id="frmForgetPassword" name="frmForgetPassword">
	<!--form -->		<form action="user/xulydangky.php" method="post" name="frmForgetPassword" id="frmForgetPassword" >
							<td style="padding: 10px;" valign="top">
								<div style="width: 686px;">
									<div style="margin-left: 10px; margin-top: 10px; font-family: tahoma; font-size: 18px;
										font-weight: bold; color:#890C29; text-transform:uppercase;">
										Quên Mật Khẩu</div>
									<hr style="color: rgb(211, 232, 248);" width="680" size="1">
									<div class="mid_content">
										
									<table id="nhaban_box" height="105" cellspacing="0" cellpadding="5" border="0" width="686">
										<tr>
											<td align="left" valign="top" colspan="2">
											<div align="left" style="padding:5px;margin-left:5px;background:#FFFFCC;border:solid 1px #CCCCCC;font-size:12px;color:#336699;font-weight:bold;">
											<?php 
											if(isset($_POST['send']) && $_POST['send'] == "success")
											{
												echo "Chú ý :<br>Thư xác nhận yêu cầu thay đổi Mật khẩu mới đã được gửi tới hộp thư ".$_GET['email']."của quý khách.
Vui lòng truy cập vào email và quí khách hãy lấy mật khẩu để đăng nhập lại website";
											}
											else if(isset($_POST['send']) && $_POST['send'] == "failed")
											{
												echo "Chú ý :<br>Lỗi đã xảy ra trong quá trình cài đặt lại mật khẩu với địa chỉ email ".$_GET['email']." này. Xin quý khách thử lại.";
											}
											else
											{
											?>
												- Chỉ các tài khoản thành viên đã được kích hoạt, mới có thể yêu cầu thay đổi mật khẩu.
											<?php } ?>
											</div>
											</td>
										</tr>
										<tr>
											<td align="right" width="30%" valign="top">
											Địa chỉ email:
											<span style="color:red;">*</span>
											</td>
											<td align="left" width="70%" valign="top">
											<input type="text" maxlength="100" value="" name="txtEmail" id="txtEmail" size="55">
											<div id="messLoadEmail" name=="messLoadEmail"></div>
											</td>
										</tr>
										<tr>
											<td align="right" width="30%" valign="top"> </td>
											<td align="left" width="70%" valign="top">
											<span class="action-button-left"></span>
											<input class="submitYellow" type="Submit" value="Gửi thông tin" name="btnForgetPassword" id="btnForgetPassword">
											<span class="action-button-right"></span>
											</td>
										</tr>
									</table>								
										
									</div>
								</div>
							</td>
						</form>
						</div>
		<!--end form-->
					</tr>

				</table>
			</td>
		</tr>
	</table>
<?php
	include("../include/footer.php");
?>
