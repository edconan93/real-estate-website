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
							<div style="width: 686px;">
								<div style="margin-left: 10px; margin-top: 10px; font-family: tahoma; font-size: 18px;
									font-weight: bold; color:#890C29; text-transform:uppercase;">
									PHONG THỦY
								</div>
							</div>
							<div>
									<?php
										include("../BUS/phongthuyBUS.php");
										 $rs=phongthuyBUS::getPhongThuy();
										// $rs1=phongthuyBUS::getHinhAnh();
										$curPage=1;
										$totalItems =null;
										$business = null;		
										if(isset($_REQUEST['page']))
											  $curPage=$_REQUEST['page'];
										$maxItems = 3;
										$maxPages = 25;      
										$offset=($curPage-1)*$maxItems; 
										
										$strLink= "phongthuy.php?";
										$strSQL="select * from phongthuy";
										//$strSQL1="select * from hinhanh where idconnect=1";
										$strCountSQL=str_replace("*"," count(*) ",$strSQL);
										//$strCountSQL1=str_replace("*"," count(*) ",$strSQL1);
										$totalItems=phongthuyBUS::countAllBySQL($strCountSQL); 
										//$totalItems1=phongthuyBUS::countAllBySQL($strCountSQL1); 
										$strSQL.=" limit $offset,$maxItems";
										//$strSQL1.=" limit $offset,$maxItems";
										$business=phongthuyBUS::getAllBySQL($strSQL);
										//$business1=phongthuyBUS::getAllBySQL($strSQL1);
									// echo "<br>totalItems=".$totalItems;
									// echo "<br>business=".count($business);
									// echo "<br>strCountSQL=".$strCountSQL;
										 // echo "<br>image=".$business[0]['HinhAnh1'];
										 // echo "<br>id=".$business[0]['id'];
										 // echo "<br>image=".$business[1]['HinhAnh1'];
										 // echo "<br>image=".$business[2]['HinhAnh1'];
										// echo "<br>image=".count($business);
										echo  phongthuyBUS::display($strLink,$business,$totalItems, $curPage,$maxPages,$maxItems);
										
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