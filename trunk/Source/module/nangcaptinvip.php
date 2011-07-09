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
									NÂNG CẤP TIN VIP</div>
								<hr style="color: rgb(211, 232, 248);" width="680" size="1">
								<div style="padding:20px 0;">
									<center>
										<table class="table" border="0">
											<tr>
												<td align="right">Mã số tin rao:</td>
												<td align="left">
												<b>680818</b>
												</td>
											</tr>
											<tr>
												<td align="right">Tiêu đề tin rao:</td>
												<td align="left">
												<b>Cần mua nhà ở với những tiện ích va an ninh</b>
												</td>
											</tr>
											<tr>
												<td align="right">Thời gian quảng cáo:</td>
												<td align="left">
												<select onchange="this.form.submit();" style="width:200px;" name="end_date">
												<option value="0">-- chon thoi gian quang cao --</option>
												<option value="1">1 tháng</option>
												<option selected="" value="2">2 tháng</option>
												<option value="3">3 tháng</option>
												<option value="4">4 tháng</option>
												<option value="5">5 tháng</option>
												<option value="6">6 tháng</option>
												<option value="7">7 tháng</option>
												<option value="8">8 tháng</option>
												<option value="9">9 tháng</option>
												<option value="10">10 tháng</option>
												<option value="11">11 tháng</option>
												<option value="12">12 tháng</option>
												</select>
												</td>
											</tr>
											<tr>
												<td align="right">Mức giá:</td>
												<td align="left">
												<b>275.000 VNĐ/ 01 tháng</b>
												</td>
											</tr>
											<tr>
												<td align="right">Thành tiền:</td>
												<td align="left">
												<b>440,000 VNĐ</b>
												</td>
											</tr>
											<tr>
												<td align="right">Thông tin thanh toán:</td>
												<td align="left">
												<h3>Phương thức thanh toán, chuyển khoản qua ngân hàng</h3>
												</td>
											</tr>
											<tr>
												<td align="right"></td>
												<td align="left">
												<span> Thanh toán qua</span>
												<b>Ngân hàng ĐÔNG Á - TP.HCM</b>
												.
												<br>
												<span>Chủ tài khoản :</span>
												<b>CÔNG TY TNHH SIÊU TRỰC TUYẾN</b>
												<br>
												<span>Số tài khoản :</span>
												<b>003 721 400 001</b>
												<br>
												<span class="small_text_black">Chú ý: Hãy gọi điện cho chúng tôi, ngay sau khi Bạn gửi tiền thanh toán chuyển khoản thành công.</span>
												<br>
												</td>
											</tr>
											<tr>
												<td align="right"></td>
												<td align="left">
												<h3>Thanh toán trực tiếp tại văn phòng</h3>
												</td>
											</tr>
											<tr>
												<td align="right"></td>
												<td align="left">
												<p>
												<span class="style1"> Bộ phận quảng cáo NHABAN.COM</span>
												<br>
												<span>ĐC: Số 139 - Đường số 13B - Tiểu Khu II - Phường Bình Trị Đông B - Quận Bình Tân - TP. Hồ Chí Minh.</span>
												<br>
												<span>Điện thoại:</span>
												<b> 08.38777 939</b>
												-
												<span>Fax:</span>
												<b> 08.62602 665</b>
												-
												<span>Email:</span>
												<b> nhaban.com @ gmail.com</b>
												<br>
												<span> Thời gian làm việc:</span>
												<strong>Thứ 2 - 6 (8h - 17h), Thứ 7 (8h - 12h)</strong>
												</p>
												Gõ tiếng việt:
												<input id="him_auto" type="radio" onfocus="setMethod(0);" name="him">
												<label for="him_auto">Mở</label>
												<input id="him_off" type="radio" onfocus="setMethod(-1);" name="him">
												<label for="him_off">Tắt</label>
												</td>
											</tr>
											<tr>
												<td align="right">Nội dung tin nhắn:</td>
												<td align="left">
												<textarea style="padding:5px;" name="comments" rows="5" cols="40"></textarea>
												</td>
											</tr>
											<tr>
												<td align="right">Mã an toàn:</td>
												<td align="left">
												<img class="border" border="0" align="left" alt="Ma an toan" src="http://www.nhaban.com/member/security.php?rand=823376">
												<input type="text" style="width:95px; height:28px;font-size:18px; font-wieght:bold;" maxlength="5" value="" name="security" size="12">
												</td>
											</tr>
											<tr>
												<td align="right"></td>
												<td align="left">
												<span class="action-button-left"></span>
												<input class="submitYellow" type="Submit" value="Gửi Yêu Cầu" name="submit_mailer">
												<span class="action-button-right"></span>
												</td>
											</tr>
											<tr >
											<td align="right">Thông tin không được để trống.</td>
											<td  align="right" style="font-size: 17px; color: #9F9F9F; text-align:center;">
											<span style="color:red;">(*)</span> Thông tin không được để trống.</td>
											</tr>

										<!--tr>
												<td align="right">Ngày:</td>
												<td colspan="2" style="padding-left:10px;"><script>
													$(function() {
														$( "#datepicker" ).datepicker({dateFormat:'dd/mm/yy', showButtonPanel: true});
													});
													</script>
													<input id="datepicker" type="text" style="width:70px;">
												</td>
											</tr-->
										</table>
										
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