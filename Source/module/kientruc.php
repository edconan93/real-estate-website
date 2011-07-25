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
							<?php include("../include/box_left.php"); ?>
							
                            </td>
						<td style="padding: 10px;" valign="top">
							<?php include("../include/canhonoibat.php"); ?>
							<div style="width: 686px;padding-top:20px;float:left;">
								<div style="margin-left: 10px; margin-top: 10px; font-family: tahoma; font-size: 18px;
									font-weight: bold; color:#890C29; text-transform:uppercase;">
									KIÊN TRÚC
									<hr style="color: rgb(211, 232, 248);" width="680" size="1"/>
								</div>
							</div>
							<div>
									<?php
										include("../BUS/kientrucBUS.php");
										 $rs=kientrucBUS::getKienTruc();
										// $rs1=phongthuyBUS::getHinhAnh();
										$curPage=1;
										$totalItems =null;
										$business = null;		
										if(isset($_REQUEST['page']))
											  $curPage=$_REQUEST['page'];
										$maxItems = 5;
										$maxPages = 25;      
										$offset=($curPage-1)*$maxItems; 
										
										$strLink= "kientruc.php?";
										$strSQL="select * from kientruc";
									
										$strCountSQL=str_replace("*"," count(*) ",$strSQL);
								
										$totalItems=kientrucBUS::countAllBySQL($strCountSQL); 
										
										$strSQL.=" limit $offset,$maxItems";
										
										$business=kientrucBUS::getAllBySQL($strSQL);
										
										echo  kientrucBUS::display($strLink,$business,$totalItems, $curPage,$maxPages,$maxItems);
										
									?>
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