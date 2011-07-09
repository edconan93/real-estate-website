<?php
	include("../include/header.php");
?>
<script src="../js/common.js" language="javascript" type="text/javascript"></script>
<script src="../js/jquery-1.js" language="javascript" type="text/javascript"></script>
	<script>
$(document).ready(function()
{
	$("#frmVIP").submit(function()
	{
		var strNoiDung = $("#txtNoiDung").attr("value");
		var strMonth = $("#cbbMonth").attr("value");
		var flag = true;
		if(strNoiDung.length<10 )
		{		
			flag=false;
			$("#messNoiDung").attr("innerHTML","Bạn phải cho biết nội dung đăng VIP");
			$("#messNoiDung").css("color","red");
		}
		if(strMonth == 0 )
		{		
			flag=false;
			$("#messMonth").attr("innerHTML","Bạn phải chọn số tháng đăng tin VIP");
			$("#messMonth").css("color","red");
		}
		if(flag==false)
			alert ("Có lỗi trong thông tin đăng ký. Xin kiểm tra lại");
		return flag;
	});
	$("#cbbMonth").change(function ()
	{
		var strEmail = $("#txtEmail").attr("value");
		var thang=$("#cbbMonth").attr("value");
		if(thang == 1)
		{
			$("#messTinhTien").attr("innerHTML","275,000 VND");
			$("#messTinhTien").css("color","black");

		}
		else if(thang > 1)
		{
			var tien = thang * 220000;
			var stringTien = tien+"";
			var convert ="";
			var strEnd="";
			var dem=0;
			for(var i= stringTien.length-1; i >=0  ;i--)
			{
				if(dem%3 == 0 && dem !=0)
				{
					convert+=",";
				}
				dem++;
				convert=convert+stringTien[i];
			}	
			for(i= convert.length-1; i >=0  ;i--)
			{
				strEnd+=convert[i];
			}
			$("#messTinhTien").attr("innerHTML",strEnd+" VND");
			$("#messTinhTien").css("color","black");
		}
	
	});
});
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
<div id="frmVIP" name="frmVIP">
<form action="user/xulydangky.php?iddv=<?php echo $_GET['iddv'] ?>" method="post" name="frmVIP" id="frmVIP" >
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
								<div id="messLoad" name="messLoad" style="margin-top:5px;padding:8px;background:#FFFFCC;border:solid 1px #CCCCCC;font-size:15px;color: #336699;">
								<?php
								if(isset($_GET['send']) && $_GET['send'] == 'success')
									echo "Thông tin nâng cấp VIP đã được gửi. Bạn hãy gửi tiền qua tài khoản.";
								else if(isset($_GET['send']) && $_GET['send'] == 'failed')
									echo "Thông tin nâng cấp Vip đã bị lỗi. Xin kiểm tra lại thông tin";
								else
								{
								?>
								<b style="color: #336699;font-size:15px;">Khách hàng hãy điền đầy đủ thông tin nâng cấp VIP </b>
								<?php } ?>
								</div>
								<hr width="680" size="1" style="color: rgb(211, 232, 248);">
								<div style="padding:20px 0;">
									<center>
										<table class="table" border="0">
											<tr>
												<td align="right">Mã số tin rao:</td>
												<td align="left">
												<b><?php 
												if(isset($_GET['iddv']))
												{
													include_once ("../BUS/DichVuBUS.php");
													$process = DichVuBUS::select($_GET['iddv']);
													echo $_GET['iddv'];
												}
												?></b>
												</td>
											</tr>
											<tr>
												<td align="right">Tiêu đề tin rao:</td>
												<td align="left">
												<b><?php 
												if(isset($_GET['iddv']))
													echo $process['tieude'];
												?></b>
												</td>
											</tr>
											<tr>
												<td align="right">Thời gian quảng cáo:</td>
												<td align="left">
												<select  style="width:200px;" name="cbbMonth" id="cbbMonth">
												<option value="0">-- chon thoi gian quang cao --</option>
												<option value="1" selected="">1 tháng</option>
												<option  value="2">2 tháng</option>
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
												<div id="messMonth" name="messMonth" ></div>
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
												<b><div id="messTinhTien" name="messTinhTien">275,000 VND</div> </b>
												</td>
											</tr>
											<tr>
												<td align="right" style="width:150px;">Thông tin thanh toán:</td>
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
												<span class="style1"> Bộ phận quảng cáo REALESTATE_HOAPHUONG.COM</span>
												<br>
												<span>ĐC: Số 339 - Đường Cộng Hòa - Quận TB- TP. Hồ Chí Minh.</span>
												<br>
												<span>Điện thoại:</span>
												<b> 08.38777 939</b>
												-
												<span>Fax:</span>
												<b> 08.62602 665</b><br>
												
												<span>Email:</span>
												<b> realestate_hoaphuong.com@gmail.com</b>
												<br>
												<span> Thời gian làm việc:</span>
												<strong>Thứ 2 - 6 (8h - 17h), Thứ 7 (8h - 12h)</strong>
												</p>
												
												</td>
											</tr>
											<tr>
												<td align="right">Nội dung tin nhắn:</td>
												<td align="left">
												<textarea style="padding:5px;" rows="5" cols="40" id="txtNoiDung" name="txtNoiDung"></textarea>
												<div id="messNoiDung" name="messNoiDung" ></div>
												</td>
											</tr>
										
											<tr>
												<td align="right"></td>
												<td align="left">
												<span class="action-button-left"></span>
												<input class="submitYellow" type="Submit" value="Gửi Yêu Cầu" name="btnNangVip" id="btnNangVip">
												<span class="action-button-right"></span>
												</td>
											</tr>
											<tr >
											<td align="right"></td>
											<td  align="left" style="font-size: 17px; color: #9F9F9F;">
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
</form>
</div>
<!--en form-->
			</td>
		</tr>
	</table>
<?php
	include("../include/footer.php");
?>