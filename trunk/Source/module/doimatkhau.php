<?php
	include("../include/header.php");
	if(!isset($curUserId))
		header("Location:dichvu.php");
?>
<script type="text/javascript">

$(document).ready(function()
{
	$("#frmChange").submit(function()
	{   
		var flag = true;
		var strOldPass = $("#txtOldPassword").attr("value");
		var strNewPassword = $("#txtNewPassword").attr("value");
		var strRePassword = $("#txtRePassword").attr("value");
		// var id = $("#idUser").attr("value");
		// alert(id);
		if(strOldPass.length <1)

		{
			flag = false;
			$("#messOldPassword").attr("innerHTML","Phải nhập password cũ");
			$("#messOldPassword").css("color","red");
		}
		if(strNewPassword.length <5)
		{
			flag = false;
			$("#messNewPassword").attr("innerHTML","Phải nhập password mới và lơn hơn 5 kí tự");
			$("#messNewPassword").css("color","red");
		}
		if(strRePassword.length <5)
		{
			flag = false;
			$("#messRePassword").attr("innerHTML","Phải nhập lại password mới và lơn hơn 5 kí tự");
			$("#messRePassword").css("color","red");
		}
		if(flag == false)
			alert ("Có lỗi trong thông tin đổi mật khẩu. Xin kiểm tra lại");
		return flag;
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
							<?php include("../include/box_left_thanhvien.php"); ?>
						</td>
						<td style="padding: 10px;" valign="top">
							<div style="width: 686px;">
								<div style="margin-left: 10px; margin-top: 10px; font-family: tahoma; font-size: 18px;
									font-weight: bold; color:#890C29;">
									THAY ĐỔI MẬT KHẨU</div>
								<hr style="color: rgb(211, 232, 248);" width="680" size="1">
								<div class="mid_content">
								
									<div id="messError" align="left" style="padding:5px;margin-left:5px;background:#FFFFCC;border:solid 1px #CCCCCC;font-size:12px;color:#000000;font-weight:bold;">
									<?php
									if(isset($_GET['error']))
										echo "-Kiểm tra lại password cũ hay mới không đúng";
										else
										echo"- Chỉ các tài khoản thành viên đã được kích hoạt, mới có thể yêu cầu thay đổi mật khẩu.";
									?>
									
										
										<br>
									</div>
									<center>
										<br>
<div style="padding:20px;" id="frmChange" name="frmChange">
<form action="user/thaydoimatkhau.php" method="post" name="frmChangePassword" id="frmChangePassword" >
										<table class="table" border="0">
											<tr>
												<td align="left">Họ tên:</td>
												<td align="left">
												<b><?php echo $curUserHoTen ;
												echo "<input name='idUser' id='idUser' type='text' style='width:300px;display:none;' value='".$curUserId."'>";
												?></b>
												</td>
											</tr>
											<tr>
												<td align="left">Email:</td>
												<td align="left">
												<b><?php echo $curUserEmail; ?></b>
												</td>
											</tr>
											<tr>
												<td align="left">
												Mật khẩu cũ:
												<span style="color:red;">(*)</span>
												</td>
												<td align="left">
												<input type="password" size="40" value="" name="txtOldPassword" id="txtOldPassword">
												<div id="messOldPassword" name="messOldPassword" class="mess"></div>
												
												</td>
											</tr>
											<tr>
												<td align="left">
												Mật khẩu mới:
												<span style="color:red;">(*)</span>
												</td>
												<td align="left">
												<input type="password" size="40" value="" name="txtNewPassword" id="txtNewPassword">
												<div id="messNewPassword" name="messNewPassword" class="mess"></div>
												</td>
											</tr>
											<tr>
												<td align="left">
												Nhập lại mật khẩu mới:
												<span style="color:red;">(*)</span>
												</td>
												<td align="left">
												<input type="password" size="40" value="" name="txtRePassword" id="txtRePassword">
												<div id="messRePassword" name="messRePassword" class="mess"></div>
												</td>
											</tr>
										
											<tr>
												<td></td>
												<td style="padding-left:10px;">
													<span class="action-button-left"></span>
													<input class="submitYellow" type="Submit" value="Gửi thông tin" name="btnSubmitChangePass">
													<span class="action-button-right"></span>
												</td>
											</tr>
										</table>
</form>
</div>
										<p style="font-size: 11px; color: #9F9F9F; text-align:center;">
											<span style="color:red;">(*)</span> Thông tin không được để trống.</p>
									</center>
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