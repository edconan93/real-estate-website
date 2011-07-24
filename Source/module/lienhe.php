<?php
	include("../include/header.php");
?>
<script src="../js/common.js" language="javascript" type="text/javascript"></script>
<script src="../js/jquery-1.js" language="javascript" type="text/javascript"></script>
<script>
$(document).ready(function()
{
	$("#frmContract").submit(function()
	{
		var txtNoiDung = $("#txtNoiDung").attr("value");
		var txtDienThoai = $("#txtDienThoai").attr("value");
		var txtEmail = $("#txtEmail").attr("value");
		var txtDiaChi = $("#txtDiaChi").attr("value");
		var txtHoTen = $("#txtHoTen").attr("value");
		var flag = true;
		if(txtNoiDung.length<10 )
		{		
			flag=false;
			$("#messNoiDung").attr("innerHTML","Bạn phải cho ghi hơn 15 kí tự");
			$("#messNoiDung").css("color","red");
		}
		else
		{
			$("#messNoiDung").attr("innerHTML","");
		}
		if(txtDienThoai < 10  && txtDienThoai>15)
		{		
			flag=false;
			$("#messDienThoai").attr("innerHTML","Số điện thoại 10 <SDT < 15");
			$("#messDienThoai").css("color","red");
		}
		if(txtDiaChi < 5 )
		{		
			flag=false;
			$("#messDiaChi").attr("innerHTML","Địa chỉ liên lạc phải lớn chính xác");
			$("#messDiaChi").css("color","red");
		}
		else
		{
			$("#messDiaChi").attr("innerHTML","");
		}
		if(txtHoTen < 5 )
		{		
			flag=false;
			$("#messHoTen").attr("innerHTML","Họ tên liên lạc phải lớn chính xác");
			$("#messHoTen").css("color","red");
		}
		else
		{
			$("#messHoTen").attr("innerHTML","");
		}
		if(IsEmail(txtEmail)==false)
		{
			flag=false;
			$("#messEmail").attr("innerHTML","Email không hợp lệ");
			$("#messEmail").css("color","red");
			
		}
		else
		{
			$("#messEmail").attr("innerHTML","");
			$("#messEmail").css("color","red");
		}
		
		if(flag==false)
			alert ("Có lỗi trong thông tin đăng ký. Xin kiểm tra lại");
		return flag;
	});
	
});
</script>
<div style="width: 986px; height: 177px;" id="contentslide">
	<embed type="application/x-shockwave-flash" src="../images/contentslide.swf" id="mymovie"
		name="mymovie" bgcolor="#000000" quality="high" loop="true" wmode="transparent"
		width="986" height="177">
</div>
<!-- form start-->
<div id="frmContract" name="frmContract">
<form action="user/xulydangky.php" method="post" name="frmContract" id="frmContract" >
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
								<div id="messLoad" name="messLoad" style="margin-top:5px;padding:8px;background:#FFFFCC;border:solid 1px #CCCCCC;font-size:15px;color: #336699;">
								<b style="color: #336699;font-size:15px;">
								<?php
								if(isset($_GET['send']) && $_GET['send'] == 'success')
									echo "Thông tin liên hệ đã được gửi.";
								else if(isset($_GET['send']) && $_GET['send'] == 'failed')
									echo "Thông tin liên hệ đã bị lỗi. Xin kiểm tra lại thông tin";
								else
								{
								?>
								Quí khách hãy điền đầy đủ thông tin liên hệ </b>
								<?php } ?>
								</div>
								<hr width="680" size="1" style="color: rgb(211, 232, 248);">
				<div class="mid_content">
					<table cellspacing="0" cellpadding="0" border="0" align="center" width="700">
						<tr>
							<td><center>
								
									<table cellspacing="0" cellpadding="5" border="0" align="center">
										<tr>
											<td class="border_line" bgcolor="#e1eef7" colspan="2" >
											<b>
											+ Bạn có thể liên hệ trực tiếp với chúng tôi qua điện thoại
											<br>
											+ Mobile: 0933 . 167 695 (Vũ Hòa Phương) - (08) 38777999 - Fax: (08) 62602666
											<br>
											+ Thời gian làm việc: Thứ 2 - 6 (8h - 17h), Thứ 7 (8h - 12h)
											<br>
											+ Hoặc qua mẫu gởi thông tin liên hệ bên dưới:
											</b>
											</td>
										</tr>
										<tr><td>&nbsp;</td></tr>
										<tr>
											<td><b>Họ và Tên:</b> <span style="color:red;">*</span></td>
											<td><input type="text" style="width:300px;" id="txtHoTen" name="txtHoTen" >
											<div id="messHoTen" name="messHoTen" ></div></td>
										</tr>
										<tr>
											<td><b>Điện thoại:</b> <span style="color:red;">*</span></td>
											<td><input type="text" style="width:300px;" onkeypress="return keypress(event);" id="txtDienThoai" name="txtDienThoai" >
											<div id="messDienThoai" name="messDienThoai" ></div></td>
										</tr>
										<tr>
											<td><b>Email:</b> <span style="color:red;">*</span></td>
											<td><input type="text" style="width:300px;" id="txtEmail" name="txtEmail">
											<div id="messEmail" name="messEmail" ></div></td>
										</tr>
										<tr>
											<td><b>Địa chỉ liên hệ:</b></td>
											<td><input type="text" style="width:300px;" id="txtDiaChi" name="txtDiaChi">
											<div id="messDiaChi" name="messDiaChi" ></div></td>
										</tr>
										<tr>
											<td valign="top" style="padding-top:6px;"><b>Nội dung liên hệ:</b> <span style="color:red;">*</span></td>
											<td><textarea  style="width:300px;" id="txtNoiDung" name="txtNoiDung"></textarea>
											<div id="messNoiDung" name="messNoiDung" ></div></td>
										</tr>
										<tr style="height:80px;">
											<td></td>
											<td>
												<div style="width:130px;">
													<span class="action-button-left"></span>
													<input class="submitYellow" type="Submit" value="Gửi thông tin" id="btnGuiTin" name="btnGuiTin" />
													<span class="action-button-right"></span>
												</div>
											</td>
										</tr>
										<tr >
											<td align="right"></td>
											<td  align="left" style="font-size: 17px; color: #9F9F9F;">
											<span style="color:red;">(*)</span> Thông tin không được để trống.</td>
											</tr>
									</table>
								
								</center>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</td>
	</tr>
</table>
</form>
</div>
<?php
	include("../include/footer.php");
?>