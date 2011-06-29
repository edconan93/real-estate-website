<?php
	include("../include/header.php");
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
							<?php include("../include/box_left_thanhvien.php"); ?>
						</td>
						<td style="padding: 10px;" valign="top">
							<div style="width: 686px;">
								<div style="margin-left: 10px; margin-top: 10px; font-family: tahoma; font-size: 18px;
									font-weight: bold; color:#890C29;">
									Đăng Tin Cần Mua</div>
								<hr style="color: rgb(211, 232, 248);" width="680" size="1">
								<div class="mid_content">
									<div class="notice">
										<span class="badge"></span>
										<div style="background-color: #FFFFFF; border: 1px solid #DDDDDD;margin: 10px; padding: 10px 20px;" class="innerBox">
											<ul style="list-style: none outside none;padding-left:0;">
												<li><b>Để sử dụng các tính năng nâng cao và dễ dàng quản lý tin đăng, xin vui lòng đăng nhập trước khi đăng tin.</b>
												</li>
												<li><b>Xin vui lòng tham khảo các <a href="" style="text-decoration:underline;color:red;font-size:11px;"> 
												   quy định đăng tin</a> trước khi đăng tin.</b></li>
												<li><b>Không đăng tin trùng lắp, lặp lại từ khóa nhiều lần trong bài viết.</b></li>
												<li><b style="color:red;">Mọi trường hợp đăng tin không đúng quy định sẽ bị xóa mà không cần báo
													trước.</b></li>
											</ul>
										</div>
									</div>
									<table class="table" width="100%" cellpadding="0" cellspacing="0" border="0">
										<tr style="background:#00397C;height:30px;">
											<td colspan="2" style="color:#FFF;font-weight:bold;padding-left:4px;">THÔNG TIN</td>
										</tr>
										<tr>
											<td width="200px">Loại giao dịch:</td>
											<td>
												<b>Cần mua</b>
											</td>
										</tr>
										<tr>
											<td width="200px"><b>Tiêu đề tin:</b><span style="color:red;"> *</span></td>
											<td><input type="text" style="width:300px;"></td>
										</tr>
										<tr>
											<td><b>Ông/Bà:</b><span style="color:red;"> *</span></td>
											<td><input type="text" style="width:300px;" onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
										</tr>
										<tr>
											<td><b>Giá mua:</b><span style="color:red;"> *</span></td>
											<td>Từ <input type="text" style="width:100px;">đến <input type="text" style="width:100px;">
												<select>
													<option value="vnd">vnd</option>
													<option value="usd">usb</option>
												</select>
											</td>
										</tr>
										<tr>
											<td><b>Khả năng mua:</b><span style="color:red;"> *</span></td>
											<td>
												<select>
													<option value="">Cao</option>
													<option value="">Trung bình</option>
													<option value="">Thấp</option>
													<option value="">Đã mua 1</option>
													<option value="">Đã mua 2</option>
												</select>
											</td>
										</tr>
										<tr>
											<td>Thời hạn đăng tin:</td>
											<td>
												<select id="ctl00_MainContent_ctl00_ddlExpireDate" class="DropDownList" onchange="javascript:setTimeout('__doPostBack(\'ddlExpireDate\',\'\')', 0)" name="ddlExpireDate">
													<option value="10">10 ngày</option>
													<option value="20">20 ngày</option>
													<option value="30">30 ngày</option>
													<option value="40">40 ngày</option>
													<option value="50">50 ngày</option>
													<option value="60" selected="selected">60 ngày</option>
													<option value="70">70 ngày</option>
													<option value="80">80 ngày</option>
													<option value="90">90 ngày</option>
												</select>
											</td>
										</tr>
										<tr>
											<td>Ngày hết hạn:</td>
											<td style="color:red;font-weight:bold;">26/12/2011</td>
										</tr>
									</table><br>
									<table class="table" width="100%" cellpadding="0" cellspacing="0">
										<tr style="background:#00397C;height:30px;">
											<td colspan="4" style="color:#FFF;font-weight:bold;padding-left:4px;">TIÊU CHÍ MUA</td>
										</tr>
										<tr>
											<td>
											<?php
												// $path = rtrim($_SERVER['PHP_SELF'],"e/module/dangtin.php/")."e/library/fckeditor/";
												// include("../library/fckeditor/fckeditor.php");
												// $summary = new FCKeditor("summary");
												// $summary->BasePath = $path;
												// $summary->Height=200;
												// $summary->Value = "";
												// $summary->Create();
											?>
											</td>
										</tr>
									</table><br>
									<table class="table" width="100%" cellpadding="0" cellspacing="0">
										<tr style="background:#00397C;height:30px;">
											<td colspan="4" style="color:#FFF;font-weight:bold;padding-left:4px;">TIÊU CHÍ MUA (CẬP NHẬT)</td>
										</tr>
										<tr>
											<td>
											<?php
												$path = rtrim($_SERVER['PHP_SELF'],"e/module/dangtin.php/")."e/library/fckeditor/";
												include("../library/fckeditor/fckeditor.php");
												$summary = new FCKeditor("summary");
												$summary->BasePath = $path;
												$summary->Height=200;
												$summary->Value = "";
												$summary->Create();
											?>
											</td>
										</tr>
									</table><br>
									<table class="table" width="100%" cellpadding="0" cellspacing="0" border="0">
										<tr style="background:#00397C;height:30px;">
											<td colspan="2" style="color:#FFF;font-weight:bold;padding-left:4px;">THÔNG TIN LIÊN HỆ</td>
										</tr>
										<tr>
											<td width="200px">Tên:</td>
											<td><input type="text" style="width:300px;"></td>
										</tr>
										<tr>
											<td width="200px">Điện thoại:</td>
											<td><input type="text" style="width:300px;"></td>
										</tr>
										<tr>
											<td width="200px">Email:</td>
											<td><input type="text" style="width:300px;"></td>
										</tr>
									</table>
									<div class="submit" style="border-top: 1px solid #999; padding: 10px 0 0 0; margin: 15px 0 0 0;">
									<center>
										<input id="btSave" class="ButtonWithbackground" type="submit" value="Đăng tin" name="btSave">
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