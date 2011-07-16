<?php
	$flag = 0;
	if ($_SESSION["curUser"][8] == 1) $flag = 1;
	if ($_SESSION["curUser"][8] == 4) $flag = 1;
	
	if ($flag == 0) // Khong duoc phep di tiep
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
			<a href="module/thongke/AdvertisementProcessor.php?view=statistic&do=adv&action=export&loai=-1&page=1" id="btnExport">
				<img src="images/export_excel.png" alt="Xuất Excel" border="0" title="Xuất Excel" /><br />Xuất Excel</a></div>
		<br class="clr" />
	</div>
	<div class="bl"></div>
	<div class="br"></div>
	<div class="bm"></div>
    <script>
    var url;
     function gotopage(page)
            {
                var index=url.lastIndexOf("=");
                url=url.substr(0,index+1); 
                url+=page;           
                $("#lstQuangcao").load(url);
            }
    $(document).ready(function()
			{
                url="module/thongke/AdvertisementProcessor.php?view=statistic&do=adv&page=1";          
                $("#lstQuangcao").load(url);
				
   	            $("#btnShow").click(function(){
   	                var type=$("#cbbType").val();
                    
                        url="module/thongke/AdvertisementProcessor.php?view=statistic&do=adv&action=view&loai="+type+"&page=1";          
                        $("#lstQuangcao").load(url);
                        $('#btnExport').attr("href","module/thongke/AdvertisementProcessor.php?view=statistic&do=adv&action=export&loai="+type+"&page=1");                
                    });
                });
    </script>
</div>
<div id="listItem" style="margin:10px">
    <div class="tl"></div>
    <div class="tr"></div>
    <div class="tm"></div>
    <div class="mid">
		<form action="index.php?view=user" method="post" name="frmRegister" id="frmRegister" >
			<div style="text-align:center;padding-bottom:30px;">
				<select id="cbbType">
					<option value="-1"> Tất cả </option>
					<option value="0"> Tạm ngưng </option>
					<option value="1"> Đang hoạt động </option>
				</select>
				&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="button" value="Thống kê" id='btnShow'/>
			</div>
			<div class="list" id="lstQuangcao">
				<!--
<table align="center" border="0" cellspacing="0" cellpadding="0">
					<tr><td colspan="7"><b>Có 5 m?u tin</b></td></tr>
					<tr class="title">
							<td width="30px" align="center">#</td>
							<td align="center">Tiêu d?</td>
							<td align="center">V? trí</td>
							<td align="center" width="90px">Ngày b?t d?u</td>
							<td align="center" width="90px">Ngày k?t thúc</td>
							<td align="center" width="90px">Tr?ng thái</td>
							<td align="right">Chi phí</td>
						</tr>
						<tr>
							<td align="center">1</td>
							<td>Nhà chung cu cao c?p ti?n nghi</td>
							<td align="center">Left</td>
							<td align="center" width="90px">20-10-2011</td>
							<td align="center" width="90px">20-10-2011</td>
							<td align="center" style="color:red;">T?m ngung</td>
							<td align="center">1.200.000 vnd</td>
						</tr>
						<tr>
							<td align="center">2</td>
							<td>Nhà ph? xinh cao c?p</td>
							<td align="center">Right</td>
							<td align="center">20-10-2011</td>
							<td align="center">20-10-2011</td>
							<td align="center" style="color:blue;">Ðang ho?t d?ng</td>
							<td align="center">1.200.000 vnd</td>
						</tr>
				</table>
-->
			</div>
		</form>
		<br class="clr" />
    </div>
    <div class="bl"></div>
    <div class="br"></div>
    <div class="bm"></div>
</div>