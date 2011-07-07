<?php
	include("../include/header.php");
?>
<script type="text/javascript">
$(document).ready(function()
{
	$("#frmThayDoiThongTinKH").submit(function()
	{
		var strUsername = $("#txtUsername").attr("value");
		var strAdress = $("#txtAddress").attr("value");
		var strTelephone = $("#txtTelephoneNumber").attr("value");
		var strTMobile = $("#txtMobileNumber").attr("value");
		var strEmail = $("#txtEmail").attr("value");
		var flag = true;
		
		if(strUsername.length<3 || strUsername.length > 50)
		{				//alert(strUsername);
		
			flag=false;
			$("#messUsername").attr("innerHTML","Tên khách hàng từ 6-50 ký tự");
			$("#messUsername").css("color","red");
			//alert ("Tên đăng nhập từ 6-50 ký tự");
		}
		if(strAdress.length<3 || strAdress.length > 100)
		{					
			flag=false;
			$("#messAdress").attr("innerHTML","Địa chỉ khách hàng từ 6-100 ký tự");
			$("#messAdress").css("color","red");
		}
		if(strTelephone.length<10 || strTelephone.length > 15)
		{					
			flag=false;
			$("#messelephoneNumber").attr("innerHTML","Số điện thoại khách hàng từ 10-15 số");
			$("#messelephoneNumber").css("color","red");
		}
		if(flag==false)
			alert ("Có lỗi trong thông tin đăng ký. Xin kiểm tra lại");
		return flag;
	});
	// function checkSDT1()
	// {
		// if (document.getElementById("sdt1").value != "")
			// document.getElementById("sdt2").disabled = false;
		// else
		// {
			// document.getElementById("sdt2").disabled = true;
			// document.getElementById("sdt2").value = "";
		// }
	// }
});
</script>

<script>
	function checkSDT1()
	{
		if (document.getElementById("txtTelephoneNumber").value != "")
			document.getElementById("txtMobileNumber").disabled = false;
		else
		{
			document.getElementById("txtMobileNumber").disabled = true;
			document.getElementById("txtMobileNumber").value = "";
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
<!-- form start-->	

<?php 
	include_once ("../BUS/UsersBUS.php");
	if(isset($curUserId))
		$user= UsersBUS::GetUserByID($curUserId);
	if(!isset($curUserId))
		header("Location:dichvu.php");
?>
					<div style="padding:20px;" id="frmThayDoiThongTinKH" name="frmThayDoiThongTinKH">				
						<form action="user/xulydangky.php?id=<?php echo $curUserId ?>" method="post" name="frmThayDoiThongTinKH" id="frmThayDoiThongTinKH" >
						<td style="padding: 10px;" valign="top">
							<div style="width: 686px;">
								<div style="margin-left: 10px; margin-top: 10px; font-family: tahoma; font-size: 18px;
									font-weight: bold; color:#890C29;">
									CẬP NHẬT THÔNG TIN KHÁCH HÀNG</div>
								<div style="margin-top:5px;padding:8px;background:#FFFFCC;border:solid 1px #CCCCCC;font-size:13px;color:#ff0000;" id="messLoad" name="messLoad">
									<b style="color:#ff0000;">
									<?php
									if(isset($_GET['update']) && $_GET['update'] =='success')
										echo "Cập nhật thông tin thành công!";
									else if(isset($_GET['update']) && $_GET['update'] =='failed')
										echo "Cập nhật thông tin thất bại!";
									else
										echo "Quý khách phải cập nhật đầy đủ thông tin thành viên mới có thể đăng tin";
										
									?>
									
									</b>
								</div>
								
								<hr style="color: rgb(211, 232, 248);" width="680" size="1">
								<div style="padding:20px 0;">
									
										<table class="table" border="0">
											<tr>
												<td align="right">Tên đăng nhập:</td>
												<td style="font-weight:bold; padding-left:10px;"><?php echo $curUserEmail ?></td>
											</tr>
											<tr>
												<td align="right">Email liên lạc: </td>
												<td style="font-weight:bold; padding-left:10px;"><?php echo $curUserEmail ?></td>
											</tr>
											<tr>
												<td align="right">Họ và tên: <span style="color:red;">(*)</span></td>
												<td style="padding-left:10px;">
													<input id="txtUsername" name="txtUsername" type="text" style="width:300px;font-weight:bold;" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo $user['hoten']?>" />
													<div id="messUsername" name="messUsername" class="mess"></div>
												</td>
											</tr>
											<tr>
												<td align="right">Giới tính:</td>
												<td style="padding-left:10px;">
												<?php 
													if(isset($user) && $user['gioitinh'] == 1)
													{
														echo "<input type='radio' value='1' name='gender' checked='true'> Nam";
														echo "<input type='radio' value='0' name='gender'> Nữ";
													}
													else
													{
												?>
													<input type="radio" value="1" name="gender" > Nam
													<input type="radio" value="0" name="gender" checked="true"> Nữ
													<?php  } ?>
												</td>
											</tr>
											<tr>
												<td align="right">Địa chỉ liên lạc: <span style="color:red;">(*)</span></td>
												<td style="padding-left:10px;">
													<input type="text" style="width:300px" value="<?php echo $user['diachi']?>" id="txtAddress" name="txtAddress">
													<div id="messAddress" name="messAddress" class="mess"></div>
												</td>
											</tr>
											<tr>
												<td align="right">Số điện thoại: <span style="color:red;">(*)</span></td>
												<td style="padding-left:10px;">
													<input name="txtTelephoneNumber" id="txtTelephoneNumber" style="width:200px;" type="text" value="<?php echo $user['sdt1']?>" onkeypress="return keypress(event);" onkeyup="checkSDT1();" />
													<div id="messTelephoneNumber" name="messTelephoneNumber" class="mess"></div>
												</td>
											</tr>
											<tr>
												<td align="right">Di động:</td>
												<td style="padding-left:10px;">
													<input id="txtMobileNumber" name="txtMobileNumber" style="width:200px;" type="text" value="<?php echo $user['sdt2']?>" onkeypress="return keypress(event);" disabled="disabled"/>
													<div id="messMobileNumber" name="messMobileNumber" class="mess"></div>
												</td>
											</tr>
											
											<tr>
												<td align="right">Ngày:</td>
												<td colspan="2" style="padding-left:10px;">
												
												<?php
													echo"<input id='txtUpdatedDate' name='txtUpdatedDate' type='text' style='width:200px;' value='".date('d-m-Y')."' disabled>"
													?>
												</td>
											</tr>
											
											<tr>
												<td align="left"></td>
												<td style="padding-left:10px;"><br>
												<input class="button_submit" type="submit" value="Cập nhật thay đổi" name="btnChangeInfoUser">
												</td>
												
											</tr>
											<tr>
												<td align="left"></td>
												<td ><p style="font-size: 11px; color: #9F9F9F; text-align:left;">
												<span style="color:red;">(*)</span> Thông tin không được để trống.</p>
												</td>
											</tr>
											
										</table>
										
										

								</div>
							</div>
						</td>
					  </form>
					  </div>
<!--end form-->
					</tr>
				</table>
			</td>
		</tr>
	</table>
<?php
	include("../include/footer.php");
?>