<?php
	include("../include/header.php");
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
									<div align="left" style="padding:5px;margin-left:5px;background:#FFFFCC;border:solid 1px #CCCCCC;font-size:12px;color:#000000;font-weight:bold;">
										- Chỉ các tài khoản thành viên đã được kích hoạt, mới có thể yêu cầu thay đổi mật khẩu.
										<br>
									</div>
									<center>
										<br>
										<table class="table" border="0">
											<tr>
												<td align="right">Email đăng nhập: <span style="color:red;">(*)</span></td>
												<td style="padding-left:10px;">
													<input type="text" style="width:300px;" value="" />
												</td>
											</tr>
											<tr>
												<td align="right" valign="top" style="padding-top:4px;">
													Mã an toàn:<span style="color:red;"> (*)</span>
												</td>
												<td style="padding-left:10px;">
													<img class="border" border="0" align="left" alt="Ma an toan" src="http://www.nhaban.com/member/security.php?rand=795392">
													<input type="text" style="width:175px;margin-top:4px;" maxlength="5" value="" name="security" size="12">
													<p><span style="font-size:10px;">Hãy điền năm chữ số của hình bên cạnh vào ô này</span></p>
												</td>
											</tr>
											<tr>
												<td></td>
												<td style="padding-left:10px;">
													<span class="action-button-left"></span>
													<input class="submitYellow" type="Submit" value="Gửi thông tin" name="submit_reminder">
													<span class="action-button-right"></span>
												</td>
											</tr>
										</table>
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