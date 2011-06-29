<div id="toolbar">
<div class="tl"></div>
<div class="tr"></div>
<div class="tm"></div>
<div class="mid">
	<div class="title icon_user">Thành viên: <span class="subTitle">[ Thêm mới ]</span> </div>
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
			var strUsername = $("#txtUsername").attr("value");
			var strPassword = $("#txtPassword").attr("value");
			var strRePassword = $("#txtRePassword").attr("value");
			var strEmail = $("#txtEmail").attr("value");
			var strAnswer = $("#txtAnswer").attr("value");
			
			var flag=true;
			if(strUsername.length<6 || strUsername.length > 50)
			{				
				flag=false;
				$("#messUsername").attr("innerHTML","tên đăng nhập từ 6-50 ký tự");
				$("#messUsername").css("color","red");
			}
			else if(HaveSpecialChar(strUsername))
			{
				flag=false;
				$("#messUsername").attr("innerHTML", "tên đăng nhập có chứa ký tự lạ");
				$("#messUsername").css("color","red");
			}
			
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
		
		$("#txtUsername").blur(function ()
		{
			var strUsername = $("#txtUsername").attr("value");
			if(strUsername.length<6 || strUsername.length > 50)
			{				
				flag=false;
				$("#messUsername").attr("innerHTML","tên đăng nhập từ 6-50 ký tự");
				$("#messUsername").css("color","red");
			}
			else if(HaveSpecialChar(strUsername))
			{
				flag=false;
				$("#messUsername").attr("innerHTML", "tên đăng nhập có chứa ký tự lạ");
				$("#messUsername").css("color","red");
			}
			else
			{
				var serverURL = "modules/forms/checkUsername.php?txtUsername=" + strUsername;
				$("#messUsername").load(serverURL);
			}
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
				$("#messEmail").load(serverURL);
			}
		});
	});
</script>
  <form action="index.php?view=user" method="post" name="frmRegister" id="frmRegister" >
  	<input name="btRegister" type="hidden" value="Đăng ký" />	
  	 <table width="577" border="0" align="left" cellpadding="0" cellspacing="0">
      <tr>
        <td width="94" class="title">Tên đăng nhập</td>
        <td width="220"><label>
          <input name="txtUsername" type="text" id="txtUsername" size="50">
        </label></td>
        <td ><div id="messUsername" class="mess">(6-50 ký tự)</div></td>
      </tr>
      <tr>
        <td  class="title">Email</td>
        <td><input name="txtEmail" type="text" id="txtEmail" size="50"></td>
        <td><div id="messEmail" class="mess"></div></td>
      </tr>
      <tr>
        <td  class="title">Mật khẩu</td>
        <td><input name="txtPassword" type="password" id="txtPassword" size="50"></td>
        <td><div id="messPassword" class="mess">(6-50 ký tự)</div></td>
      </tr>
      <tr >
        <td  class="title">Nhập lại mật khẩu</td>
        <td><input name="txtRePassword" type="password" id="txtRePassword" size="50"></td>
        <td><div id="messRePassword" class="mess"></div></td>
      </tr>
      <tr>
        <td  class="title">Giới tính</td>
        <td><label>
          <select name="lbSex" id="lbSex">
            <option value="1">Nam</option>
            <option value="0">Nữ</option>
            </select>
        </label></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td  class="title">Ngày sinh</td>
        <td>
        <select name="lbDay" id="lbDay">
			<?php
				for ($i=1; $i<=31; $i++)
				{
					printf ('<option value="%d"> %d </option> ', $i,$i);
				} 
		  	?>
            </select> 
            /
            <select name="lbMonth" id="lbMonth">
            <?php
				for ($i=1; $i<=12; $i++)
				{
					printf ('<option value="%d"> %d </option>', $i,$i);
				} 
			?>
            </select>
            /
            <select name="lbYear" id="lbYear">
            <?php
				for ($i=2009; $i>=1920;$i--)
				{
					printf ('<option value="%d"> %d </option>', $i,$i);
				} 
			?>
            </select>        </td>
        <td>&nbsp;</td>
      </tr>
      </table>
    <br class="clr" />
    <br />
   	 <table width="570" border="0" align="left" cellpadding="0" cellspacing="0">
      <tr>
        <td width="94"  class="title">Câu hỏi bí mật</td>
        <td colspan="2"><label>
          <select name="lbSecurityQuestion" id="lbSecurityQuestion">
            <option value="1">Bạn muốn làm nghề nào nhất?</option>
            <option value="2">Người bạn thân nhất của bạn là ai?</option>
            <option value="3">Người bạn yêu quý nhất là ai?</option>
            <option value="4">Nơi đầu tiên bạn và người ấy gặp nhau?</option>
            <option value="5">Thú cưng của bạn tên gì?</option>
            </select>
        </label></td>
        </tr>
      <tr>
        <td  class="title">Trả lời</td>
        <td width="220"><input name="txtAnswer" type="password" id="txtAnswer" size="50"  ></td>
        <td width=""><div id="messAnswer" class="mess"></div></td>
      </tr>
      <tr>
        <td  class="title">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td  class="title">Nhóm</td>
        <td><label>
          <select name="lbType" id="lbType">
            <option value="0">Thành viên</option>
            <option value="1">Quản trị</option>
                    </select>
        </label></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td  class="title">Trạng thái</td>
        <td><select name="lbStatus" id="lbStatus">
          <option value="1">Bình thường</option>
          <option value="0">Bị khóa</option>
                                </select></td>
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
