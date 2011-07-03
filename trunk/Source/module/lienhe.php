<?php
	include("../include/header.php");
?>
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
					Liên Hệ Với Công Ty
				</div>
				<hr style="color: rgb(211, 232, 248);" width="680" size="1">
				<div class="mid_content">
					<table cellspacing="0" cellpadding="0" border="0" align="center" width="700">
						<tr>
							<td><center>
								<form method="POST" action="http://www.nhaban.com/contact/index.php">
									<table cellspacing="0" cellpadding="5" border="0" align="center">
										<tr>
											<td class="border_line" bgcolor="#e1eef7" colspan="2" >
											<b>
											+ Bạn có thể liên hệ trực tiếp với chúng tôi qua điện thoại
											<br>
											+ Mobile: 0902 . 555 217 (Hoa Phượng) - (08) 38777999 - Fax: (08) 62602666
											<br>
											+ Thời gian làm việc: Thứ 2 - 6 (8h - 17h), Thứ 7 (8h - 12h)
											<br>
											+ Hoặc qua mẫu gởi thông tin liên hệ bên dưới:
											</b>
											</td>
										</tr>
										<tr><td>&nbsp;</td></tr>
										<tr>
											<td>Họ và Tên: <span style="color:red;">*</span></td>
											<td><input type="text" style="width:300px;"></td>
										</tr>
										<tr>
											<td>Điện thoại: <span style="color:red;">*</span></td>
											<td><input type="text" style="width:300px;" onkeypress="return keypress(event);"></td>
										</tr>
										<tr>
											<td>Email: <span style="color:red;">*</span></td>
											<td><input type="text" style="width:300px;"></td>
										</tr>
										<tr>
											<td>Địa chỉ liên hệ:</td>
											<td><input type="text" style="width:300px;"></td>
										</tr>
										<tr>
											<td valign="top" style="padding-top:6px;">Nội dung liên hệ: <span style="color:red;">*</span></td>
											<td><textarea name="message" style="width:300px;"></textarea></td>
										</tr>
										<tr>
											<td valign="top" style="padding-top:6px;">Mã an toàn: <span style="color:red;">*</span></td>
											<td>
												<img class="border" border="0" align="left" alt="Ma an toan" src="http://www.nhaban.com/member/security.php?102336">
												<input type="text" style="width:95px;font-wieght:bold;" maxlength="5" name="security" size="20">
											</td>
										</tr>
										<tr style="height:80px;">
											<td></td>
											<td>
												<div style="width:80px;">
													<span class="action-button-left"></span>
													<input class="submitYellow" type="Submit" value="Gửi" id="btnGuiTin" name="btnGuiTin" />
													<span class="action-button-right"></span>
												</div>
											</td>
										</tr>
									</table>
								</form>
								</center>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</td>
	</tr>
</table>
<?php
	include("../include/footer.php");
?>