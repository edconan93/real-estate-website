<?php
	if($_SESSION["curUser"][8] != 1)
		header("Location: index.php");
		
	$aid = (int) $_GET["aid"];
	if(empty($aid))
		return;
		
	$PATH = str_replace('//','/',dirname(__FILE__).'/') ;
	//include_once($PATH . "../../../BUS/UsersBUS.php");
	//include_once($PATH . "common_functions.php");
	$user = 1;//UsersBUS::GetUserByID($aid);
?>
<div id="toolbar">
<div class="tl"></div>
<div class="tr"></div>
<div class="tm"></div>
<div class="mid">
	<div class="title icon_user">Tin đăng: <span class="subTitle">[ Chỉnh sửa ]</span> </div>
     <div class="icon">
   	  <a href="index.php?view=user" id="aCancel">
   	  <img src="images/icon_32_cancel.png" alt="Hủy"  border="0" title="Hủy" />
             <br />
            Hủy
      </a>
    </div>
    <div class="icon">
    	<a href="#" id="aSave">
        	 <img src="images/icon_32_apply.png" alt="Lưu" border="0" title="Lưu" />
             <br />
             Lưu
      </a>
    </div>
    <br class="clr" />
</div>
<div class="bl"></div>
<div class="br"></div>
<div class="bm"></div>
</div>
<div style="margin:10px">
    <div class="tl"></div>
    <div class="tr"></div>
    <div class="tm"></div>
    <div class="mid">
	<script src="js/common.js" language="javascript"></script>
	<script language="javascript">
	$(document).ready(function()
	{
		$("#frmRegister").submit(function()
		{
			var strPassword = $("#txtPassword").attr("value");
			var strRePassword = $("#txtRePassword").attr("value");
			var strEmail = $("#txtEmail").attr("value");
			var strAnswer = $("#txtAnswer").attr("value");
			
			var flag=true;
			if(strPassword!= "")
			{
				if(strPassword.length<6 || strPassword.length > 50)
				{
					flag=false;
					$("#messPassword").attr("innerHTML","mật khẩu từ 6-50 ký tự");
					$("#messPassword").css("color","red");
				}
				else if(HaveSpecialChar(strPassword))
				{
					flag=false;
					$("#messPassword").attr("innerHTML","mật khẩu có chứa ký tự lạ");
					$("#messPassword").css("color","red");
				}
			}
			if(strPassword != strRePassword)
			{
				flag=false;
				$("#messRePassword").attr("innerHTML","mật khẩu nhập lại không khớp");
				$("#messRePassword").css("color","red");
			}
			
			if(IsEmail(strEmail)==false)
			{
				flag=false;
				$("#messEmail").attr("innerHTML","email không hợp lệ");
				$("#messEmail").css("color","red");
			}
			if(trim(strAnswer) == "")
			{
				flag=false;
				$("#messAnswer").attr("innerHTML","nhập câu trả lời");
				$("#messAnswer").css("color","red");
			}
			if(flag==false)
				alert ("Có lỗi trong thông tin đăng ký. Xin kiểm tra lại");
			if(flag==true && $("#hdError").attr("value") == "true")
			{
				flag=false;
				alert ("Tên đăng nhập đã này đã được sử dụng. Xin chọn tên khác");
			}
			if(flag==true && $("#hdEmailError").attr("value") == "true")
			{
				flag=false;
				alert ("Email này đã được sử dụng. Xin chọn email khác");
			}
			
			if(flag==true && $("#cbAgree").attr("checked") == false)
			{
				flag=false;
				alert ("Bạn phải đồng ý với thỏa thuận sử dụng");
			}
			return flag;
		});
		
		$("#aSave").click(function()
		{
			$("#frmRegister").trigger("submit");
		});	
		
		$("#txtEmail").blur(function ()
		{
			var strEmail = $("#txtEmail").attr("value");
			if(IsEmail(strEmail)==false)
			{
				flag=false;
				$("#messEmail").attr("innerHTML","email không hợp lệ");
				$("#messEmail").css("color","red");
			}
			else
			{
				var serverURL = "modules/forms/checkEmail.php?txtEmail=" + strEmail;
				serverURL += "&aid=" + $("#aid").attr("value");
				$("#messEmail").load(serverURL);
			}
		});
	});
</script>
	<form action="index.php?view=article" method="post" name="frmRegister" id="frmRegister" >
		<input name="btUpdate" type="hidden" value="Cập nhật" />
		<input name="aid" id="aid" type="hidden" value="<?php echo $user[0]; ?>" />
		<div style="float:left;width:50%;">
			<table width="90%" align="center" border="0" cellpadding="0" cellspacing="0">
				<!--<tr>
					<td width="130px">Email đăng nhập <span style="color:red;">(*)</span></td>
					<td width="280px">
						<input name="txtUsername" type="text" disabled id="txtUsername" style="font-weight:bold;width:270px;" value="vuongtieuho1002@yahoo.com"></td>
					<td><div id="messUsername" class="mess"></div></td>
				</tr>-->
				<tr>
					<td width="100px">Loại dịch vụ</td>
					<td><b>Cần bán</b></td>
				</tr>
				<tr>
					<td>Tiêu đề <span style="color:red;">(*)</td>
					<td><input type="text" style="width:400px;" value="Bán căn hộ the everich Q12 gia rẻ vào ở ngay"></td>
				</tr>
				<tr>
					<td>Địa chỉ <span style="color:red;">(*)</td>
					<td><input type="text" style="width:400px;" value="36/15 Bình Giã, P.14, Q.Tân Bình"></td>
				</tr>
				<tr>
					<td>Thông tin chi tiết</td>
					<td><input type="text" style="width:400px;" value="12x24 m2, 2 phòng ngủ, 1 tầng"></td>
				</tr>
				<tr>
					<td>Mô tả</td>
					<td><input type="text" style="width:400px;" value="Quá ngon, tiện nghi sinh hoạt quá đã"></td>
				</tr>
				<tr>
					<td>Giá bán</td>
					<td><input type="text" style="width:400px;" value="2 tỷ (vnd)"></td>
				</tr>
				<tr>
					<td>Ngày cập nhật</td>
					<td>20-10-2011</td>
				</tr>
				<tr>
					<td>Ngày hết hạn</td>
					<td style="color:red;font-weight:bold;">20-11-2011</td>
				</tr>
				<tr>
					<td>Số ĐT 1</td>
					<td><input name="txtEmail" type="text" id="txtEmail" value="<?php echo $user[3]; ?>" size="50"></td>
				</tr>
				<tr>
					<td>Số ĐT 2</td>
					<td><input name="txtEmail" type="text" id="txtEmail" value="<?php echo $user[3]; ?>" size="50"></td>
				</tr>
				<tr>
					<td>Vai trò</td>
					<td><input name="txtEmail" type="text" id="txtEmail" value="<?php echo $user[3]; ?>" size="50"></td>
				</tr>
				<tr>
					<td>Cấp độ</td>
					<td><input name="txtEmail" type="text" id="txtEmail" value="<?php echo $user[3]; ?>" size="50"></td>
				</tr>
				<tr>
					<td>Ngày cập nhật</td>
					<td>20-10-2011</td>
				</tr>
			</table>
		</div>
		<div style="float:left; width:50%;">
			<table width="90%" align="center" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td width="130px">Email đăng nhập <span style="color:red;">(*)</span></td>
					<td width="280px">
						<input name="txtUsername" type="text" disabled id="txtUsername" style="font-weight:bold;width:270px;" value="vuongtieuho1002@yahoo.com"></td>
					<td><div id="messUsername" class="mess"></div></td>
				</tr>
				<tr>
					<td>Họ tên <span style="color:red;">(*)</td>
					<td><input name="txtEmail" type="text" id="txtEmail" value="<?php echo $user[3]; ?>" size="50"></td>
					<td><div id="messEmail" class="mess"></div></td>
				</tr>
				<tr>
					<td>Giới tính</td>
					<td>
						<input type="radio" value="1" name="gender" checked="true"> Nam
						<input type="radio" value="0" name="gender"> Nữ
					</td>
					<td><div id="messPassword" class="mess"></div></td>
				</tr>
				<tr>
					<td>Địa chỉ</td>
					<td><input name="txtEmail" type="text" id="txtEmail" value="<?php echo $user[3]; ?>" size="50"></td>
					<td><div id="messEmail" class="mess"></div></td>
				</tr>
				<tr>
					<td>Số ĐT 1</td>
					<td><input name="txtEmail" type="text" id="txtEmail" value="<?php echo $user[3]; ?>" size="50"></td>
					<td><div id="messEmail" class="mess"></div></td>
				</tr>
				<tr>
					<td>Số ĐT 2</td>
					<td><input name="txtEmail" type="text" id="txtEmail" value="<?php echo $user[3]; ?>" size="50"></td>
					<td><div id="messEmail" class="mess"></div></td>
				</tr>
				<tr>
					<td>Vai trò</td>
					<td><input name="txtEmail" type="text" id="txtEmail" value="<?php echo $user[3]; ?>" size="50"></td>
					<td><div id="messEmail" class="mess"></div></td>
				</tr>
				<tr>
					<td>Cấp độ</td>
					<td><input name="txtEmail" type="text" id="txtEmail" value="<?php echo $user[3]; ?>" size="50"></td>
					<td><div id="messEmail" class="mess"></div></td>
				</tr>
				<tr>
					<td>Ngày cập nhật</td>
					<td>20-10-2011</td>
					<td><div id="messEmail" class="mess"></div></td>
				</tr>
			</table>
		</div>
    </form>
    <br class="clr" />
    </div>
    <div class="bl"></div>
    <div class="br"></div>
    <div class="bm"></div>
</div>