<div class="box_left">
	<table width="100%">
		<tr>
			<td width="30px">
				<img src="../images/male3.png">
			</td>
			<td>
				<p style="font-size:20pt;"><h1>THÔNG TIN THÀNH VIÊN<h1></p>
			</td>
		</tr>
		<tr>
			<td colspan="2">
            <?php
                if($curUser==null)
                {
                    //echo "Tài khoản:<br><center><b style='color:blue;'>Chua dang nhap</b></center><br>";
                    header("Location:dichvu.php");
                }
                else
                {
                    echo "Tài khoản:<br><center><b style='color:blue;'>".$curUser['email']."</b></center><br>";
				    echo "Họ tên: ".$curUser['hoten']."<br>";
				    echo "Email: ".$curUser['email']."<br>";
			 	    echo "ĐT: ".$curUser['sdt1']."<br>";
				    
                }
			?>
			<a href="?do=logout">
				<div style="width:50px;margin-top:20px;">
					<span class="action-button-left"></span>
					<input class="submitYellow" type="Submit" value="Thoát" id="btnGuiTin" name="btnGuiTin" />
					<span class="action-button-right"></span>
				</div></a>
            </td>
		</tr>
	</table>
</div>
<div class="box_left">
	<table width="100%">
		<tr>
			<td width="30px">
				<img width="16px" src="../images/ServiceManager.png">
			</td>
			<td>
				<p style="font-size:20pt;"><h1>CHỨC NĂNG</h1></p>
			</td>
		</tr>
		<tr>
			<td colspan="2" align="center">
				<p class="menu_item">
					<a href="thongtinkhachhang.php">Thông tin thành viên</a></p>
				<p class="menu_item">
					<a href="doimatkhau.php">Thay đổi mật khẩu</a></p>
				<p class="menu_item">
					<a href="noiquidangtin.php">Đăng tin nhà đất</a></p>
				<p class="menu_item">
					<a href="nangcaptinvip.php">Nâng cấp tin VIP</a></p>
				<p class="menu_item">
					<a href="tindadang.php">Các tin đã đăng (6)</a><br>
					<span>
						<a href="tindadang.php?type=1">- Tin đã duyệt (1)</a><br>
						<a href="tindadang.php?type=2">- Tin chờ duyệt (3)</a><br>
						<a href="tindadang.php?type=3" style="color:red;">- Tin hết hạn (2)</a><br>
					</span>
				</p>
			</td>
		</tr>
	</table>
</div>