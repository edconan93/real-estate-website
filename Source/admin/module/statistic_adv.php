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
		<div class="title icon_adv">Thống kê quảng cáo</div>
		<div class="icon">
			<a href="index.php?view=statistic" id="aCancel">
				<img src="images/icon_32_cancel.png" /><br />Quay lại</a></div>
		<div class="icon" style="width:60px;">
			<a href="" id="aSave">
				<img src="images/export_excel.png" alt="Xuất Excel" border="0" title="Xuất Excel" /><br />Xuất Excel</a></div>
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
		<form action="index.php?view=user" method="post" name="frmRegister" id="frmRegister" >
			<div style="text-align:center;padding-bottom:30px;">
				<select>
					<option value="0"> Tất cả </option>
					<option value="1"> Tạm ngưng </option>
					<option value="2"> Đang hoạt động </option>
				</select>
				&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="button" value="Thống kê" />
			</div>
			<div class="list">
				<table align="center" border="0" cellspacing="0" cellpadding="0">
					<tr><td colspan="7"><b>Có 5 mẫu tin</b></td></tr>
					<tr class="title">
							<td width="30px" align="center">#</td>
							<td align="center">Tiêu đề</td>
							<td align="center">Vị trí</td>
							<td align="center" width="90px">Ngày bắt đầu</td>
							<td align="center" width="90px">Ngày kết thúc</td>
							<td align="center" width="90px">Trạng thái</td>
							<td align="right">Chi phí</td>
						</tr>
						<tr>
							<td align="center">1</td>
							<td>Nhà chung cư cao cấp tiện nghi</td>
							<td align="center">Left</td>
							<td align="center" width="90px">20-10-2011</td>
							<td align="center" width="90px">20-10-2011</td>
							<td align="center" style="color:red;">Tạm ngưng</td>
							<td align="center">1.200.000 vnd</td>
						</tr>
						<tr>
							<td align="center">2</td>
							<td>Nhà phố xinh cao cấp</td>
							<td align="center">Right</td>
							<td align="center">20-10-2011</td>
							<td align="center">20-10-2011</td>
							<td align="center" style="color:blue;">Đang hoạt động</td>
							<td align="center">1.200.000 vnd</td>
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