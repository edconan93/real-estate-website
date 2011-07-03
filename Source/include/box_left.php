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
                        echo  "<option value='".$loaidv[$i]['id']."' selected>".$loaidv[$i]['ten']."</option>";
                        else echo  "<option value='".$loaidv[$i]['id']."'>".$loaidv[$i]['ten']."</option>";
                    }
                    
                        
                    ?>
				</select>
			</td>
		</tr>
		
		<tr>
			<td colspan="2">
				<select style="width:220px;" name="cbbLoaiBDS">
					<option value="-1">------Chọn loại bất động sản -----</option>
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
                <option value="-1" selected="selected">------Chọn Tỉnh/ Thành Phố------</option>
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
                include("../BUS/QuanBUS.php");
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
					<option>------------ Khoảng Giá ------------</option>
					<option value="5.000.000">Dưới 5 Triệu</option>
					<option value="50.000.000"> 5 Triệu - 50 Triệu</option>
					<option value="500.000.000">50 Triệu - 500 Triệu</option>
					<option value="1.000.000.000">500 Triệu - 1 Tỷ</option>
					<option value="1.500.000.000">1 Tỷ - 1,5 Tỷ</option>
					<option value="3.000.000.000">1,5 Tỷ - 3 Tỷ</option>
					<option value="10.000.000.000">3 Tỷ - 10 Tỷ</option>
					<option value="1">Trên 10 tỷ</option>
				</select>
			</td>
			
		</tr>
		
		<tr>
			<td colspan="2" align="center" style="padding-top:8px;">
			<input  type="submit" name="btnSearch" style="background: url('../images/btSearch.png'); width:52px;height: 22px;" value=""/>
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