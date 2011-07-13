<?php
	if($_SESSION["curUser"][8] != 1)
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
			<img src="images/icon_32_cancel.png" alt="Hủy"  border="0" title="Hủy" /><br />Hủy</a></div>
    <!--<div class="icon">
    	<a href="#" id="aSave">
        	<img src="images/icon_32_apply.png" alt="Lưu" border="0" title="Lưu" /><br />Lưu</a></div>-->
    <br class="clr" />
</div>
<div class="bl"></div>
<div class="br"></div>
<div class="bm"></div>
</div>
<div style="margin:10px">
    <div class="tl"></div>
    <div class="tr"></div>
    <div class="tm"></div>
    <div class="mid">
	<script src="js/common.js" language="javascript"></script>
	<form action="index.php?view=article" method="post" name="frmRegister" id="frmRegister" >
		<div style="float:left;width:50%;">
			<table width="90%" align="center" border="0" cellpadding="0" cellspacing="0">
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
					$objCanHo = DichVuBUS::select($_REQUEST["aid"]); 
					$loaidv = LoaiDVBUS::GetLoaiDVByID($objCanHo["loaidv"]);
					$tinh = TinhBUS::getTinhById($objCanHo["tinh"]);
					$quan = QuanBUS::getQuanById($objCanHo["quan"]);
                    $phuong = PhuongBUS::getPhuongById($objCanHo["phuong"]);
					$donvitien = DonViTienBUS::selectId($objCanHo["donvitien"]);
					$loainha = LoaiNhaBUS::getById($objCanHo["loainha"]);
					$huongnha = HuongNhaBUS::GetHuongNhaById($objCanHo["huongnha"]);
					$phaply = PhapLyBUS::GetPhapLyById($objCanHo["phaply"]);
				?>
				<tr>
					<td width="100px">Loại dịch vụ:</td>
					<td><b><?php echo $loaidv[1]; ?></b></td>
				</tr>
				<tr>
					<td>Tiêu đề:</td>
					<td><b><?php echo $objCanHo["tieude"]; ?></b></td>
				</tr>
				<tr>
					<td>Địa chỉ:</td>
					<td><?php echo $objCanHo["sonha"].", ".$phuong[1].", ".$quan[1].", ".$tinh[1]; ?></td>
				</tr>
				<tr>
					<td>Thông tin chi tiết:</td>
					<td><?php echo "Diện tích: ".$objCanHo["rong"]."x".$objCanHo["dai"]." m<sup>2</sup>, ".$objCanHo["sophongngu"]." phòng ngủ, ".$objCanHo["sophongtam"]." phòng tắm, ".$objCanHo["tang"]." tầng." ?></td>
				</tr>
				<tr>
					<td>Loại nhà:</td>
					<td><?php echo $loainha[1]; ?></td>
				</tr>
				<tr>
					<td>Hướng nhà:</td>
					<td><?php echo $huongnha[1]; ?></td>
				</tr>
				<tr>
					<td>Tình trạng pháp lý:</td>
					<td><?php echo $phaply[1]; ?></td>
				</tr>
				<tr>
					<td>Mô tả:</td>
					<td><?php echo $objCanHo["mota"]; ?></td>
				</tr>
				<tr>
					<td>Giá bán:</td>
					<td><?php echo number_format($objCanHo["giaban"])." ".$donvitien[1]; ?></td>
				</tr>
				<tr>
					<td>Ngày đăng:</td>
					<td><?php if($objCanHo["ngaydang"] != null) echo Utils::convertTimeDMY($objCanHo["ngaydang"]); ?></td>
				</tr>
				<tr>
					<td>Ngày hết hạn:</td>
					<td style="color:red;font-weight:bold;"><?php echo Utils::calculateEndDate(Utils::convertTimeDMY($objCanHo["ngaydang"]), $objCanHo["thoihantin"]); ?></td>
				</tr>
				<tr>
					<td colspan="2" style="color:Blue;font-weight:bold;height:50px;">
						<input type="checkbox" name="noibat" id="noibat" value="1" style="position:relative;top:2px;margin-right:10px;" 
							onclick="return checkCanHoNoiBat();" <?php if ($objCanHo["rank"]==1) echo "checked"; ?> />Chọn làm căn hộ nổi bật:</td>
				</tr>
			</table>
		</div>
		<div style="float:left; width:50%;">
			<table width="90%" align="center" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td valign="top">Một số hình ảnh:</td>
					<td>
						<div class="ajax__tab_body" id="ctl00_MainContent_ctl00_SliderTab_body">
							<div style="visibility: visible;" class="ajax__tab_panel" id="ctl00_MainContent_ctl00_SliderTab_image">
								<!-- gallery SlideShow -->
								<div style="visibility: visible; position: relative;
									margin: 0pt; background: none repeat scroll 0% 0% transparent; border: 1px solid black;
									width: 380px; height: 350px;" id="photos" class="galleryview">
									
				<!--anh lơn-->		<div style="width: 380px; height: 290px; position: absolute; top: 0px;
										left: 0px; overflow: hidden; background: none repeat scroll 0% 0% white; opacity: 1;
										display: block;" class="panel">
										<img src="../images/user/1.png" style="height: 290px; width: 380px; border-width: 0px;" name="pic" id="pic">																	
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
												<img src="../images/user/1.png" style="height: 50px; width: 50px; border: medium none;" name="pic2" id="pic2">																		</li>
										</ul>
									</div>
									<div style="position: absolute; z-index: 1000; cursor: pointer; top: 294px; left: 163px; height: 48px; width: 48px; display: block; overflow: visible; border: 2px solid black;" id="pointer"></div>
									<img style="position: absolute; cursor: pointer; top: 309px; right: 133px;" onclick="slideshow()" src="../images/next.png" class="nav-next">
									<img style="position: absolute; cursor: pointer; top: 309px; left: 133px;" onclick="prev()" src="../images/prev.png" class="nav-prev">
								</div>
								<!-- /gallery SlideShow -->
							</div>
							<div class="ajax__tab_panel" id="ctl00_MainContent_ctl00_SliderTab_tabmap" style="display: none; visibility: hidden;">
								<div id="map_canvas" style="width: 380px; height: 350px;"></div>
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