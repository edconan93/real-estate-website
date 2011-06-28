<?php 
	$uid = (int) $_GET["uid"];
	if(empty($uid))
		return;
		
	$PATH = str_replace('//','/',dirname(__FILE__).'/') ;
	//include_once($PATH . "../../../BUS/UsersBUS.php");
	//include_once($PATH . "common_functions.php");
	$user = 1;//UsersBUS::GetUserByID($uid);
?>
<div id="toolbar">
<div class="tl"></div>
<div class="tr"></div>
<div class="tm"></div>
<div class="mid">
	<div class="title icon_user">Thành viên: <span class="subTitle">[ Chỉnh sửa]</span> </div>
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
				serverURL += "&uid=" + $("#uid").attr("value");
				$("#messEmail").load(serverURL);
			}
		});
	});
</script>
	<form action="index.php?view=user" method="post" name="frmRegister" id="frmRegister" >
		<input name="btUpdate" type="hidden" value="Cập nhật" />
		<input name="uid" id="uid" type="hidden" value="<?php echo $user[0]; ?>" />	
		<table align="center" border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td width="130px" class="title">Email đăng nhập <span style="color:red;">(*)</span></td>
				<td width="280px">
					<input name="txtUsername" type="text" disabled id="txtUsername" style="font-weight:bold;width:270px;" value="vuongtieuho1002@yahoo.com"></td>
				<td><div id="messUsername" class="mess"></div></td>
			</tr>
			<tr>
				<td class="title">Họ tên <span style="color:red;">(*)</td>
				<td><input name="txtEmail" type="text" id="txtEmail" value="<?php echo $user[3]; ?>" size="50"></td>
				<td><div id="messEmail" class="mess"></div></td>
			</tr>
			<tr>
				<td class="title">Giới tính</td>
				<td>
					<input type="radio" value="1" name="gender" checked="true"> Nam
					<input type="radio" value="0" name="gender"> Nữ
				</td>
				<td><div id="messPassword" class="mess"></div></td>
			</tr>
			<tr>
				<td class="title">Địa chỉ</td>
				<td><input name="txtEmail" type="text" id="txtEmail" value="<?php echo $user[3]; ?>" size="50"></td>
				<td><div id="messEmail" class="mess"></div></td>
			</tr>
			<tr>
				<td class="title">Số ĐT 1</td>
				<td><input name="txtEmail" type="text" id="txtEmail" value="<?php echo $user[3]; ?>" size="50"></td>
				<td><div id="messEmail" class="mess"></div></td>
			</tr>
			<tr>
				<td class="title">Số ĐT 2</td>
				<td><input name="txtEmail" type="text" id="txtEmail" value="<?php echo $user[3]; ?>" size="50"></td>
				<td><div id="messEmail" class="mess"></div></td>
			</tr>
			<tr>
				<td class="title">Vai trò</td>
				<td><input name="txtEmail" type="text" id="txtEmail" value="<?php echo $user[3]; ?>" size="50"></td>
				<td><div id="messEmail" class="mess"></div></td>
			</tr>
			<tr>
				<td class="title">Cấp độ</td>
				<td><input name="txtEmail" type="text" id="txtEmail" value="<?php echo $user[3]; ?>" size="50"></td>
				<td><div id="messEmail" class="mess"></div></td>
			</tr>
		</table>
		<br class="clr" />
		<br />
		<table width="570px" border="0" align="left" cellpadding="0" cellspacing="0">
			<tr>
				<td width="94"  class="title">Câu hỏi bí mật</td>
				<td colspan="2">
					<select name="lbSecurityQuestion" id="lbSecurityQuestion">
						<option value="1" <?php echo $user[6]==1?"selected":""; ?>>Bạn muốn làm nghề nào nhất?</option>
						<option value="2"<?php echo $user[6]==2?"selected":""; ?>>Người bạn thân nhất của bạn là ai?</option>
						<option value="3" <?php echo $user[6]==3?"selected":""; ?>>Người bạn yêu quý nhất là ai?</option>
						<option value="4" <?php echo $user[6]==4?"selected":""; ?>>Nơi đầu tiên bạn và người ấy gặp nhau?</option>
						<option value="5" <?php echo $user[6]==5?"selected":""; ?>>Thú cưng của bạn tên gì?</option>
					</select></td>
			</tr>
			<tr>
				<td class="title">Trả lời</td>
				<td width="220"><input name="txtAnswer" type="text" id="txtAnswer" size="50"  value="<?php echo $user[7]; ?>" ></td>
				<td width=""><div id="messAnswer" class="mess"></div></td>
			</tr>
			<tr>
				<td class="title">&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td class="title">Nhóm</td>
				<td>
					<select name="lbType" id="lbType">
						<option value="0" <?php echo $user[10]==0?"selected":""; ?> >Thành viên</option>
						<option value="1" <?php echo $user[10]==1?"selected":""; ?>>Quản trị</option>
					</select></td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td class="title">Trạng thái</td>
				<td>
					<select name="lbStatus" id="lbStatus">
						<option value="1"  <?php echo $user[9]==1?"selected":""; ?>>Bình thường</option>
						<option value="0"  <?php echo $user[9]==0?"selected":""; ?>>Bị khóa</option>
                    </select></td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td class="title">Ngày đăng ký</td>
				<td> <?php //echo convert_time($user[5]) ?> </td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td class="title">Truy cập cuối</td>
				<td> <?php //echo $user[8]=="0000-00-00 00:00:00"?"chưa đăng nhập bao giờ":convert_time($user[8]) ?> </td>
				<td>&nbsp;</td>
			</tr>
		</table>
    </form>
    <br class="clr" />
    </div>
    <div class="bl"></div>
    <div class="br"></div>
    <div class="bm"></div>
</div>