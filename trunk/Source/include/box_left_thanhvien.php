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
			<center>
			<a href="?do=logout">
				<div style="width:60px;margin-top:20px;">
					<span class="action-button-left"></span>
					<input class="submitYellow" type="Submit" value="Thoát" id="btnGuiTin" name="btnGuiTin" />
					<span class="action-button-right"></span>
				</div></a></center>
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
					<a href="tindadang.php?type=1">Nâng cấp tin VIP</a></p>
				<p class="menu_item">
<?php 
include_once ("../BUS/DichVuBUS.php");
if(isset($curUserId))
{
	$vip =(int) DichVuBUS::countStatusType(2,$curUserId);
	$daduyet =(int) DichVuBUS::countStatusType(1,$curUserId);
	$choduyet = (int)DichVuBUS::countStatusType(0,$curUserId);
	$hethan =(int) DichVuBUS::countStatusType(3,$curUserId);
	$tongcong = $vip+$daduyet+$choduyet+$hethan;
	echo "<a href='tindadang.php'>Các tin đã đăng (".$tongcong.")</a><br>";
	echo "<span><a href='tindadang.php?type=2'>- Tin VIP (".$vip.")</a><br>";
	echo "<a href='tindadang.php?type=1'>- Tin đã duyệt (".$daduyet.")</a><br>";
	echo "<a href='tindadang.php?type=0'>- Tin chờ duyệt (".$choduyet.")</a><br>";
	echo "<a href='tindadang.php?type=3' style='color:red;'>- Tin hết hạn (".$hethan.")</a><br></span>";
}
else
{
	header("Location:dichvu.php");
}
?>
					
				</p>
			</td>
		</tr>
	</table>
</div>