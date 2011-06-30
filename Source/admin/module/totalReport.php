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
		<div class="title icon_rptotal">Báo cáo tổng hợp</div>
		<div class="icon">
			<a href="index.php?view=business" id="aCancel">
				<img src="images/icon_32_cancel.png" alt="Hủy"  border="0" title="Hủy" /><br />Hủy</a></div>
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
		<form action="index.php?view=user" method="post" name="frmRegister" id="frmRegister" >
			<div style="text-align:center;">
				Từ ngày:
				<script>
					$(function() {
						$( "#datepickerTuNgay" ).datepicker({dateFormat:'dd/mm/yy', showButtonPanel: true});
					});
				</script>
				<input id="datepickerTuNgay" type="text" style="width:70px;">&nbsp;&nbsp;
				Đến ngày:
				<script>
					$(function() {
						$( "#datepickerDenNgay" ).datepicker({dateFormat:'dd/mm/yy', showButtonPanel: true});
					});
				</script>
				<input id="datepickerDenNgay" type="text" style="width:70px;">&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="button" value="Báo cáo" /><br><br><br>
			</div>
			<table align="center" border="0" cellpadding="0" cellspacing="0" style="font-weight:bold;">
				<tr>
					<td width="120px">Tổng chi phí:</td>
					<td align="right">120.000.000 vnd</td>
				</tr>
				<tr>
					<td>Tổng doanh thu:</td>
					<td align="right">1.000.000 vnd</td>
				</tr>
				<tr>
					<td>Lợi nhuận:</td>
					<td align="right">20.000.000 vnd</td>
				</tr>
			</table>
		</form>
		<br class="clr" />
    </div>
    <div class="bl"></div>
    <div class="br"></div>
    <div class="bm"></div>
</div>