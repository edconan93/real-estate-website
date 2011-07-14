<div id="login">
	<div class="top"></div>
    <div class="content">
    	<h1>Đăng nhập</h1>
        <?php
			if(isset($login) && $login =="false")
				echo "<p class='error'> Tên đăng nhập và mật khẩu không đúng</p>";
		?>
        <div class="frmLogin">
        	<div class="_top"></div>
   			<div class="_content">
              <form id="form1" name="form1" method="post" action="">
				<div class="p"> <span class="text">Tên đăng nhập</span>
              		<input type="text" class="input" id="txtUsername" name="txtUsername" />
              	</div>
               <div class="p"> <span class="text">Mật khẩu</span>
               <input type="password" class="input" id="txtPassword" name="txtPassword" />
               </div>
			  <div class="bt">
              <div class="rightbutton"></div>
               <input class="button" type="submit" name="btLogin" id="btLogin" value="Đăng nhập" />
			</div>
              </form>
              <br class="clr" />
            </div>
            <div class="_bot"></div>
        </div>
        Dùng một tên đăng nhập và mật mã hợp lý để đăng nhập vào khu vực quản trị
        <img src="images/login_lock.jpg" alt="Login" />
         <br class="clr">
    </div>
    <div class="bot"></div>
</div>