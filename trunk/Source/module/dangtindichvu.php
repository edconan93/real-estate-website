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
			var serverURL = "checkservice.php?txtTieuDeTin="+strTieuDe;
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
<!--BEGIN -->		
<div id="frmDichVu1" name ="frmDichVu1">
<?php echo "<form action='user/xulydichvu.php?id=".$curUserId."' method='post' id='frmDichVu' name='frmDichVu' enctype='multipart/form-data'>"; 
if(isset($_GET['loaidvcandang']))
	$loaitindichvu = $_GET['loaidvcandang'];
else
	 header("Location:noiquidangtin.php");
?>
<!--form action="user/xulydichvu.php?id='.$curUserId.' method="post" id="frmDichVu" name="frmDichVu" -->
						<td style="padding: 10px;" valign="top">	
						
							<div style="width: 686px;">
								<div id="messLoaiDangTin" name="messLoaiDangTin" style="margin-left: 10px; margin-top: 10px; font-family: tahoma; font-size: 18px;font-weight: bold; color:#890C29;">
								<?php
								if($loaitindichvu == 1)
									echo "Đăng Tin Cần Bán";
								else if ($loaitindichvu == 2)
								{
									echo "Đăng tin cần mua";
								}else if($loaitindichvu == 3)
								{
									echo "Đăng tin cho thuê";
								}
								else
									echo "Đăng tin cần thuê";
								?>
								</div>
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
									<!--table class="table" width="100%" cellpadding="0" cellspacing="0" border="0"-->
									<table cellspacing="0" cellpadding="4" border="0" style="width:690px;">
										<tr style="background:#00397C;height:30px;">
											<td colspan="2" style="color:#FFF;font-weight:bold;padding-left:4px;">THÔNG TIN</td>
									    </tr>
										<!--THÔNG TIN -->
										<tr bgcolor="#F2F5F9">
											<td style="width:60px;">Loại giao dịch:</td>
											<td style="width:500px;">
												<?php 
												if(isset($_GET['loaidvcandang']))
												{
													$t= $_GET['loaidvcandang'];
													echo "<div id='idLoaiDV' name='idLoaiDV' value='".$_GET["loaidvcandang"]."'></div>";
													echo "<input name='txtIDLoaiDV' id='txtIDLoaiDV' type='text' style='width:300px;display:none;'
													value='".$loaitindichvu."'>";
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
												<input name="txtTieuDeTin" id="txtTieuDeTin" type="text" style="width:300px;"></div>
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
												<!--select id="cbbQuanHuyen" name="cbbQuanHuyen" style="width:220px;" onchange="clickQuanHuyen()">
													<option value="-1" selected="selected">--Chọn Quận/ Huyện--</option>	
												</select-->
												<input name="txtQuanHuyen" id="txtQuanHuyen" type="text" style="width:300px;" value="" disabled="disabled">
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
												<!--select id="cbbPhuongXa" name="cbbPhuongXa" style="width:220px;" onchange="clickPhuongXa()">
													<option value="-1">--Chọn Phường/Xã--</option>	
												</select-->
												<input name="txtPhuongXa" id="txtPhuongXa" type="text" style="width:300px;" value="" disabled="disabled">
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
												<input name="txtDuongPho" id="txtDuongPho" type="text" style="width:300px;" value="" >
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
												<input  id="txtSoNha" name="txtSoNha" type="text" style="width:300px;" value="">
												</div>
												<div id="messSoNha" name="messSoNha" style="width:150px;float:left;"></div>
											</td>
										</tr>
										<tr bgcolor="#F2F5F9" height="30px">
											<td>Khuyến mãi</td>
											<td>
												<div style="width:310px;float:left;"> 
												<input  id="txtKhuyenMai" name="txtKhuyenMai" type="text" style="width:300px;" value="">
												</div>
												<div id="messSoNha" name="messSoNha" style="width:150px;float:left;"></div>
											</td>
										</tr>
										<tr bgcolor="#F2F5F9" height="30px">
											<td width="200px" ><b>Giá:</b><span style="color:red;"> *</span></td>
											<td>
											<div style="width:310px;float:left;">
												<input id="txtGia" name="txtGia" class="Textbox" type="text" style="width:123px;text-align:right;" onkeypress="return keypress(event);" />
												<select id="cbbDonViTien" class="DropDownList" name="cbbDonViTien">
												<?php
													include("../BUS/DonViTienBUS.php");
													$rs=DonViTienBUS::GetAllDonViTien();
													for($i=0;$i<count($rs);$i++)
													{		
														echo "<option value='".($i+1)."'>".$rs[$i][1]."</option>";
													}
												?>
												</select> / 
												<select id="cbbDonViDichVu" name="cbbDonViDichVu" class="DropDownList" >
												<?php
													include("../BUS/DonViDichVuBUS.php");
													$rs=DonViDichVuBUS::GetAllDonViDichVu();
													for($i=0;$i<count($rs);$i++)
													{		
														echo "<option value='".($i+1)."'>".$rs[$i][1]."</option>";
													}
												?>												
												</select>
												</div>
												<div id="messGia" name="messGia" style="width:150px;float:left;"></div>
											</td>
										</tr>
									</table>
									<table class="table" width="100%" cellpadding="0" cellspacing="0">
										<tr style="background:#00397C;height:30px;">
<!--THÔNG TIN BẤT ĐỘNG SẢN -->				<td colspan="4" style="color:#FFF;font-weight:bold;padding-left:4px;">THÔNG TIN BẤT ĐỘNG SẢN</td>
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
													D <input id="txtDai" name="txtDai" class="Textbox" type="text" style="width:25px;" onkeypress="return keypress(event);" />
													x
													<input id="txtRong" name="txtRong" class="Textbox" type="text" style="width:25px;" onkeypress="return keypress(event);" /> R											
												</div>
											<div id="messKichThuoc" name="messKichThuoc" style="width:60px;float:left;"></div>
											</td>
											<td>
												Số tầng:
											</td>
											<td>
												<div style="width:110px;float:left;">
												<input id="txtTang" name="txtTang" class="Textbox" type="text" style="width:40px;" onkeypress="return keypress(event);" />
												</div>
											</td>
										</tr>
										<tr>
											<td width="200px">Số phòng ngủ:</td>
											<td>
												<div style="width:110px;float:left;">
													<input id="txtPhongNgu" name="txtPhongNgu" class="Textbox" type="text" style="width:40px;" onkeypress="return keypress(event);" />
												</div>
											</td>
											<td>Số phòng WC/Tắm:</td>
											<td>
												<div style="width:110px;float:left;">
													<input id="txtPhongTam"  name="txtPhongTam" class="Textbox" type="text" style="width:40px;" onkeypress="return keypress(event);">
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
														echo "<option value='".($i+1)."'>".$rs[$i][1]."</option>";
													}
												?>	
												</select>
											</td>
											<td>Hướng nhà:</td>
											<td>
												<select id="cbbHuongNha" name="cbbHuongNha" class="DropDownList" >
												<!--option value="-1" selected>--Lựa Chọn--</option-->
												<?php
													include("../BUS/HuongNhaBUS.php");
													$rs=HuongNhaBUS::GetAllHuongNha();
													for($i=0;$i<count($rs);$i++)
													{		
														if($i == (count($rs)-1))
															echo "<option value='".($i+1)."' selected>".$rs[$i][1]."</option>";
														else
															echo "<option value='".($i+1)."'>".$rs[$i][1]."</option>";
													}
												?>	
												</select>
											</td>
										</tr>
									</table><br>
									<table class="table" width="100%" cellpadding="0" cellspacing="0">
										<tr style="background:#00397C;height:30px;">
<!--CÁC TIỆN ÍCH -->						<td colspan="4" class="ButtonWithbackground">CÁC TIỆN ÍCH</td>
										</tr>
										<?php
											include("../BUS/TienIchBUS.php");
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
									<table class="table" width="100%" cellpadding="0" cellspacing="0">
										<tr style="background:#00397C;height:30px;">
<!--MÔ TẢ NGẮN (DƯỚI 500 KÝ TỰ) -->			<td colspan="4" class="ButtonWithbackground">MÔ TẢ NGẮN (DƯỚI 500 KÝ TỰ)</td>
										</tr>
										<tr>
											<td>
											<?php
												$path = rtrim($_SERVER['PHP_SELF'],"ce/module/dangtindichvu.php/")."ce/library/fckeditor/";
												include("../library/fckeditor/fckeditor.php");
												$summary = new FCKeditor("summary");
												$summary->BasePath = $path;
												$summary->Height=300;
												$summary->Value = "";
												$summary->Create();
											?>
											Hình ảnh (450px * 300px)
												<input id="ffImage" type="file" name="ffImage" class="button_submit">
												<input id="bttUpload" type="submit" value="Upload" name="bttUpload" class="ButtonWithbackground">
											</td>
										</tr>
									</table><br>
									<table cellspacing="0" cellpadding="2" width="98%" border="0">
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
									<div style="width:70px;padding:20px 0;margin-left:300px;">
										<span class="action-button-left"></span>
										<input class="submitYellow" type="Submit" value="Đăng tin" id="btnSubmit" name="btnSubmit" />
										<span class="action-button-right"></span>
								    </div>
							</div>
						</td>						
<!--END PROCESS-->
</form>
</div>
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