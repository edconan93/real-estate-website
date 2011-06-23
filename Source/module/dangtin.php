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
									Đăng Tin</div>
								<hr style="color: rgb(211, 232, 248);" width="680" size="1">
								<div class="mid_content">
									<div id="content" class="bg_r">
										<table cellspacing="0" cellpadding="0" border="0" align="center" width="655">
											<div class="postNewsPage">
											<table>
												<tbody>
												<tr>
												<td valign="top">
												<b></b>
												<div class="groupInfo">
												  <span>thông tin</span>
												</div>
												<table class="NewPropertyTable" cellspacing="0" cellpadding="0">
												<tbody>
													<tr>
													<td>
													<b>Tiêu đề tin </b>
													<span class="red">*</span>
													:
													</td>
													<td>
													<input id="ctl00_MainContent_ctl00_tbTitle" class="Textbox" type="text" style="width:300px;" maxlength="70" name="ctl00$MainContent$ctl00$tbTitle">
													<span id="ctl00_MainContent_ctl00_RequiredFieldValidator1" style="color:Red;visibility:hidden;">*</span>
													</td>
													<td> &nbsp; </td>
													</tr>
													<tr>
														<td>
														<b>Loại Giao dịch</b>
														<span class="red">*</span>
														:
														</td>
														<td>
														<select id="ctl00_MainContent_ctl00_ddlTransactionType" class="DropDownList" name="ctl00$MainContent$ctl00$ddlTransactionType">
														<option value="1">Cần bán</option>
														<option value="2">Cần mua</option>
														<option value="3">Cho thuê</option>
														<option value="4">Cần thuê</option>
														</select>
														&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Loại bđs :
														<select id="ctl00_MainContent_ctl00_ddlPropertyType" class="DropDownList" name="ctl00$MainContent$ctl00$ddlPropertyType">
														<option value="1">Biệt Thự</option>
														<option value="2" selected="selected">Căn hộ chung cư</option>
														<option value="3">Căn hộ cao cấp</option>
														<option value="8">Nhà Phố</option>
														<option value="9">Văn phòng cho thuê</option>
														</select>
														</td>
														<td> &nbsp; </td>
													</tr>
													<tr>
														<td> Thuộc dự án : </td>
														<td>
														<input id="ctl00_MainContent_ctl00_tbProject" class="Textbox" type="text" style="width:300px;" autocomplete="off" onkeypress="if (WebForm_TextBoxKeyHandler(event) == false) return false;" onchange="javascript:setTimeout('__doPostBack(\'ctl00$MainContent$ctl00$tbProject\',\'\')', 0)" name="ctl00$MainContent$ctl00$tbProject">
														<ul id="AutoCompleteEx_completionListElem" style="text-align: left; visibility: hidden; cursor: default; list-style: none outside none; padding: 0px; border: 1px solid buttonshadow; background-color: window; color: windowtext; position: absolute;"></ul>
														</td>
														<td> &nbsp; </td>
														</tr>
														<tr>
														<td>
														<b>Tỉnh/Thành Phố</b>
														:
														</td>
														<td>
														<select id="ctl00_MainContent_ctl00_ddlCity" class="DropDownList" onchange="javascript:setTimeout('__doPostBack(\'ctl00$MainContent$ctl00$ddlCity\',\'\')', 0)" name="ctl00$MainContent$ctl00$ddlCity">
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
														<td> &nbsp; </td>
													</tr>
													<tr>
														<td>
														<b>Quận/Huyện</b>
														<span class="red">*</span>
														:
														</td>
														<td>
														<select id="ctl00_MainContent_ctl00_ddlDistric" class="DropDownList" name="ctl00$MainContent$ctl00$ddlDistric">
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
														<td> &nbsp; </td>
													</tr>
													<tr>
														<td>
														<b>Giá </b>
														<span class="red">*</span>
														</td>
														<td>
														<input id="ctl00_MainContent_ctl00_tbPrice" class="Textbox" type="text" style="width:150px;text-align: right;" onkeyup="this.value = FormatNumber(this.value);" name="ctl00$MainContent$ctl00$tbPrice">
														<span id="ctl00_MainContent_ctl00_RequiredFieldValidator3" style="color:Red;visibility:hidden;">*</span>
														<select id="ctl00_MainContent_ctl00_ddlMoneyUnit" class="DropDownList" onchange="javascript:setTimeout('__doPostBack(\'ctl00$MainContent$ctl00$ddlMoneyUnit\',\'\')', 0)" name="ctl00$MainContent$ctl00$ddlMoneyUnit">
														<option value="1" selected="selected">VNĐ</option>
														<option value="2">USD</option>
														<option value="3">SJC</option>
														</select>
														<select id="ctl00_MainContent_ctl00_ddlPricingType" class="DropDownList" onchange="javascript:setTimeout('__doPostBack(\'ctl00$MainContent$ctl00$ddlPricingType\',\'\')', 0)" name="ctl00$MainContent$ctl00$ddlPricingType">
														<option value="3" selected="selected">Tháng</option>
														<option value="2">m²</option>
														<option value="1">Tổng diện tích</option>
														</select>
														</td>
														<td> &nbsp; </td>
													</tr>
													<tr>
														<td> Khuyến mãi </td>
														<td>
														<input id="ctl00_MainContent_ctl00_tbKhuyenMai" class="Textbox" type="text" style="width:300px;" name="ctl00$MainContent$ctl00$tbKhuyenMai">
														</td>
														<td> &nbsp; </td>
														</tr>
														<tr>
														<td class="style3"> Thời hạn đăng tin : </td>
														<td class="style3">
														<select id="ctl00_MainContent_ctl00_ddlExpireDate" class="DropDownList" onchange="javascript:setTimeout('__doPostBack(\'ctl00$MainContent$ctl00$ddlExpireDate\',\'\')', 0)" name="ctl00$MainContent$ctl00$ddlExpireDate">
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
														<td class="style3"> </td>
													</tr>
													<tr>
														<td> Ngày hết hạn : </td>
														<td>
														<input id="ctl00_MainContent_ctl00_tbExpireDate" class="Textbox" type="text" disabled="disabled" value="22/08/2011" name="ctl00$MainContent$ctl00$tbExpireDate">
														</td>
														<td> &nbsp; </td>
													</tr>
													<tr>
														<td> &nbsp; </td>
														<td> &nbsp; </td>
														<td> &nbsp; </td>
													</tr>
												</tbody>
											    </table>
												
												<div class="groupInfo"> Thông tin bất động sản </div>
													<table class="NewPropertyTable" cellspacing="0" cellpadding="0">
													<tbody>
													<tr>
														<td style="width: 145px;">
														<b>Diện tích</b>
														<span class="red">*</span>
														:
														</td>
														<td>
														<input id="ctl00_MainContent_ctl00_tb_dientich" class="Textbox" type="text" style="width:40px;" name="ctl00$MainContent$ctl00$tb_dientich">
														m
														<sup>2</sup>
														<input id="ctl00_MainContent_ctl00_DTKV_Dai_TextBoxWatermarkExtender_ClientState" type="hidden" name="ctl00$MainContent$ctl00$DTKV_Dai_TextBoxWatermarkExtender_ClientState">
														<span id="ctl00_MainContent_ctl00_RequiredFieldValidator2" style="color:Red;visibility:hidden;">*</span>
														</td>
														<td>
														Tầng
														<span class="red">*</span>
														:
														</td>
														<td>
														<input id="ctl00_MainContent_ctl00_tbTang" class="Textbox" type="text" style="width:40px;" name="ctl00$MainContent$ctl00$tbTang">
														<select id="ctl00_MainContent_ctl00_ddlTang" class="nonedisplay DropDownList" name="ctl00$MainContent$ctl00$ddlTang"> </select>
														</td>
													</tr>
													<tr>
														<td> Số phòng ngủ : </td>
														<td>
														<input id="ctl00_MainContent_ctl00_tbBedroom" class="Textbox" type="text" style="width:40px;" name="ctl00$MainContent$ctl00$tbBedroom">
														<select id="ctl00_MainContent_ctl00_ddlBedroom" class="nonedisplay DropDownList" name="ctl00$MainContent$ctl00$ddlBedroom"> </select>
														</td>
														<td> Số phòng WC/Tắm : </td>
														<td>
														<input id="ctl00_MainContent_ctl00_tbBathroom" class="Textbox" type="text" style="width:40px;" name="ctl00$MainContent$ctl00$tbBathroom">
														<select id="ctl00_MainContent_ctl00_ddlBathroom" class="nonedisplay DropDownList" name="ctl00$MainContent$ctl00$ddlBathroom"> </select>
														</td>
													</tr>
													<tr>
														<td> Tình trạng pháp lý: </td>
														<td>
														<select id="ctl00_MainContent_ctl00_ddlLegalStatus" class=" DropDownList" name="ctl00$MainContent$ctl00$ddlLegalStatus">
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
														<td> Hướng nhà: </td>
														<td>
														<select id="ctl00_MainContent_ctl00_ddlDirection" class="DropDownList" name="ctl00$MainContent$ctl00$ddlDirection">
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
													</tbody>
												</table>
												<div class="groupInfo"> Các tiện ích </div>
												<table class="NewPropertyTable" cellspacing="0" cellpadding="0">
													<tbody>
														<tr>
															<td>
															<input id="ctl00_MainContent_ctl00_cbTienNghi" type="checkbox" name="ctl00$MainContent$ctl00$cbTienNghi">
															<label for="ctl00_MainContent_ctl00_cbTienNghi"> Đầy đủ tiện nghi</label>
															</td>
															<td>
															<input id="ctl00_MainContent_ctl00_cbChoDauXe" type="checkbox" name="ctl00$MainContent$ctl00$cbChoDauXe">
															<label for="ctl00_MainContent_ctl00_cbChoDauXe"> Chỗ đậu xe hơi</label>
															</td>
															<td>
															<input id="ctl00_MainContent_ctl00_cbSanVuon" type="checkbox" name="ctl00$MainContent$ctl00$cbSanVuon">
															<label for="ctl00_MainContent_ctl00_cbSanVuon"> Sân vườn</label>
															</td>
															<td>
															<input id="ctl00_MainContent_ctl00_cbHoBoi" type="checkbox" name="ctl00$MainContent$ctl00$cbHoBoi">
															<label for="ctl00_MainContent_ctl00_cbHoBoi"> Hồ bơi</label>
															</td>
															</tr>
													   <tr>
													   <td>
															<input id="ctl00_MainContent_ctl00_cbGanCongVien" type="checkbox" name="ctl00$MainContent$ctl00$cbGanCongVien">
															<label for="ctl00_MainContent_ctl00_cbGanCongVien"> Gần công viên</label>
															</td>
															<td>
															<input id="ctl00_MainContent_ctl00_cbDanTriCao" type="checkbox" name="ctl00$MainContent$ctl00$cbDanTriCao">
															<label for="ctl00_MainContent_ctl00_cbDanTriCao"> Khu dân trí cao</label>
															</td>
															<td>
															<input id="ctl00_MainContent_ctl00_cbGanBenhVien" type="checkbox" name="ctl00$MainContent$ctl00$cbGanBenhVien">
															<label for="ctl00_MainContent_ctl00_cbGanBenhVien"> Gần bệnh viện</label>
															</td>
															<td> </td>
														</tr>
													</tbody>
												</table>
												</td>
												</tr>
												<tr>
												<td>
												<div class="groupInfo"> Mô tả ngắn ( dưới 500 ký tự) </div>
												<textarea id="ctl00_MainContent_ctl00_ckEditor" style="height: 300px; width: 625px; display: 
												none;" cols="20" rows="2" name="ctl00$MainContent$ctl00$ckEditor"></textarea>
												<span id="cke_ctl00_MainContent_ctl00_ckEditor" class="cke_skin_kama cke_1 cke_editor_ctl00_MainContent_ctl00_ckEditor" lang="en" style="width: 613px;" aria-labelledby="cke_ctl00_MainContent_ctl00_ckEditor_arialbl" role="application" title=" " dir="ltr">
												<span id="cke_ctl00_MainContent_ctl00_ckEditor_arialbl" class="cke_voice_label">Rich Text Editor</span>
												<span class="cke_browser_gecko" role="presentation">
												<span class="cke_wrapper cke_ltr" role="presentation">
												<table class="cke_editor" cellspacing="0" cellpadding="0" border="0" role="presentation">
												<tbody>
												<tr role="presentation" style="-moz-user-select: none;">
													<td id="cke_top_ctl00_MainContent_ctl00_ckEditor" class="cke_top" role="presentation">
													<div class="cke_toolbox" onmousedown="return false;" aria-labelledby="cke_6" role="toolbar" style="">
													<span id="cke_6" class="cke_voice_label">Toolbar</span>
													<span id="cke_7" class="cke_toolbar" role="presentation">
													<span class="cke_toolbar_start"></span>
													<span class="cke_toolgroup" role="presentation">
													<span class="cke_button">
													<a id="cke_8" class="cke_off cke_button_bold" onclick="CKEDITOR.tools.callFunction(6, this); return false;" onfocus="return CKEDITOR.tools.callFunction(1, 0, event);" onkeydown="return CKEDITOR.tools.callFunction(0, 0, event);" onblur="this.style.cssText = this.style.cssText;" aria-labelledby="cke_8_label" role="button" hidefocus="true" tabindex="-1" title="Bold">
													<span class="cke_icon">&nbsp;</span>
													<span id="cke_8_label" class="cke_label">Bold</span>
													</a>
													</span>
													<span class="cke_button">
													<a id="cke_9" class="cke_off cke_button_italic" onclick="CKEDITOR.tools.callFunction(7, this); return false;" onfocus="return CKEDITOR.tools.callFunction(1, 1, event);" onkeydown="return CKEDITOR.tools.callFunction(0, 1, event);" onblur="this.style.cssText = this.style.cssText;" aria-labelledby="cke_9_label" role="button" hidefocus="true" tabindex="-1" title="Italic">
													<span class="cke_icon">&nbsp;</span>
													<span id="cke_9_label" class="cke_label">Italic</span>
													</a>
													</span>
													<span class="cke_separator" role="separator"></span>
													<span class="cke_toolgroup" role="presentation">
													<span class="cke_button">
													<a id="cke_10" class="cke_off cke_button_numberedlist" onclick="CKEDITOR.tools.callFunction(8, this); return false;" onfocus="return CKEDITOR.tools.callFunction(1, 2, event);" onkeydown="return CKEDITOR.tools.callFunction(0, 2, event);" onblur="this.style.cssText = this.style.cssText;" aria-labelledby="cke_10_label" role="button" hidefocus="true" tabindex="-1" title="Insert/Remove Numbered List">
													<span class="cke_icon">&nbsp;</span>
													<span id="cke_10_label" class="cke_label">Insert/Remove Numbered List</span>
													</a>
													</span>
													<span class="cke_button">
													<a id="cke_11" class="cke_off cke_button_bulletedlist" onclick="CKEDITOR.tools.callFunction(9, this); return false;" onfocus="return CKEDITOR.tools.callFunction(1, 3, event);" onkeydown="return CKEDITOR.tools.callFunction(0, 3, event);" onblur="this.style.cssText = this.style.cssText;" aria-labelledby="cke_11_label" role="button" hidefocus="true" tabindex="-1" title="Insert/Remove Bulleted List">
													<span class="cke_icon">&nbsp;</span>
													<span id="cke_11_label" class="cke_label">Insert/Remove Bulleted List</span>
													</a>
													</span>
													</span>
													<span class="cke_separator" role="separator"></span>
													<span class="cke_toolbar_end"></span>
													</span>
													</div><a id="cke_12" class="cke_toolbox_collapser" onclick="CKEDITOR.tools.callFunction(10)" tabindex="-1" title="Collapse Toolbar">
													<span>▲</span>
													</a>
													</td>
													</tr>
													<tr role="presentation">
													<td id="cke_contents_ctl00_MainContent_ctl00_ckEditor" class="cke_contents" role="presentation" style="height: 300px;">
													<iframe frameborder="0" allowtransparency="true" tabindex="0" src="" title="Rich text editor, ctl00_MainContent_ctl00_ckEditor, press ALT 0 for help." style="width:100%;height:100%">
													<html lang="en" dir="ltr">
													<head>
															<title data-cke-title="Rich text editor, ctl00_MainContent_ctl00_ckEditor, press ALT 0 for help.">Rich text editor, ctl00_MainContent_ctl00_ckEditor, press ALT 0 for help.</title>
															<link href="http://thegioicanho.com/ckeditor/contents.css" rel="stylesheet" type="text/css">
															/*
															Copyright (c) 2003-2011, CKSource - Frederico Knabben. All rights reserved.
															For licensing, see LICENSE.html or http://ckeditor.com/license
															*/
															body
															{
															/* Font */
															font-family: Arial, Verdana, sans-serif;
															font-size: 12px;
															/* Text color */
															color: #222;
															/* Remove the background color to make it transparent */
															background-color: #fff;
															}
															/* preserved spaces for rtl list item bullets. (#6249)*/
															ol,ul,dl
															{
															padding-right:40px;
															}
															html
															{
															/* #3658: [IE6] Editor document has horizontal scrollbar on long lines
															To prevent this misbehavior, we show the scrollbar always */
															_overflow-y: scroll;
															/* #6341: The text cursor must be set on the editor area. */
															cursor: text;
															/* #6632: Avoid having "text" shape of cursor in IE7 scrollbars.*/
															*cursor:auto;
															}
															img:-moz-broken
															{
															-moz-force-broken-image-icon : 1;
															width : 24px;
															height : 24px;
															}
															img, input, textarea
															{
															cursor: default;
															}
															</link><style data-cke-temp="1" type="text/css">
																	img.cke_flash{background-image: url(http://thegioicanho.com/ckeditor/plugins/flash/images/placeholder.png?t=B37D54V);background-position: center center;background-repeat: no-repeat;border: 1px solid #a9a9a9;width: 80px;height: 80px;}
																	form{border: 1px dotted #FF0000;padding: 2px;}
																	img.cke_hidden{background-image: url(http://thegioicanho.com/ckeditor/plugins/forms/images/hiddenfield.gif?t=B37D54V);background-position: center center;background-repeat: no-repeat;border: 1px solid #a9a9a9;width: 16px !important;height: 16px !important;}
																	img.cke_iframe{background-image: url(http://thegioicanho.com/ckeditor/plugins/iframe/images/placeholder.png?t=B37D54V);background-position: center center;background-repeat: no-repeat;border: 1px solid #a9a9a9;width: 80px;height: 80px;}
																	img.cke_anchor{background-image: url(http://thegioicanho.com/ckeditor/plugins/link/images/anchor.gif?t=B37D54V);background-position: center center;background-repeat: no-repeat;border: 1px solid #a9a9a9;width: 18px !important;height: 18px !important;}
																	a.cke_anchor{background-image: url(http://thegioicanho.com/ckeditor/plugins/link/images/anchor.gif?t=B37D54V);background-position: left center;background-repeat: no-repeat;border: 1px solid #a9a9a9;padding-left: 18px;}
																	img.cke_pagebreak{background-image: url(http://thegioicanho.com/ckeditor/plugins/pagebreak/images/pagebreak.gif?t=B37D54V);background-position: center center;background-repeat: no-repeat;clear: both;display: block;float: none;width:100% !important; _width:99.9% !important;border-top: #999999 1px dotted;border-bottom: #999999 1px dotted;height: 5px !important;page-break-after: always;}
																	.cke_show_blocks p,.cke_show_blocks div,.cke_show_blocks pre,.cke_show_blocks address,.cke_show_blocks blockquote,.cke_show_blocks h1,.cke_show_blocks h2,.cke_show_blocks h3,.cke_show_blocks h4,.cke_show_blocks h5,.cke_show_blocks h6{background-repeat: no-repeat;background-position: top left;border: 1px dotted gray;padding-top: 8px;padding-left: 8px;}.cke_show_blocks p{background-image: url(http://thegioicanho.com/ckeditor/plugins/showblocks/images/block_p.png);}.cke_show_blocks div{background-image: url(http://thegioicanho.com/ckeditor/plugins/showblocks/images/block_div.png);}.cke_show_blocks pre{background-image: url(http://thegioicanho.com/ckeditor/plugins/showblocks/images/block_pre.png);}.cke_show_blocks address{background-image: url(http://thegioicanho.com/ckeditor/plugins/showblocks/images/block_address.png);}.cke_show_blocks blockquote{background-image: url(http://thegioicanho.com/ckeditor/plugins/showblocks/images/block_blockquote.png);}.cke_show_blocks h1{background-image: url(http://thegioicanho.com/ckeditor/plugins/showblocks/images/block_h1.png);}.cke_show_blocks h2{background-image: url(http://thegioicanho.com/ckeditor/plugins/showblocks/images/block_h2.png);}.cke_show_blocks h3{background-image: url(http://thegioicanho.com/ckeditor/plugins/showblocks/images/block_h3.png);}.cke_show_blocks h4{background-image: url(http://thegioicanho.com/ckeditor/plugins/showblocks/images/block_h4.png);}.cke_show_blocks h5{background-image: url(http://thegioicanho.com/ckeditor/plugins/showblocks/images/block_h5.png);}.cke_show_blocks h6{background-image: url(http://thegioicanho.com/ckeditor/plugins/showblocks/images/block_h6.png);}
																	.cke_show_borders table.cke_show_border,.cke_show_borders table.cke_show_border > tr > td, .cke_show_borders table.cke_show_border > tr > th,.cke_show_borders table.cke_show_border > tbody > tr > td, .cke_show_borders table.cke_show_border > tbody > tr > th,.cke_show_borders table.cke_show_border > thead > tr > td, .cke_show_borders table.cke_show_border > thead > tr > th,.cke_show_borders table.cke_show_border > tfoot > tr > td, .cke_show_borders table.cke_show_border > tfoot > tr > th{border : #d3d3d3 1px dotted}
																	html { height: 100% !important; }
															</style>
															</head>
															<body class="cke_show_borders" contenteditable="true" spellcheck="false">
															<p>
															<br type="_moz">
															</p>
															</body>
															</html>
															</iframe>
															</td>
																</tr>
																<tr role="presentation" style="-moz-user-select: none;">
																<td id="cke_bottom_ctl00_MainContent_ctl00_ckEditor" class="cke_bottom" role="presentation">
																<div class="cke_resizer cke_resizer_ltr" onmousedown="CKEDITOR.tools.callFunction(5, event)" title="Drag to resize"></div>
																<span id="cke_path_ctl00_MainContent_ctl00_ckEditor_label" class="cke_voice_label">Elements path</span>
																<div id="cke_path_ctl00_MainContent_ctl00_ckEditor" class="cke_path" aria-labelledby="cke_path_ctl00_MainContent_ctl00_ckEditor_label" role="group">
																<a id="cke_elementspath_5_1" aria-labelledby="cke_elementspath_5_1_label" role="button" onclick="CKEDITOR.tools.callFunction(2,1); return false;" onblur="this.style.cssText = this.style.cssText;" onkeydown="return CKEDITOR.tools.callFunction(3,1, event );" hidefocus="true" title="body element" tabindex="-1" href="javascript:void('body')">
																body
																<span id="cke_elementspath_5_1_label" class="cke_label">body element</span>
																</a>
																<a id="cke_elementspath_5_0" aria-labelledby="cke_elementspath_5_0_label" role="button" onclick="CKEDITOR.tools.callFunction(2,0); return false;" onblur="this.style.cssText = this.style.cssText;" onkeydown="return CKEDITOR.tools.callFunction(3,0, event );" hidefocus="true" title="p element" tabindex="-1" href="javascript:void('p')">
																	p
																	<span id="cke_elementspath_5_0_label" class="cke_label">p element</span>
																	</a>
																	<span class="cke_empty">&nbsp;</span>
																	</div>
																	/td>
																</tr>
																</tbody>
																</table>
																<style>
																.cke_skin_kama{visibility:hidden;}
																</style>
																</span>
																</span>
																<span role="presentation" style="position:absolute;" tabindex="-1"></span>
																</span>
																Hình ảnh (450px * 300px)
																<input id="ctl00_MainContent_ctl00_FileUpload1" type="file" name="ctl00$MainContent$ctl00$FileUpload1">
																<input id="ctl00_MainContent_ctl00_btUpload" type="submit" value="Upload" name="ctl00$MainContent$ctl00$btUpload">
																<div id="ctl00_MainContent_ctl00_imagesHolder"> </div>
																<div class="groupInfo"> Thông tin liên hệ </div>
																<table class="NewPropertyTable" cellspacing="0" cellpadding="0">
																<tbody>
																<tr>
																<td> Tên : </td>
																<td>
																<input id="ctl00_MainContent_ctl00_tb_ttlh_Ten" class="Textbox" type="text" name="ctl00$MainContent$ctl00$tb_ttlh_Ten">
																<span id="ctl00_MainContent_ctl00_RequiredFieldValidator4" style="color:Red;visibility:hidden;">*</span>
																</td>
																</tr>
																<tr>
																<td> Điện thoại : </td>
																<td>
																<input id="ctl00_MainContent_ctl00_tb_ttlh_DienThoai" class="Textbox" type="text" name="ctl00$MainContent$ctl00$tb_ttlh_DienThoai">
																<span id="ctl00_MainContent_ctl00_RequiredFieldValidator6" style="color:Red;visibility:hidden;">*</span>
																</td>
																</tr>
																<tr>
																<td> Email : </td>
																<td>
																<input id="ctl00_MainContent_ctl00_tb_ttlh_Email" class="Textbox" type="text" name="ctl00$MainContent$ctl00$tb_ttlh_Email">
																</td>
																</tr>
																</tbody>
																</table><div class="submit" style="border-top: 1px solid #999; padding: 10px 0 0 0; margin: 15px 0 0 0;">
																<div id="ctl00_MainContent_ctl00_ValidationSummary1" style="color:Red;display:none;"> </div>
																<input id="ctl00_MainContent_ctl00_btSave" class="ButtonWithbackground" type="submit" onclick="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions("ctl00$MainContent$ctl00$btSave", "", true, "", "", false, false))" value="Đăng tin" name="ctl00$MainContent$ctl00$btSave">
																</div>
																</td>
																<td> </td>
																</tr>
																</tbody>
																</table>
																</div>
																</div>
											</div>
									  </table>
									</div>
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