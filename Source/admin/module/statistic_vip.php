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
		<div class="title icon_vip">Thống kê tin VIP</div>
		<div class="icon">
			<a href="index.php?view=statistic" id="aCancel">
				<img src="images/icon_32_cancel.png" /><br />Quay lại</a></div>
		<div class="icon" style="width:60px;">
			<a href="module/thongke/VipProcessor.php?view=statistic&do=vip&action=export&loaidv=-1&ngayfrom=-1&ngayto=-1&page=1" id="btnExport">
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
    <script>
    var url;
     function gotopage(page)
            {
                var index=url.lastIndexOf("=");
                url=url.substr(0,index+1); 
                url+=page;           
                $("#dsNha").load(url);
            }
    $(document).ready(function()
			{
                url="module/thongke/VipProcessor.php?view=statistic&do=vip&loaidv=-1&ngayfrom=-1&ngayto=-1&page=1";          
                $("#dsNha").load(url);
				
   	            $("#btnShow").click(function(){
   	                var type=$("#cbbType").val();
                    var ngayfrom=$("#txtDateFrom").val();
                    if(ngayfrom=="")
                        ngayfrom=-1;
                    
                    var ngayto=$("#txtDateTo").val();
                    if(ngayto=="")
                    ngayto=-1;
                    
                        url="module/thongke/VipProcessor.php?view=statistic&do=vip&action=view&loaidv="+type+"&ngayfrom="+ngayfrom+"&ngayto="+ngayto+"&page=1";         
                        $("#dsNha").load(url);
                        $('#btnExport').attr("href","module/thongke/VipProcessor.php?view=statistic&do=vip&action=export&loaidv="+type+"&ngayfrom="+ngayfrom+"&ngayto="+ngayto+"&page=1")
                   
                    });
                });
    </script>
    <div class="mid">
		<form action="index.php?view=user" method="post" name="frmRegister" id="frmRegister">
			<div style="text-align:center;padding-bottom:30px;">
            Loại nhà &nbsp;&nbsp;&nbsp;&nbsp;
			<select id="cbbType">
					<option value="-1"> Tất cả nhà </option>
					<?php
                    include("../BUS/LoaiDichVuBUS.php");
                    $loaidv=LoaiDichVuBUS::getALL();
                    for($i=0;$i<count($loaidv);$i++)
                    {                     
                        echo "<option value='".$loaidv[$i]['id']."'>".$loaidv[$i]['ten']."</option>";
                    }
                    ?>
			</select>
            <script>
			$(function() {
			     $( "#txtDateFrom" ).datepicker({dateFormat:'yy-mm-dd', showButtonPanel: true});
                 $( "#txtDateTo" ).datepicker({dateFormat:'yy-mm-dd', showButtonPanel: true});
			});
			</script>
            &nbsp;&nbsp;&nbsp;&nbsp;
			    Ngày đăng: &nbsp;&nbsp;&nbsp;&nbsp;<input id="txtDateFrom" type="text" style="width:70px;">
				&nbsp;&nbsp;&nbsp;&nbsp;
                đến 	&nbsp;&nbsp;&nbsp;&nbsp;
                <input id="txtDateTo" type="text" style="width:70px;">
                &nbsp;&nbsp;&nbsp;&nbsp;
				<input type="button" value="Thống kê" id="btnShow" />
			</div>
			<div class="list" id="dsNha">
			<!--
	<table align="center" border="0" cellspacing="0" cellpadding="0">
					<tr><td colspan="5"><b>Có 5 m?u tin</b></td></tr>
					<tr class="title">
							<td width="30px" align="center">#</td>
							<td align="center">Lo?i nhà</td>
							<td align="center">Ð?a ch?</td>
							<td align="center">Th?i h?n dang tin</td>
							<td align="center">Lo?i d?ch v?</td>
						</tr>
						<tr>
							<td align="center">1</td>
							<td>Can h? chung cu</td>
							<td>sdaf sdf sd fsad fasf </td>
							<td align="center">20-10-2011</td>
							<td align="center">C?n bán</td>
						</tr>
						<tr>
							<td align="center">2</td>
							<td>Bi?t Th?</td>
							<td>sdaf sdf sd fsad fasf </td>
							<td align="center">20-10-2011</td>
							<td align="center">C?n cho thuê</td>
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