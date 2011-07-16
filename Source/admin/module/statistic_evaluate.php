<?php
	if (!isset($_SESSION["curUser"]))
		header("Location: index.php");
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
		<div class="title icon_staff">Đánh giá nhân viên</div>
		<div class="icon">
			<a href="index.php?view=statistic" id="aCancel">
				<img src="images/icon_32_cancel.png" /><br />Quay lại</a></div>
		<div class="icon" style="width:60px;">
			<a href="module/thongke/EvaluateProcessor.php?view=statistic&do=evaluate&action=export&page=1" id="btnExport">
				<img src="images/export_excel.png" alt="Xuất Excel" border="0" title="Xuất Excel" /><br />Xuất Excel</a></div>
		<div class="icon">
			<a href="#" id="btnSave">
				<img src="images/icon_32_apply.png" alt="Lưu" border="0" title="Lưu" /><br />Lưu</a></div>
		<br class="clr" />
	</div>
	<div class="bl"></div>
	<div class="br"></div>
	<div class="bm" id="dvTemp"></div>
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
                $("#dsNhanvien").load(url);
            }
    function selectUser()
    {
        var id=$('#cbbAddRow').val();
        if(id=="-1")
        return false;
        $('#trNewRow').load("module/thongke/EvaluateProcessor.php?view=statistic&do=evaluate&action=loadrow&id="+id+'&page=1');
    }
    function addNew()
    {
        var id=$('#txtNewID').val();
        if(id=="-1")
        {
            $('#cbbAddRow').attr("style","font-size:12px;width:150px;text-align: center;background-color:red;");
            return false;
        }
        var loai=$('#cbbNewThanhTich').val();
        if(loai=="-1")
        {
            $('#cbbNewThanhTich').attr("style","background-color:red;");
            return false;
        }
        var khenthuong=$('#txtNewKhenThuong').val();
        if(khenthuong=="")
        {
            $('#txtNewKhenThuong').attr("style","width:300px;background-color:red;");
            return false;
        }
            
        var ngay=$('#txtDate_New').val();
        url="module/thongke/EvaluateProcessor.php"; 
        var params = { 'view':'statistic', 'do':'evaluate','action':'add','id':id,'loai':loai,'khenthuong':khenthuong,'ngay':ngay};         
        $("#dsNhanvien").load(url,params,function(){
                              url="module/thongke/EvaluateProcessor.php?view=statistic&do=evaluate&page=1";          
                            $("#dsNhanvien").load(url); 
                            });
    }
    function update(id)
    {
        var loai=$("#cbbLoai_"+id).val();
        var khenthuong=$("#txtKhenThuong_"+id).val();
        var ngay=$("#txtDate_"+id).val();
    
        if(loai!="-1"&&khenthuong!=""&&ngay!="")
        {
             var params = { 'view':'statistic', 'do':'evaluate','action':'save','id':id,'loai':loai,'khenthuong':khenthuong,'ngay':ngay};
             $('#dvTemp').load(url,params,function(){
             url="module/thongke/EvaluateProcessor.php?view=statistic&do=evaluate&page=1";          
             $("#dsNhanvien").load(url); 
             });
        }          
    }
    $(document).ready(function()
			{
                url="module/thongke/EvaluateProcessor.php?view=statistic&do=evaluate&page=1";          
                $("#dsNhanvien").load(url);
				
   	            $("#btnShow").click(function(){
   	                var type=$("#cbbType").val();                    
                    var nam=$('#cbbNam').val();
                    var thang=$("#cbbThang").val();
                    var quy=$("#cbbQuy").val();
                     
                    var radioType=$("input[name='radiotype']:checked").val();
                    url="module/thongke/EvaluateProcessor.php?view=statistic&do=evaluate&action=show&radio="+radioType+"&loai="+type+"&nam="+nam+"&quy="+quy+"&thang="+thang+"&page=1";          
                    $("#dsNhanvien").load(url); 
                    $('#btnExport').attr("href","module/thongke/EvaluateProcessor.php?view=statistic&do=evaluate&action=export&radio="+radioType+"&loai="+type+"&nam="+nam+"&quy="+quy+"&thang="+thang+"&page=1")
                    
                    
                    });
                $('#btnSave').click(function(){
                    url="module/thongke/EvaluateProcessor.php";
                    
                     $.each($("input[name='txtID[]']"), function() {
                        var id=$(this).val();
                        var loai=$("#cbbLoai_"+id).val();
                        var khenthuong=$("#txtKhenThuong_"+id).val();
                        var ngay=$("#txtDate_"+id).val();
    
                        if(loai!="-1"&&khenthuong!=""&&ngay!="")
                        {
                            var params = { 'view':'statistic', 'do':'evaluate','action':'save','id':id,'loai':loai,'khenthuong':khenthuong,'ngay':ngay};
                            $('#dvTemp').load(url,params,function(){
                              url="module/thongke/EvaluateProcessor.php?view=statistic&do=evaluate&page=1";          
                            $("#dsNhanvien").load(url); 
                            });
                        }                    
                        });
                //url="module/thongke/EvaluateProcessor.php?view=statistic&do=evaluate&page=1";          
                //$("#dsNhanvien").load(url);
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
						
                });
    </script>
    <div class="mid">
		<form action="index.php?view=user" method="post" name="frmRegister" id="frmRegister">
			<div style="text-align:center;padding-bottom:30px;">
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
					<select id="cbbQuy" style="width:100px;">
                        <option value="-1" selected>--Chọn quý--</option>
						<option value="1"> 1 </option>
						<option value="2"> 2 </option>
						<option value="3"> 3 </option>
						<option value="4"> 4 </option>
					</select>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" name="radiotype" value="1"/>
			 Tháng 
					<select id="cbbThang" style="width:100px;">
                        <option value="-1" selected>--Chọn tháng--</option>
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
				<select id="cbbType">
					<option value="-1"> Tất cả nhân viên </option>
					<option value="1"> Nhân viên cấp bậc 1 </option>
					<option value="2"> Nhân viên cấp bậc 2 </option>
					<option value="3"> Nhân viên cấp bậc 3 </option>
				</select>
				&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="button" value="Thống kê" id="btnShow" />
			</div>
            <script>
							
			</script>
			<div class="list" id="dsNhanvien" >
				<table align="center" border="0" cellspacing="0" cellpadding="0">
					<tr><td colspan="7"><b>Có 3 mẫu tin</b></td></tr>
					<tr class="title">
							<td width="30px" align="center">#</td>
							<td align="center">Nhân viên</td>
							<td align="center">Email đăng nhập</td>
							<td align="center" width="50px">Giới tính</td>
							<td align="center" width="60px">Cấp độ</td>
							<td align="center" width="100px">Đạt thành tích</td>
							<td align="center">Khen thưởng</td>
						</tr>
                        
						<!--
<tr>
							<td align="center">1</td>
							<td class="m_name"><a href="index.php?view=user&do=edit&uid=1">Nguy?n Th? Thanh Phuong Ðoàn</a></td>
							<td style="color:blue;">nguyenthithanhphuong@yahoo.com</td>
							<td align="center">Nam</td>
							<td align="center">C?p b?c 1</td>
							<td align="center">
								<select>
									<option value="">Trung bình</option>
									<option value="">Khá</option>
									<option value="">Xu?t s?c</option>
								</select>
							</td>
							<td>
								<input type="text" style="width:300px;" />
							</td>
						</tr>
                       
						<tr>
							<td align="center">2</td>
							<td class="m_name"><a href="index.php?view=user&do=edit&uid=1">Cao Thanh Tâm</a></td>
							<td style="color:blue;">nguyenthithanhphuong@yahoo.com</td>
							<td align="center">Nam</td>
							<td align="center">C?p b?c 2</td>
							<td align="center">
								<select>
									<option value="">Trung bình</option>
									<option value="">Khá</option>
									<option value="">Xu?t s?c</option>
								</select>
							</td>
							<td>
								<input type="text" style="width:300px;" />
							</td>
						</tr>
-->
                        
				</table>
			</div>
            </div>
		</form>
		<br class="clr" />
    </div>
    <div class="bl"></div>
    <div class="br"></div>
    <div class="bm"></div>
</div>