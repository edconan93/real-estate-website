<div id="toolbar">
	<div class="tl"></div>
	<div class="tr"></div>
	<div class="tm"></div>
	<div class="mid">
		<div class="title icon_rpex">Thống kê chi phí</div>
		<div class="icon">
			<a href="index.php?view=business" id="aCancel">
				<img src="images/icon_32_cancel.png" alt="Hủy"  border="0" title="Hủy" /><br />Hủy</a></div>
		<div class="icon" style="width:60px;">
			<a href="#" id="btnDelete">
				<img src="images/trash-can-delete.png" alt="Xóa" border="0" title="Xóa" /><br />Xóa</a></div>
		<div class="icon" style="width:60px;">
			<a href="module/thuchi/XLThuChi.php?view=business&do=exExcel&loai=1" id="btnExportExcel">
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
    var url;
            function gotopage(page)
            {
                var index=url.lastIndexOf("=");
                url=url.substr(0,index+1); 
                url+=page;           
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
                url="module/thuchi/XLThuChi.php?view=business&do=rpex&page=1";          
                $("#dsThuchi").load(url);
				
   	            $("#btnShow").click(function(){
   	                var type=$("input[name='type']:checked").val();
                    switch(type)
                    {
                        case "1":                       
                            var thang=$("#cbbThang").val();
                            url="module/thuchi/XLThuChi.php?view=business&do=rpex&action=getMonth&month="+thang+"&page=1";
                             $("#dsThuchi").load(url);
                            $('#btnExportExcel').attr('href','module/thuchi/XLThuChi.php?view=business&do=exExcel&loai=1&action=getMonth&month='+thang);
                        break;
                        case "2":
                        var quy=$("#cbbQuy").val();
                            url="module/thuchi/XLThuChi.php?view=business&do=rpex&action=getQuy&quy="+quy+"&page=1";
                             $("#dsThuchi").load(url);
                             $('#btnExportExcel').attr('href',"module/thuchi/XLThuChi.php?view=business&do=exExcel&loai=1&action=getQuy&quy="+quy);
                        break;
                        case "3":
                        var nam=$("#txtNam").val();
                            url="module/thuchi/XLThuChi.php?view=business&do=rpex&action=getYear&year="+nam+"&page=1";
                             $("#dsThuchi").load(url);
                              $('#btnExportExcel').attr('href',"module/thuchi/XLThuChi.php?view=business&do=exExcel&loai=1&action=getYear&year="+nam);
                        break;
                        default:
                        var thang=$("#cbbThang").val();
                            url="module/thuchi/XLThuChi.php?view=business&do=rpex&action=getMonth&month="+thang+"&page=1";
                             $("#dsThuchi").load(url);
                        break;
                    }
   	                
   	            });
                $('#btnDelete').click(function(){
                 var values ="";
                $.each($("input[name='cbId[]']:checked"), function() {
                    values+=$(this).val()+"|";
                        });
                if(values.length==0)
                {
                    alert("Bạn phải chọn hảng cần xóa");
                    return false;
                }
                var answer = confirm ("Bạn có chắc xóa không?")
                if (answer)
                {    
                    values=values.substr(0,values.length-1);
                    url="module/thuchi/XLThuChi.php?view=business&do=rpex&action=remove&id="+values+"&page=1";
                     $("#dsThuchi").load(url);
                }
              }); 
			});
		</script>
	<div class="mid">
		<form method="post" name="frmListItem" id="frmListItem">
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
					<select id="cbbQuy">
						<option value="1"> 1 </option>
						<option value="2"> 2 </option>
						<option value="3"> 3 </option>
						<option value="4"> 4 </option>
					</select>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="radio" name="type" value="3" /> Năm 
				<input type="text" style="width:40px;" id="txtNam"/>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="button" value="Xem" id="btnShow"/>
			</div>
			<div class="list" id="dsThuchi">
				
			</div>
		</form>
	</div>
	<div class="bl"></div>
	<div class="br"></div>
	<div class="bm"></div>
</div>