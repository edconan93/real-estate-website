<?php
	$flag = 0;
	if ($_SESSION["curUser"][8] == 1) $flag = 1;
	if ($_SESSION["curUser"][8] == 3) $flag = 1;
	
	if ($flag == 0) // Khong duoc phep di tiep
		header("Location: index.php");
		
	$aid = (int) $_GET["aid"];
	if(empty($aid))
		return;
		
	$PATH = str_replace('//','/',dirname(__FILE__).'/') ;
?>
	
<script>
	function checkCanHoNoiBat()
	{
		var aid = document.location.href.split("aid=")[1];
		var chk = document.getElementById("noibat");
		
		if (chk.checked == true)
		{
			if (confirm("Bạn có chắc muốn làm căn hộ nổi bật?"))
			{
				window.location = "module/tindang/xulytindang.php?action=noibat1&idtin=" + aid;
				return true;
			}
		}
		else
		{
			if (confirm("Bạn có chắc không muốn làm căn hộ nổi bật?"))
			{
				window.location = "module/tindang/xulytindang.php?action=noibat0&idtin=" + aid;
				return true;
			}
		}
			
		return false;
	}
</script>
<div id="toolbar">
<div class="tl"></div>
<div class="tr"></div>
<div class="tm"></div>
<div class="mid">
	<div class="title icon_user">Tin đăng: <span class="subTitle">[ Chi tiết ]</span></div>
    <div class="icon">
		<a href="index.php?view=article" id="aCancel">
			<img src="images/icon_32_cancel.png" border="0" /><br />Quay lại</a></div>
    <!--<div class="icon">
    	<a href="#" id="aSave">
        	<img src="images/icon_32_apply.png" alt="Lưu" border="0" title="Lưu" /><br />Lưu</a></div>-->
    <br class="clr" />
</div>
<div class="bl"></div>
<div class="br"></div>
<div class="bm"></div>
</div>
<?php
	include_once ("../BUS/DichVuBUS.php");
	include_once ("../BUS/LoaiDVBUS.php");
	include_once ("../BUS/TinhBUS.php");
	include_once ("../BUS/QuanBUS.php");
	include_once ("../BUS/PhuongBUS.php");
	include_once ("../BUS/DonViTienBUS.php");
	include_once ("../BUS/LoaiNhaBUS.php");
	include_once ("../module/Utils/Utils.php");
	include_once ("../BUS/HuongNhaBUS.php");
	include_once ("../BUS/PhapLyBUS.php");
	include_once ("../BUS/HinhAnhBUS.php");
	$objCanHo = DichVuBUS::select($_REQUEST["aid"]); 
	$loaidv = LoaiDVBUS::GetLoaiDVByID($objCanHo["loaidv"]);
	$tinh = TinhBUS::getTinhById($objCanHo["tinh"]);
	$quan = QuanBUS::getQuanById($objCanHo["quan"]);
	$phuong = PhuongBUS::getPhuongById($objCanHo["phuong"]);
	$donvitien = DonViTienBUS::selectId($objCanHo["donvitien"]);
	$loainha = LoaiNhaBUS::getById($objCanHo["loainha"]);
	$huongnha = HuongNhaBUS::GetHuongNhaById($objCanHo["huongnha"]);
	$phaply = PhapLyBUS::GetPhapLyById($objCanHo["phaply"]);
	$hinhanh = HinhAnhBUS::getAllHinhAnhByDichVuID($objCanHo['id']);
?>
<div style="margin:10px">
    <div class="tl"></div>
    <div class="tr"></div>
    <div class="tm"></div>
    <div class="mid">
	<script src="js/common.js" language="javascript"></script>
	<form action="index.php?view=article" method="post" name="frmRegister" id="frmRegister" >
		<div style="float:left;width:60%;">
			<table width="90%" align="center" border="0" cellpadding="0" cellspacing="0">
				<tr style="background:#F1F1F1;">
					<td width="100px"><b>Loại dịch vụ:</b></td>
					<td><b><?php echo $loaidv[1]; ?></b></td>
				</tr>
				<tr>
					<td><b>Tiêu đề:</b></td>
					<td><b><?php echo $objCanHo["tieude"]; ?></b></td>
				</tr>
				<tr style="background:#F1F1F1;">
					<td><b>Địa chỉ:</b></td>
					<td><?php echo $objCanHo["sonha"].", ".$phuong[1].", ".$quan[1].", ".$tinh[1]; ?></td>
				</tr>
				<tr>
					<td><b>Thông tin chi tiết:</b></td>
					<td><?php echo "Diện tích: ".$objCanHo["rong"]."x".$objCanHo["dai"]." m<sup>2</sup>, ".$objCanHo["sophongngu"]." phòng ngủ, ".$objCanHo["sophongtam"]." phòng tắm, ".$objCanHo["tang"]." tầng." ?></td>
				</tr>
				<tr style="background:#F1F1F1;">
					<td><b>Loại nhà:</b></td>
					<td><?php echo $loainha[1]; ?></td>
				</tr>
				<tr>
					<td><b>Hướng nhà:</b></td>
					<td><?php echo $huongnha[1]; ?></td>
				</tr>
				<tr style="background:#F1F1F1;">
					<td style="width:120px;"><b>Tình trạng pháp lý:</b></td>
					<td><?php echo $phaply[1]; ?></td>
				</tr>
				<tr>
					<td valign="top"><b>Mô tả:</b></td>
					<td><?php echo $objCanHo["mota"]; ?></td>
				</tr>
				<tr style="background:#F1F1F1;">
					<td><b>Giá bán:</b></td>
					<td><?php echo number_format($objCanHo["giaban"])." ".$donvitien[1]; ?></td>
				</tr>
				<tr>
					<td><b>Ngày đăng:</b></td>
					<td><?php if($objCanHo["ngaydang"] != null) echo Utils::convertTimeDMY($objCanHo["ngaydang"]); ?></td>
				</tr>
				<tr style="background:#F1F1F1;">
					<td><b>Ngày hết hạn:</b></td>
					<td style="color:red;font-weight:bold;"><?php echo Utils::calculateEndDate(Utils::convertTimeDMY($objCanHo["ngaydang"]), $objCanHo["thoihantin"]); ?></td>
				</tr>
			</table>
		</div>
		<div style="float:left; width:40%;">
			<table width="90%" align="center" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>Một số hình ảnh:<br><br>
						<div class="ajax__tab_body" id="ctl00_MainContent_ctl00_SliderTab_body">
							<div style="visibility: visible;" class="ajax__tab_panel" id="ctl00_MainContent_ctl00_SliderTab_image">
								<!-- gallery SlideShow -->
								<div style="visibility: visible; position: relative;
									margin: 0pt; background: none repeat scroll 0% 0% transparent; border: 1px solid black;
									width: 380px; height: 350px;" id="photos" class="galleryview">
									
				<!--anh lơn-->		<div style="width: 380px; height: 290px; position: absolute; top: 0px;
										left: 0px; overflow: hidden; background: none repeat scroll 0% 0% white; opacity: 1;
										display: block;" class="panel">
										
																											
										<?php if(count($hinhanh) >0){?>
										<img id="pic" name="pic" style="height: 290px; width: 380px; border-width: 0px;" src="../<?php echo $hinhanh[0]['path']?>">
										<?php 
										//echo "aaaaaaaaaaaaaaaaaaaa";
										}
										else
										{
										//echo "AAAAAAAAAAAAAAAAAAAA";
										echo "<img id='pic' name='pic' style='height: 290px; width: 380px; border-width: 0px;' src='../images/user/1.png'>";
										}
										?>
										<div style="position: absolute; z-index: 999; width: 360px;
											height: 1px; top: 289px; left: 0pt; padding: 0pt 10px; color: white; font-size: 1em;" class="panel-overlay">
										</div>
										<div style="position: absolute; z-index: 998; width: 380px; height: 1px;
											top: 289px; left: 0pt; background: none repeat scroll 0% 0% rgb(34, 34, 34);
											opacity: 0.6;" class="overlay">
										</div>
									</div>
				<!--anh nho-->		<div style="position: absolute; top: 290px; left: 165px; width: 50px;
										height: 60px; overflow: hidden;" class="strip_wrapper">
										<ul style="list-style: none outside none; margin: 0pt; padding: 0pt;
											width: 60px; position: absolute; z-index: 900; top: 0pt; left: 0pt; height: 60px;
											background: none repeat scroll 0% 0% transparent;" class="filmstrip">
											<li style="float: left; position: relative; height: 50px; z-index: 901; margin-top: 5px;
												margin-bottom: 0px; margin-right: 10px; padding: 0pt; cursor: pointer;">
												
												<?php if(count($hinhanh) >0){?>
												<img id="pic2" name="pic2" style="height: 50px; width: 50px; border: medium none;" src="../<?php echo $hinhanh[0]['path']?>">
												<?php }
												else
												{
													echo "<img id='pic2' name='pic2' style='height: 50px; width: 50px; border: medium none;' src='../images/user/1.png'>";
												}
												?>
											</li>
										</ul>
									</div>
								<div id="pointer" style="position: absolute; z-index: 1000; cursor: pointer; top: 294px; left: 163px; height: 48px; width: 48px; display: block; overflow: visible; border: 2px solid black;">
								</div>
								<img class="nav-next" src="../images/next.png" onclick="slideshow()"
									style="position: absolute; cursor: pointer; top: 309px; right: 133px;">
								<img class="nav-prev" src="../images/prev.png" onclick="prev()"
									style="position: absolute; cursor: pointer; top: 309px; left: 133px;">
							</div>
							<!-- /gallery SlideShow -->
							</div>
							<div class="ajax__tab_panel" id="ctl00_MainContent_ctl00_SliderTab_tabmap" style="display: none; visibility: hidden;">
								<div id="map_canvas" style="width: 380px; height: 350px;"></div>
							</div>
							<div><br>
								<input type="checkbox" name="noibat" id="noibat" value="1" style="position:relative;top:2px;margin-right:10px;" 
									onclick="return checkCanHoNoiBat();" <?php if ($objCanHo["rank"]==1) echo "checked"; ?> />Chọn làm căn hộ nổi bật:
							</div>
						</div>
					</td>
				</tr>
			</table>
		</div>
    </form>
    <br class="clr" />
    </div>
    <div class="bl"></div>
    <div class="br"></div>
    <div class="bm"></div>
</div>
<?php
	static $i = 0;
	
	echo "<script type='text/javascript'>;
			var picture = 0;
			var slide;
			var slide2;
			var width = 250;
			var height = 100;
			
			var imgAr1 = new Array();
			var rImg1 = new Array();
			if(".count($hinhanh)." != 0)
			{";
			echo"for(var j = 0; j < ".count($hinhanh)."; j++)
				{
					imgAr1[j] = new Image();
					";
					for($i=0;$i<count($hinhanh);$i++)
					{
					
						echo"if(j == ".$i.")
						{
							imgAr1[j].src = '../".$hinhanh[$i]['path']."';
							
						}";
					}

		echo"}
			}
			else
			{
				imgAr1[j].src = '../images/user/1.png';
				
			}
			for(var j = 0; j < imgAr1.length; j++)
			{
				rImg1[j] = new Image();
				rImg1[j].src = imgAr1[j].src;
			
			}
			document.onload = setting();		
			function setting()
			{
				slide = document.getElementById('pic');
				slide.src = imgAr1[0].src;
				slide.setAttribute('width',width);
				slide.setAttribute('height',height);
				
				slide2 = document.getElementById('pic2');
				slide2.src = imgAr1[0].src;
				slide2.setAttribute('width',50);
				slide2.setAttribute('height',50);
			}					
			
			function slideshow(){
				if(picture < (imgAr1.length-1))
				{
					picture=picture+1;
					slide.src = imgAr1[picture].src;
					slide2.src = imgAr1[picture].src;
				}
			}

			function prev(){

				if(picture > 0 ){
					picture=picture-1;
					slide.src = imgAr1[picture].src;
					slide2.src = imgAr1[picture].src;
				}
			}

			function start(){
					slide.src = imgAr1[1].src;
					picture = 0;
			}

			function end(){
					slide.src = imgAr1[imgAr1.length-1];
					picture = imgAr1.length-1;
			}
			
		</script>";
?>	