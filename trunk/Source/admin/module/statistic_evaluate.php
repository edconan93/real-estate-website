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
		<div class="title icon_staff">Đánh giá nhân viên</div>
		<div class="icon">
			<a href="index.php?view=statistic" id="aCancel">
				<img src="images/icon_32_cancel.png" alt="Hủy"  border="0" title="Hủy" /><br />Hủy</a></div>
		<div class="icon" style="width:60px;">
			<a href="" id="aSave">
				<img src="images/export_excel.png" alt="Xuất Excel" border="0" title="Xuất Excel" /><br />Xuất Excel</a></div>
		<div class="icon">
			<a href="#" id="aSave">
				<img src="images/icon_32_apply.png" alt="Lưu" border="0" title="Lưu" /><br />Lưu</a></div>
		<br class="clr" />
	</div>
	<div class="bl"></div>
	<div class="br"></div>
	<div class="bm"></div>
</div>
<div id="listItem" style="margin:10px">
    <div class="tl"></div>
    <div class="tr"></div>
    <div class="tm"></div>
    <div class="mid">
		<form action="index.php?view=user" method="post" name="frmRegister" id="frmRegister">
			<div style="text-align:center;padding-bottom:30px;">
				<select>
					<option value="0"> Tất cả nhân viên </option>
					<option value="1"> Nhân viên cấp bậc 1 </option>
					<option value="2"> Nhân viên cấp bậc 2 </option>
					<option value="3"> Nhân viên cấp bậc 3 </option>
				</select>
				&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="button" value="Thống kê" />
			</div>
			<div class="list">
				<table align="center" border="0" cellspacing="0" cellpadding="0">
					<tr><td colspan="7"><b>Có 5 mẫu tin</b></td></tr>
					<tr class="title">
							<td width="30px" align="center">#</td>
							<td align="center">Nhân viên</td>
							<td align="center">Email đăng nhập</td>
							<td align="center" width="50px">Giới tính</td>
							<td align="center" width="60px">Cấp độ</td>
							<td align="center" width="100px">Đạt thành tích</td>
							<td align="center">Khen thưởng</td>
						</tr>
						<tr>
							<td align="center">1</td>
							<td class="m_name"><a href="index.php?view=user&do=edit&uid=1">Nguyễn Thị Thanh Phương Đoàn</a></td>
							<td style="color:blue;">nguyenthithanhphuong@yahoo.com</td>
							<td align="center">Nam</td>
							<td align="center">Cấp bậc 1</td>
							<td align="center">
								<select>
									<option value="">Trung bình</option>
									<option value="">Khá</option>
									<option value="">Xuất sắc</option>
								</select>
							</td>
							<td>
								<input type="text" style="width:300px;" />
							</td>
						</tr>
						<tr>
							<td align="center">2</td>
							<td class="m_name"><a href="index.php?view=user&do=edit&uid=1">Cao Thanh Tâm</a></td>
							<td style="color:blue;">nguyenthithanhphuong@yahoo.com</td>
							<td align="center">Nam</td>
							<td align="center">Cấp bậc 2</td>
							<td align="center">
								<select>
									<option value="">Trung bình</option>
									<option value="">Khá</option>
									<option value="">Xuất sắc</option>
								</select>
							</td>
							<td>
								<input type="text" style="width:300px;" />
							</td>
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