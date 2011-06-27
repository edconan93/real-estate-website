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
							<div class="box_left">
								<table width="100%">
									<tr>
										<td width="30px">
											<img src="../images/type.png">
										</td>
										<td>
											<p style="font-size:20pt;"><b>LOẠI HÌNH</b></p>
										</td>
									</tr>
									<tr>
										<td colspan="2" align="center">
											<p class="menu_item">
												<a href="">Cần Mua</a>
											</p>
											<p class="menu_item">
												<a href="">Cần Bán</a>
											</p>
											<p class="menu_item">
												<a href="">Cần Thuê</a>
											</p>
											<p class="menu_item">
												<a href="">Cho Thuê</a>
											</p>
										</td>
									</tr>
								</table>
							</div>
							<?php include("../include/box_left.php"); ?>
						</td>
						<td style="padding: 10px;" valign="top">
							<div style="width: 686px;">
								<div style="margin-left: 10px; margin-top: 10px; font-family: tahoma; font-size: 18px;
									font-weight: bold; color:#890C29;">
									CĂN HỘ NỔI BẬT</div>
								<hr style="color: rgb(211, 232, 248);" width="680" size="1">
								<div class="mid_content">
									<div style="width:170px;float:left;">
										<a class="chnoibat" href=""><img src="../admin/upload/diaoc/94623_hoamai.tongthe.jpg" style="height:100px; width:160px;" /><br>
										Căn hộ Sông Đà Riverside, LH 0906 766</a>
									</div>
									<div style="width:170px;float:left;">
										<a class="chnoibat" href=""><img src="../admin/upload/diaoc/82696_phoi canh SD1.jpg" style="height:100px; width:160px;" /><br>
										Căn hộ Petroland mark Q2 giá gốc CĐT</a>
									</div>
									<div style="width:170px;float:left;">
										<a class="chnoibat" href=""><img src="../admin/upload/diaoc/92630_PV.jpg" style="height:100px; width:160px;" /><br>
										Cần bán nhà sổ hồng Gò Ô Môi, P.Phú Thuận, Q7.</a>
									</div>
									<div style="width:170px;float:left;">
										<a class="chnoibat" href=""><img src="../admin/upload/diaoc/94623_hoamai.tongthe.jpg" style="height:100px; width:160px;" /><br>
										Bán Căn Hộ Cao Cấp SongDa Riverside</a>
									</div>
									<div style="clear:both;"></div>
								</div>
							</div>
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
                                $business=DichVuBUS::select($_REQUEST['iddichvu']); 
                                $quan=QuanBUS::GetAllQuanById($business['quan']);
                                $phuong=PhuongBUS::GetAllPhuongById($business['phuong']);
                                $tinh=TinhBUS::getTinhById($business['tinh']);                              
                            }
                            ?>
							<div style="width: 686px; padding-top:20px;">
								<div style="margin-left: 10px; margin-top: 10px; font-family: tahoma; font-size: 18px;
									font-weight: bold; color:#890C29;">
									<?php echo $business['tieude']; ?> </div>
								<hr style="color: rgb(211, 232, 248);" width="680" size="1"/>
								<div class="mid_content">
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
																<div class="panel" style="width: 380px; height: 290px; position: absolute; top: 0px;
																	left: 0px; overflow: hidden; background: none repeat scroll 0% 0% white; opacity: 1;
																	display: block;">
																	<img id="pic" style="height: 290px; width: 380px; border-width: 0px;" src="../images/user/1.png">
																	<div class="panel-overlay" style="position: absolute; z-index: 999; width: 360px;
																		height: 1px; top: 289px; left: 0pt; padding: 0pt 10px; color: white; font-size: 1em;">
																	</div>
																	<div class="overlay" style="position: absolute; z-index: 998; width: 380px; height: 1px;
																		top: 289px; left: 0pt; background: none repeat scroll 0% 0% rgb(34, 34, 34);
																		opacity: 0.6;">
																	</div>
																</div>
																<div class="strip_wrapper" style="position: absolute; top: 290px; left: 165px; width: 50px;
																	height: 60px; overflow: hidden;">
																	<ul class="filmstrip" style="list-style: none outside none; margin: 0pt; padding: 0pt;
																		width: 60px; position: absolute; z-index: 900; top: 0pt; left: 0pt; height: 60px;
																		background: none repeat scroll 0% 0% transparent;">
																		<li style="float: left; position: relative; height: 50px; z-index: 901; margin-top: 5px;
																			margin-bottom: 0px; margin-right: 10px; padding: 0pt; cursor: pointer;">
																			<img id="pic2" style="height: 50px; width: 50px; border: medium none;" src="../images/user/1.png">
																		</li>
																	</ul>
																</div>
																<div id="pointer" style="position: absolute; z-index: 1000; cursor: pointer; top: 294px; left: 163px; height: 48px; width: 48px; display: block; overflow: visible; border: 2px solid black;"></div>
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
                                              function initialize() {
                                                var myOptions = {
                                                  zoom: 15,
                                                  center: latlng,
                                                  mapTypeId: google.maps.MapTypeId.ROADMAP
                                                   }
                                                                                                                                        
                                               
                                                var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
                                                var marker = new google.maps.Marker({
                                                    position: latlng, 
                                                    map: map,                                                  
                                                }); 
                                                //codeAddress();  
                                              }
                                              function codeAddress(map) {
                                                var address = document.getElementById("address").value;
                                                geocoder.geocode( { 'address': address}, function(results, status) {
                                                  if (status == google.maps.GeocoderStatus.OK) {
                                                    map.setCenter(results[0].geometry.location);
                                                    var marker = new google.maps.Marker({
                                                        map: map, 
                                                        position: results[0].geometry.location
                                                    });
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
                                                  center: latlng,
                                                  mapTypeId: google.maps.MapTypeId.ROADMAP
                                                   }
                                            		var map = new google.maps.Map(document.getElementById("fullMapDs"), myOptions);
                                      	             var marker = new google.maps.Marker({
                                                    position: latlng, 
                                                    map: map,                                                  
                                                    }); 
                                            		
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
											<script type="text/javascript">
												var width = 250;
												var height = 100;
												var imgAr1 = new Array();
												var rImg1 = new Array();

												imgAr1[0] = "../images/user/1.png";
												imgAr1[1] = "../images/user/2.jpg";
												imgAr1[2] = "../images/user/3.png";
												imgAr1[3] = "../images/user/4.jpg";
												for(var j = 0; j < imgAr1.length; j++)
												{
													rImg1[j] = new Image();
														rImg1[j].src = imgAr1[j];
												}

												document.onload = setting();

												var slide;
												var slide2;
												function setting()
												{
													slide = document.getElementById('pic');
													slide.src = imgAr1[0];
													slide.setAttribute("width",width);
													slide.setAttribute("height",height);
													
													slide2 = document.getElementById('pic2');
													slide2.src = imgAr1[0];
													slide2.setAttribute("width",50);
													slide2.setAttribute("height",50);
												}

												//Image or picture slide show using java script
												//slideshow function
												var picture = 0;
												function slideshow(){
													if(picture < imgAr1.length-1){
														picture=picture+1;
														slide.src = imgAr1[picture];
														slide2.src = imgAr1[picture];
													}
												}

												function prev(){
													if(picture > 0 ){
														picture=picture-1;
														slide.src = imgAr1[picture];
														slide2.src = imgAr1[picture];
													}
												}

												function start(){
														slide.src = imgAr1[0];
														picture = 0;
												}

												function end(){
														slide.src = imgAr1[imgAr1.length-1];
														picture = imgAr1.length-1
												}
											</script>
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
                                                 echo $business['giaban']." ".$donviTien['ten']."/".$donviDV['ten'];
                                                 ?></div>
											<div class="contact">
												<div class="registerBuy">
													Thông tin liên hệ</div>
												<div class="name">
													Tên : <a href="../../../tv/lethaotgch/" id="ctl00_MainContent_ctl00_hpUserName">Le Thao</a>
												</div>
												<div class="phone">
													Điện thoại : 0902.581.089</div>
												<div class="email nonedisplay">
													Email :<br>
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
									<legend style="font-size:14px;font-weight:bold;color:Blue;">Thông Tin Tài Sản</legend>
										sffdsfds
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