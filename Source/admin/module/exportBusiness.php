<?php
	if($_SESSION["curUser"][8] != 1)
		header("Location: index.php");
		
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
		<div class="title icon_user">Nhập chi</div>
		<div class="icon">
			<a href="index.php?view=business" id="aCancel">
				<img src="images/icon_32_cancel.png" alt="Hủy"  border="0" title="Hủy" /><br />Hủy</a></div>
		<div class="icon">
			<a href="#" id="aSave">
				<img src="images/icon_32_apply.png" alt="Lưu" border="0" title="Lưu" /><br />Lưu</a></div>
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
					<td width="130px">Số tiền: <span style="color:red;">(*)</span></td>
					<td width="280px">
						<input type="text" onkeypress="return keypress(event);"> Triệu đồng</td>
				</tr>
				<tr>
					<td valign="top" style="padding-top:6px;">Công việc: <span style="color:red;">(*)</td>
					<td>
						<textarea style="width:99%;"></textarea>
					</td>
				</tr>
				<tr>
					<td>Ngày chi:</td>
					<td colspan="2">
						<script>
							$(function() {
								$( "#datepicker" ).datepicker({dateFormat:'dd/mm/yy', showButtonPanel: true});
							});
						</script>
						<input id="datepicker" type="text" style="width:70px;">
					</td>
				</tr>
				<tr>
					<td>Nhân viên chi: <span style="color:red;">(*)</span></td>
					<td><input type="text" style="width:400px;" onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
				</tr>
			</table>
		</form>
		<br class="clr" />
    </div>
    <div class="bl"></div>
    <div class="br"></div>
    <div class="bm"></div>
</div>