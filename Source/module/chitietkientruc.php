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
							
								<?php //include("../include/canhonoibat.php"); ?>
                            <?php
                            $business=null;
                            if(isset($_REQUEST['idkientruc']) && $_REQUEST['idkientruc']!=null) 
                            { 
								include_once ("../BUS/kientrucBUS.php");
                                $kientruc=kientrucBUS::selectID($_REQUEST['idkientruc']); 
                                
								//echo $kientruc[1];
								// echo "<br>aaaaaaaaa=".$hinhanh[0]['path'];
                            }
                            ?>
							<div style="width: 686px; padding-top:20px;float:left;">
								<div style="margin-left: 10px; margin-top: 10px; font-family: tahoma; font-size: 18px;
									font-weight: bold; color:#890C29;">
								Chi Tiết Kiến Trúc
								<hr style="color: rgb(211, 232, 248);" width="680" size="1"/>
								<div class="mid_content">
									<b style="font-size:14px;font-weight:bold;color: #006DB9;"><?php echo $kientruc[1];?> </b>
								</div>
								<table style="font-weight:normal; text-align:justify; padding:0 20px;">
									<tr>
										<td>
										<p><img width="400px" style="vertical-align: middle;" src="../images/kientruc/<?php echo $kientruc["hinhanh1"];?>" heigh="300px"></p>
										<p width="400px"><em><?php echo $kientruc["ghichu1"]?>									
										</em></p>
										</td>
									</tr>
									<tr>
										<td><?php echo $kientruc["chitiet"];?>
										</td>
									</tr>
									<tr>
										<td>
										<p><img width="400px" style="vertical-align: middle;" src="../images/kientruc/<?php echo $kientruc["hinhanh2"];?>" heigh="300px"></p>
										<p width="400px"><em><?php echo $kientruc["ghichu2"]?>									
										</em></p>
										</td>
									</tr>
									<tr>
										<td><?php echo $kientruc["chitiet1"];?>
										</td>
									</tr>
									<tr>
										<td>
										<p><img width="400px" style="vertical-align: middle;" src="../images/kientruc/<?php echo $kientruc["hinhanh3"];?>" heigh="300px"></p>
										<p width="400px"><em><?php echo $kientruc["ghichu3"]?>									
										</em></p>
										</td>
									</tr>
									<tr>
										<td><?php echo $kientruc["chitiet2"];?>
										</td>
									</tr>
									<tr>
										<td><a href="kientruc.php" style="align:right;font-style: italic;text-decoration:underline;colspan=2"> &lt;&lt;Quay lại </a></td>
									</tr>
								</table>	
								
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