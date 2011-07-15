<div id="login">
	<div id="formLogIn">
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
						<div class="p"><span class="text">Email đăng nhập</span>
							<input type="text" class="input" id="txtUsername" name="txtUsername" />
						</div>
						<div class="p"><span class="text">Mật khẩu</span>
							<input type="password" class="input" id="txtPassword" name="txtPassword" />
						</div>
						<div class="bt" style="width:200px;">
							<table>
								<tr>
									<td><div align="left" valign="button">
										<a onclick="document.getElementById('formForgotPassword').style.display='inherit';document.getElementById('formLogIn').style.display='none';">
											Quên mật khẩu</a></div></td>
									<td><div class="rightbutton"></div>
										<input class="button" type="submit" name="btLogin" id="btLogin" value="Đăng nhập" /></td>
								</tr>
							</table>
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
	<div id="formForgotPassword" style="display:none;">
		<div class="top"></div>
		<div class="content">
			<h1>Quên mật khẩu</h1>
			<?php
				if(isset($login) && $login =="false")
					echo "<p class='error'> Tên đăng nhập và mật khẩu không đúng</p>";
			?>
			<div class="frmLogin">
				<div class="_top"></div>
				<div class="_content">
					<form id="form1" name="form1" method="post" action="">
						<div class="p"> <span class="text">Email đăng nhập</span>
							<input type="text" class="input" id="txtUsername" name="txtUsername" />
						</div>
						<div class="bt" style="width:200px;">
							<div class="rightbutton" style="margin-right:16px;"></div>
								<input class="button" type="button" value="Gửi" />
						</div>
					</form>
					<br class="clr" />
				</div>
				<div class="_bot"></div>
			</div>
			Hệ thống sẽ tự động gửi vào email của bạn một mật khẩu tạm thời để bạn dăng nhập.
			<img src="images/icon_question.png" width="112px" alt="Login" />
			<br class="clr">
		</div>
		<div class="bot"></div>
	</div>
</div>