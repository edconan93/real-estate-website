<?php
	if (!isset($_SESSION["curUser"]))
		header("Location: index.php");
	$flag = 0;
	if ($_SESSION["curUser"][8] == 1) $flag = 1;
	if ($_SESSION["curUser"][8] == 5) $flag = 1;
	
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
		<div class="title icon_export">Nhập chi</div>
		<div class="icon">
			<a href="index.php?view=business" id="aCancel">
				<img src="images/icon_32_cancel.png" border="0" /><br />Quay lại</a></div>
		<div class="icon">
			<a href="#" id="btnSave">
				<img src="images/icon_32_apply.png" border="0" /><br />Lưu</a></div>
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
		<script src="js/common.js" language="javascript"></script>
		<script language="javascript">
         function gotopage(page)
        {
            var url="module/thuchi/XLThuChi.php?view=business&do=export&page="+page;           
            $("#dsThuchi").load(url);
        }
		function checkALL()
        {
 
            var status=document.getElementById("cbAll").checked;
            $.each($("input[name='cbId[]']"), function() {
                    $(this).attr('checked',status);
                        });

        }
        	$(document).ready(function()
			{
			var url="module/thuchi/XLThuChi.php?view=business&do=export";          
                $("#dsThuchi").load(url);
				$("#btnSave").click(function(){
				    var flag=true;
				    var sotien=$("#txtSotien").val();
                    if(sotien=='')
                        flag=false;
                    var dvTien=$("#cbbDvTien").val();
                    var congviec=$("#txtCongviec").val();
                    if(congviec=='')
                        flag=false;
                    var ngaythu=$("#txtDate").val();
                    if(ngaythu=='')
                        flag=false;
                    var nhanvien=$("#cbbNhanvien").val();
                    if(flag==false)
                    {
                        alert("Vui lòng nhập đủ thông tin có dấu (*)");
                        return false;
                    }
                   var params = { 'view':'business', 'do':'export','action':'add','loai':'0','sotien':sotien,
                    "congviec":congviec,"nhanvien":nhanvien,"ngay":ngaythu,"donvi":dvTien };    
                    url="module/thuchi/XLThuChi.php";                   
                    $("#dsThuchi").load(url,params);
				});
			});
		</script>
		<form action="index.php?view=user" method="post" name="frmRegister" id="frmRegister" >
			<input name="btUpdate" type="hidden" value="Cập nhật" />
			<input name="uid" id="uid" type="hidden" value="<?php echo $user[0]; ?>" />	
			<table align="center" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td width="130px">Số tiền: <span style="color:red;">(*)</span></td>
					<td width="280px">
						<input type="text" id="txtSotien" onkeypress="return keypress(event);" onkeyup="FormatCurrency(this);" />
                        <select id="cbbDvTien">
                        <?php 
                        include_once("../BUS/DonviTienBUS.php");
                        $dvTien=DonViTienBUS::GetAllDonViTien();
                        for($i=0;$i<count($dvTien);$i++)
                        {
							if($dvTien[$i]['id'] == 2)
								echo '<option value="'.$dvTien[$i]['id'].'" selected>'.$dvTien[$i]['ten'].'</option>';
							else
								echo '<option value="'.$dvTien[$i]['id'].'">'.$dvTien[$i]['ten'].'</option>';
                        }
                        ?>
                        </select>
                        </td>
				</tr>
				<tr>
					<td valign="top" style="padding-top:6px;">Công việc: <span style="color:red;">(*)</td>
					<td>
						<textarea style="width:99%;" id="txtCongviec"></textarea>
					</td>
				</tr>
				<tr>
					<td>Ngày thu:</td>
					<td colspan="2">
						<script>
							$(function() {
								$( "#txtDate" ).datepicker({dateFormat:'yy-mm-dd', showButtonPanel: true});
							});
						</script>
						<input id="txtDate" type="text" style="width:70px;">
					</td>
				</tr>
				<tr>
					<td>Nhân viên thu: <span style="color:red;">(*)</span></td>
					<td><select  style="width:300px;" id="cbbNhanvien">
                    <?php
                        include_once("../BUS/UsersBUS.php");
                        $users=UsersBUS::getUsersByRole(3);
                        for($i=0;$i<count($users);$i++)
                        {
                            echo '<option value="'.$users[$i]['id'].'">'.$users[$i]['hoten'].'</option>';
                        }
                     ?>
                    </select>
                    </td>
				</tr>
			</table>
		</form>
		<div class="list" style="padding-top:20px;" id="dsThuchi">
        <!--
			<table width="70%" border="0" align="center" cellspacing="0" cellpadding="0">
				<tr class="title">
					<td width="30px" align="center">#</td>
					<td width="30px" align="center">
						<input type="checkbox" name="cbAll" id="cbAll" /></td>
					<td width="70px" align="center">Ngày chi</td>
					<td align="center">Công việc</td>
					<td width="20%">Nhân viên chi</td>
					<td align="right" width="100px">Số tiền</td>
				</tr>
				<tr>
					<td align="center">1</td>
					<td align="center"><input type="checkbox" name="cbId[]" id="cbId[]" value=""></td>
					<td align="center">20-10-2011</td>
					<td>144/28/13 Châu Văn Liêm, P.14, Q.5, Tp.HCM</td>
					<td>Nguyễn Thị Đoàn Thanh Phương</td>
					<td align="right">20.000.000 vnd</td>
				</tr>
				<tr>
					<td align="center">2</td>
					<td align="center"><input type="checkbox" name="cbId[]" id="cbId[]" value=""></td>
					<td align="center">20-10-2011</td>
					<td>144/28/13 Châu Văn Liêm, P.14, Q.5, Tp.HCM</td>
					<td>12x24 m2, 2 phòng ngủ, 1 tầng</td>
					<td align="right">20.000.000 vnd</td>
				</tr>
				<tr>
					<td align="right" colspan="5"><b>TỔNG thu:</b></td>
					<td align="right"><b>100.000.000 vnd</b></td>
				</tr>
			</table>
            -->
		</div>
		<br class="clr" />
    </div>
    <div class="bl"></div>
    <div class="br"></div>
    <div class="bm"></div>
</div>