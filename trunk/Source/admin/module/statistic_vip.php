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
		<div class="title icon_vip">Thống kê khách hàng VIP</div>
		<div class="icon">
			<a href="index.php?view=statistic" id="aCancel">
				<img src="images/icon_32_cancel.png" alt="Hủy"  border="0" title="Hủy" /><br />Hủy</a></div>
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
		<form action="index.php?view=user" method="post" name="frmRegister" id="frmRegister">
			<div style="text-align:center;padding-bottom:30px;">
				<select>
					<option value="0"> Tất cả nhà </option>
					<option value="1"> Cần bán </option>
					<option value="2"> Cần mua </option>
					<option value="2"> Cho thuê </option>
					<option value="2"> Cần cho thuê </option>
				</select>
				&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="button" value="Thống kê" />
			</div>
			<div class="list">
				<table align="center" border="0" cellspacing="0" cellpadding="0">
					<tr><td colspan="5"><b>Có 5 mẫu tin</b></td></tr>
					<tr class="title">
							<td width="30px" align="center">#</td>
							<td align="center">Loại nhà</td>
							<td align="center">Địa chỉ</td>
							<td align="center">Thời hạn đăng tin</td>
							<td align="center">Loại dịch vụ</td>
						</tr>
						<tr>
							<td align="center">1</td>
							<td>Căn hộ chung cư</td>
							<td>sdaf sdf sd fsad fasf </td>
							<td align="center">20-10-2011</td>
							<td align="center">Cần bán</td>
						</tr>
						<tr>
							<td align="center">2</td>
							<td>Biệt Thự</td>
							<td>sdaf sdf sd fsad fasf </td>
							<td align="center">20-10-2011</td>
							<td align="center">Cần cho thuê</td>
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