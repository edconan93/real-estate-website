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
<!--form -->
<form action="user/xulytindv.php" method="post" name="frmXuLyTinDV" id="frmXuLyTinDV" >		
						<td style="padding: 10px;" valign="top">
							<div style="width: 686px;">
								<div style="margin-left: 10px; margin-top: 10px; font-family: tahoma; font-size: 18px;
									font-weight: bold; color:#890C29;" id="messLoaiTinDang" name="messLoaiTinDang">
									<?php
											if(isset($_REQUEST["type"]) && $_REQUEST["type"] == 1)
												echo "TIN ĐÃ DUYỆT.";
											else if(isset($_REQUEST["type"]) && $_REQUEST["type"] == 2)
												echo "TIN CHỜ DUYỆT.";
											else if(isset($_REQUEST["type"]) && $_REQUEST["type"] == 3)
												echo "TIN ĐÃ HẾT HẠN.";
											else
												echo "CÁC TIN ĐÃ ĐĂNG.";
										?>
									
								</div>
								<hr style="color: rgb(211, 232, 248);" width="680" size="1">
								<div class="mid_content">
									<b>
										<?php
											if(isset($_REQUEST["type"]) && $_REQUEST["type"] == 1)
												echo "Có 1 tin đã duyệt.";
											else if(isset($_REQUEST["type"]) && $_REQUEST["type"] == 2)
												echo "Có 3 tin chờ duyệt.";
											else if(isset($_REQUEST["type"]) && $_REQUEST["type"] == 3)
												echo "Có 2 tin đã hết hạn.";
											else
												echo "Có 6 tin đã đăng.";
										?>
									</b>
									<div class="bg_r" style="border: 1px solid rgb(172, 172, 172); padding: 0px; z-index: auto;">
										<form name="sortby" method="post" action="http://www.nhaban.com/member/listing.php">
											<table cellspacing="1" cellpadding="5" align="center" style="margin: 3px;">
												<tr>
													<td>
														Mã số tin<br>
														<input type="text" style="width: 100px;" value="" name="mls">
													</td>
													<td>
														Nhu cầu<br>
														<select style="width: 120px;" name="loaitin">
															<option value="ANY">tất cả</option>
															<option value="1">Cần Bán</option>
															<option value="2">Cần Mua</option>
															<option value="5">Cần Thuê</option>
															<option value="3">Cho Thuê</option>
														</select>
													</td>
													<td>
														Danh muc<br>
														<select style="width: 150px;" name="category">
															<option value="ANY">tất cả</option>
															<?php
																include("../BUS/LoaiNhaBUS.php");
																$rs=LoaiNhaBUS::GetAllLoaiNha();
																for($i=0;$i<count($rs);$i++)
																{		
																	echo "<option value='".($i+1)."'>".$rs[$i][1]."</option>";	
																}
															?>
														</select>
													</td>
													<td>
														Địa phương<br>
														<select style="width: 120px;" name="location">
															<option value="ANY">tất cả</option>
															<?php
																include("../BUS/TinhBUS.php");
																$rs=TinhBUS::GetAllTinh();
																for($i=0;$i<count($rs);$i++)
																{		
																	echo "<option value='".($i+1)."'>".$rs[$i][1]."</option>";	
																}
															?>	
														</select>
													</td>
													<td>
														<br>
														<input type="submit" style="height: 20px;" class="button_submit" value="Tìm kiếm"
															name="catsearch">
													</td>
												</tr>
											</table>
										</form>
										<table width="100%" cellspacing="0" cellpadding="4" border="0">
											<tr bgcolor="#e1e9f1">
												<td width="60" valign="top" align="center" style="border-top:1px solid #CCCCCC;">
													<b>Mã số</b>
												</td>
												<td align="left" style="border-left: 1px solid rgb(204, 204, 204); border-top:1px solid #CCCCCC;">
													<img align="left" style="border: medium none;" src="../images/home1.png">&nbsp;<b>Tin rao</b>
												</td>
												<td style="border-left: 1px solid rgb(204, 204, 204); font-weight: bold;border-top:1px solid #CCCCCC;">
													<img align="left" style="border: medium none;margin-top:2px;" src="../images/options3.png">&nbsp;<b>Quản lý</b>
												</td>
											</tr>
											<?php
												if(isset($_REQUEST["type"]) && $_REQUEST["type"] == 1)
												{
													for($i=0;$i<1;$i++)
													{
											?>
														<!--tr bgcolor="#ffffff">
															<td width="60" valign="middle" align="center" style="border-bottom:solid 1px #CCCCCC;">
																<b>677638</b>
															</td>
															<td valign="top" align="left" style="border-left: 1px solid rgb(204, 204, 204); border-bottom: 1px solid rgb(204, 204, 204);">
																<span style="color: rgb(255, 0, 0);">Tin đã duyệt</span><br>
																<b>Bán nhà gấp</b>
																<br>
																- <a target="_blank" href="http://www.nhaban.com/nha-dat/?loaitin=1">Cần Bán</a>
																- <a target="_blank" href="http://www.nhaban.com/nha-dat/?category=2">Cửa hàng, Văn
																	phòng</a> - <a target="_blank" href="http://www.nhaban.com/nha-dat/?vt=7">Mặt tiền</a>
																- Hướng Bắc<br>
																<b>- Giá:

																	<script type="text/javascript">document.write(NBO_Price("7000000000"))</script>

																	<b>7</b> Tỷ - KT: 4 x 20m - DTXD : 90 m<sup>2</sup> </b>
																<br>
															</td>
															<td width="260" valign="top" style="border-left: 1px solid rgb(204, 204, 204); border-bottom: 1px solid rgb(204, 204, 204);">
																<div style="margin-bottom: 5px; font-weight: normal; color: rgb(51, 51, 51);">
																	- 1 lượt xem tin
																	<br>
																	- Ngày đăng: &nbsp;&nbsp;&nbsp;&nbsp;23-06-2011<br>
																	- Ngày hết hạn: 17-08-2011<br>
																</div>
																<div style="padding: 3px; background-color: rgb(242, 245, 249); border: 1px solid rgb(204, 204, 204);
																	font-weight: bold;">
																	<b title="23-06-2011" style="color: green;">
																		<img align="center" style="margin: 0px;position:relative;top:-4px;" src="../images/action_check2.png">Đã cập nhật</b>&nbsp;&nbsp;
																	<a href="http://www.nhaban.com/member/submit.php?id=677638&amp;act=nha&amp;step=1">
																		<img align="center" style="margin: 0px;position:relative;top:-4px;" src="../images/edit.png"><b>Sửa tin</b></a>&nbsp;&nbsp;
																	<a onclick="if(confirm('Bạn chắc chắn muốn xóa tin đăng này ?') ) document.location.href='http://www.nhaban.com/member/listing.php?id=677638&amp;act=delete'"
																		href="#">
																		<img align="center" style="margin: 0px;position:relative;top:-4px;" src="../images/action_delete2.png"><b>Xóa tin</b></a></div>
															</td>
														</tr-->
											<?php
													}
												}
												else if(isset($_REQUEST["type"]) && $_REQUEST["type"] == 2)
												{
													for($i=0;$i<3;$i++)
													{
											?>
														<!--tr bgcolor="#ffffff">
															<td width="60" valign="middle" align="center" style="border-bottom:solid 1px #CCCCCC;">
																<b>677638</b>
															</td>
															<td valign="top" align="left" style="border-left: 1px solid rgb(204, 204, 204); border-bottom: 1px solid rgb(204, 204, 204);">
																<span style="color: rgb(255, 0, 0);">Tin chờ duyệt</span><br>
																<b>Bán nhà gấp</b>
																<br>
																- <a target="_blank" href="http://www.nhaban.com/nha-dat/?loaitin=1">Cần Bán</a>
																- <a target="_blank" href="http://www.nhaban.com/nha-dat/?category=2">Cửa hàng, Văn
																	phòng</a> - <a target="_blank" href="http://www.nhaban.com/nha-dat/?vt=7">Mặt tiền</a>
																- Hướng Bắc<br>
																<b>- Giá:

																	<script type="text/javascript">document.write(NBO_Price("7000000000"))</script>

																	<b>7</b> Tỷ - KT: 4 x 20m - DTXD : 90 m<sup>2</sup> </b>
																<br>
															</td>
															<td width="260" valign="top" style="border-left: 1px solid rgb(204, 204, 204); border-bottom: 1px solid rgb(204, 204, 204);">
																<div style="margin-bottom: 5px; font-weight: normal; color: rgb(51, 51, 51);">
																	- 1 lượt xem tin
																	<br>
																	- Ngày đăng: &nbsp;&nbsp;&nbsp;&nbsp;23-06-2011<br>
																	- Ngày hết hạn: 17-08-2011<br>
																</div>
																<div style="padding: 3px; background-color: rgb(242, 245, 249); border: 1px solid rgb(204, 204, 204);
																	font-weight: bold;">
																	<b title="23-06-2011" style="color: green;">
																		<img align="center" style="margin: 0px;position:relative;top:-4px;" src="../images/action_check2.png">Đã cập nhật</b>&nbsp;&nbsp;
																	<a href="http://www.nhaban.com/member/submit.php?id=677638&amp;act=nha&amp;step=1">
																		<img align="center" style="margin: 0px;position:relative;top:-4px;" src="../images/edit.png"><b>Sửa tin</b></a>&nbsp;&nbsp;
																	<a onclick="if(confirm('Bạn chắc chắn muốn xóa tin đăng này ?') ) document.location.href='http://www.nhaban.com/member/listing.php?id=677638&amp;act=delete'"
																		href="#">
																		<img align="center" style="margin: 0px;position:relative;top:-4px;" src="../images/action_delete2.png"><b>Xóa tin</b></a></div>
															</td>
														</tr-->
											<?php
													}
												}
												else if(isset($_REQUEST["type"]) && $_REQUEST["type"] == 3)
												{
													for($i=0;$i<2;$i++)
													{
											?>
														<!--tr bgcolor="#ffffff">
															<td width="60" valign="middle" align="center" style="border-bottom:solid 1px #CCCCCC;">
																<b>677638</b>
															</td>
															<td valign="top" align="left" style="border-left: 1px solid rgb(204, 204, 204); border-bottom: 1px solid rgb(204, 204, 204);">
																<span style="color: rgb(255, 0, 0);">Tin hết hạn</span><br>
																<b>Bán nhà gấp</b>
																<br>
																- <a target="_blank" href="http://www.nhaban.com/nha-dat/?loaitin=1">Cần Bán</a>
																- <a target="_blank" href="http://www.nhaban.com/nha-dat/?category=2">Cửa hàng, Văn
																	phòng</a> - <a target="_blank" href="http://www.nhaban.com/nha-dat/?vt=7">Mặt tiền</a>
																- Hướng Bắc<br>
																<b>- Giá:

																	<script type="text/javascript">document.write(NBO_Price("7000000000"))</script>

																	<b>7</b> Tỷ - KT: 4 x 20m - DTXD : 90 m<sup>2</sup> </b>
																<br>
															</td>
															<td width="260" valign="top" style="border-left: 1px solid rgb(204, 204, 204); border-bottom: 1px solid rgb(204, 204, 204);">
																<div style="margin-bottom: 5px; font-weight: normal; color: rgb(51, 51, 51);">
																	- 1 lượt xem tin
																	<br>
																	- Ngày đăng: &nbsp;&nbsp;&nbsp;&nbsp;23-06-2011<br>
																	- Ngày hết hạn: 17-08-2011<br>
																</div>
																<div style="padding: 3px; background-color: rgb(242, 245, 249); border: 1px solid rgb(204, 204, 204);
																	font-weight: bold;">
																	<b title="23-06-2011" style="color: green;">
																		<img align="center" style="margin: 0px;position:relative;top:-4px;" src="../images/action_check2.png">Đã cập nhật</b>&nbsp;&nbsp;
																	<a href="http://www.nhaban.com/member/submit.php?id=677638&amp;act=nha&amp;step=1">
																		<img align="center" style="margin: 0px;position:relative;top:-4px;" src="../images/edit.png"><b>Sửa tin</b></a>&nbsp;&nbsp;
																	<a onclick="if(confirm('Bạn chắc chắn muốn xóa tin đăng này ?') ) document.location.href='http://www.nhaban.com/member/listing.php?id=677638&amp;act=delete'"
																		href="#">
																		<img align="center" style="margin: 0px;position:relative;top:-4px;" src="../images/action_delete2.png"><b>Xóa tin</b></a></div>
															</td>
														</tr-->
											<?php
													}
												}
												else
												{
													include_once("/user/xulycacloaitin.php");
													echo MessageTypeProcessor::loadAllMessage();
                                    
											?>
														
											<?php
													
												}
											?>
										</table>
									</div>
								</div>
							</div>
						</td>
</form>
<!-- End form -->
					</tr>
				</table>
			</td>
		</tr>
	</table>
<?php
	include("../include/footer.php");
?>