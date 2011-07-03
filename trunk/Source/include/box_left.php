<script type="text/javascript">
	$(document).ready(function()
	{
		$('#cbbTinh').change(function(){
			var serverURL = "checkservice.php?cbbTinhTP="+$(this).val();
			$("#cbbTMPQuan").load(serverURL);	
		});
	});
</script>
<div class="box_left">
<form action="dichvu.php" name="frmTimKiem" method="GET">
	<table>
		<tr>
			<td width="30px">
				<img src="../images/search.png">
			</td>
			<td>
				<p style="font-size:20pt;"><b>TÌM KIẾM ĐỊA ỐC</b></p>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<select style="width:220px;" name="cbbLoaidv">
					<option value="-1">-------- Chọn Loại Dịch Vụ --------</option>
					<?php
                    include("../BUS/LoaiDichVuBUS.php");
                    $loaidv=LoaiDichVuBUS::getALL();
                    for($i=0;$i<count($loaidv);$i++)
                    {
                        if(isset($_REQUEST['cbbLoaidv'])&&$_REQUEST['cbbLoaidv']==$loaidv[$i]['id'])
                        echo "<option value='".$loaidv[$i]['id']."' selected>".$loaidv[$i]['ten']."</option>";
                        else echo "<option value='".$loaidv[$i]['id']."'>".$loaidv[$i]['ten']."</option>";
                    }
                    ?>
				</select>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<select style="width:220px;" name="cbbLoaiBDS">
					<option value="-1">------Chọn Loại Bất Động Sản -----</option>
					<?php
						include("../BUS/LoaiNhaBUS.php");
						$rs=LoaiNhaBUS::GetAllLoaiNha();
						for($i=0;$i<count($rs);$i++)
						{		
						   if(isset($_REQUEST['cbbLoaiBDS'])&&$_REQUEST['cbbLoaiBDS']==$rs[$i]['id'])
							echo "<option value='".($i+1)."' selected>".$rs[$i][1]."</option>";
                            else echo "<option value='".($i+1)."' >".$rs[$i][1]."</option>";
						}
					?>
				</select>
			</td>
		</tr>
		<tr style="height:24px;">
			<td colspan="2">
				<select style="width:220px;" id="cbbTinh"  name="cbbTinh">
					<option value="-1" selected="selected">------Chọn Tỉnh/Thành Phố------</option>
					<?php
						include("../BUS/TinhBUS.php");
						$rs=TinhBUS::GetAllTinh();
						for($i=0;$i<count($rs);$i++)
						{		
							if(isset($_REQUEST['cbbTinh'])&&$_REQUEST['cbbTinh']==$rs[$i]['id'])
							   echo "<option value='".($i+1)."' selected>".$rs[$i][1]."</option>";
							   else
								echo "<option value='".($i+1)."'>".$rs[$i][1]."</option>";
						}
					?>	
				</select>
			</td>
		</tr>
		<tr style="height:24px;">
			<td colspan="2">
            <div id="cbbTMPQuan">
				<select style="width:220px;" id="cbbQuan" name='cbbQuanHuyen'>
					<option value="-1">-------- Chọn Quận/Huyện --------</option>
                    <?php
					if(isset($_REQUEST['cbbTinh'])&&$_REQUEST['cbbTinh']!=null)
					{
						$rs=QuanBUS::GetAllQuanById($_REQUEST['cbbTinh']);
						for($i=0;$i<count($rs);$i++)
						{		
							if(isset($_REQUEST['cbbQuanHuyen'])&&$_REQUEST['cbbQuanHuyen']==$rs[$i]['id'])
								echo "<option value='".($i+1)."' selected>".$rs[$i][1]."</option>";
							else
								echo "<option value='".($i+1)."'>".$rs[$i][1]."</option>";
						}
					}
					?>						
				</select>
            </div>
			</td>
		</tr>
		<tr style="height:24px;">
			<td colspan="2">
				<select style="width:220px;" name="cbbGia">
					<option value="-1" selected>------------ Khoảng Giá ------------</option>
					<option value="1" <?php if(isset($_REQUEST['cbbGia'])&&$_REQUEST['cbbGia']==1) echo "selected";?>>Dưới 5 Triệu</option>
					<option value="2"  <?php if(isset($_REQUEST['cbbGia'])&&$_REQUEST['cbbGia']==2) echo "selected";?>> 5 Triệu - 50 Triệu</option>
					<option value="3"  <?php if(isset($_REQUEST['cbbGia'])&&$_REQUEST['cbbGia']==3) echo "selected";?>>50 Triệu - 500 Triệu</option>
					<option value="4"  <?php if(isset($_REQUEST['cbbGia'])&&$_REQUEST['cbbGia']==4) echo "selected";?>>500 Triệu - 1 Tỷ</option>
					<option value="5"  <?php if(isset($_REQUEST['cbbGia'])&&$_REQUEST['cbbGia']==5) echo "selected";?>>1 Tỷ - 1,5 Tỷ</option>
					<option value="6"  <?php if(isset($_REQUEST['cbbGia'])&&$_REQUEST['cbbGia']==6) echo "selected";?>>1,5 Tỷ - 3 Tỷ</option>
					<option value="7"  <?php if(isset($_REQUEST['cbbGia'])&&$_REQUEST['cbbGia']==7) echo "selected";?>>3 Tỷ - 10 Tỷ</option>
					<option value="8"  <?php if(isset($_REQUEST['cbbGia'])&&$_REQUEST['cbbGia']==8) echo "selected";?>>Trên 10 tỷ</option>
				</select>
			</td>
		</tr>
		<tr>
			<td colspan="2" align="center" style="padding-top:8px;">
				<!--<a class="ovalbutton red" href="#"><span>Tìm</span></a>
				<input type="submit" class="button" name="btnSearch" value="Tìm" />-->
				<div style="width:50px;">
					<span class="action-button-left"></span>
					<input class="submitYellow" type="Submit" value="Tìm" id="btnSearch" name="btnSearch" />
					<span class="action-button-right"></span>
				</div>
			</td>
		</tr>
	</table>
    </form>
</div>
<div class="box_left">
	<table width="100%">
		<tr>
			<td width="30px">
				<img src="../images/megaphone.png">
			</td>
			<td>
				<p style="font-size:20pt;"><b>THÔNG TIN QUẢNG CÁO</b></p>
			</td>
		</tr>
		<tr>
			<td colspan="2" align="center">
				<embed type="application/x-shockwave-flash" src="../admin/upload/quangcao/ad1.swf" id="mymovie"
					name="mymovie" bgcolor="#000000" quality="high" loop="true" wmode="transparent" width="180px" height="160px">
			</td>
		</tr>
		<tr>
			<td colspan="2" align="center">
				<embed type="application/x-shockwave-flash" src="../admin/upload/quangcao/ad2.swf" id="mymovie"
					name="mymovie" bgcolor="#000000" quality="high" loop="true" wmode="transparent" width="180px" height="160px">
			</td>
		</tr>
		<tr>
			<td colspan="2" align="center">
				<img src="../admin/upload/quangcao/ad_noimage.jpg" />
			</td>
		</tr>
		<tr>
			<td colspan="2" align="center">
				<img src="../admin/upload/quangcao/ad_noimage.jpg" />
			</td>
		</tr>
	</table>
</div>