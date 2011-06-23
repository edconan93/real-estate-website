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
							<div class="box_left">
								<table width="100%">
									<tr>
										<td width="30px">
											<img src="../images/male3.png">
										</td>
										<td>
											<p style="font-size:20pt;"><h1>Thông tin thành viên<h1></p>
										</td>
									</tr>
									<tr>
										<td colspan="2">
											Tài khoản:<br><center><b style="color:blue;">lchone.hum@yahoo.com</b></center><br>
											Họ tên: Nguyễn Đức Thịnh<br>
											Email: ducthinh0333@gmail.com<br>
											ĐT: 0934100286<br><br>
											<center>( Thoát )</center>
										</td>
									</tr>
								</table>
							</div>
							<div class="box_left">
								<table width="100%">
									<tr>
										<td width="30px">
											<img src="../images/male3.png">
										</td>
										<td>
											<p style="font-size:20pt;"><h1>Chức năng</h1></p>
										</td>
									</tr>
									<tr>
										<td colspan="2" align="center">
											<p class="menu_item">
												<a href="">Thông tin thành viên</a>
											</p>
											<p class="menu_item">
												<a href="">Thay đổi mật khẩu</a>
											</p>
											<p class="menu_item">
												<a href="noiquidangtin.php">Đăng tin nhà đất</a>
											</p>
											<p class="menu_item">
												<a href="">Các tin đã đăng</a><br>
												<span>
													<a href="">- Tin đã duyệt (0)</a><br>
													<a href="">- Tin chờ duyệt (3)</a><br>
													<a href="">- Tin hết hạn (0)</a><br>
												</span>
											</p>
										</td>
									</tr>
								</table>
							</div>
						</td>
						<td style="padding: 10px;" valign="top">
							<div style="width: 686px;">
								<div style="margin-left: 10px; margin-top: 10px; font-family: tahoma; font-size: 18px;
									font-weight: bold; color:#890C29;">
									Đăng Tin Cần Mua / Đăng Tin Cần Bán</div>
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
									<table width="100%" cellpadding="0" cellspacing="0" border="0">
										<tr style="background:#00397C;height:30px;">
											<td colspan="2" style="color:#FFF;font-weight:bold;padding-left:4px;">THÔNG TIN</td>
										</tr>
										<tr>
											<td width="200px"><b>Tiêu đề tin:</b><span style="color:red;"> *</span></td>
											<td><input type="text" style="width:300px;"></td>
										</tr>
										<tr>
											<td width="200px"><b>Loại giao dịch:</b><span style="color:red;"> *</span></td>
											<td>
												<select id="ctl00_MainContent_ctl00_ddlTransactionType" class="DropDownList" name="ddlTransactionType">
													<option value="1">Cần bán</option>
													<option value="2">Cần mua</option>
													<option value="3">Cho thuê</option>
													<option value="4">Cần thuê</option>
												</select>
												&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Loại bđs :
												<select id="ctl00_MainContent_ctl00_ddlPropertyType" class="DropDownList" name="ddlPropertyType">
													<option value="1">Biệt Thự</option>
													<option value="2" selected="selected">Căn hộ chung cư</option>
													<option value="3">Căn hộ cao cấp</option>
													<option value="8">Nhà Phố</option>
													<option value="9">Văn phòng cho thuê</option>
												</select>
												</td>
										</tr>
										<tr>
											<td>Số nhà / Số lô, Tên đường:</td>
											<td><input type="text" style="width:300px;"></td>
										</tr>
										<tr>
											<td>Thuộc dự án:</td>
											<td><input type="text" style="width:300px;"></td>
										</tr>
										<tr>
											<td width="200px"><b>Tỉnh/Thành Phố:</b><span style="color:red;"> *</span></td>
											<td>
												<select id="ctl00_MainContent_ctl00_ddlCity" class="DropDownList" onchange="javascript:setTimeout('__doPostBack(\'ddlCity\',\'\')', 0)" name="ddlCity">
													<option value="1" selected="selected">TP Hồ Chí Minh</option>
													<option value="2">Hà Nội</option>
													<option value="6">Bình Dương</option>
													<option value="11">Bình Thuận</option>
													<option value="4">Cần Thơ</option>
													<option value="3">Đà Nẵng</option>
													<option value="10">Đăk Lăk</option>
													<option value="8">Đồng Nai</option>
													<option value="9">Lâm Đồng</option>
													<option value="7">Vũng Tàu</option>
												</select>
											</td>
										</tr>
										<tr>
											<td width="200px"><b>Quận/Huyện:</b><span style="color:red;"> *</span></td>
											<td>
												<select id="ctl00_MainContent_ctl00_ddlDistric" class="DropDownList" name="ddlDistric">
													<option value="-1">Chọn quận/huyện</option>
													<option value="7">Quận 1</option>
													<option value="2">Quận 2 </option>
													<option value="3">Quận 3</option>
													<option value="4">Quận 4</option>
													<option value="5">Quận 5</option>
													<option value="6">Quận 6</option>
													<option value="8">Quận 7</option>
													<option value="9">Quận 8</option>
													<option value="10">Quận 9</option>
													<option value="11">Quận 10</option>
													<option value="12">Quận 11</option>
													<option value="13">Quận 12</option>
													<option value="1">Huyện Bình Chánh</option>
													<option value="20">Quận Bình Tân</option>
													<option value="18">Quận Bình Thạnh</option>
													<option value="22">Huyện Cần Giờ</option>
													<option value="24">Huyện Củ Chi</option>
													<option value="21">Quận Gò Vấp</option>
													<option value="23">Huyện Hóc Môn</option>
													<option value="29">Huyện Nhà Bè</option>
													<option value="14">Quận Phú Nhuận</option>
													<option value="19">Quận Tân Bình</option>
													<option value="15">Quận Tân Phú</option>
													<option value="17">Quận Thủ Đức</option>
												</select>
											</td>
										</tr>
										<tr>
											<td width="200px"><b>Giá:</b><span style="color:red;"> *</span></td>
											<td>
												<input id="tbPrice" class="Textbox" type="text" style="width:150px;text-align: right;" onkeyup="this.value = FormatNumber(this.value);" name="tbPrice">
												<select id="ddlMoneyUnit" class="DropDownList" name="ddlMoneyUnit">
													<option value="1" selected="selected">VNĐ</option>
													<option value="2">USD</option>
													<option value="3">SJC</option>
												</select>
												<select id="ddlPricingType" class="DropDownList" name="ddlPricingType">
													<option value="3" selected="selected">Tháng</option>
													<option value="2">m²</option>
													<option value="1">Tổng diện tích</option>
												</select>
											</td>
										</tr>
										<tr>
											<td>Khuyến mãi:</td>
											<td><input type="text" style="width:300px;"></td>
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
											<td><input type="text" style="width:70px;" value="20/10/2011"></td>
										</tr>
									</table><br>
									<table width="100%" cellpadding="0" cellspacing="0">
										<tr style="background:#00397C;height:30px;">
											<td colspan="4" style="color:#FFF;font-weight:bold;padding-left:4px;">THÔNG TIN BẤT ĐỘNG SẢN</td>
										</tr>
										<tr>
											<td width="200px"><b>Diện tích:</b><span style="color:red;"> *</span></td>
											<td>
												<input id="tb_dientich" class="Textbox" type="text" style="width:40px;" name="tb_dientich">
													m<sup>2</sup>
											</td>
											<td>
												Tầng:<span style="color:red;"> *</span>
											</td>
											<td>
												<input id="tbTang" class="Textbox" type="text" style="width:40px;" name="tbTang">
											</td>
										</tr>
										<tr>
											<td width="200px">Số phòng ngủ:</td>
											<td>
												<input id="tb_dientich" class="Textbox" type="text" style="width:40px;" name="tb_dientich">
											</td>
											<td>
												Số phòng WC/Tắm:
											</td>
											<td>
												<input id="tbTang" class="Textbox" type="text" style="width:40px;" name="tbTang">
											</td>
										</tr>
										<tr>
											<td width="200px">Tình trạng pháp lý:</td>
											<td>
												<select id="ddlLegalStatus" class=" DropDownList" name="ddlLegalStatus">
													<option value="6">Chủ quyền tư nhân</option>
													<option value="4">Đang hợp thức hoá</option>
													<option value="3">Giấy tay</option>
													<option value="5">Giấy tờ hợp lệ</option>
													<option value="7">Hợp đồng</option>
													<option value="8">Không xác định</option>
													<option value="2">Sổ đỏ</option>
													<option value="1">Sổ hồng</option>
												</select>
											</td>
											<td>
												Hướng nhà:
											</td>
											<td>
												<select id="ddlDirection" class="DropDownList" name="ddlDirection">
													<option value="1">Đông</option>
													<option value="2">Tây</option>
													<option value="3">Nam</option>
													<option value="4">Bắc</option>
													<option value="5">Đông Bắc</option>
													<option value="6">Đông Nam</option>
													<option value="7">Tây Bắc</option>
													<option value="8">Tây Nam</option>
													<option value="9">Không xác định</option>
												</select>
											</td>
										</tr>
									</table><br>
									<table width="100%" cellpadding="0" cellspacing="0">
										<tr style="background:#00397C;height:30px;">
											<td colspan="4" style="color:#FFF;font-weight:bold;padding-left:4px;">CÁC TIỆN ÍCH</td>
										</tr>
										<tr>
											<td>
											<input id="cbTienNghi" type="checkbox" name="cbTienNghi">
											<label for="cbTienNghi"> Đầy đủ tiện nghi</label>
											</td>
											<td>
											<input id="cbChoDauXe" type="checkbox" name="cbChoDauXe">
											<label for="cbChoDauXe"> Chỗ đậu xe hơi</label>
											</td>
											<td>
											<input id="cbSanVuon" type="checkbox" name="cbSanVuon">
											<label for="cbSanVuon"> Sân vườn</label>
											</td>
											<td>
											<input id="cbHoBoi" type="checkbox" name="cbHoBoi">
											<label for="cbHoBoi"> Hồ bơi</label>
											</td>
											</tr>
									   <tr>
									   <td>
											<input id="cbGanCongVien" type="checkbox" name="cbGanCongVien">
											<label for="cbGanCongVien"> Gần công viên</label>
											</td>
											<td>
											<input id="cbDanTriCao" type="checkbox" name="cbDanTriCao">
											<label for="cbDanTriCao"> Khu dân trí cao</label>
											</td>
											<td>
											<input id="cbGanBenhVien" type="checkbox" name="cbGanBenhVien">
											<label for="cbGanBenhVien"> Gần bệnh viện</label>
											</td>
											<td> </td>
										</tr>
									</table><br>
									<table width="100%" cellpadding="0" cellspacing="0">
										<tr style="background:#00397C;height:30px;">
											<td colspan="4" style="color:#FFF;font-weight:bold;padding-left:4px;">MÔ TẢ NGẮN (DƯỚI 500 KÝ TỰ)</td>
										</tr>
										<tr>
											<td>Hình ảnh (450px * 300px)
												<input id="FileUpload1" type="file" name="FileUpload1">
												<input id="btUpload" type="submit" value="Upload" name="btUpload">
											</td>
										</tr>
									</table><br>
									<table width="100%" cellpadding="0" cellspacing="0" border="0">
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