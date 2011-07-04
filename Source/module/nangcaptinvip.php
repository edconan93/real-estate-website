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
												<td align="right">Tên đăng nhập:</td>
												<td style="font-weight:bold; padding-left:10px;">sieudangf2@yahoo.com</td>
											</tr>
											<tr>
												<td align="right">Email liên lạc: <span style="color:red;">(*)</span></td>
												<td style="font-weight:bold; padding-left:10px;">sieudangf2@yahoo.com</td>
											</tr>
											<tr>
												<td align="right">Ông/Bà: <span style="color:red;">(*)</span></td>
												<td style="padding-left:10px;">
													<input type="text" style="width:300px;font-weight:bold;" onkeyup="javascript:this.value=this.value.toUpperCase();" value="NGUYỄN ĐỨC THỊNH" />
												</td>
											</tr>
											<tr>
												<td align="right">Giới tính:</td>
												<td style="padding-left:10px;">
													<input type="radio" value="1" name="gender" checked="true"> Nam
													<input type="radio" value="0" name="gender"> Nữ
												</td>
											</tr>
											<tr>
												<td align="right">Địa chỉ liên lạc: <span style="color:red;">(*)</span></td>
												<td style="padding-left:10px;">
													<input type="text" style="width:300px" value="">
												</td>
											</tr>
											<tr>
												<td align="right">Số điện thoại 1: <span style="color:red;">(*)</span></td>
												<td style="padding-left:10px;">
													<input id="sdt1" style="width:100px;" type="text" value="" onkeypress="return keypress(event);" onkeyup="checkSDT1();" />
												</td>
											</tr>
											<tr>
												<td align="right">Số điện thoại 2:</td>
												<td style="padding-left:10px;">
													<input id="sdt2" style="width:100px;" type="text" value="" onkeypress="return keypress(event);" disabled="disabled" />
												</td>
											</tr>
											<tr>
												<td align="right">Giá mua: <span style="color:red;">(*)</span></td>
												<td style="padding-left:10px;">
													<input style="width:100px;" type="text" onkeypress="return keypress(event);" value="" />
													Đến <input style="width:100px;" type="text" onkeypress="return keypress(event);" value="" /> Triệu
												</td>
											</tr>
											<tr>
												<td align="right">Ngày:</td>
												<td colspan="2" style="padding-left:10px;"><script>
													$(function() {
														$( "#datepicker" ).datepicker({dateFormat:'dd/mm/yy', showButtonPanel: true});
													});
													</script>
													<input id="datepicker" type="text" style="width:70px;">
												</td>
											</tr>
											<tr>
												<td align="right" valign="top">Tiêu chí khách hàng <span style="color:red;">(*)</span>:</td>
												<td colspan="2" style="padding-left:10px;">
													<textarea style="width:100%;"></textarea>
												</td>
											</tr>
											<tr>
												<td align="right" valign="top">Tiêu chí khách hàng (Cập nhật):</td>
												<td colspan="2" style="padding-left:10px;">
													<textarea style="width:100%;"></textarea>
												</td>
											</tr>
											<tr>
												<td align="right" valign="top">Các căn nhà đã giới thiệu:</td>
												<td colspan="2" style="padding-left:10px;">
													<textarea style="width:100%;"></textarea>
												</td>
											</tr>
											<tr>
												<td align="right" valign="top">Khả năng mua:</td>
												<td colspan="2" style="padding-left:10px;">
													<select>
														<option>Cao</option>
														<option>Trung Bình</option>
														<option>Thấp</option>
														<option>Đã Mua 1</option>
														<option>Đã Mua 2</option>
													</select>
												</td>
											</tr>
										</table>
										<div style="padding:20px 0; width:100%; text-align:right;">
											<img src="../images/btExportToExcel.png" alt="" />
											<img src="../images/btSave.png" alt="" />
											<img src="../images/btDelete.png" alt="" />
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