<?php
	include("../include/header.php");
	include_once("../BUS/GioiThieuBUS.php");
	$gioithieu=GioiThieuBUS::selectID(1);
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
							<?php include("../include/box_left.php"); ?>
						</td>
						<td style="padding: 10px;" valign="top">
							<div style="width: 686px;">
								<div style="margin-left: 10px; margin-top: 10px; font-family: tahoma; font-size: 18px;
									font-weight: bold; color:#890C29; text-transform:uppercase;">
									GIỚI THIỆU CÔNG TY</div>
								<hr style="color: rgb(211, 232, 248);" width="680" size="1">
								<div class="mid_content">
									<table cellspacing="0" cellpadding="0" border="0" align="center" width="700">
										<tbody>
										<tr>
										<td>
										<br>
										<img height="450" width="693" src="../images/gioithieu1.jpg" alt="">
										</td>
										</tr>
										</tbody>
									</table>
									<table cellspacing="0" cellpadding="0" border="0" align="center" width="700">
										<div style="text-align: justify;">
											<?php 
												echo $gioithieu["noidung"];
											?>
												<br>
											<?php 
												echo $gioithieu["noidung1"];
											?>
										</div><br><br><br><br>
										<div align="right">Ban quản trị trang web</div>
									</table>
									
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