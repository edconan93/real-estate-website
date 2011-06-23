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
											<p style="font-size:20pt;"><b>Thông tin thành viên</b></p>
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
											<p style="font-size:20pt;"><b>Chức năng</b></p>
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
												<a href="dangtin.php">Đăng tin nhà đất</a>
											</p>
											<p class="menu_item">
												<a href="">Các tin đã đăng</a><br>
												<span>
													_ <a href="">Tin đã duyệt (0)</a><br>
													_ <a href="">Tin chờ duyệt (3)</a><br>
													_ <a href="">Tin hết hạn (0)</a><br>
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
									CĂN HỘ NỔI BẬT</div>
								<hr style="color: rgb(211, 232, 248);" width="680" size="1">
								<div class="mid_content">
									<div class="bg_r" style="border: 1px solid rgb(172, 172, 172); padding: 0px; z-index: auto;"><form name="sortby" method="post" action="http://www.nhaban.com/member/listing.php">
	<table cellspacing="1" cellpadding="5" align="center" style="margin: 3px;">
	  <tbody><tr><td>Mã số tin<br><input type="text" style="width: 100px;" value="" name="mls"></td>
		<td>Nhu cầu<br>
		    <select style="width: 120px;" name="loaitin">
            <option value="ANY">tất cả</option><option value="1">Cần Bán</option><option value="2">Cần Mua</option><option value="5">Cần Thuê</option><option value="3">Cho Thuê</option></select> 
		</td><td>Danh muc<br>
		    <select style="width: 150px;" name="category">
            <option value="ANY">tất cả</option><option value="4">Biệt thự</option><option value="15">Các loại khác</option><option value="2">Cửa hàng, Văn phòng</option><option value="5">Chung cư, Căn hộ</option><option value="3">Mặt bằng</option><option value="10">Nhà cấp 4, Tập thể</option><option value="17">Nhà hàng, Khách sạn</option><option value="16">Nhà Phố</option><option value="19">Nhà Xưởng</option><option value="18">Phòng Trọ, Nhà Nghỉ</option><option value="9">Đất ở, Đất thổ cư</option><option value="6">Đất chia lô, Dự án</option><option value="12">Đất nông nghiệp</option><option value="11">Đất trang trại</option></select> 
		</td>
		<td>Địa phương<br>
		    <select style="width: 120px;" name="location">
            <option value="ANY">tất cả</option><option value="27">An Giang</option><option value="44">Bà Rịa Vũng Tàu</option><option value="12">Bình Dương</option><option value="32">Bình phước</option><option value="39">Bình Thuận</option><option value="33">Bình Định</option><option value="26">Bạc Liêu</option><option value="35">Bắc Cạn</option><option value="20">Bắc Giang</option><option value="19">Bắc Ninh</option><option value="55">Bến Tre</option><option value="25">Cà Mau</option><option value="36">Cao Bằng</option><option value="6">Cần Thơ</option><option value="41">Gia Lai</option><option value="67">Hà Giang</option><option value="15">Hà Nam</option><option value="2">Hà Nội</option><option value="11">Hà Tĩnh</option><option value="51">Hòa Bình</option><option value="17">Hải Dương</option><option value="7">Hải Phòng</option><option value="52">Hậu Giang</option><option value="4">Huế</option><option value="18">Hưng Yên</option><option value="13">Khánh Hoà</option><option value="47">Kiên Giang</option><option value="66">Kon Tum</option><option value="43">Lâm Đồng</option><option value="70">Lào Cai</option><option value="34">Lạng Sơn</option><option value="24">Long An</option><option value="8">Nam Định</option><option value="9">Nghệ An</option><option value="16">Ninh Bình</option><option value="38">Ninh Thuận</option><option value="22">Phú Thọ</option><option value="54">Phú Yên</option><option value="65">Quảng Bình</option><option value="64">Quảng Nam</option><option value="57">Quảng Ngãi</option><option value="23">Quảng Ninh</option><option value="63">Quảng Trị</option><option value="46">Sóc Trăng</option><option value="62">Sơn La</option><option value="45">Tây Ninh</option><option value="59">Thái Bình</option><option value="58">Thái Nguyên</option><option value="10">Thanh Hoá</option><option value="48">Tiền Giang</option><option value="3">TP. Hồ Chí Minh</option><option value="56">Trà Vinh</option><option value="60">Tuyên Quang</option><option value="49">Vĩnh Long</option><option value="21">Vĩnh Phúc</option><option value="37">Yên Bái</option><option value="5">Đà Nẵng</option><option value="42">Đắc Lắc</option><option value="40">Đắc Nông</option><option value="50">Đồng Nai</option><option value="68">Đồng Tháp</option><option value="69">Điện Biên</option></select> 
	  </td>
	<td><br><input type="submit" style="height: 20px;" class="button_submit" value="Tìm kiếm" name="catsearch"></td>
	</tr> 
	  </tbody></table>
	  	</form><table width="100%" cellspacing="0" cellpadding="4" border="0"><tbody><tr bgcolor="#e1e9f1"><td width="60" valign="top" align="center"><b>Mã số</b></td>
				<td align="left" style="border-left: 1px solid rgb(204, 204, 204);"><img align="left" style="border: medium none;" src="images/home.png"><b>Tin rao</b></td>
				<td style="border-left: 1px solid rgb(204, 204, 204); font-weight: bold;"><img align="left" style="border: medium none;" src="images/options3.png">Quản lý</td></tr><tr bgcolor="#ffffff">
			  <td width="60" valign="middle" align="center" id="member_tool"><b>677638</b></td><td valign="top" align="left" style="border-left: 1px solid rgb(204, 204, 204); border-bottom: 1px solid rgb(204, 204, 204);">
			 <span style="color: rgb(255, 0, 0);">Tin đăng chờ duyệt</span><br><b>Bán nhà gấp</b><div style="float: right;"><b style="color: rgb(255, 0, 0);">Chờ duyệt</b></div><br>
			 - <a target="_blank" href="http://www.nhaban.com/nha-dat/?loaitin=1">Cần Bán</a>
			 - <a target="_blank" href="http://www.nhaban.com/nha-dat/?category=2">Cửa hàng, Văn phòng</a> 
			 - <a target="_blank" href="http://www.nhaban.com/nha-dat/?vt=7">Mặt tiền</a>
			  - Hướng Bắc<br>
		  <b> - Giá: <script type="text/javascript">document.write(NBO_Price("7000000000"))</script><b>7</b> Tỷ - 
			 KT: 4 x 20m - DTXD : 90 m<sup>2</sup> </b><br></td><td width="260" valign="top" style="border-left: 1px solid rgb(204, 204, 204); border-bottom: 1px solid rgb(204, 204, 204);"><div style="float: right; margin-bottom: 5px; font-weight: normal; color: rgb(51, 51, 51);">- 1 lượt xem tin <br>- Ngày đăng: &nbsp;&nbsp;&nbsp;&nbsp;23-06-2011<br>- Ngày hết hạn: 17-08-2011<br></div><div style="float: right; padding: 3px; background-color: rgb(242, 245, 249); border: 1px solid rgb(204, 204, 204); font-weight: bold;"><b title="23-06-2011" style="color: green;"><img align="center" style="margin: 0px;" src="images/action_check2.png">Đã cập nhật</b> <a href="http://www.nhaban.com/member/submit.php?id=677638&amp;act=nha&amp;step=1"><img align="center" style="margin: 0px;" src="images/edit.png"><b>Sửa tin</b></a>
				<a onclick="if(confirm('Bạn chắc chắn muốn xóa tin đăng này ?') ) document.location.href='http://www.nhaban.com/member/listing.php?id=677638&amp;act=delete'" href="#">
				<img align="center" style="margin: 0px;" src="images/action_delete2.png"><b>Xóa tin</b></a></div></td></tr></tbody></table><div align="center" id="pagenate"><br><br><br></div></div>
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