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
<!--start search dv-->
							<?php include("../include/searchloaidv.php"); ?>
<!--end search dv-->
							<?php include("../include/box_left.php"); ?>
						</td>
						<td style="padding: 10px;" valign="top">
<!--canhonoibat start-->
						<?php include("../include/canhonoibat.php"); ?>	
<!--canhonoibat end-->
							<div style="width: 686px; padding-top:20px;float:left;">
								<div style="margin-left: 10px; margin-top: 10px; font-family: tahoma; font-size: 18px;font-weight: bold; color:#890C29;">
                                    <?php
										include_once("/business/BussinessProcessor.php");
										echo BusinessProcessor::getLoaiDichVu();
                                    ?>
								</div>
								<hr style="color: rgb(211, 232, 248);" width="680" size="1">
								<div class="mid_content" id="loadAjax" name="loadAjax">
									<?php 
										$result= BusinessProcessor::findBussiness();
										if($result!=null)
											echo $result; 
										else                      
											echo BusinessProcessor::loadAllBusiness();
									?>
								</div>
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