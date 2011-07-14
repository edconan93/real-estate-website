<?php 
	if($_SESSION["curUser"][8] != 1)
		header("Location: index.php");

	$PATH = str_replace('//','/',dirname(__FILE__).'/');
	include_once($PATH . "../../../BUS/QuangCaoBUS.php");
	include_once($PATH . "../../../module/Utils/Utils.php");
	
	$status = isset($_REQUEST["status"])?$_REQUEST["status"]:-2;
?>
<div id="listItem">
	<div class="tl"></div>
	<div class="tr"></div>
	<div class="tm"></div>
	<div class="mid">
		<script language="javascript">
			function BASIC_GetCookie(Name){
				var re=new RegExp(Name+"=[^;]+", "i"); //construct RE to search for target name/value pair
				if (document.cookie.match(re)) //if cookie found
					return document.cookie.match(re)[0].split("=")[1]; //return its value
				return "";
			}
			function BASIC_SetCookie(name, value, days){
				if (typeof days!="undefined"){ //if set persistent cookie
					var expireDate = new Date();
					var expstring=expireDate.setDate(expireDate.getDate()+days);
					document.cookie = name+"="+value+"; expires="+expireDate.toGMTString();
				}
				else //else if this is a session only cookie
					document.cookie = name+"="+value;
			}
			// function loadUsersByCondition()
			// {
				// var type = document.getElementById("type");
				// var status = document.getElementById("status");
				// window.location = "index.php?view=user&type=" + type.value + "&status=" + status.value;
			// }
		</script>
		<form method="post" name="frmListItem" id="frmListItem">
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td width="69%">
						<?php
							$listAdv = QuangCaoBUS::GetAdvByType($status);
							echo "<b>Có ".count($listAdv)." mẫu tin.</b>";
						?>
					</td>
					<td width="31%">
						<div align="right">
							<select id="status" onchange="return loadUsersByCondition();">
								<option value="-2" <?php echo $status==-1?"selected":""; ?>> - Chọn hiệu lực - </option>
								<option value="1"  <?php echo $status==1?"selected":""; ?>>Còn hạn</option>
								<option value="0"  <?php echo $status==0?"selected":""; ?>>Hết hạn</option>
							</select>
						</div>
					</td>
				</tr>
			</table>
			<div class="list">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr class="title">
						<td width="30px" align="center">#</td>
						<td width="30px" align="center">
							<input type="checkbox" onclick="checkAll(this);" /></td>
						<td width="170px" align="center">Chủ sở hữu</td>
						<td width="80px" align="center">Điện thoại</td>
						<td align="center">Email</td>
						<td align="center">Địa chỉ</td>
						<td width="180px" align="center">Banner quảng cáo</td>
						<td align="center">Link</td>
						<td width="80px" align="center">Ngày đăng ký</td>
						<td width="80px" align="center">Số tháng Đ.K</td>
						<td width="70px" align="center">Hiệu lực</td>
					</tr>
					<?php
						for ($i=0;$i<count($listAdv);$i++)
						{
					?>
					<tr style="background:<?php echo ($i%2==0) ? "#EFF3FF" : "white"; ?>;">
						<td align="center"><?php echo $i+1; ?></td>
						<td align="center"><input type="checkbox" name="cbUser" id="cbUser" value="<?php echo $listAdv[$i]["id"]; ?>" onclick="Check_Click(this)"></td>
						<td class="m_name"><?php echo "<a href='index.php?view=user&do=edit&uid=".$listAdv[$i]["id"]."'>".$listAdv[$i]["chusohuu"]."</a>"; ?></td>
						<td align="center"><?php echo $listAdv[$i]["sdt"]; ?></td>
						<td style="color:blue;"><?php echo $listAdv[$i]["email"]; ?></td>
						<td><?php echo $listAdv[$i]["diachi"]; ?></td>
						<td align="center"><img src="images/upload/quangcao/<?php echo $listAdv[$i]["hinhanh"]; ?>" width="100px" /></td>
						<td><a href='<?php echo $listAdv[$i]["link"]; ?>'><?php echo $listAdv[$i]["link"]; ?></a></td>
						<td align="center"><?php echo Utils::convertTimeDMY($listAdv[$i]["ngaydang"]); ?></td>
						<td align="center">3</td>
						<td align="center" style="color:red;font-weight:bold;"><?php echo "Đã hết hạn"; ?></td>
					</tr>
					<?php
						}
					?>
				</table>
			</div>
		</form>
	</div>
	<div class="bl"></div>
	<div class="br"></div>
	<div class="bm"></div>
</div>