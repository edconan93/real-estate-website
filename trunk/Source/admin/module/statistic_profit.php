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
		<div class="title icon_rptotal">Thống kê lợi nhuận</div>
		<div class="icon">
			<a href="index.php?view=statistic" id="aCancel">
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
    <script>
    $(document).ready(function()
			{
                var url="module/thongke/ProfitProcessor.php?view=statistic&do=profit&loai=-1";          
                $("#lstProfit").load(url);
				
   	            $("#btnShow").click(function(){
   	                var type=$("input[name='type']:checked").val();
                    switch(type)
                    {
                        case "1":                       
                            var thang=$("#cbbThang").val();
                            url="module/thongke/ProfitProcessor.php?view=statistic&do=profit&loai=1&thang="+thang;
                             $("#lstProfit").load(url);
                        case "2":
                        var quy=$("#cbbQuy").val();
                            url="module/thongke/ProfitProcessor.php?view=statistic&do=profit&loai=2&quy="+quy;
                             $("#lstProfit").load(url);

                        break;
                        case "3":
                        var nam=$("#txtNam").val();
                            url="module/thongke/ProfitProcessor.php?view=statistic&do=profit&loai=3&nam="+nam;
                             $("#lstProfit").load(url);
                            
                        break;
                    }
   	                
   	            });
        });
                
    </script>
    <div class="tm"></div>
    <div class="mid">
		<form action="index.php?view=user" method="post" name="frmRegister" id="frmRegister">
			<div style="text-align:center; padding-bottom:30px;">
				<input type="radio" name="type" value="1" checked /> Tháng 
					<select id="cbbThang">
						<option value="1"> 1 </option>
						<option value="2"> 2 </option>
						<option value="3"> 3 </option>
						<option value="4"> 4 </option>
						<option value="5"> 5 </option>
						<option value="6"> 6 </option>
						<option value="7"> 7 </option>
						<option value="8"> 8 </option>
						<option value="9"> 9 </option>
						<option value="10"> 10 </option>
						<option value="11"> 11 </option>
						<option value="12"> 12 </option>
					</select>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="radio" name="type" value="2" /> Quý 
					<select  id="cbbQuy">
						<option value="1"> 1 </option>
						<option value="2"> 2 </option>
						<option value="3"> 3 </option>
						<option value="4"> 4 </option>
					</select>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="radio" name="type" value="3" /> Năm 
				<input type="text" style="width:40px;" id="txtNam" />
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="button" value="Thống kê" id='btnShow'/>
			</div>
            <div id="lstProfit">
            <!--
            	<table align="center" border="0" cellpadding="0" cellspacing="0" style="font-weight:bold;">
				<tr>
					<td colspan="2" style="color:red;">Thống kê tháng 4/2011:</td>
				</tr>
				<tr>
					<td width="120px">Tổng chi phí:</td>
					<td align="right">120.000.000 vnd</td>
				</tr>
				<tr>
					<td>Tổng doanh thu:</td>
					<td align="right">1.000.000 vnd</td>
				</tr>
				<tr>
					<td>Tổng lợi nhuận:</td>
					<td align="right">20.000.000 vnd</td>
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