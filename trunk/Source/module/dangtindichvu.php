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
	{ 			var flag=true;	
		var strTieuDe = $("#txtTieuDeTin").attr("value");
		if(strTieuDe.length < 1  )
		{	
			flag=false;
			$("#messTieuDe").attr("innerHTML","Phải đặt tiêu đề tin");
			$("#messTieuDe").css("color","red");
		}
		
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
		
		if(flag==false)
				alert ("Có lỗi trong thông tin đăng ký. Xin kiểm tra lại");
		return flag;
	});
	
//xu ly tieu de
	$("#txtTieuDeTin").blur(function ()
	{
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

	$("#cbbTinhTP").change(function ()
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
			var serverURL = "checkservice.php?cbbTinhTP="+$(this).val();
			$("#messLoadQuan").load(serverURL);
		}
		
	});

	
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
		var strTieuDe = $("#cbbQuanHuyen").attr("value");
		alert(strTieuDe);
		if(strTieuDe == "-1" )
		{	
			$("#messQuanHuyen").attr("innerHTML","Chọn quận/ huyện");
			$("#messQuanHuyen").css("color","red");
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
		alert("phuong="+strTieuDe);
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
	<!--table bgcolor="black" border="0" cellpadding="0" cellspacing="0" width="986"-->
		<tr>
			<td width="986">
				<div style="width: 986px; height: 177px;" id="contentslide">
					<embed type="application/x-shockwave-flash" src="../images/contentslide.swf" id="mymovie"
						name="mymovie" bgcolor="#000000" quality="high" loop="true" wmode="transparent"
						width="986" height="177">
				</div>
				<!--table bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" width="986;"-->
					<tr>
						<td style="border-right: 1px solid rgb(180, 215, 232); background-repeat: repeat-y;"
							background="1_files/menubg_all.jpg" valign="top" width="270">
							<?php // include("../include/box_left_thanhvien.php"); ?>
						</td>
<!--BEGIN -->		
<?php include("middangky.php"); ?>
					</tr>
				</table>
			</td>
		</tr>
	</table>
<?php
	include("../include/footer.php");
?>