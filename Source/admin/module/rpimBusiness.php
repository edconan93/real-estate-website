<div id="toolbar">
	<div class="tl"></div>
	<div class="tr"></div>
	<div class="tm"></div>
	<div class="mid">
		<div class="title icon_rpim">Tổng kết doanh thu</div>
		<div class="icon">
			<a href="index.php?view=business" id="aCancel">
				<img src="images/icon_32_cancel.png" alt="Hủy"  border="0" title="Hủy" /><br />Hủy</a></div>
		<div class="icon" style="width:60px;">
			<a href="" id="aSave">
				<img src="images/trash-can-delete.png" alt="Xóa" border="0" title="Xóa" /><br />Xóa</a></div>
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
    <script language="javascript">
            function gotopage(page)
            {
                var url="module/thuchi/XLThuChi.php?view=business&do=rpim&page="+page;           
                $("#dsThuchi").load(url);
            }
			$(document).ready(function()
			{
                var url="module/thuchi/XLThuChi.php?view=business&do=rpim";          
                $("#dsThuchi").load(url);
				
   	            //$("#btnCancel").click(function(){
//   	               var values = new Array();
//                    $.each($("input[name='cbId[]']:checked"), function() {
//                     values.push($(this).val());
//        // or you can do something to the actual checked checkboxes by working directly with  'this'
//        // something like $(this).hide() (only something useful, probably) :P
//                        });
//                   alert(values);
//	           });
			});
		</script>
	<div class="mid">
		<form method="post" name="frmListItem" id="frmListItem">
			<div style="text-align:center; padding-bottom:30px;">
				<input type="radio" name="type" value="1" checked /> Tháng 
					<select>
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
					<select>
						<option value="1"> 1 </option>
						<option value="2"> 2 </option>
						<option value="3"> 3 </option>
						<option value="4"> 4 </option>
					</select>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="radio" name="type" value="3" /> Năm 
				<input type="text" style="width:40px;" onkeypress="return keypress(event);" />
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="submit" value="Xem" />
			</div>
			<div class="list" id="dsThuchi">
            <!--
				<table width="70%" border="0" align="center" cellspacing="0" cellpadding="0">
					<tr class="title">
						<td width="30px" align="center">#</td>
						<td width="30px" align="center">
							<input type="checkbox" name="cbAll" id="cbAll" /></td>
						<td width="70px" align="center">Ngày thu</td>
						<td align="center">Công việc</td>
						<td width="20%">Người thu</td>
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
		</form>
	</div>
	<div class="bl"></div>
	<div class="br"></div>
	<div class="bm"></div>
</div>