<?php
	include("../include/header.php");
?>
	<table bgcolor="black" border="0" cellpadding="0" cellspacing="0" width="986">
		<tr>
			<td width="986">
				<div style="width: 986px; height: 177px;" id="contentslide">
					<embed type="application/x-shockwave-flash" src="../images/contentslide.swf" id="mymovie"
						name="mymovie" bgcolor="#000000" quality="high" loop="true" wmode="transparent"
						width="986" height="177">
				</div>
				<table bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" width="986;">
					<tr>
						<td style="border-right: 1px solid rgb(180, 215, 232); background-repeat: repeat-y;"
							background="1_files/menubg_all.jpg" valign="top" width="270">
							
							<!--search loai-->
							<?php include("../include/searchloaidv.php"); ?>
							<!--end search-->
							<?php include("../include/box_left.php"); ?>
						</td>
						<td style="padding: 10px;" valign="top">
							
								<?php include("../include/canhonoibat.php"); ?>
                            <?php
                            $business=null;
                            if(isset($_REQUEST['iddichvu'])) 
                            {
                                include_once ("../BUS/DichVuBUS.php");
                                include_once ("../BUS/HinhAnhBUS.php");
                                include_once ("../BUS/DonviDichVuBUS.php");
                                include_once ("../BUS/DonViTienBUS.php");
                                include_once ("../BUS/TinhBUS.php");
                                include_once ("../BUS/QuanBUS.php");
                                include_once ("../BUS/PhuongBUS.php");
								include_once ("Utils/Utils.php");
								include_once ("../BUS/LoaiDVBUS.php");
								include_once ("../BUS/LoaiNhaBUS.php");
								include_once ("../BUS/PhapLyBUS.php");
								include_once ("../BUS/HuongNhaBUS.php");
                                $business=DichVuBUS::select($_REQUEST['iddichvu']); 
                                $quan=QuanBUS::getQuanById($business['quan']);
                                $phuong=PhuongBUS::getPhuongById($business['phuong']);
                                $tinh=TinhBUS::getTinhById($business['tinh']);
								$loaidichvu = LoaiDVBUS::GetLoaiDVByID($business['loaidv']);
								$loainha = LoaiNhaBUS::getById($business['loainha']);
								$phaply = PhapLyBUS::GetPhapLyById($business['phaply']);
								$huongnha = HuongNhaBUS::GetHuongNhaById($business['huongnha']);
								$donvitien = DonViTienBUS::selectId($business['donvitien']);
								$hinhanh = HinhAnhBUS::getAllHinhAnhByDichVuID($business['id']);
								// echo count($hinhanh);
								// echo "<br>aaaaaaaaa=".$hinhanh[0]['path'];
                            }
                            ?>
							<div style="width: 686px; padding-top:20px;float:left;">
								<div style="margin-left: 10px; margin-top: 10px; font-family: tahoma; font-size: 18px;
									font-weight: bold; color:#890C29;">
									<?php echo $business['tieude']; ?> </div>
								<hr style="color: rgb(211, 232, 248);" width="680" size="1"/>
								<div class="mid_content">
									<p style="margin-top:0;">
										<b style="padding-right:10px;">Mã số tin: <?php echo $business[0]?></b>
										<span style="padding-right:10px;">Ngày đăng: <?php 
										if($business['ngaydang'] != null)
											$ngaydang=Utils::convertTimeDMY($business['ngaydang']);
										if($business['ngaycapnhat'] != null)
											$ngaycapnhat=Utils::convertTimeDMY($business['ngaycapnhat']);
										$ngayhh=Utils::convertDecline_Time($business['ngaydang']);
										if(isset($ngaycapnhat))
											echo $ngaydang ?></span>

										<span style="padding-right:10px;">Ngày cập nhật: <?php
										if(isset($ngaycapnhat))
											echo $ngaycapnhat 
										?></span>
										<span style="padding-right:10px;">Thời hạn tin: <?php if(isset($ngaycapnhat)) echo $ngayhh ?></span>
									</p>
									<div class="detail1">
										<div class="map">
											<div class="clearBoth">
												<div style="visibility: visible;" id="SliderTab" class="ajax__tab_xp ajax__tab_container ajax__tab_default">
													<div id="SliderTab_header" class="ajax__tab_header">
														<span id="SliderTab_image_tab"  class="ajax__tab_active">
															<span class="ajax__tab_outer">
																<span class="ajax__tab_inner">
																	<span id="SliderTab_image" class="ajax__tab_tab" onclick="changeTab(0)">Hình ảnh </span></span></span></span>
														<span id="SliderTab_tabmap_tab" >
															<span class="ajax__tab_outer">
																<span class="ajax__tab_inner">
																	<span id="SliderTab_tabmap"	class="ajax__tab_tab" onclick="changeTab(1)">Bản đồ</span></span></span></span>
																		
													</div>
													<div id="ctl00_MainContent_ctl00_SliderTab_body" class="ajax__tab_body">
														<div id="ctl00_MainContent_ctl00_SliderTab_image" class="ajax__tab_panel" style="visibility: visible;">
															<!-- gallery SlideShow -->
															<div class="galleryview" id="photos" style="visibility: visible; position: relative;
																margin: 0pt; background: none repeat scroll 0% 0% transparent; border: 1px solid black;
																width: 380px; height: 350px;">
																
											<!--anh lơn-->		<div class="panel" style="width: 380px; height: 290px; position: absolute; top: 0px;
																	left: 0px; overflow: hidden; background: none repeat scroll 0% 0% white; opacity: 1;
																	display: block;">
																	<?php if(count($hinhanh) >0){?>
																	<img id="pic" name="pic" style="height: 290px; width: 380px; border-width: 0px;" src="../<?php echo $hinhanh[0]['path']?>">
																	<?php }
																	else
																	{
																		echo "<img id='pic' name='pic' style='height: 290px; width: 380px; border-width: 0px;' src='../images/user/1.png'>";
																	}
																	?>
																	
																	<div class="panel-overlay" style="position: absolute; z-index: 999; width: 360px;
																		height: 1px; top: 289px; left: 0pt; padding: 0pt 10px; color: white; font-size: 1em;">
																	</div>
																	<div class="overlay" style="position: absolute; z-index: 998; width: 380px; height: 1px;
																		top: 289px; left: 0pt; background: none repeat scroll 0% 0% rgb(34, 34, 34);
																		opacity: 0.6;">
																	</div>
																</div>
											<!--anh nho-->		<div class="strip_wrapper" style="position: absolute; top: 290px; left: 165px; width: 50px;
																	height: 60px; overflow: hidden;">
																	<ul class="filmstrip" style="list-style: none outside none; margin: 0pt; padding: 0pt;
																		width: 60px; position: absolute; z-index: 900; top: 0pt; left: 0pt; height: 60px;
																		background: none repeat scroll 0% 0% transparent;">
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
														<div style="display: none; visibility: hidden;" id="ctl00_MainContent_ctl00_SliderTab_tabmap"
															class="ajax__tab_panel">
                                                            <div>
                                                    <input id="address" style="width: 300px;"  type="textbox" <?php echo "value='".$business['duong'].",".$phuong['ten'].",".$quan['ten'].",".$tinh['ten'].",viet nam"."'"; ?> />

                                                    <input type="button" value="Refresh" onclick="codeAddress()"/>
                                                             </div>
															<div style="width: 380px; height: 350px; "id="map_canvas">
															</div>
														</div>
													</div>
												</div>
											</div>
                                            	 <!-- google api -->
                                            <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
                                            <script type="text/javascript">                                                                                     
                                              var latlng = new google.maps.LatLng(10.79306, 106.62913);
                                              var geocoder = new google.maps.Geocoder();
                                              var map;
                                              var currentLatlng;                                             
                                              function initialize() {
                                                var myOptions = {
                                                  zoom: 15,
                                                  center: latlng,
                                                  mapTypeId: google.maps.MapTypeId.ROADMAP
                                                   }
                                                                                                                                        
                                               
                                                map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
                                                var marker = new google.maps.Marker({
                                                    position: latlng, 
                                                    map: map,                                                  
                                                }); 
                                                codeAddress();  
                                              }
                                              function codeAddress() {
                                                var address = document.getElementById("address").value;
												//alert("ad="+address);
                                                geocoder.geocode( { 'address': address}, function(results, status)
												{
													///alert("status="+ google.maps.GeocoderStatus.OK+"status ="+status);
                                                  if (status == google.maps.GeocoderStatus.OK) 
												  {
                                                    map.setCenter(results[0].geometry.location);
                                                    var marker = new google.maps.Marker({
                                                        map: map, 
                                                        position: results[0].geometry.location
                                                    });
                                                    currentLatlng=marker.getPosition();
                                                   	//alert(currentLatlng.lat()+"_"+currentLatlng.lng());
                                                  } else {
                                                    alert("Geocode was not successful for the following reason: " + status);
                                                  }
                                                });
                                              }
                                              $(document).ready(function() {
                                                    $('#btnMapClose').click(function() {
                                        			$('.ui-widget-overlay').remove();
                                        			return false;
                                        		});
                                                });
                                              function showBigMap() {
                                            		var docH = $(document).height();	
                                            		var mouseX = $(window).width()/2 - 400;
                                            		var mouseY = $(window).scrollTop();
                                                    	
                                            		$('body').append('<div class="ui-widget-overlay" style="height: '+docH+'px; display: block; z-index: 100000"></div>');
                                            		
                                                    $('.ui-widget-overlay').after('<div id="fullMap"><div><div style="float:left;">Xem b&#7843;n &#273;&#7891; l&#7899;n</div><div style="float:right;"><a  align="right" href="#" id="btnMapClose" ><img border="0" src="../images/action_delete2.png" width="16" height="16" alt="close" /></a></div></div><div id="fullMapDs"></div></div>');
                                            		
                                                    $('#fullMap').css({'display':'block','left':mouseX+'px','top':mouseY+'px'});
                                            	
                                                    //$.scrollTo('#fullMap',1000);
                                                     var myOptions = {
                                                  zoom: 15,
                                                  center: currentLatlng,
                                                  mapTypeId: google.maps.MapTypeId.ROADMAP
                                                   }
                                            		var map = new google.maps.Map(document.getElementById("fullMapDs"), myOptions);
                                      	             var marker = new google.maps.Marker({
                                                    position: currentLatlng, 
                                                    map: map                                                 
                                                    }); 
                                            		//alert(currentLatlng.lat()+"_"+currentLatlng.lng());
                                            		$('#btnMapClose').click(function() {                                          
                                            			$('.ui-widget-overlay').remove();
                                            			$('#fullMap').remove();
                                            			return false;
                                            		});
                                    	       }
                                            </script>
                                            <script type="text/javascript">
                                            function changeTab(tabindex)
                                            {
                                                switch(tabindex)
                                                {
                                                    case 0:   
                                                    $('#SliderTab_image_tab').attr("class","ajax__tab_active");
                                                    $('#SliderTab_tabmap_tab').attr("class","");                                                                                                       
                                                    //document.getElementById("SliderTab_image_tab").className="ajax__tab_active";
                                                    document.getElementById("ctl00_MainContent_ctl00_SliderTab_image").style.display="block";
                                                    document.getElementById("ctl00_MainContent_ctl00_SliderTab_image").style.visibility="visible";
                                                    document.getElementById("ctl00_MainContent_ctl00_SliderTab_tabmap").style.display="none";
                                                    document.getElementById("ctl00_MainContent_ctl00_SliderTab_tabmap").style.visibility="hidden";
                                                    document.getElementById("linkShowBigMap").style.visibility="hidden";                                           
                                                    break;
                                                    
                                                    case 1:                                                  
                                                    $('#SliderTab_tabmap_tab').attr("class","ajax__tab_active");  
                                                    $('#SliderTab_image_tab').attr("class","");                                                  
                                                    //document.getElementById("SliderTab_tabmap_tab").className="ajax__tab_active";
                                                    document.getElementById("ctl00_MainContent_ctl00_SliderTab_image").style.display="none";
                                                    document.getElementById("ctl00_MainContent_ctl00_SliderTab_image").style.visibility="hidden";
                                                    document.getElementById("ctl00_MainContent_ctl00_SliderTab_tabmap").style.display="block";
                                                    document.getElementById("ctl00_MainContent_ctl00_SliderTab_tabmap").style.visibility="visible";
                                                    document.getElementById("linkShowBigMap").style.visibility="visible";
                                                    initialize();
                                                    break;
                                                    default:
                                                        document.write("Tab index is out of range");
                                                }
      
                                            }
                                            </script>
	<?php
	static $i = 0;
	echo "<script type='text/javascript'>;
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
				alert(1);
			}
			for(var j = 0; j < imgAr1.length; j++)
			{
				rImg1[j] = new Image();
				rImg1[j].src = imgAr1[j].src;			
			}
			document.onload = setting();

			var slide;
			var slide2;
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

			var picture = 0;
			function slideshow(){
				if(picture < imgAr1.length-1){
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
					slide.src = imgAr1[0].src;
					picture = 0;
			}

			function end(){
					slide.src = imgAr1[imgAr1.length-1];
					picture = imgAr1.length-1;
			}
			
		</script>";
	?>										

                                           <div><a style="visibility: hidden;" id="linkShowBigMap" onclick="showBigMap()" href="javascript:void(0)">Xem bản đồ lớn</a></div>
											<div class="clearBoth">
											</div>
										</div>
										<div class="mapDescription">
											<div class="totalView">
												Số lần xem: 12</div>
											<div class="address">
												Địa chỉ : <strong><?php 
                                                
                                                echo $business['duong'].",".$phuong['ten'].",".$quan['ten'].",".$tinh['ten']; ?></strong></div>
											<div class="price">
												Giá : <?php 
                                                 $donviDV=DonviDichVuBUS::selectId($business['donvidv']);
                                                 $donviTien=DonviTienBUS::selectId($business['donvitien']);
												 if($business['giaban'] != null)
													{
														$money = Utils::convert_Money($business['giaban']);
													}
													else $money = "0,00";
                                                 echo $money." ".$donviTien['ten']."/".$donviDV['ten'];
                                                 ?></div>
											<div class="contact">
												<div class="registerBuy">
													Thông tin liên hệ</div>
                                    <?php
                                     require_once("../BUS/UsersBUS.php");
                                     $user=UsersBUS::GetUserByID($business['chusohuu']);
                                    ?>
												<div class="name">
													Tên : <a href="" id="ctl00_MainContent_ctl00_hpUserName"><?php echo $user['hoten']; ?></a>
												</div>
												<div class="phone">
													Điện thoại : <?php echo $user['sdt1']; ?></div>
												<div class="email nonedisplay">
													Email : <?php echo $user['email']; ?><br>
													<img style="border-width: 0px;" src="" id="ctl00_MainContent_ctl00_imEmail">
												</div>
											</div>
										</div>
										<div class="clearBoth">
										</div>
									</div>
								
									<div style="clear:both;"></div>
								</div>
								
								<fieldset>
									<legend style="font-size:14px;font-weight:bold;color: #006DB9;">Thông Tin Căn Hộ</legend>
										<table cellpadding="0" cellspacing="0" width="100%" border="0">
											<tr style="height:26px; background:#F1F1F1;">
												<td width="130px">Loại dịch vụ:</td>
												<td width="150px"><b><?php echo $loaidichvu['ten'];?></b></td>
												<td width="100px">Diện tích:</td>
												<td><b><?php echo $business['rong']."x".$business['dai'].' ';?>m<sup>2</sup></b></td>
												<td width="100px">Số tầng:</td>
												<td width="30px"><b><?php echo $business['tang'];?></b></td>
											</tr>
											<tr style="height:26px;">
												<td>Tình trạng pháp lý:</td>
												<td><b><?php echo $phaply['ten'];?></b></td>
												<td>Hướng nhà:</td>
												<td><b><?php echo $huongnha['ten'];?></b></td>
												<td>Số phòng ngủ:</td>
												<td><b><?php echo $business['sophongngu'];?></b></td>
											</tr>
											<tr style="height:26px; background:#F1F1F1;">
												<td>Giá căn hộ:</td>
												<td><b>
												<?php 
													include_once("Utils/Utils.php");
													if($business['giaban'] != null)
													{
														$money = Utils::convert_Money($business['giaban']);
													}
													else $money = "0,00";
													echo $money;
													echo ' '.$donvitien['ten'];
												?>
												</b></td>
												<td>Loại nhà:</td>
												<td><b><?php echo $loainha['ten'];?></b></td>
												<td>Số phòng tắm:</td>
												<td><b><?php echo $business['sophongtam'];?></b></td>
											</tr>
										</table>
								</fieldset><br>
								<fieldset>
<?php 
include_once("../BUS/TienIchBUS.php");
include_once("../BUS/DichVu_TienIchBUS.php");
if(isset($_GET['iddichvu']))
	$dv_tienich = DichVu_TienIchBUS::getAllByIDDichVu($_GET['iddichvu']);
else
	header("Location:dichvu.php");
$rs=TienIchBUS::GetAllTienIch();
?>
									<legend style="font-size:14px;font-weight:bold;color: #006DB9;">Đặc Điểm</legend>
										<table cellpadding="0" cellspacing="0" width="100%" border="0">
											<?php
											$dem=0;
											$flag1=true;
											for($i=0;$i<count($rs);$i++)
											{
												if(($dem % 2) == 0)
												{	
													
													if($flag1==true)
													{
														echo "<tr style=';background-color: #F1F1F1;'>";
														$flag1=false;
													}
													else
													{
														echo "<tr>";
														$flag1=true;
													}
												}
												$dem++;
												$flag = true;
												echo "<td style='width:150px'> ".$rs[$i][1].": </td>";
												for($j=0;$j<count($dv_tienich);$j++)
												{
													if($dv_tienich[$j]['idtienich'] == $rs[$i][0])
													{
														$flag = false;
														echo "<td><img id='ctl00_MainContent_ctl00_ImgChoDauXe' style='border-width:0px;' src='../images/checked.png'></td>";
													}
												}
												if($flag == true)
												{
													echo "<td></td>";
												}
												if(($dem % 2) == 0)
												{
												   echo "</tr>";
												}
											}
											?>
												<tr style=";background-color: #F1F1F1;">
													<td> Chỗ đậu xe hơi: </td>
													<td>
													<img id="ctl00_MainContent_ctl00_ImgChoDauXe" style="border-width:0px;" src="../../../Images/IconSet/checked.png">
													</td>
													<td> Gần trường: </td>
													<td> </td>
												</tr>
											
										</table>
								</fieldset><br>
								<fieldset>
									<legend style="font-size:14px;font-weight:bold;color: #006DB9;">Mô Tả Thêm</legend>
										<table>
											<tr style="background-color: #F1F1F1;">
												<td><?php echo $business['mota'] ?></td>
											</tr>
											<tr >
												<td  colspan="2" style="align:right;font-style: italic;text-decoration:underline;">
												<a  href="dichvu.php" style="color:black;font-size:12px;font-style:intalic;"> &lt;&lt;Quay lại </a>
												</td>
									</tr>
										</table>
								</fieldset>
								
							</div>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
<?php
	include("../include/footer.php");
?>