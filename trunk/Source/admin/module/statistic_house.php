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
		<div class="title icon_house">Thống kê nhà</div>
		<div class="icon">
			<a href="index.php?view=statistic" id="aCancel">
				<img src="images/icon_32_cancel.png" /><br />Quay lại</a></div>
		<div class="icon" style="width:60px;">
			<a href="module/thongke/HouseProcessor.php?view=statistic&do=house&action=export&page=1" id="btnExport">
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
                url="module/thongke/HouseProcessor.php?view=statistic&do=house&page=1";          
                $("#dsNha").load(url);
				
   	            $("#btnShow").click(function(){
   	                var type=$("#cbbType").val();
                    if(type=="-1")
                    {
                        var url="module/thongke/HouseProcessor.php?view=statistic&do=house&page=1";          
                        $("#dsNha").load(url);
                        $('#btnExport').attr("href","module/thongke/HouseProcessor.php?view=statistic&do=house&action=export&page=1")
                    }
                    else
                    {
                        var url="module/thongke/HouseProcessor.php?view=statistic&do=house&action=view&loaidv="+type+"&page=1";          
                        $("#dsNha").load(url);
                        $('#btnExport').attr("href","module/thongke/HouseProcessor.php?view=statistic&do=house&action=export&loaidv="+type+"&page=1")
                    }
                    });
                });
    </script>
    <div class="mid">
		<form action="index.php?view=user" method="post" name="frmRegister" id="frmRegister">
			<div style="text-align:center;padding-bottom:30px;">
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
				&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="button" value="Thống kê" id='btnShow'/>
			</div>
			<div class="list" id="dsNha">
				
			</div>
		</form>
		<br class="clr" />
    </div>
    <div class="bl"></div>
    <div class="br"></div>
    <div class="bm"></div>
</div>