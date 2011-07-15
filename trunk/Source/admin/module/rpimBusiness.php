<div id="toolbar">
	<div class="tl"></div>
	<div class="tr"></div>
	<div class="tm"></div>
	<div class="mid">
		<div class="title icon_rpim">Tổng kết doanh thu</div>
		<div class="icon">
			<a href="index.php?view=business" id="aCancel">
				<img src="images/icon_32_cancel.png" /><br />Quay lại</a></div>
		<div class="icon" style="width:60px;">
			<a href="#" id="btnDelete">
				<img src="images/trash-can-delete.png" /><br />Xóa</a></div>
		<div class="icon" style="width:60px;">
			<a href="module/thuchi/XLThuChi.php?view=business&do=exExcel&loai=0&nam=2011&radio=-1" id="btnExportExcel">
				<img src="images/export_excel.png" /><br />Xuất Excel</a></div>
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
    <div id="divTemp"></div>
    <script language="javascript">
    var url="";
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
			 
                url="module/thuchi/XLThuChi.php?view=business&do=rpim&page=1";   
                       
                $("#dsThuchi").load(url);
				
   	            $("#btnShow").click(function(){
   	                        var nam=$("#cbbNam").val();   
                            var thang=$("#cbbThang").val();
                            var quy=$("#cbbQuy").val();
                            var radioType=$("input[name='radiotype']:checked").val();
                            url="module/thuchi/XLThuChi.php?view=business&action=showreport&loai=0&radio="+radioType+"&nam="+nam+"&quy="+quy+"&thang="+thang+"&page=1";
   
                             $("#dsThuchi").load(url);
                            $('#btnExportExcel').attr('href',"module/thuchi/XLThuChi.php?view=business&radio="+radioType+"&do=exExcel&loai=0&nam="+nam+"&quy="+quy+"&thang="+thang);
                 
   	            });
                
                $("input[name='radiotype']").change(function(){
                    var value=$(this).val();
                    if(value=='0')
                    {
                     
                        $('#cbbThang').attr('disabled', 'disabled');
                        $('#cbbQuy').removeAttr('disabled');

                    }
                    else
                    {
                         $('#cbbQuy').attr('disabled', 'disabled');
                        $('#cbbThang').removeAttr('disabled');
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
                    url="module/thuchi/XLThuChi.php?view=business&action=remove&loai=0&id="+values+"&page=1";
                     $("#dsThuchi").load(url);
                 }
              }); 
              
			});
		</script>
	<div class="mid">
		<form method="post" name="frmListItem" id="frmListItem">
			<div style="text-align:center; padding-bottom:30px;">
            Năm <select id="cbbNam" style="width:80px;">
            <?php
            for($i=date("Y");$i>=2009;$i--)
                echo '<option value="'.$i.'">'.$i.'</option>';
            ?>
            </select>
           	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" name="radiotype" value="0"/>
             Quý 
					<select id="cbbQuy" style="width:50px;">
						<option value="1"> 1 </option>
						<option value="2"> 2 </option>
						<option value="3"> 3 </option>
						<option value="4"> 4 </option>
					</select>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" name="radiotype" value="1"/>
			 Tháng 
					<select id="cbbThang" style="width:50px;">
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
				<input type="button" value="Xem" id="btnShow"/>
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