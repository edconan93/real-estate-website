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
		<div class="title icon_staff">Đánh giá nhân viên</div>
		<div class="icon">
			<a href="index.php?view=statistic" id="aCancel">
				<img src="images/icon_32_cancel.png" /><br />Quay lại</a></div>
		<div class="icon" style="width:60px;">
			<a href="module/thongke/EvaluateProcessor.php?view=statistic&do=evaluate&action=export&level=-1&page=1" id="btnExport">
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
    $(document).ready(function()
			{
                url="module/thongke/EvaluateProcessor.php?view=statistic&do=evaluate&page=1";          
                $("#dsNhanvien").load(url);
				
   	            $("#btnShow").click(function(){
   	                var type=$("#cbbType").val();
                    if(type=="-1")
                    {
                        url="module/thongke/EvaluateProcessor.php?view=statistic&do=evaluate&page=1";          
                        $("#dsNhanvien").load(url); 
                        $('#btnExport').attr("href","module/thongke/EvaluateProcessor.php?view=statistic&do=evaluate&action=export&level=-1&page=1")
                    }
                    else
                    {
                        url="module/thongke/EvaluateProcessor.php?view=statistic&do=evaluate&action=show&level="+type+"&page=1";          
                        $("#dsNhanvien").load(url);
                        $('#btnExport').attr("href","module/thongke/EvaluateProcessor.php?view=statistic&do=evaluate&action=export&level="+type+"&page=1")
                    }
                    });
                $('#btnSave').click(function(){
                    url="module/thongke/EvaluateProcessor.php";
                    
                     $.each($("input[name='txtID[]']"), function() {
                        var id=$(this).val();
                        var loai=$("#cbbLoai_"+id).val();
                        var khenthuong=$("#txtKhenThuong_"+id).val();
                        if(loai!="-1")
                        {
                            var params = { 'view':'statistic', 'do':'evaluate','action':'save','id':id,'loai':loai,'khenthuong':khenthuong};
                            $('#dvTemp').load(url,params,function(){
                              url="module/thongke/EvaluateProcessor.php?view=statistic&do=evaluate&page=1";          
                            $("#dsNhanvien").load(url); 
                            });
                        }                    
                        });
                //url="module/thongke/EvaluateProcessor.php?view=statistic&do=evaluate&page=1";          
                //$("#dsNhanvien").load(url);
                });
                });
    </script>
    <div class="mid">
		<form action="index.php?view=user" method="post" name="frmRegister" id="frmRegister">
			<div style="text-align:center;padding-bottom:30px;">
				<select id="cbbType">
					<option value="-1"> Tất cả nhân viên </option>
					<option value="1"> Nhân viên cấp bậc 1 </option>
					<option value="2"> Nhân viên cấp bậc 2 </option>
					<option value="3"> Nhân viên cấp bậc 3 </option>
				</select>
				&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="button" value="Thống kê" id="btnShow" />
			</div>
			<div class="list" id="dsNhanvien">
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
		</form>
		<br class="clr" />
    </div>
    <div class="bl"></div>
    <div class="br"></div>
    <div class="bm"></div>
</div>