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
	$("#frmDichVu").submit(function()
	{ 
	//	var oCell = document.getElementById('xEditingArea').value ;
		var oEditor = FCKeditorAPI.GetInstance('instance') ;
		var pageValue = oEditor.GetHTML();
		alert(pageValue);
		var flag=true;	
		var strTieuDe = $("#txtTieuDeTin").attr("value");
		if(strTieuDe.length < 1  )
		{	
			flag=false;
			//alert("Phải đặt tiêu đề tin");
			$("#messTieuDe").attr("innerHTML","Phải đặt tiêu đề tin");
			$("#messTieuDe").css("color","red");
		}
		
		var strTieuDe = $("#txtDuongPho").attr("value");
		if(strTieuDe.length < 1  )
		{	flag=false;
		   // alert("Phải thêm tên đường");
			$("#messDuongPho").attr("innerHTML","Phải thêm tên đường");
			$("#messDuongPho").css("color","red");
		}
		var strTieuDe = $("#txtSoNha").attr("value");
		if(strTieuDe.length < 1  )
		{	flag=false;
			// alert("Phải có số nhà");
			$("#messSoNha").attr("innerHTML","Phải có số nhà");
			$("#messSoNha").css("color","red");
		}
		var strTieuDe = $("#txtGia").attr("value");
		if(strTieuDe.length < 1  )
		{	flag=false;
			// alert("Phải thêm giá nhà");
			$("#messGia").attr("innerHTML","Phải thêm giá nhà");
			$("#messGia").css("color","red");
		}
		if(CheckPhoneNumber(strTieuDe))
		{	flag=false;
			//alert("Hãy nhập số");
			$("#messGia").attr("innerHTML","Nhập số giá nhà");
			$("#messGia").css("color","red");
		}
		
		var strTieuDeR = $("#txtRong").attr("value");
		var strTieuDe = $("#txtDai").attr("value");
		if(strTieuDe.length < 1 || strTieuDeR<1 )
		{	flag=false;
			//alert("Nhập D-R");
			$("#messKichThuoc").attr("innerHTML","Nhập D-R");
			$("#messKichThuoc").css("color","red");
		}
		if(CheckPhoneNumber(strTieuDe) || CheckPhoneNumber(strTieuDeR))
		{	flag=false;
			$("#messKichThuoc").attr("innerHTML","Nhập số");
			$("#messKichThuoc").css("color","red");
		}
		
		var strTieuDe = $("#txtTang").attr("value");
		if(strTieuDe.length < 1 )
		{	
			$("#messTang").attr("innerHTML", "");
		}
		else if(CheckPhoneNumber(strTieuDe))
		{
			flag=false;
			//alert("Nhập số số lầu");
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
			//alert("Nhập số phòng tắm");
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
			//alert("Nhập số phòng ngủ");
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
			//alert("Chọn tỉnh/ thành phố");
			$("#messTinhTP").attr("innerHTML","Chọn tỉnh/ thành phố");
			$("#messTinhTP").css("color","red");
		}
		
		var strTieuDe = $("#cbbQuanHuyen").attr("value");
		if(strTieuDe == "-1" )
		{	flag=false;
			//alert("Chọn quận/ huyện");
			$("#messQuanHuyen").attr("innerHTML","Chọn quận/ huyện");
			$("#messQuanHuyen").css("color","red");
		}
		var strTieuDe = $("#cbbPhuong").attr("value");
		if(strTieuDe == "-1" )
		{	flag=false;
			//alert("Chọn phường/xã");
			$("#messPhuong").attr("innerHTML","Chọn phường/xã");
			$("#messPhuong").css("color","red");
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
		if(strTieuDe.length < 1  )
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
		if(strTieuDe.length < 1  )
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
		if(strTieuDe.length < 1 || strTieuDeR<1 )
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
		if(strTieuDe.length < 1  || strTieuDeD <1 )
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
	$("#cbbTinhTP").blur(function ()
	{
		var strTieuDe = $("#cbbTinhTP").attr("value");
		if(strTieuDe == "-1" )
		{	
			$("#messTinhTP").attr("innerHTML","Chọn tỉnh/ thành phố");
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
	//check cbbQuanHuyen
	$("#cbbQuanHuyen").blur(function ()
	{
	alert("Quan Huynsssssssssssssssssssssssss");
		var strTieuDe = $("#cbbQuanHuyen").attr("value");
		// if(strTieuDe == "-1" )
		// {	
			// $("#messQuanHuyen").attr("innerHTML","Chọn quận/ huyện");
			// $("#messQuanHuyen").css("color","red");
		// }
		// else
		// {
			// $("#messQuanHuyen").attr("innerHTML", "");
			// var serverURL = "checkservice.php?txtTieuDeTin=" + strTieuDe;
			// $("#messQuanHuyen").load(serverURL);
		// }
		
	});
	//check cbbPhuong
	$("#cbbPhuong").blur(function ()
	{
		var strTieuDe = $("#cbbPhuong").attr("value");
		if(strTieuDe == "-1" )
		{	
			$("#messPhuong").attr("innerHTML","Chọn phường/xã");
			$("#messPhuong").css("color","red");
		}
		else
		{
			$("#messPhuong").attr("innerHTML", "");
			var serverURL = "checkservice.php?txtTieuDeTin=" + "strTieuDe";
			$("#messPhuong").load(serverURL);
		}
		
	});
	
	
	
	function loadQuanHuyen()
	{alert("aaaaaaaaaaa");
			var strTieuDe = $("#cbbTinhTP").attr("value");
			var serverURL = "checkservice.php?txtTieuDeTin=" + strTieuDe;
			$("#messTinhTP").load(serverURL);
	}
	
	function CheckPhoneNumber(strText)
	{
		var strTemp="0123456789";
		for (var i=0; i<strText.length; i++)
		if (strTemp.indexOf (strText.charAt(i))==-1)//==-1 ko bao gio xay ra
		{
			return true;
		}	
		return false;

	}
	
});
		
 </script>
  <script type="text/javascript">
    function clickQuanHuyen()
	{
	//alert("xxxxxxxxxxxxxxxxxxxxx");
	var strTieuDe = $("#cbbQuanHuyen").attr("value");
	//alert(strTieuDe);
		if(strTieuDe == "-1" )
		{	
			$("#messQuanHuyen").attr("innerHTML","Chọn quận/ huyện");
			$("#messQuanHuyen").css("color","red");
		}
		else
		{
			// $("#messQuanHuyen").attr("innerHTML", "");
			var serverURL = "checkservice.php?cbbPhuongXa=" + strTieuDe;
			$("#messLoadPhuong").load(serverURL);
			var serverURL = "checkservice.php?txtTieuDeTin="+strTieuDe;
			$("#messQuanHuyen").load(serverURL);
		}
	}
	function clickPhuongXa()
	{
		alert("xxxxxxxxxxxxxxxxxxxxx");
		var strTieuDe = $("#cbbPhuong").attr("value");
		if(strTieuDe == "-1" )
		{	
			$("#messPhuong").attr("innerHTML","Chọn quận/ huyện");
			$("#messPhuong").css("color","red");
		}
		else
		{
			// $("#messQuanHuyen").attr("innerHTML", "");
			var serverURL = "checkservice.php?txtTieuDeTin="+strTieuDe;
			$("#messPhuong").load(serverURL);
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
<!--BEGIN -->		
<div id="frmDichVu1" name ="frmDichVu1">
<form action="" method="post" id="frmDichVu" name="frmDichVu"  >

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
									<!--table class="table" width="100%" cellpadding="0" cellspacing="0" border="0"-->
									<table cellspacing="2" cellpadding="4"   border="0" style="width:690px;">
										<tr style="background:#00397C;height:30px;">
										      <td colspan="2" style="color:#FFF;font-weight:bold;padding-left:4px;">THÔNG TIN</td>
									    </tr>
										
<!--THÔNG TIN -->
	
									
										
										<tr bgcolor="#F2F5F9">
											<td style="width:60px;">Loại giao dịch:</td>
											<td style="width:500px;">
												<p id="messTenLoai" name="messTenLoai"><b>Cần bán</b>												
											</td>
										</tr>
										<tr bgcolor="#F2F5F9">
											<td width="200px"><b>Tiêu đề tin:</b><span style="color:red;"> *</span></td>
											<td>											
											<div style="width:310px;float:left;"><input name="txtTieuDeTin" id="txtTieuDeTin" type="text" style="width:300px;" value=""onkeyup="javascript:this.value=this.value.toUpperCase();"></div>
											<div id="messTieuDe" name="messTieuDe" style="width:150px;float:left;"></div>
											</td>
										</tr>
										<tr bgcolor="#F2F5F9">
											<td width="200px"><b>Loại bđs :</b><span style="color:red;"> *</span></td>
											<td style="float:left;">
											<div style="width:310px;float:left;">
											<select id="cbbBatDongSan" name="cbbBatDongSan"  >
											
											<option value="-1">--Loại bất động sản--</option>
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
										
										<tr bgcolor="#F2F5F9">
											<td width="200px"><b>Tỉnh/Thành Phố:</b><span style="color:red;"> *</span></td>
											
												<td style="float:left;">
												
												<div style="width:310px;float:left;">
												<select id="cbbTinhTP" name="cbbTinhTP" style="width:220px;" onchange=(loadQuanHuyen();)>
													<option value="-1" selected="selected">--Chọn Tỉnh/ Thành Phố--</option>
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
										<tr bgcolor="#F2F5F9">
											<td width="200px"><b>Quận/Huyện:</b><span style="color:red;"> *</span></td>
											<td>
											
												<div style="width:310px;float:left;" id="messLoadQuan" name="messLoadQuan">
												<select id="cbbQuanHuyen" name="cbbQuanHuyen" style="width:220px;" onchange="clickQuanHuyen()">
													<option value="-1" selected="selected">--Chọn Quận/ Huyện--</option>	
												</select>
												</div>
												<div id="messQuanHuyen" name="messQuanHuyen" style="width:150px;float:left;"></div>
											</td>
										</tr>
										<tr bgcolor="#F2F5F9">
											<td width="200px"><b>Phường/ Xã:</b><span style="color:red;"> *</span></td>
											<td>
											<div style="width:310px;float:left;" id="messLoadPhuong" name="messLoadPhuong" >
												<select id="cbbPhuong" name="cbbPhuong" style="width:220px;" onchange="clickPhuongXa()">
													<option value="-1">Chọn phường/xã</option>

													
													
												</select>
												</div>
												<div id="messPhuong" name="messPhuong" style="width:150px;float:left;"></div>
											</td>
										</tr>
										
										<tr bgcolor="#F2F5F9">
											<td width="200px"><b>Đường/Phố:</b><span style="color:red;"> *</span></td>
											<td>
											<div style="width:310px;float:left;"> 
												<input name="txtDuongPho" id="txtDuongPho" type="text" style="width:300px;" value="">
												</div>
												<div id="messDuongPho" name="messDuongPho" style="width:150px;float:left;"></div>
											</td>
										</tr>
										<tr bgcolor="#F2F5F9">
											<td><b>Số nhà / Số lô:</b><span style="color:red;"> *</span></td>
											<td>
												<div style="width:310px;float:left;"> 
												<input  id="txtSoNha" name="txtSoNha" type="text" style="width:300px;" value="">
												</div>
												<div id="messSoNha" name="messSoNha" style="width:150px;float:left;"></div>
											</td>
										</tr>
										<tr bgcolor="#F2F5F9">
											<td width="200px" ><b>Giá:</b><span style="color:red;"> *</span></td>
											<td>
											<div style="width:330px;float:left;">
												<input id="txtGia" name="txtGia" class="Textbox" type="text" style="width:150px;text-align:left;" onkeyup="this.value = FormatNumber(this.value);" >
											
											
												<select id="cbbDonViTien" class="DropDownList" name="cbbDonViTien">
<?php
include("../BUS/DonViTienBUS.php");
$rs=DonViTienBUS::GetAllDonViTien();
for($i=0;$i<count($rs);$i++)
{		
	echo "<option value='".($i+1)."'>".$rs[$i][1]."</option>";
}
?>	
													
												</select>
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
											<td width="200px" valign="button"><b>Kích thước:</b><span style="color:red;"> *</span></td>
											<td>
											<div style="width:110px;float:left;">
											<b> D </b><input id="txtDai" name="txtDai" class="Textbox" type="text" style="width:25px;" >
											<b> X </b>
											<input id="txtRong" name="txtRong" class="Textbox" type="text" style="width:25px;" ><b> R </b>												
											</div>
											<div id="messKichThuoc" name="messKichThuoc" style="width:60px;float:left;"></div>
											</td>
											<td>
												Tầng:<!--span style="color:red;"> *</span-->
											</td>
											<td>
											   <div style="width:110px;float:left;">
												<input id="txtTang" name="txtTang" class="Textbox" type="text" style="width:40px;" >
												</div>
												<div id="messTang" name="messTang" style="width:60px;float:left;"></div>
											</td>
										</tr>
										<tr>
											<td width="200px">Số phòng ngủ:</td>
											<td>
											 <div style="width:110px;float:left;">
												<input id="txtPhongNgu" name="txtPhongNgu" class="Textbox" type="text" style="width:40px;" >
												</div>
												<div id="messPhongNgu" name="messPhongNgu" style="width:60px;float:left;"></div>
											</td>
											<td>
												Số phòng WC/Tắm:
											</td>
											<td>
											<div style="width:110px;float:left;">
												<input id="txtPhongTam"  name="txtPhongTam" class="Textbox" type="text" style="width:40px;">
											</div>
											<div id="messPhongTam" name="messPhongTam" style="width:60px;float:left;"></div>
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
											<td>
												Hướng nhà:
											</td>
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
										
<!--CÁC TIỆN ÍCH -->					<td colspan="4" class="ButtonWithbackground">CÁC TIỆN ÍCH</td>
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
	echo "<td><input id='".$dem."' type='checkbox' name='".$dem."'>";
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
<!--MÔ TẢ NGẮN (DƯỚI 500 KÝ TỰ) -->					<td colspan="4" class="ButtonWithbackground">MÔ TẢ NGẮN (DƯỚI 500 KÝ TỰ)</td>
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
									<table  cellspacing="2" cellpadding="2" width="98%"  border="0">
									<!--table cellspacing="2" cellpadding="2" width="98%"-->
<?php
if($curUser != null)
{
	include("../BUS/UsersBUS.php");
	$result=UsersBus::GetUserByEmail($curUserEmail);
}
?>										
										<tr style="background:#00397C;height:30px;">
<!--THÔNG TIN LIÊN HỆ -->		<td colspan="2" class="ButtonWithbackground">THÔNG TIN LIÊN HỆ</td>
										</tr>
										
										<tr bgcolor="#F2F5F9">
											<td align="left">Họ và Tên: </td>
											<td align="left" colspan="3"><p id="infoHoTen" name="infoHoTen" value="">
											<?php
											echo $result['hoten'];
											?></td>
										</tr>
										<tr bgcolor="#F2F5F9">
											<td align="left">Địa chỉ liên lạc: </td>
											<td align="left"><p id="infoDiaChi" name="infoDiaChi" value="">763/5/4/30 đường Trường Chinh,P.Tây Thạnh, Quận Tân Phú</p></td>
										</tr>
										<tr bgcolor="#F2F5F9">
											<td align="left">Số điện thoại: </td>
											<td align="left" colspan="3"><p id="infoSDT" name="infoSDT" value="">
											<?php
											echo $result['sdt1'];
											echo "- Mobile:";
											echo $result['sdt2']; 
											?>
											</p></td>
										</tr>
										<tr bgcolor="#F2F5F9">
											<td align="left">Email liên lạc: </td>
											<td align="left"><p id="infoSDT" name="infoSDT" value="">
											<?php
											echo $result['email'];
											?>
											</p></td>
										</tr>
									</table>								
									<div class="submit" style="border-top: 1px solid #999; padding: 10px 0 0 0; margin: 15px 0 0 0;">
									<center>
										<input id="btnSubmit" name="btnSubmit" class="ButtonWithbackground" type="submit" value="Đăng tin" >
								
									</center>
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
<?php
	include("../include/footer.php");
?>