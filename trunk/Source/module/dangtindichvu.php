<?php
	include("../include/header.php");
?>
<!--script -->
<script src="../js/common.js" language="javascript" type="text/javascript"></script>
<script src="../js/jquery-1.js" language="javascript" type="text/javascript"></script>
<script type="text/javascript">
 //xu ly submit
$(document).ready(function()
{
	var strLoaiDV = $("#txtIDLoaiDV").attr("value");
	$("#frmDichVu").submit(function()
	{ 	
		//alert(strLoaiDV);
		var flag=true;
		var strTieuDe = $("#txtTieuDeTin").attr("value");
		if(strTieuDe.length < 1  )
		{	
			flag=false;
			$("#messTieuDe").attr("innerHTML","Phải đặt tiêu đề tin");
			$("#messTieuDe").css("color","red");
		}
		if(strLoaiDV == 1 || strLoaiDV == 3)
		{
			var strTieuDe = $("#txtDuongPho").attr("value");
			if(strTieuDe.length < 1  )
			{	flag=false;
				$("#messDuongPho").attr("innerHTML","Phải thêm tên đường");
				$("#messDuongPho").css("color","red");
			}
			var strTieuDe = $("#txtSoNha").attr("value");
			if(strTieuDe.length < 1  )
			{	flag=false;
				$("#messSoNha").attr("innerHTML","Phải có số nhà");
				$("#messSoNha").css("color","red");
			}
		}
		
		var strTieuDe = $("#txtGia").attr("value");
		if(strTieuDe.length < 1  )
		{	flag=false;
			$("#messGia").attr("innerHTML","Phải thêm giá nhà");
			$("#messGia").css("color","red");
		}
		if(CheckPhoneNumber(strTieuDe))
		{	flag=false;
			$("#messGia").attr("innerHTML","Nhập số giá nhà");
			$("#messGia").css("color","red");
		}
		
		var strTieuDeR = $("#txtRong").attr("value");
		var strTieuDe = $("#txtDai").attr("value");
		if(strLoaiDV == 1 || strLoaiDV == 3)
		{
			
			if(strTieuDe.length < 1 || strTieuDeR<1 )
			{	flag=false;
				$("#messKichThuoc").attr("innerHTML","Nhập D-R");
				$("#messKichThuoc").css("color","red");
			}
			if(CheckPhoneNumber(strTieuDe) || CheckPhoneNumber(strTieuDeR))
			{	flag=false;
				$("#messKichThuoc").attr("innerHTML","Nhập số");
				$("#messKichThuoc").css("color","red");
			}
		}
		else
		{
			if(strTieuDe.length < 1 || strTieuDeR<1 )
			{	//flag=false;
				$("#messKichThuoc").attr("innerHTML","");
				//$("#messKichThuoc").css("color","red");
			}
			else if(CheckPhoneNumber(strTieuDe) || CheckPhoneNumber(strTieuDeR))
			{	
				flag=false;
				$("#messKichThuoc").attr("innerHTML","Nhập số");
				$("#messKichThuoc").css("color","red");
			}
		}
		var strTieuDe = $("#txtTang").attr("value");
		if(strTieuDe.length < 1 )
		{	
			$("#messTang").attr("innerHTML", "");
		}
		else if(CheckPhoneNumber(strTieuDe))
		{
			flag=false;
			$("#messTang").attr("innerHTML","Nhập số");
			$("#messTang").css("color","red");
		}
		
		var strTieuDe = $("#txtPhongTam").attr("value");
		if(strTieuDe.length < 1 )
		{	
			$("#messPhongTam").attr("innerHTML", "");
		}
		else if(CheckPhoneNumber(strTieuDe))
		{
			flag=false;
			$("#messPhongTam").attr("innerHTML","Nhập số");
			$("#messPhongTam").css("color","red");
		}
		
		var strTieuDe = $("#txtPhongNgu").attr("value");
		if(strTieuDe.length < 1 )
		{	
		$("#messPhongNgu").attr("innerHTML", "");
		}
		else if(CheckPhoneNumber(strTieuDe))
		{
			flag=false;
			$("#messPhongNgu").attr("innerHTML","Nhập số");
			$("#messPhongNgu").css("color","red");
		}
		var strTieuDe = $("#cbbBatDongSan").attr("value");
		if(strTieuDe == "-1" )
		{	
			flag=false;
			$("#messLoaiBatDongSan").attr("innerHTML","Chọn loại nhà");
			$("#messLoaiBatDongSan").css("color","red");
		}
		
		var strTieuDe = $("#cbbTinhTP").attr("value");
		if(strTieuDe == "-1" )
		{	flag=false;
			$("#messTinhTP").attr("innerHTML","Chọn tỉnh/ thành phố");
			$("#messTinhTP").css("color","red");
		}
		
		var strTieuDe = $("#cbbQuanHuyen").attr("value");
		if(strLoaiDV == 1 || strLoaiDV == 3)
		{
			if(strTieuDe == "-1" )
			{	flag=false;
				$("#messQuanHuyen").attr("innerHTML","Chọn quận/ huyện");
				$("#messQuanHuyen").css("color","red");
			}
			var strTieuDe = $("#cbbPhuongXa").attr("value");
			if(strTieuDe == "-1" )
			{	flag=false;
				$("#messPhuong").attr("innerHTML","Chọn phường/xã");
				$("#messPhuong").css("color","red");
			}
		}
		
		if(flag==false)
				alert ("Có lỗi trong thông tin đăng ký. Xin kiểm tra lại");
		return flag;
	});
	
	
	//xu ly tieu de 	
	$("#txtTieuDeTin").blur(function ()
	{
		//alert("aaa"); //$summary=stripcslashes($_POST["summary"]);
		//var des = $("#txtTieuDeTin").attr("summary");
		var strTieuDe = $("#txtTieuDeTin").attr("value");

		if(strTieuDe.length < 1  )
		{	

			$("#messTieuDe").attr("innerHTML","Phải đặt tiêu đề tin");
			$("#messTieuDe").css("color","red");
		}
		else
		{
			$("#messTieuDe").attr("innerHTML", "");
			var serverURL = "checkservice.php?txtTieuDeTin=" + "strTieuDe";
			$("#messTieuDe").load(serverURL);
		}
	});

	//check duong pho
	$("#txtDuongPho").blur(function ()
	{
		var strTieuDe = $("#txtDuongPho").attr("value");
		if(strTieuDe.length < 1 && (strLoaiDV == 1 || strLoaiDV == 3) )
		{	
			$("#messDuongPho").attr("innerHTML","Phải thêm tên đường");
			$("#messDuongPho").css("color","red");
		}
		else
		{
			$("#messDuongPho").attr("innerHTML", "");
			var serverURL = "checkservice.php?txtTieuDeTin=" + "strTieuDe";
			$("#messDuongPho").load(serverURL);
		}
	});
	//check so nha
	$("#txtSoNha").blur(function ()
	{
		var strTieuDe = $("#txtSoNha").attr("value");
		if(strTieuDe.length < 1  && (strLoaiDV == 1 || strLoaiDV == 3))
		{	
			$("#messSoNha").attr("innerHTML","Phải có số nhà");
			$("#messSoNha").css("color","red");
		}
		else if(CheckPhoneNumber(strTieuDe))
		{
			$("#messSoNha").attr("innerHTML","Số nhà ko hợp lệ");
			$("#messSoNha").css("color","red");
		}
		else
		{
			$("#messSoNha").attr("innerHTML", "");
			var serverURL = "checkservice.php?txtTieuDeTin=" + "strTieuDe";
			$("#messSoNha").load(serverURL);
		}		
	});
	
	//check gia
	$("#txtGia").blur(function ()
	{
		var strTieuDe = $("#txtGia").attr("value");
		if(strTieuDe.length < 1  )
		{	
			$("#messGia").attr("innerHTML","Phải thêm giá nhà");
			$("#messGia").css("color","red");
		}
		else if(CheckPhoneNumber(strTieuDe))
		{
			$("#messGia").attr("innerHTML","Hãy nhập số");
			$("#messGia").css("color","red");
		}
		else
		{
			$("#messGia").attr("innerHTML", "");
			var serverURL = "checkservice.php?txtTieuDeTin=" + "strTieuDe";
			$("#messGia").load(serverURL);
		}
	});
	//check Dai
	$("#txtDai").blur(function ()
	{
		var strTieuDeR = $("#txtRong").attr("value");
		var strTieuDe = $("#txtDai").attr("value");
		if(strTieuDe.length < 1 || strTieuDeR<1 && (strLoaiDV == 1 || strLoaiDV == 3))
		{	
			$("#messKichThuoc").attr("innerHTML","Nhập D-R");
			$("#messKichThuoc").css("color","red");
		}
		else if(CheckPhoneNumber(strTieuDe) || CheckPhoneNumber(strTieuDeR))
		{
			$("#messKichThuoc").attr("innerHTML","Nhập số");
			$("#messKichThuoc").css("color","red");
		}
		else
		{
			$("#messKichThuoc").attr("innerHTML", "");
			var serverURL = "checkservice.php?txtTieuDeTin=" + "strTieuDe";
			$("#messKichThuoc").load(serverURL);
		}
	});
	//check Rong
	$("#txtRong").blur(function ()
	{
		var strTieuDe = $("#txtRong").attr("value");
		var strTieuDeD = $("#txtDai").attr("value");
		if(strTieuDe.length < 1  || strTieuDeD <1 && (strLoaiDV == 1 || strLoaiDV == 3))
		{	
			$("#messKichThuoc").attr("innerHTML","Nhập D-R");
			$("#messKichThuoc").css("color","red");
		}
		else if(CheckPhoneNumber(strTieuDe) || CheckPhoneNumber(strTieuDeD))
		{
			$("#messKichThuoc").attr("innerHTML","Nhập số");
			$("#messKichThuoc").css("color","red");
		}
		else
		{
			$("#messKichThuoc").attr("innerHTML", "");
			var serverURL = "checkservice.php?txtTieuDeTin=" + "strTieuDe";
			$("#messKichThuoc").load(serverURL);
		}
	});
	//check tang
	$("#txtTang").blur(function ()
	{
		var strTieuDe = $("#txtTang").attr("value");
		if(strTieuDe.length < 1 )
		{	
			$("#messTang").attr("innerHTML", "");
		}
		else if(CheckPhoneNumber(strTieuDe))
		{
			$("#messTang").attr("innerHTML","Nhập số");
			$("#messTang").css("color","red");
		}
		else
		{
			$("#messTang").attr("innerHTML", "");
			var serverURL = "checkservice.php?txtTieuDeTin=" + "strTieuDe";
			$("#messTang").load(serverURL);
		}
	});
	//check PhongTam
	$("#txtPhongTam").blur(function ()
	{
		var strTieuDe = $("#txtPhongTam").attr("value");
		if(strTieuDe.length < 1 )
		{	
			$("#messPhongTam").attr("innerHTML", "");
		}
		else if(CheckPhoneNumber(strTieuDe))
		{
			$("#messPhongTam").attr("innerHTML","Nhập số");
			$("#messPhongTam").css("color","red");
		}
		else
		{
			$("#messPhongTam").attr("innerHTML", "");
			var serverURL = "checkservice.php?txtTieuDeTin=" + "strTieuDe";
			$("#messPhongTam").load(serverURL);
		}
	});
	//check txtPhongNgu
	$("#txtPhongNgu").blur(function ()
	{
		var strTieuDe = $("#txtPhongNgu").attr("value");
		if(strTieuDe.length < 1 )
		{	
		$("#messPhongNgu").attr("innerHTML", "");
		}
		else if(CheckPhoneNumber(strTieuDe))
		{
			$("#messPhongNgu").attr("innerHTML","Nhập số");
			$("#messPhongNgu").css("color","red");
		}
		else
		{
			$("#messPhongNgu").attr("innerHTML", "");
			var serverURL = "checkservice.php?txtTieuDeTin=" + "strTieuDe";
			$("#messPhongNgu").load(serverURL);
		}
	});
	//check cbbBatDongSan
	$("#cbbBatDongSan").blur(function ()
	{
		var strTieuDe = $("#cbbBatDongSan").attr("value");
		if(strTieuDe == "-1" )
		{	
			$("#messLoaiBatDongSan").attr("innerHTML","Chọn loại nhà");
			$("#messLoaiBatDongSan").css("color","red");
		}
		else
		{
			$("#messLoaiBatDongSan").attr("innerHTML", "");
			var serverURL = "checkservice.php?txtTieuDeTin=" + "strTieuDe";
			$("#messLoaiBatDongSan").load(serverURL);
		}
		
	});
	//check cbbTinhTP
	$("#cbbTinhTP").change(function ()
	{
		var strTieuDe = $("#cbbTinhTP").attr("value");
		//var div_capnhatdv = $("#div_capnhatdv").attr("value");
		if(strTieuDe == "-1" )
		{	
			$("#messTinhTP").attr("innerHTML","Chọn tỉnh/thành phố");
			$("#messTinhTP").css("color","red");
		}
		else
		{
			$("#messTinhTP").attr("innerHTML", "");
			var serverURL = "checkservice.php?txtTieuDeTin=" + strTieuDe;
			$("#messTinhTP").load(serverURL);
			var serverURL = "checkservice.php?cbbTinhTP="+strTieuDe;
			$("#messLoadQuan").load(serverURL);			
			var serverURL = "checkservice.php?cbbPhuongXa=" + '-1';
			$("#messLoadPhuong").load(serverURL);
		}		
	});
	
	function CheckPhoneNumber(strText)
	{
		var strTemp="0123456789./-_()";
		for (var i=0; i<strText.length; i++)
		if (strTemp.indexOf (strText.charAt(i))==-1)//==-1 ko bao gio xay ra
			return true;

		return false;
	}
});	
</script>
<script type="text/javascript">
    function clearCookie()
	{
		BASIC_SetCookie("ccbQuanHuyen", -1, 1);
		BASIC_SetCookie("ccbPhuongXa", -1, 1);
	}
    function clickQuanHuyen()
	{
		var strTieuDe = $("#cbbQuanHuyen").attr("value");
		//var div_capnhatdv = $("#div_capnhatdv").attr("value");
		BASIC_SetCookie("ccbQuanHuyen", strTieuDe, 1);
		if(strTieuDe == "-1" )
		{
			$("#messQuanHuyen").attr("innerHTML","Chọn Quận/Huyện");
			$("#messQuanHuyen").css("color","red");
			clickPhuongXa();
		}
		else
		{
			var serverURL = "checkservice.php?cbbPhuongXa=" + strTieuDe;
			$("#messLoadPhuong").load(serverURL);
			var serverURL = "checkservice.php?txtTieuDeTin="+strTieuD;
			$("#messQuanHuyen").load(serverURL);
		}
	}
	function clickPhuongXa()
	{	
		var strTieuDe = $("#cbbPhuongXa").attr("value");
		BASIC_SetCookie("ccbPhuongXa", strTieuDe, 1);
		if(strTieuDe == "-1" )
		{	
			$("#messPhuong").attr("innerHTML","Chọn Quận/Huyện");
			$("#messPhuong").css("color","red");
		}
		else
		{
			// $("#messQuanHuyen").attr("innerHTML", "");
			var serverURL = "checkservice.php?txtTieuDeTin="+strTieuDe;
			$("#messPhuong").load(serverURL);
		}
	}
	function BASIC_SetCookie(name, value, days)
	{
		if (typeof days!="undefined"){ //if set persistent cookie
			var expireDate = new Date()
			var expstring=expireDate.setDate(expireDate.getDate()+days)
			document.cookie = name+"="+value+"; expires="+expireDate.toGMTString()
		}
		else //else if this is a session only cookie
			document.cookie = name+"="+value
	}
	function saveData()
	{
		var url = document.location.href;
		BASIC_SetCookie("url", url, 1);
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
						<td style="padding: 10px;" valign="top">	
							<div style="width: 686px;">
								<div id="messLoaiDangTin" name="messLoaiDangTin" style="margin-left: 10px; margin-top: 10px; font-family: tahoma; font-size: 18px;font-weight: bold; color:#890C29;">
								<?php
									$ltdv = $_GET['loaidvcandang'];
									if(isset($_GET['update']) && $_GET['update']!= null)
									{
										echo "Cập Nhật ";
										$capnhatDV = DichVuBUS::select($_GET['update']);
									}
									if ($ltdv == 1)
										echo "Đăng Tin Cần Bán";
									else if ($ltdv == 2)
										echo "Đăng Tin Cần Mua";
									else if ($ltdv == 3)
										echo "Đăng Tin Cho Thuê";
									else
										echo "Đăng Tin Cần Thuê";
								?>
								</div>
								<hr style="color: rgb(211, 232, 248);" width="680" size="1">
								<div class="mid_content">
									<div class="notice">
										<span class="badge"></span>
										<div style="background-color: #FFFFFF; border: 1px solid #DDDDDD;margin: 10px; padding: 10px 20px;" class="innerBox">
											<ul style="list-style: none outside none;padding-left:0;">
												<li><b>Để sử dụng các tính năng nâng cao và dễ dàng quản lý tin đăng, xin vui lòng đăng nhập trước khi đăng tin.</b>
												</li>
												<li><b>Xin vui lòng tham khảo các <a href="noiquidangtin.php" style="text-decoration:underline;color:red;font-size:11px;"> 
												   quy định đăng tin</a> trước khi đăng tin.</b></li>
												<li><b>Không đăng tin trùng lắp, lặp lại từ khóa nhiều lần trong bài viết.</b></li>
												<li><b style="color:red;">Mọi trường hợp đăng tin không đúng quy định sẽ bị xóa mà không cần báo
													trước.</b></li>
											</ul>
										</div>
									</div>
									<?php
										if (isset($_GET["loaidvcandang"]) && ($_GET["loaidvcandang"] == 1 || $_GET["loaidvcandang"] == 3))
										{
									?>
									<div style="margin:20px 0;">
										<table width="80%" align="center">
											<tr>
											<?php
												if ($_GET["step"] == 1)
												{
											?>
												<td width="32" height="32"><img width="32" height="32" style="border:none;" src="../images/step_1.png"></td>
												<td class="step_selected">Bước 1 <br>Thông tin chung</td>
												<td width="32" height="32"><img width="32" height="32" style="border:none;" src="../images/step_2.png"></td>
												<td class="step">Bước 2 <br>Thông tin tiện ích</td>
												<td width="32" height="32"><img width="32" height="32" style="border:none;" src="../images/step_3.png"></td>
												<td class="step">Bước 3 <br>Đăng tin thành công</td>
											<?php
												}
												else if ($_GET["step"] == 2)
												{
											?>
												<td width="32" height="32"><img width="32" height="32" style="border:none;" src="../images/step_1.png"></td>
												<td class="step">Bước 1 <br>Thông tin chung</td>
												<td width="32" height="32"><img width="32" height="32" style="border:none;" src="../images/step_2.png"></td>
												<td class="step_selected">Bước 2 <br>Upload hình ảnh</td>
												<td width="32" height="32"><img width="32" height="32" style="border:none;" src="../images/step_3.png"></td>
												<td class="step">Bước 3 <br>Đăng tin thành công</td>
											<?php
												}
												else if ($_GET["step"] == 3)
												{
											?>
												<td width="32" height="32"><img width="32" height="32" style="border:none;" src="../images/step_1.png"></td>
												<td class="step">Bước 1 <br>Thông tin chung</td>
												<td width="32" height="32"><img width="32" height="32" style="border:none;" src="../images/step_2.png"></td>
												<td class="step">Bước 2 <br>Upload hình ảnh</td>
												<td width="32" height="32"><img width="32" height="32" style="border:none;" src="../images/step_3.png"></td>
												<td class="step_selected">Bước 3 <br>Đăng tin thành công</td>
											<?php
												}
											?>
											</tr>
										</table>
									</div>
									<?php
										}
										if ($_GET["step"] == 1)
										{
//form start step 1							
											if(isset($_GET['update']) && $_GET['update'] != null)
											{
												echo "<form action='user/xulydichvu.php?loaidvcandang=".$_GET['loaidvcandang']."&id=".$curUserId."&update=".$_GET['update']."&step=1' method='post' id='frmDichVu' name='frmDichVu' enctype='multipart/form-data' onsubmit='saveData();'>";
											}
											else
												echo "<form action='user/xulydichvu.php?loaidvcandang=".$_GET['loaidvcandang']."&step=1&id=".$curUserId."' method='post' id='frmDichVu' name='frmDichVu' enctype='multipart/form-data' onsubmit='saveData();'>";
											if(isset($_GET['loaidvcandang']))
												$loaitindichvu = $_GET['loaidvcandang'];
											else
												header("Location:noiquidangtin.php");
										?>
									<div><!-- Bước 1 -->
										<table cellspacing="0" cellpadding="4" border="0" style="width:690px;">
											<tr style="background:#00397C;height:30px;">
												<td colspan="2" class="ButtonWithbackground">THÔNG TIN</td>
											</tr>
											<!--THÔNG TIN -->
											<tr bgcolor="#F2F5F9">
												<td style="width:60px;">Loại giao dịch:</td>
												<td style="width:500px;">
													<?php 
													if(isset($_GET['loaidvcandang']))
													{
													   // echo "<br>loaidvcandang=".$_GET['loaidvcandang'];
														$t= $_GET['loaidvcandang'];
														echo "<div id='idLoaiDV' name='idLoaiDV' value='".$_GET["loaidvcandang"]."'></div>";
														echo "<input name='txtIDLoaiDV' id='txtIDLoaiDV' type='text' style='width:300px;display:none;'
														value='".$_GET['loaidvcandang']."'>";
													}
													?>
													<input name="txtIDLoaiDV" id="txtIDLoaiDV" type="text" style="width:300px;display:none;" value="1">
													<div id="messTenLoai" name="messTenLoai"><b>
													<?php
													if($loaitindichvu == 1)
														echo "Cần Bán";
													else if ($loaitindichvu == 2)
													{
														echo "Cần mua";
													}else if($loaitindichvu == 3)
													{
														echo "Cho thuê";
													}
													else
														echo "Cần thuê";
													?></b></div>											
												</td>
											</tr>
											<tr bgcolor="#F2F5F9" height="30px">
												<td width="200px"><b>Tiêu đề tin:</b><span style="color:red;"> *</span></td>
												<td>											
													<div style="width:310px;float:left;">
													<?php
													if(isset($_GET['update']) && $_GET['update'] != null)
													{
														echo "<input name='txtTieuDeTin' id='txtTieuDeTin' type='text' style='width:300px;' value='".$capnhatDV['tieude']."'>";
														//echo "<div id='div_capnhatdv' name='div_capnhatdv' value='".$_GET['update']."'></div>";
													}
													else
													{
													?>
													<input name="txtTieuDeTin" id="txtTieuDeTin" type="text" style="width:300px;">
													
													<?php } ?>
													
													</div>
													<div id="messTieuDe" name="messTieuDe" style="width:150px;float:left;"></div>
												</td>
											</tr>
											<tr bgcolor="#F2F5F9" height="30px">
												<td width="200px"><b>Loại bất động sản:</b><span style="color:red;"> *</span></td>
												<td style="float:left;">
													<div style="width:310px;float:left;">
														<select id="cbbBatDongSan" name="cbbBatDongSan">
															<option value="-1">-- Chọn Loại Bất Động Sản --</option>
															<?php
																include("../BUS/LoaiNhaBUS.php");
																$rs=LoaiNhaBUS::GetAllLoaiNha();
																for($i=0;$i<count($rs);$i++)
																{		
																	if(isset($_GET['update']) && $_GET['update'] != null && $capnhatDV['loainha'] == $rs[$i][0])
																	{
																		echo "<option value='".($i+1)."' selected>".$rs[$i][1]."</option>";
																	}
																	else
																		echo "<option value='".($i+1)."'>".$rs[$i][1]."</option>";	
																}
															?>
														</select>
													</div>
													<div id="messLoaiBatDongSan" name="messLoaiBatDongSan" style="width:150px;float:left;"></div>
												</td>
											</tr>
											<tr bgcolor="#F2F5F9" height="30px">
												<td width="200px"><b>Tỉnh/Thành Phố:</b><span style="color:red;"> *</span></td>
												<td style="float:left;">
													<div style="width:310px;float:left;">
														<select id="cbbTinhTP" name="cbbTinhTP" style="width:220px;" onchange="clearCookie();">
															<option value="-1" selected="selected">-- Chọn Tỉnh/Thành Phố --</option>
															<?php
																include("../BUS/TinhBUS.php");
																$rs=TinhBUS::GetAllTinh();
																for($i=0;$i<count($rs);$i++)
																{	
																	if(isset($_GET['update']) && $_GET['update'] != null && $capnhatDV['tinh'] == $rs[$i][0])
																	{	
																		echo "<option value='".($i+1)."' selected>".$rs[$i][1]."</option>";	
																	}
																	else
																		echo "<option value='".($i+1)."'>".$rs[$i][1]."</option>";	
																}
															?>												
														</select>
													</div>
													<div id="messTinhTP" name="messTinhTP" style="width:150px;float:left;"></div>
												</td>
											</tr>
											<tr bgcolor="#F2F5F9" height="30px">
												<?php 
												if($loaitindichvu == 2 || $loaitindichvu == 4)
												{
													echo "<td width='200px'>Quận/Huyện:</td>";
												}
												else
												{
												?>
												<td width="200px"><b>Quận/Huyện:</b><span style="color:red;"> *</span></td>
												<?php } ?>
												<td>
													<div style="width:310px;float:left;" id="messLoadQuan" name="messLoadQuan">
												<?php
												if(isset($_GET['update']) && $_GET['update'] != null && $capnhatDV['quan'] != 25)
												{
													$PATH_BASE = str_replace('//','/',dirname(__FILE__).'/');
													include_once ($PATH_BASE . '../BUS/QuanBUS.php');
													include_once ($PATH_BASE . '../BUS/PhuongBUS.php');
													$rs=QuanBUS::GetAllQuanById($capnhatDV['tinh']);
		
													echo "<select id='cbbQuanHuyen' name='cbbQuanHuyen' style='width:220px;' onchange='clickQuanHuyen();'>";
													echo "<option value='-1' selected>-- Chọn Quận/Huyện --</option>";
													for($i=0;$i<count($rs);$i++)
													{	
														if($capnhatDV['quan'] == $rs[$i][0])
															echo "<option value='".($rs[$i][0])."' selected>".$rs[$i][1]."</option>";
														else
															echo "<option value='".($rs[$i][0])."'>".$rs[$i][1]."</option>";
													}
													echo "</select>";
												}
												else
												{
												
												?>
													<input name="txtQuanHuyen" id="txtQuanHuyen" type="text" style="width:300px;" value="" disabled="disabled">
												<?php } ?>
													</div>
													<div id="messQuanHuyen" name="messQuanHuyen" style="width:150px;float:left;"></div>
												</td>
											</tr>
											<tr bgcolor="#F2F5F9" height="30px">
											<?php 
												if($loaitindichvu == 2 || $loaitindichvu == 4)
												{
													echo "<td width='200px'>Phường/Xã:</td>";
												}
												else
												{
												?>
												<td width="200px"><b>Phường/Xã:</b><span style="color:red;"> *</span></td>
												<?php }  ?>
												<td>
												<div style="width:310px;float:left;" id="messLoadPhuong" name="messLoadPhuong" >
													<?php
													if(isset($_GET['update']) && $_GET['update'] != null && $capnhatDV['phuong'] != 23)
													{
														$PATH_BASE = str_replace('//','/',dirname(__FILE__).'/');
														include_once ($PATH_BASE . '../BUS/QuanBUS.php');
														include_once ($PATH_BASE . '../BUS/PhuongBUS.php');
														$rs=PhuongBUS::GetAllPhuongById($capnhatDV['quan']);
														echo "<select id='cbbPhuongXa' name='cbbPhuongXa' style='width:220px;' onchange='clickPhuongXa();'>";
														echo "<option value='-1' selected>-- Chọn Phường/Xã --</option>";
														for($i=0;$i<count($rs);$i++)
														{	
															if($capnhatDV['phuong'] == $rs[$i][0])
																echo "<option value='".($rs[$i][0])."' selected>".$rs[$i][1]."</option>";
															else
																echo "<option value='".($rs[$i][0])."'>".$rs[$i][1]."</option>";
														}
														echo "</select>";
													}
													else
													{
													?>
													<input name="txtPhuongXa" id="txtPhuongXa" type="text" style="width:300px;" value="" disabled="disabled">
													<?php } ?>
													</div>
													<div id="messPhuong" name="messPhuong" style="width:150px;float:left;"></div>
												</td>
											</tr>
											
											<tr bgcolor="#F2F5F9" height="30px">
											<?php 
												if($loaitindichvu == 2 || $loaitindichvu == 4)
												{
													echo "<td width='200px'>Đường/Phố:</td>";
												}
												else
												{
												?>
												<td width="200px"><b>Đường/Phố:</b><span style="color:red;"> *</span></td>
												<?php } ?>
												<td>
												<div style="width:310px;float:left;"> 
												<?php
													if(isset($_GET['update']) && $_GET['update'] != null)
													{
														echo "<input name='txtDuongPho' id='txtDuongPho' type='text' style='width:300px;' value='".$capnhatDV['duong']."' >";
													}
													else
													{
												?>
													<input name="txtDuongPho" id="txtDuongPho" type="text" style="width:300px;" value="" >
													<?php  } ?>
													</div>
													<div id="messDuongPho" name="messDuongPho" style="width:150px;float:left;"></div>
												</td>
											</tr>
											<tr bgcolor="#F2F5F9" height="30px">
											<?php 
											if($loaitindichvu == 2 || $loaitindichvu == 4)
											{
												echo "<td width='200px'>Số /Lô nhà:</td>";
											}
											else
											{
											?>
												<td><b>Số nhà/Số lô:</b><span style="color:red;"> *</span></td>
											<?php } ?>
												<td>
													<div style="width:310px;float:left;">
												<?php
												if(isset($_GET['update']) && $_GET['update'] != null)
												{
													echo "<input name='txtSoNha' id='txtSoNha' type='text' style='width:300px;' value='".$capnhatDV['sonha']."' >";
												}
												else
												{
												?>
													<input  id="txtSoNha" name="txtSoNha" type="text" style="width:300px;" value="">
												<?php } ?>
													</div>
													<div id="messSoNha" name="messSoNha" style="width:150px;float:left;"></div>
												</td>
											</tr>
											<tr bgcolor="#F2F5F9" height="30px">
												<td>Khuyến mãi</td>
												<td>
													<div style="width:310px;float:left;">
													<?php
													if(isset($_GET['update']) && $_GET['update'] != null)
													{
														echo "<input name='txtKhuyenMai' id='txtKhuyenMai' type='text' style='width:300px;' value='".$capnhatDV['khuyenmai']."' >";
													}
													else
													{
													?>
													<input  id="txtKhuyenMai" name="txtKhuyenMai" type="text" style="width:300px;" value="">
													<?php } ?>
													</div>
													<div id="messSoNha" name="messSoNha" style="width:150px;float:left;"></div>
												</td>
											</tr>
											<tr bgcolor="#F2F5F9" height="30px">
												<td width="200px" ><b>Giá:</b><span style="color:red;"> *</span></td>
												<td>
												<div style="width:310px;float:left;">
													<?php
													if(isset($_GET['update']) && $_GET['update'] != null)
													{
														echo "<input name='txtGia' id='txtGia' type='text' style='width:123px;text-align:right;' value='".$capnhatDV['giaban']."' onkeypress='return keypress(event);' >";
													}
													else
													{
													?>
													<input id="txtGia" name="txtGia" class="Textbox" type="text" style="width:123px;text-align:right;" onkeypress="return keypress(event);" />
													<?php } ?>
													<select id="cbbDonViTien" class="DropDownList" name="cbbDonViTien">
													<?php
														include("../BUS/DonViTienBUS.php");
														$rs=DonViTienBUS::GetAllDonViTien();
														for($i=0;$i<count($rs);$i++)
														{	
															if(isset($_GET['update']) && $_GET['update'] != null && $capnhatDV['donvitien']== $rs[$i][0])
															{
																echo "<option value='".($i+1)."' selected>".$rs[$i][1]."</option>";
															}
															else
															{
																if($rs[$i][0] == 2)														
																	echo "<option selected value='".($i+1)."'>".$rs[$i][1]."</option>";
																else
																	echo "<option value='".($i+1)."'>".$rs[$i][1]."</option>";
															}
														}
													?>
													</select> / 
													<select id="cbbDonViDichVu" name="cbbDonViDichVu" class="DropDownList" >
													<?php
														include("../BUS/DonViDichVuBUS.php");
														$rs=DonViDichVuBUS::GetAllDonViDichVu();
														for($i=0;$i<count($rs);$i++)
														{	
															if(isset($_GET['update']) && $_GET['update'] != null && $capnhatDV['donvidv']== $rs[$i][0])
															{
																echo "<option value='".($i+1)."' selected>".$rs[$i][1]."</option>";
															}
															else
																echo "<option value='".($i+1)."'>".$rs[$i][1]."</option>";
														}
													?>												
													</select>
													</div>
													<div id="messGia" name="messGia" style="width:150px;float:left;"></div>
												</td>
											</tr>
										</table>
<!--THÔNG TIN BẤT ĐỘNG SẢN -->			<table class="table" width="100%" cellpadding="0" cellspacing="0">
											<tr style="background:#00397C;height:30px;">
												<td colspan="4" class="ButtonWithbackground">THÔNG TIN BẤT ĐỘNG SẢN</td>
											</tr><br>
											<tr>
											<?php 
											if($loaitindichvu == 2 || $loaitindichvu == 4)
											{
												echo "<td width='200px'>Kích thước:</td>";
											}
											else
											{
											?>
												<td width="200px" valign="button"><b>Kích thước:</b><span style="color:red;"> *</span></td>
											<?php } ?>
												<td>
													<div style="width:110px;float:left;">
													<?php
													if(isset($_GET['update']) && $_GET['update'] != null)
													{
														echo "R <input id='txtRong' name='txtRong' class='Textbox' type='text' style='width:25px;' onkeypress='return keypress(event);' value='".$capnhatDV['rong']."' /> x <input id='txtDai' name='txtDai' class='Textbox' type='text' style='width:25px;' onkeypress='return keypress(event);' value='".$capnhatDV['dai']."'/>D";
													}
													else
													{
													?>
														R <input id="txtRong" name="txtRong" class="Textbox" type="text" style="width:25px;" onkeypress="return keypress(event);" />
														x
														<input id="txtDai" name="txtDai" class="Textbox" type="text" style="width:25px;" onkeypress="return keypress(event);" /> D													<?php } ?>
													</div>
												<div id="messKichThuoc" name="messKichThuoc" style="width:60px;float:left;"></div>
												</td>
												<td>
													Số tầng:
												</td>
												<td>
													<div style="width:110px;float:left;">
													<?php
													if(isset($_GET['update']) && $_GET['update'] != null)
													{
														echo "<input id='txtTang' name='txtTang' class='Textbox' type='text' style='width:40px;' onkeypress='return keypress(event);' value='".$capnhatDV['tang']."'/>";
													}
													else
													{
													?>
													<input id="txtTang" name="txtTang" class="Textbox" type="text" style="width:40px;" onkeypress="return keypress(event);" />
													<?php } ?>
													</div>
												</td>
											</tr>
											<tr>
												<td width="200px">Số phòng ngủ:</td>
												<td>
													<div style="width:110px;float:left;">
													<?php
													if(isset($_GET['update']) && $_GET['update'] != null)
													{
														echo "<input id='txtPhongNgu' name='txtPhongNgu' class='Textbox' type='text' style='width:40px;' onkeypress='return keypress(event);' value='".$capnhatDV['sophongngu']."'/>";
													}
													else
													{
													?>
														<input id="txtPhongNgu" name="txtPhongNgu" class="Textbox" type="text" style="width:40px;" onkeypress="return keypress(event);" />
													<?php } ?>
													</div>
												</td>
												<td>Số phòng WC/Tắm:</td>
												<td>
													<div style="width:110px;float:left;">
													<?php
													if(isset($_GET['update']) && $_GET['update'] != null)
													{
														echo "<input id='txtPhongTam' name='txtPhongTam' class='Textbox' type='text' style='width:40px;' onkeypress='return keypress(event);' value='".$capnhatDV['sophongtam']."' />";
													}
													else
													{
													?>
														<input id="txtPhongTam"  name="txtPhongTam" class="Textbox" type="text" style="width:40px;" onkeypress="return keypress(event);">	
													<?php } ?>
													</div>
												</td>
											</tr>
											<tr>
												<td width="200px">Tình trạng pháp lý:</td>
												<td>
													<select id="cbbPhapLy" name="cbbPhapLy" class=" DropDownList" >
													<?php
														include("../BUS/PhapLyBUS.php");
														$rs=PhapLyBUS::GetAllPhapLy();
														for($i=0;$i<count($rs);$i++)
														{	
															if(isset($_GET['update']) && $_GET['update'] != null && $capnhatDV['phaply']== $rs[$i][0])
															{
																echo "<option value='".($rs[$i][0])."' selected>".$rs[$i][1]."</option>";
															}
															else
																echo "<option value='".($rs[$i][0])."'>".$rs[$i][1]."</option>";
														}
													?>	
													</select>
												</td>
												<td>Hướng nhà:</td>
												<td>
													<select id="cbbHuongNha" name="cbbHuongNha" class="DropDownList" >
													<?php
														include("../BUS/HuongNhaBUS.php");
														$rs=HuongNhaBUS::GetAllHuongNha();
														for($i=0;$i<count($rs);$i++)
														{		
															if(isset($_GET['update']) && $_GET['update'] != null && $capnhatDV['huongnha']== $rs[$i][0])
															{
																echo "<option value='".($rs[$i][0])."' selected>".$rs[$i][1]."</option>";
															}
															else
																echo "<option value='".($rs[$i][0])."'>".$rs[$i][1]."</option>";
														}
													?>	
													</select>
												</td>
											</tr>
										</table><br>
<!--CÁC TIỆN ÍCH -->					<table class="table" width="100%" cellpadding="0" cellspacing="0">
											<tr style="background:#00397C;height:30px;">
												<td colspan="4" class="ButtonWithbackground">CÁC TIỆN ÍCH</td>
											</tr>
											<?php
												include("../BUS/TienIchBUS.php");
												if(isset($_GET['update']) && $_GET['update'] != null)
												{
													include_once("../BUS/DichVu_TienIchBUS.php");
													$dv_tienich = DichVu_TienIchBUS::getAllByIDDichVu($capnhatDV[0]);
												}
												
												$rs=TienIchBUS::GetAllTienIch();
												
												$dem=0;
												//echo "count=".count($rs);
												for($i=0;$i<count($rs);$i++)
												{	
													if(($dem % 3) == 0)
													{		
													   echo "<tr>";
													}
													$dem++;
													$flag = true;
													if(isset($_GET['update']) && $_GET['update'] != null)
													{
														
														for($j=0;$j<count($dv_tienich);$j++)
														{
															if($dv_tienich[$j][2] == $rs[$i][0])
															{
																echo "<td><input id='cbId[]'  name='cbId[]' type='checkbox' value='".$dem."' checked>";
																
																$flag = false;
																break;
															}
														}
													}
													if($flag == true)
														echo "<td><input id='cbId[]'  name='cbId[]' type='checkbox' value='".$dem."'>";
													echo "<label for='".$dem."' > ".$rs[$i][1]."</label>";											
													echo "</td>";
													if(($dem % 3) == 0)
													{
													   echo "</tr>";
													}
												}
											?>
										</table><br>
<!--MÔ TẢ NGẮN (DƯỚI 500 KÝ TỰ) -->		<table class="table" width="100%" cellpadding="0" cellspacing="0">
											<tr style="background:#00397C;height:30px;">
												<td colspan="4" class="ButtonWithbackground">MÔ TẢ NGẮN (DƯỚI 500 KÝ TỰ)</td>
											</tr>
											<tr>
												<td>
												<?php
													$path = rtrim($_SERVER['PHP_SELF'],"ce/module/dangtindichvu.php/")."ce/library/fckeditor/";
													include("../library/fckeditor/fckeditor.php");
													$summary = new FCKeditor("summary");
													$summary->BasePath = $path;
													$summary->Height=300;
													if(isset($_GET['update']) && $_GET['update'] != null)
													{
														$summary->Value = $capnhatDV['mota'];
													}
													else
														$summary->Value = "";
													$summary->Create();
												?>
												</td>
											</tr>
										</table><br>
<!--THÔNG TIN LIÊN HỆ -->				<table cellspacing="0" cellpadding="2" width="100%" border="0">
											<?php
											if($curUser != null)
											{
												include("../BUS/UsersBUS.php");
												$result=UsersBus::GetUserByEmail($curUserEmail);
											}
											?>										
											<tr style="background:#00397C;">
												<td colspan="2" class="ButtonWithbackground">THÔNG TIN LIÊN HỆ</td>
											</tr>
											<tr bgcolor="#F2F5F9" height="30px">
												<td>Họ và Tên:</td>
												<td><span id="infoHoTen" name="infoHoTen">
												<?php 
													echo $result['hoten'];
												?></span></td>
											</tr>
											<tr bgcolor="#F2F5F9" height="30px">
												<td>Địa chỉ liên lạc:</td>
												<td><span id="infoDiaChi" name="infoDiaChi"><?php echo $curUserAddress;?></span></td>
											</tr>
											<tr bgcolor="#F2F5F9" height="30px">
												<td>Số điện thoại: </td>
												<td><span id="infoSDT" name="infoSDT">
												<?php
													echo $result['sdt1'];
													if ($result['sdt2'] != "")
														echo " - ".$result['sdt2'];
												?>
												</span></td>
											</tr>
											<tr bgcolor="#F2F5F9" height="30px">
												<td>Email liên lạc:</td>
												<td><span id="infoSDT" name="infoSDT">
												<?php
													echo $result['email'];
												?>
												</span></td>
											</tr>
										</table>
										<input type="hidden" id="tmp" value="1" />
										<div style="width:70px;padding:20px 0;margin-left:300px;">
											<span class="action-button-left"></span>
											<input class="submitYellow" type="Submit" value="Đăng tin" id="btnSubmit" name="btnSubmit" />
											<span class="action-button-right"></span>
										</div>
									</div><!-- End: Bước 1 -->
									</form>	
<!--form end  step 1 -->
<!--form start step 2 -->									
									<?php
										}
										else if ($_GET["step"] == 2 && (($_GET["loaidvcandang"] == 1) || ($_GET["loaidvcandang"] == 3)))
										{
											if(isset($_GET['update']) && $_GET['update'] != null)
											{
												echo "<form action='user/xulydichvu.php?newid=".$_GET["newid"]."&update=".$_GET['update']."&id=".$curUserId."' method='post' enctype='multipart/form-data'>";
											}
											else
												echo "<form action='user/xulydichvu.php?newid=".$_GET["newid"]."&id=".$curUserId."' method='post' enctype='multipart/form-data'>";
									?>
										<div><!-- Bước 2 -->
											<table cellspacing="0" cellpadding="4" border="0" style="width:690px;">
												<tr style="background:#00397C;height:30px;">
													<td colspan="2" class="ButtonWithbackground">UPLOAD HÌNH ẢNH</td>
												</tr>
												<tr><td align="center"><input type="file" size="50" name="ffImage1"></td></tr>
												<tr><td align="center"><input type="file" size="50" name="ffImage2"></td></tr>
												<tr><td align="center"><input type="file" size="50" name="ffImage3"></td></tr>
												<tr><td align="center"><input type="file" size="50" name="ffImage4"></td></tr>
												<tr><td align="center"><input type="file" size="50" name="ffImage5"></td></tr>
											</table>
											<input type="hidden" name="newid" value='<?php echo $_GET["newid"] ?>' />
											<div style="width:60px;margin:20px 0px 20px 300px;">
												<span class="action-button-left"></span>
												<input class="submitYellow" type="Submit" value="Upload" id="btnUpload" name="btnUpload" />
												<span class="action-button-right"></span>
											</div>
										</div><!-- End: Bước 2 -->
										</form>
<!-- form end step 2-->
									<?php
										}
										else if ($_GET["step"] == 3 || (isset($_GET["dangtin"]) && $_GET["dangtin"] == "success"))
										{
											if(isset($_GET['update']) && $_GET['update'] != null)
											{
												echo "<center><b style='color:blue;'>Quá trình cập nhật đăng tin của bạn đã thành công.</b></center><br>";
											}
											else
												echo "<center><b style='color:blue;'>Quá trình đăng tin của bạn đã thành công. Vui lòng chờ admin xét duyệt.</b></center><br>";
									?>
											<a href="tindadang.php?type=2"><div style="width:70px;margin-left:300px;">
												<span class="action-button-left"></span>
												<input class="submitYellow" type="Submit" value="Tiếp tục" />
												<span class="action-button-right"></span>
											</div></a>
									<?php
										}
									?>
								</div>
							</div>
						</td><!--END PROCESS-->
					</tr>
				</table>
			</td>
		</tr>
	</table>
	<input type="hidden" id="idQuan" value="0" />
	<input type="hidden" id="idPhuong" value="0" />
<?php
	include("../include/footer.php");
?>