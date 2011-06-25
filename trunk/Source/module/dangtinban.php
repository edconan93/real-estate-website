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
<!--BEGIN -->		
<div id="frmDangTin" name ="frmDangTin">				
						<td style="padding: 10px;" valign="top">						
							<div style="width: 686px;">
								<div id="messLoaiDangTin" name="messLoaiDangTin" style="margin-left: 10px; margin-top: 10px; font-family: tahoma; font-size: 18px;font-weight: bold; color:#890C29;">
									Đăng Tin Cần Bán</div>
								<hr style="color: rgb(211, 232, 248);" width="680" size="1">
								<div class="mid_content">
									<div class="notice">
										<span class="badge"></span>
										<div style="background-color: #FFFFFF; border: 1px solid #DDDDDD;margin: 10px; padding: 10px 20px;" class="innerBox">
											<ul style="list-style: none outside none;padding-left:0;">
												<li><b>Để sử dụng các tính năng nâng cao và dễ dàng quản lý tin đăng, xin vui lòng đăng nhập trước khi đăng tin.</b>
												</li>
												<li><b>Xin vui lòng tham khảo các <a href="noiquidangtin.php" style="text-decoration:underline;color:red;font-size:11px;"> 
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
												<p id="messTenLoai" name="messTenLoai"><b>Cần bán</b>
												&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Loại bđs :
												<select id="cbbLoaiGiaoDich" name="cbbLoaiGiaoDich" class="DropDownList" >
													<option value="1">Biệt Thự</option>
													<option value="2" selected="selected">Căn hộ chung cư</option>
													<option value="3">Căn hộ cao cấp</option>
													<option value="8">Nhà Phố</option>
													<option value="9">Văn phòng cho thuê</option>
												</select>
												</td>
										</tr>
										<tr>
											<td width="200px"><b>Tiêu đề tin:</b><span style="color:red;"> *</span></td>
											<td><input name="txtTieuDeTin" id="TieuDeTin" type="text" style="width:300px;" value=""></td>
										</tr>
										<tr>
											<td>Số nhà / Số lô, Tên đường:</td>
											<td><input name="txtTenDuong" id="txtTenDuong" type="text" style="width:300px;" value=""></td>
										</tr>
										<tr>
											<td width="200px"><b>Tỉnh/Thành Phố:</b><span style="color:red;"> *</span></td>
											<td>
												<select id="cbbTinhTP" name="cbbTinhTP" class="DropDownList" onchange="javascript:setTimeout('__doPostBack(\'ddlCity\',\'\')', 0)" name="ddlCity">
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
												<select id="cbbQuanHuyen" id="cbbQuanHuyen" class="DropDownList" name="ddlDistric">
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
												<input id="txtGia" name="txtGia" class="Textbox" type="text" style="width:150px;text-align: right;" onkeyup="this.value = FormatNumber(this.value);" >
												<select id="cbbLoaiTien" class="DropDownList" name="cbbLoaiTien">
													<option value="1" selected="selected">VNĐ</option>
													<option value="2">USD</option>
													<option value="3">SJC</option>
												</select>
												<select id="cbbDonViTinh" name="cbbDonViTinh" class="DropDownList" >
													<option value="3" selected="selected">Tháng</option>
													<option value="2">m²</option>
													<option value="1">Tổng diện tích</option>
												</select>
											</td>
										</tr>
										<tr>
											<td>Thời hạn đăng tin:</td>
											<td>
												<select id="cbbThoiGianThue" name="cbbThoiGianThue" class="DropDownList" onchange="javascript:setTimeout('__doPostBack(\'ddlExpireDate\',\'\')', 0)" >
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
											<td><input type="text" id="txtNgayHetHan" name="txtNgayHetHan" style="width:70px;" value="" disabled="disabled"></td>
										</tr>
									</table><br>
									<table class="table" width="100%" cellpadding="0" cellspacing="0">
										<tr style="background:#00397C;height:30px;">
											<td colspan="4" style="color:#FFF;font-weight:bold;padding-left:4px;">THÔNG TIN BẤT ĐỘNG SẢN</td>
										</tr>
										<tr>
											<td width="200px"><b>Diện tích:</b><span style="color:red;"> *</span></td>
											<td>
												<input id="txtDienTich" name="txtDienTich" class="Textbox" type="text" style="width:40px;" >
													m<sup>2</sup>
											</td>
											<td>
												Tầng:<span style="color:red;"> *</span>
											</td>
											<td>
												<input id="txtTang" name="txtTang" class="Textbox" type="text" style="width:40px;" >
											</td>
										</tr>
										<tr>
											<td width="200px">Số phòng ngủ:</td>
											<td>
												<input id="txtPhongNgu" name="txtPhongNgu" class="Textbox" type="text" style="width:40px;" >
											</td>
											<td>
												Số phòng WC/Tắm:
											</td>
											<td>
												<input id="txtPhongTam"  name="txtPhongTam" class="Textbox" type="text" style="width:40px;">
											</td>
										</tr>
										<tr>
											<td width="200px">Tình trạng pháp lý:</td>
											<td>
												<select id="cbbPhapLy" name="cbbPhapLy" class=" DropDownList" >
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
												<select id="cbbHuongNha" name="cbbHuongNha" class="DropDownList" >
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
									<table class="table" width="100%" cellpadding="0" cellspacing="0">
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
									<table class="table" width="100%" cellpadding="0" cellspacing="0">
										<tr style="background:#00397C;height:30px;">
											<td colspan="4" style="color:#FFF;font-weight:bold;padding-left:4px;">MÔ TẢ NGẮN (DƯỚI 500 KÝ TỰ)</td>
										</tr>
										<tr>
											<td>
											<?php
												$path = rtrim($_SERVER['PHP_SELF'],"e/module/dangtinban.php/")."e/library/fckeditor/";
												include("../library/fckeditor/fckeditor.php");
												$summary = new FCKeditor("summary");
												$summary->BasePath = $path;
												$summary->Height=300;
												$summary->Value = "";
												$summary->Create();
											?>
											Hình ảnh (450px * 300px)
												<input id="txtUpload" type="file" name="txtUpload" class="button_submit">
												<input id="bttUpload" type="submit" value="Upload" name="bttUpload" class="ButtonWithbackground">
											</td>
										</tr>
									</table><br>
									<table class="table" width="100%" cellpadding="2" cellspacing="2" border="0">
									<!--table cellspacing="2" cellpadding="2" width="98%"-->
										<tr style="background:#00397C;height:30px;">
											<td colspan="2" style="color:#FFF;font-weight:bold;padding-left:4px;">THÔNG TIN LIÊN HỆ</td>
										</tr>
										
										<tr bgcolor="#F2F5F9">
											<td align="left">Thông tin liên hệ:</td>
											<td align="left" colspan="3"></td>
										</tr>
										<tr bgcolor="#F2F5F9">
											<td align="left">Họ và Tên: </td>
											<td align="left" colspan="3">attackA0</td>
										</tr>
										<tr bgcolor="#F2F5F9">
											<td align="left">Địa chỉ liên lạc: </td>
											<td id="tdDiaChi" name="tdDiaChi">763/5/4/30 đường Trường Chinh,P.Tây Thạnh, Quận Tân Phú</td>
										</tr>
										<tr bgcolor="#F2F5F9">
											<td align="left">Số điện thoại: </td>
											<td align="left" colspan="3">0976937118 - Mobile: 0976937118</td>
										</tr>
										<tr bgcolor="#F2F5F9">
											<td align="left">Email liên lạc: </td>
											<td></td>
										</tr>
										
										
									</table>
									
									<div class="submit" style="border-top: 1px solid #999; padding: 10px 0 0 0; margin: 15px 0 0 0;">
									<center>
										<input id="btSave" class="ButtonWithbackground" type="submit" value="Đăng tin" name="btSave">
									</center>
								    </div>
							</div>
						</td>				
<!--END PROCESS-->
</div>
					</tr>
				</table>
			</td>
		</tr>
	</table>
<?php
	include("../include/footer.php");
?>