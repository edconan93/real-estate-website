<?php
	include("../include/header.php");
	
?>
<script src="../js/common.js" language="javascript" type="text/javascript"></script>
<script src="../js/jquery-1.js" language="javascript" type="text/javascript"></script>

<script type="text/javascript">
function xoatindang(idtin)
{
	if (confirm('Bạn chắc chắn muốn xóa tin đăng này ?')) 
	{
		var strUsername = $("#txtUsername").attr("value");
		var serverURL = "user/xoadangtin.php?idtin=" + idtin;
		$("#messEmailDelete").load(serverURL);
		return true;
	}
	else
		return false;
}
</script>
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
							<?php include("../include/box_left_thanhvien.php"); ?>
						</td>
<!--form -->
<!--form action="user/xulytindv.php" method="post" name="frmXuLyTinDV" id="frmXuLyTinDV" -->		
						<td style="padding: 10px;" valign="top">
							<div style="width: 686px;">
								<div style="margin-left: 10px; margin-top: 10px; font-family: tahoma; font-size: 18px;
									font-weight: bold; color:#890C29;" id="messLoaiTinDang" name="messLoaiTinDang">
									<?php
										if(isset($_REQUEST["type"]) && $_REQUEST["type"] == 1)
											echo "TIN ĐÃ DUYỆT.";
										else if(isset($_REQUEST["type"]) && $_REQUEST["type"] == 2)
											echo "TIN CHỜ DUYỆT.";
										else if(isset($_REQUEST["type"]) && $_REQUEST["type"] == 3)
											echo "TIN ĐÃ HẾT HẠN.";
										else
											echo "CÁC TIN ĐÃ ĐĂNG.";
									?>
								</div>
								<hr style="color: rgb(211, 232, 248);" width="680" size="1">
								<div class="mid_content">
									<b>
										<?php
											// if(isset($_REQUEST["type"]) && $_REQUEST["type"] == 1)
												// echo "Có 1 tin đã duyệt.";
											// else if(isset($_REQUEST["type"]) && $_REQUEST["type"] == 2)
												// echo "Có 3 tin chờ duyệt.";
											// else if(isset($_REQUEST["type"]) && $_REQUEST["type"] == 3)
												// echo "Có 2 tin đã hết hạn.";
											// else
												// echo "Có 6 tin đã đăng.";
										?>
									</b>
									<div class="bg_r" style="border: 1px solid rgb(172, 172, 172); padding: 0px; z-index: auto;">
<!--form process search -->				<form name="sortby" method="get" action="tindadang.php">
											<table cellspacing="1" cellpadding="5" align="center" style="margin: 3px;">
												<tr>
													<td>
														Mã số tin<br>
														<?php
														if(isset($_REQUEST['txtMessageID']))
															echo "<input type='text' style='width: 100px;' value='".$_REQUEST['txtMessageID']."' name='txtMessageID'>";
														else
															echo "<input type='text' style='width: 100px;' value='' name='txtMessageID'>";
														?>
													</td>
													<td>
														Nhu cầu<br>
														<select style="width: 120px;" name="cbbServiceType">
															<option value="-1">tất cả</option>
															<?php
															include("../BUS/LoaiDichVuBUS.php");
															$loaidv=LoaiDichVuBUS::getALL();
															for($i=0;$i<count($loaidv);$i++)
															{
																if(isset($_REQUEST['cbbServiceType'])&&$_REQUEST['cbbServiceType'] == $loaidv[$i]['id'])
																	echo "<option value='".$loaidv[$i]['id']."' selected>".$loaidv[$i]['ten']."</option>";
																else 
																	echo "<option value='".$loaidv[$i]['id']."'>".$loaidv[$i]['ten']."</option>";
															}
															?>
														</select>
													</td>
													<td>
														Danh muc<br>
														<select style="width: 150px;" name="cbbCategory">
															<option value="-1">tất cả</option>
															<?php
																include("../BUS/LoaiNhaBUS.php");
																$rs=LoaiNhaBUS::GetAllLoaiNha();
																for($i=0;$i<count($rs);$i++)
																{
																	if(isset($_REQUEST['cbbCategory']) && $_REQUEST['cbbCategory'] == $rs[$i]['id'])
																	{
																		echo "<option value='".($i+1)."' selected>".$rs[$i][1]."</option>";
																		
																	}
																	else
																		echo "<option value='".($i+1)."'>".$rs[$i][1]."</option>";	
																}
															?>
														</select>
													</td>
													<td>
														Địa phương<br>
														<select style="width: 120px;" name="cbbLocation">
															<option value="-1">tất cả</option>
															<?php
																include("../BUS/TinhBUS.php");
																$rs=TinhBUS::GetAllTinh();
																for($i=0;$i<count($rs);$i++)
																{	
																	if(isset($_REQUEST['cbbLocation']) && $_REQUEST['cbbLocation'] == $rs[$i]['id'])
																		echo "<option value='".($i+1)."' selected>".$rs[$i][1]."</option>";
																	else
																		echo "<option value='".($i+1)."'>".$rs[$i][1]."</option>";
																}
															?>	
														</select>
													</td>
													<td>
														<br>
														<div style="width:70px;">
															<span class="action-button-left"></span>
															<input class="submitYellow" type="Submit" value="Tìm kiếm" id="btnGuiTin" name="btnSearch" />
															<span class="action-button-right"></span>
														</div>
													</td>
												</tr>
											</table>
<!--end form process search -->			</form>
										<table width="100%" cellspacing="0" cellpadding="4" border="0">
											<tr bgcolor="#e1e9f1">
												<td width="60" valign="top" align="center" style="border-top:1px solid #CCCCCC;">
													<b>Mã số</b>
												</td>
												<td align="left" style="border-left: 1px solid rgb(204, 204, 204); border-top:1px solid #CCCCCC;">
													<img align="left" style="border: medium none;" src="../images/home1.png">&nbsp;<b>Tin rao</b>
												</td>
												<td style="border-left: 1px solid rgb(204, 204, 204); font-weight: bold;border-top:1px solid #CCCCCC;">
													<img align="left" style="border: medium none;margin-top:2px;" src="../images/options3.png">&nbsp;<b>Quản lý</b>
												</td>
											</tr>
											<?php
												include_once("/user/xulycacloaitin.php");
												if(isset($curUserId))
												{
													if(isset($_REQUEST["type"]))
														echo MessageTypeProcessor::loadAllMessage($curUserId);
													else
													{
														$result= MessageTypeProcessor::findSearchInContext($curUserId);
														if($result!=null)
															echo $result;
														else
															echo MessageTypeProcessor::loadAllMessage($curUserId);
													}
												}
											?>	
										</table>
									</div>
								</div>
							</div>
						</td>
<!--/form>
< End form -->
					</tr>
				</table>
			</td>
		</tr>
	</table>
<?php
	include("../include/footer.php");
?>