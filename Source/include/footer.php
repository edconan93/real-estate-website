</center>
            </div>
            <div style="width: 100%; height: 40px; background-color: rgb(31, 
35, 35); border-top: 1px solid rgb(41, 68, 71);">
                <div style="width: 986px; text-align: left;">
                    <div style="float: left; margin-top: 8px; font-family: verdana; font-size: 11px;
                        color: rgb(125, 133, 170); text-align: left;">
                        Copyright © 2011 realestate_hoaphuong.com
                    </div>
                    <div style="float: left; margin-top: 8px; margin-left: 340px; height: 20px; width: 50px;
                        background-color: rgb(56, 58, 71); border: 1px solid 
rgb(33, 91, 135); text-align: center;">
                        <a class="a_bottomlink" href="http://ankhanhjvc.com/index.php?menuid=126">SALES</a></div>
                    <div style="float: left; margin-top: 8px; margin-left: 10px; height: 20px; width: 50px;
                        background-color: rgb(56, 58, 71); border: 1px solid 
rgb(33, 91, 135); text-align: center;">
                        <a class="a_bottomlink" href="http://ankhanhjvc.com/index.php?menuid=127">Q&amp;A</a></div>
                    <div style="float: left; margin-top: 8px; margin-left: 10px; height: 20px; width: 50px;
                        background-color: rgb(56, 58, 71); border: 1px solid 
rgb(33, 91, 135); text-align: center;">
                        <a class="a_bottomlink" href="http://www.ankhanhjvc.com:2095/">EMAIL</a></div>
                    <div style="float: left; margin-top: 8px; margin-left: 10px; height: 20px; padding-left: 5px;
                        padding-right: 5px; background-color: rgb(56, 
58, 71); border: 1px solid rgb(33, 91, 135); text-align: center;">
                        <a class="a_bottomlink" href="http://ankhanhjvc.com/index.php?menuid=150">RECRUITMENTS</a></div>
                </div>
            </div>
            <div style="width: 100%; height: 70px; background-image: url(&quot;images/bg_bottom.gif&quot;);
                background-repeat: repeat-x; text-align: center; padding-top: 20px;">
                <a class="a_bottomlink_b" href="http://www.ankhanhjvc.com/">Hoa Phuong</a>&nbsp;<b
                    style="color: rgb(84, 114, 146);">|</b>&nbsp;<a class="a_bottomlink_b" href="http://diaoc.com/">OC Home Loans & Realty
                        E&amp;C</a>&nbsp;<b style="color: rgb(104, 135, 168);">|</b>&nbsp;<a class="a_bottomlink_b"
                            href="http://www.vinaconex.com.vn/">VINACONEX</a>
            </div>
        </center>
	</div>
	<table id="popup" style="width: 100%; height: 100%; position: fixed; top: 0; left: 0;
            visibility: hidden; z-index: 598;" cellpadding="0" cellspacing="0">
		<tr>
			<td colspan="3" class="transparent">
				&nbsp;
			</td>
		</tr>
		<tr>
			<td class="transparent" style="width: 30%;">
				&nbsp;
			</td>
			<td class="mid_transparent">
				<div id="login_body">
					<div class="form_title">
						THÀNH VIÊN ĐĂNG NHẬP
					</div>
                    <!--div class='form_error' id="frmError"></div-->
					<!--div  id="messRegister" name="messRegister" class="form_text" style="width:340px;float:left;"></div-->
					 <form action="dichvu.php" method="POST" name="frmDangnhap"  onsubmit="return press_btLogin();">
					<div class="form_box">
						<div  id="messRegister" class="form_text" style="width:340px;float:left;"></div>
						<br><br>
						<p class="form_text">
							Tên đăng nhập</p>
						<p class="form_input_BG">
							<input id="txtUsernameLogin" name="txtUsernameLogin" type="text"></p>
						<p class="clear"></p>
						<p class="form_text">
							Mật khẩu</p>
						<p class="form_input_BG">
							<input type="password" id="txtPasswordLogin" name="txtPasswordLogin" type="text"></p>
						<p class="clear"></p>
						<p class="form_login_signup_btn" style="text-align: right; margin-right: 186px;">
						<input type="submit" name="btn_Login" value=""/>	
							<br />
							<br />
							<a style="color:yellow;" href="">Quên mật khẩu?</a>
							|
							<a style="color:yellow;" href="dangky.php">Đăng ký thành viên</a>
						</p>
						<p style="text-align: right; padding: 0px 10px 0 0; float: right; width: 100px; position: relative;">
							<a href="">	<img style="border:0;" onclick="return press_closeLogIn();" src="../images/fileclose.png" alt="" /></a>
                                                   
						</p>
					</div>
                    </form>
                    <?php
                        //xu ly dang nhap
                        include("../BUS/QuanBUS.php");
                        $kq=QuanBUS::GetAllQuan();
                        
                        echo ($kq[0]['ten']);
                        include_once ("user/LoginProcessor.php");
                        ?>
                   
				</div>
			</td>
			<td class="transparent" style="width: 30%;">
				&nbsp;
			</td>
		</tr>
		<tr>
			<td colspan="3" class="transparent">
				&nbsp;
			</td>
		</tr>
	</table>
	<script language="javascript" type="text/javascript">
		function press_DangNhap()
        {
            document.getElementById("popup").style.visibility = "visible";
            document.getElementById("txtUsernameLogin").value = "";
            document.getElementById("txtPasswordLogin").value = "";
            document.getElementById("txtUsernameLogin").focus();
            return false;
        }
		function press_DangNhapRegister()
        {
            document.getElementById("popup").style.visibility = "visible";
            // document.getElementById("txtUsername").value = "";
            // document.getElementById("txtPassword").value = "";
            // document.getElementById("txtUsername").focus();
			$("#messRegister").attr("innerHTML","Đăng ký thành công.Mời bạn đăng nhập!");
			$("#messRegister").css("color","blue");
			
            return false;
        }
		// function show_SuccessRegister()
		// {
		//alert("sucess");
			// $("#messRegister").attr("innerHTML","Đăng ký thành công.Mời bạn đăng nhập!");
			// $("#messRegister").css("color","blue");
			// return false;
		// }
        function press_closeLogIn()
        {
            document.getElementById("popup").style.visibility = "hidden";
            return false;
        }
		function press_btLogin()
		{
		      if(document.getElementById("txtUsernameLogin").value == "")
		      {
                    alert("Username không được để trống");
                    return false;
		      }
              if(document.getElementById("txtPasswordLogin").value == "")
		      {
                    alert("Password không được để trống");
                    return false;
		      }
			   return true; 
		}
	</script>
    
   


</body>
</html>