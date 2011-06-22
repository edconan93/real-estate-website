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
							<div style="width: 270px; min-height: 500px; background-image: url(&quot;images/menubg_top.jpg&quot;);
								background-repeat: no-repeat;">
								<div style="width: 270px; min-height: 500px; background-image: url(&quot;images/sidebg.jpg&quot;);
									background-repeat: no-repeat; background-position: center bottom;">
									<div style="height: 20px;">
									</div>
									<div class="menulv1">
										<a class="a_menu" href="http://ankhanhjvc.com/index.php?menuid=119">Introduction</a></div>
									<div class="menulv2_active">
										<a class="a_menu2" href="http://ankhanhjvc.com/index.php?menuid=123" style="color: rgb(0, 
0, 0);">About the Company</a></div>
									<div class="menulv2">
										<a class="a_menu2" href="http://ankhanhjvc.com/index.php?menuid=122">Video Clips</a></div>
								</div>
							</div>
							<div style="margin-top: 20px; padding-top: 18px; padding-left: 10px; width: 168px;
								height: 86px; background-image: url(&quot;images/hitbg.gif&quot;); background-repeat: no-repeat;">
								<div style="font-family: tahoma; font-size: 12px; font-weight: bold; color: rgb(14, 58, 95);"
									title="Tính từ 14:15:46 - 21/08/2009">
									Số lượt truy cập: <span id="hittotal" style="font-family: tahoma; font-size: 12px;
										color: rgb(14, 58, 95);">74349</span></div>
								<div style="font-family: tahoma; font-size: 12px; font-weight: bold; color: rgb(14, 58, 95);">
									Hôm nay: <span id="hittoday" style="font-family: tahoma; font-size: 12px; color: rgb(118, 125, 152);">
										60112</span></div>
								<div style="font-family: tahoma; font-size: 11px; font-weight: normal; color: rgb(14, 58, 95);">
									Có <span id="onlineloc" style="font-family: tahoma; font-size: 12px; color: rgb(14, 58, 95);">
										5</span> người đang online</div>

							</div>
							<div style="height: 30px;">
							</div>
						</td>
						<td style="padding: 10px;" valign="top">
							<div style="width: 686px;">
								<div style="margin-left: 10px; margin-top: 10px; font-family: tahoma; font-size: 18px;
									font-weight: bold; color:#890C29;">
									THÔNG TIN KHÁCH HÀNG</div>
								<hr style="color: rgb(211, 232, 248);" width="680" size="1">
								<div style="padding:20px 0;">
									<table width="100%" border="0">
										<tr>
											<td>Ông/Bà <span style="color:red;">(*)</span>:
											<input type="text" value="" /></td>
											<td align="center">SĐT 1 <span style="color:red;">(*)</span>: <input id="sdt1" type="text" value="" onkeypress="return keypress(event);" onkeyup="checkSDT1();" /></td>
											<td align="right">SĐT 2: <input id="sdt2" type="text" value="" onkeypress="return keypress(event);" disabled="disabled" /></td>
										</tr>
										<tr>
											<td>Giá mua <span style="color:red;">(*)</span>:</td>
											<td align="center">Từ: <input type="text" value="" /> Triệu</td>
											<td align="right">Đến: <input type="text" value="" /> Triệu</td>
										</tr>
										<tr>
											<td>Ngày <span style="color:red;">(*)</span>:</td>
											<td colspan="2"><script>
												$(function() {
													$( "#datepicker" ).datepicker({dateFormat:'dd/mm/yy', showButtonPanel: true});
												});
												</script>
												<input id="datepicker" type="text" style="width:70px;">
											</td>
										</tr>
										<tr>
											<td>Tiêu chí khách hàng <span style="color:red;">(*)</span>:</td>
											<td colspan="2">
												<textarea style="width:100%;"></textarea>
											</td>
										</tr>
										<tr>
											<td>Tiêu chí khách hàng (Cập nhật):</td>
											<td colspan="2">
												<textarea style="width:100%;"></textarea>
											</td>
										</tr>
										<tr>
											<td>Các căn nhà đã giới thiệu:</td>
											<td colspan="2"><textarea style="width:100%;"></textarea></td>
										</tr>
										<tr>
											<td>Khả năng mua:</td>
											<td colspan="2">
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
									<p style="font-size: 11px; color: #9F9F9F;">
										 <span style="color:red;">(*)</span> Thông tin không được để trống.</p>
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