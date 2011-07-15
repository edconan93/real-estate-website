<?php
	if($_SESSION["curUser"][8] != 1)
		header("Location: index.php");

	$PATH = str_replace('//','/',dirname(__FILE__).'/');
	include_once($PATH . "../../../BUS/TinDangBUS.php");
	include_once($PATH . "../../../BUS/LoaiDVBUS.php");
	include_once($PATH . "../../../BUS/TinhBUS.php");
	include_once($PATH . "../../../BUS/PhuongBUS.php");
	include_once($PATH . "../../../BUS/QuanBUS.php");
	include_once($PATH . "../../../BUS/DonviTienBUS.php");
	include_once($PATH . "../../../BUS/DichVuVIPBUS.php");
	include_once($PATH . "../../../module/Utils/Utils.php");

	$maxItems = 20;
	$maxPages = 5;
	$curPage = "";
	if (isset($_GET["page"]))
		$curPage = (int) $_GET["page"];
    $curPage = $curPage>0?$curPage:1;
	$curItem = ($curPage-1)*$maxItems;
	if(isset($_REQUEST["btDisable"]))
	{
		if($_REQUEST['cbId'])
		{
			$cb = $_REQUEST['cbId'];
			foreach ($cb as $id)
				EntriesBUS::SetStatus($id,0);
		}
	}
	if(isset($_REQUEST["btEnable"]))
	{
		if($_REQUEST['cbId'])
		{
			$cb = $_REQUEST['cbId'];
			foreach ($cb as $id)
				EntriesBUS::SetStatus($id,1);
		}
	}
	if(isset($_REQUEST["btDelete"]))
	{
		if($_REQUEST['cbId'])
		{
	 	$cb = $_REQUEST['cbId'];
		foreach ($cb as $id)
			EntriesBUS::Delete($id);
		}
	}
	
	$tukhoa = isset($_REQUEST["tukhoa"])?$_REQUEST["tukhoa"]:-1;
	$loaidv = isset($_REQUEST["loaidv"])?$_REQUEST["loaidv"]:-1;
	$loainha = isset($_REQUEST["loainha"])?$_REQUEST["loainha"]:-1;
	$tinh = isset($_REQUEST["tinh"])?$_REQUEST["tinh"]:-1;
	$type = isset($_REQUEST["type"])?(int)$_REQUEST["type"]:-2;
?>

<div id="listItem">
	<div class="tl"></div>
	<div class="tr"></div>
	<div class="tm"></div>
	<div class="mid">
		<script language="javascript">
			function loadTinDangByFilter()
			{
				var tukhoa = document.getElementById("tukhoa").value == "-- Từ khóa --" ? -1 : Trim(document.getElementById("tukhoa").value);
				var loaidv = document.getElementById("loaidv").value;
				var loainha = document.getElementById("loainha").value;
				var tinh = document.getElementById("tinh").value;
				var type = document.getElementById("type").value;
				
				var url = "index.php?view=article";
				if (tukhoa != -1)
					url += "&tukhoa=" + tukhoa;
				if (loaidv != -1)
					url += "&loaidv=" + loaidv;
				if (loainha != -1)
					url += "&loainha=" + loainha;
				if (tinh != -1)
					url += "&tinh=" + tinh;
				if (type != -2)
					url += "&type=" + type;
				
				window.location = url;
				return true;
			}
			function checkAllTinDang()
			{
				var num=document.getElementById("max").value;	
				var i=1;
				
				if (document.getElementById("xulyclick_all").checked==true)
				{
					for(i=1;i<=num;i++)
					{
						var t = "cb"+i; 
						if(document.getElementById(t) != null)
							document.getElementById(t).checked=true;
					}
				}
				if (document.getElementById("xulyclick_all").checked==false)
				{
					for(i=1;i<=num;i++)
					{
						var t = "cb"+i;
						if(document.getElementById(t)!= null)
							document.getElementById(t).checked=false;
					}
				}
			}
			function nhapMaSoTin(objMaSoTin)
			{
				var value = Trim(objMaSoTin.value);
				if (value == "")
					objMaSoTin.value = "-- Từ khóa --";
				else
					objMaSoTin.value = Trim(objMaSoTin.value);;
			}
			function setNoiBat(id)
			{
				if (confirm("Bạn có chắc muốn thay đổi trạng thái nổi bật của căn hộ này?"))
				{
					var tukhoa = document.getElementById("tukhoa").value == "-- Từ khóa --" ? -1 : Trim(document.getElementById("tukhoa").value);
					var loaidv = document.getElementById("loaidv").value;
					var loainha = document.getElementById("loainha").value;
					var tinh = document.getElementById("tinh").value;
					var type = document.getElementById("type").value;
					
					var img = document.getElementById("imgNoiBat").src;
					var index = img.indexOf("icon_yes.png");
					var url = "module/tindang/xulytindang.php?action=";
					if (index > 0)
						url += "noibat0&idtin=" + id;
					else
						url += "noibat1&idtin=" + id;
					if (tukhoa != -1)
						url += "&tukhoa=" + tukhoa;
					if (loaidv != -1)
						url += "&loaidv=" + loaidv;
					if (loainha != -1)
						url += "&loainha=" + loainha;
					if (tinh != -1)
						url += "&tinh=" + tinh;
					if (type != -2)
						url += "&type=" + type;

					window.location = url;
					return true;
				}
				
				return false;
			}
			function changeStatus(objThis, oldvalue, newvalue, idtin)
			{
				switch (objThis.value)
				{
					case "0":
						document.getElementById(objThis.id).style.color = "green";
						break;
					case "1":
						document.getElementById(objThis.id).style.color = "blue";
						break;
					case "2":
						document.getElementById(objThis.id).style.color = "#B20751";
						break;
					case "3":
						document.getElementById(objThis.id).style.color = "red";
						break;
				}
				if (confirm("Bạn có chắc muốn thay đổi trạng thái tin đăng này?"))
				{
					var tukhoa = document.getElementById("tukhoa").value == "-- Từ khóa --" ? -1 : Trim(document.getElementById("tukhoa").value);
					var loaidv = document.getElementById("loaidv").value;
					var loainha = document.getElementById("loainha").value;
					var tinh = document.getElementById("tinh").value;
					var type = document.getElementById("type").value;
					
					var url = "module/tindang/xulytindang.php?action=status&aid=" + idtin + "&status=" + newvalue;
					
					if (tukhoa != -1)
						url += "&tukhoa=" + tukhoa;
					if (loaidv != -1)
						url += "&loaidv=" + loaidv;
					if (loainha != -1)
						url += "&loainha=" + loainha;
					if (tinh != -1)
						url += "&tinh=" + tinh;
					if (type != -2)
						url += "&type=" + type;
					
					window.location = url;
					return true;
				}

				document.getElementById(objThis.id).selectedIndex = oldvalue;
				switch (oldvalue)
				{
					case 0:
						document.getElementById(objThis.id).style.color = "green";
						break;
					case 1:
						document.getElementById(objThis.id).style.color = "blue";
						break;
					case 2:
						document.getElementById(objThis.id).style.color = "#B20751";
						break;
					case 3:
						document.getElementById(objThis.id).style.color = "red";
						break;
				}
				
				return false;
			}
		</script>
		<form method="post" name="frmListItem" id="frmListItem">
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td width="30%">
						<?php
							$listTinDang = TinDangBUS::GetAllTinDang();
							
							if ($tukhoa != -1)
							{
								$listTemp = $listTinDang;
								$j = 0;
								for ($i=0;$i<count($listTinDang);$i++)
								{
									$str1 = mb_strtolower($listTinDang[$i]["tieude"], 'UTF-8');
									$str2 = mb_strtolower($tukhoa, 'UTF-8');
									$index = strpos($str1, $str2)>-1?strpos($str1, $str2):-1;
									if ($index > -1)
										$listTemp[$j++] = $listTinDang[$i];
								}
								$listTinDang = $listTemp;
								for ($k=count($listTinDang)-1;$k>=$j;$k--)
									unset($listTinDang[$k]);
							}
							if ($loaidv != -1)
							{
								$listTemp = $listTinDang;
								$j = 0;
								for ($i=0;$i<count($listTinDang);$i++)
								{
									if ($listTinDang[$i]["loaidv"] == $loaidv)
										$listTemp[$j++] = $listTinDang[$i];
								}
								$listTinDang = $listTemp;
								for ($k=count($listTinDang)-1;$k>=$j;$k--)
									unset($listTinDang[$k]);
							}
							if ($loainha != -1)
							{
								$listTemp = $listTinDang;
								$j = 0;
								for ($i=0;$i<count($listTinDang);$i++)
								{
									if ($listTinDang[$i]["loainha"] == $loainha)
										$listTemp[$j++] = $listTinDang[$i];
								}
								$listTinDang = $listTemp;
								for ($k=count($listTinDang)-1;$k>=$j;$k--)
									unset($listTinDang[$k]);
							}
							if ($tinh != -1)
							{
								$listTemp = $listTinDang;
								$j = 0;
								for ($i=0;$i<count($listTinDang);$i++)
								{
									if ($listTinDang[$i]["tinh"] == $tinh)
										$listTemp[$j++] = $listTinDang[$i];
								}
								$listTinDang = $listTemp;
								for ($k=count($listTinDang)-1;$k>=$j;$k--)
									unset($listTinDang[$k]);
							}
							if ($type != -2)
							{
								$listTemp = $listTinDang;
								$j = 0;
								for ($i=0;$i<count($listTinDang);$i++)
								{
									if ($listTinDang[$i]["status"] == $type)
										$listTemp[$j++] = $listTinDang[$i];
								}
								$listTinDang = $listTemp;
								for ($k=count($listTinDang)-1;$k>=$j;$k--)
									unset($listTinDang[$k]);
							}
							
							echo "<b>Có ".count($listTinDang)." mẫu tin.</b>";
						?>
					</td>
					<td width="70%" align="right">
						<input id="tukhoa" type="text" style="width: 100px;" 
							value="<?php if ($tukhoa == -1) echo '-- Từ khóa --'; else echo $tukhoa;?>" 
							onfocus="select();" onblur="nhapMaSoTin(this);">
						<select id="loaidv">
							<option value="-1">-- Loại dịch vụ --</option>
							<?php
							include("../BUS/LoaiDichVuBUS.php");
							$loaidv=LoaiDichVuBUS::getALL();
							for($i=0;$i<count($loaidv);$i++)
							{
								if(isset($_REQUEST['loaidv'])&&$_REQUEST['loaidv'] == $loaidv[$i]['id'])
									echo "<option value='".$loaidv[$i]['id']."' selected>".$loaidv[$i]['ten']."</option>";
								else 
									echo "<option value='".$loaidv[$i]['id']."'>".$loaidv[$i]['ten']."</option>";
							}
							?>
						</select>
						<select id="loainha">
							<option value="-1">-- Loại căn hộ --</option>
							<?php
								include("../BUS/LoaiNhaBUS.php");
								$rs=LoaiNhaBUS::GetAllLoaiNha();
								for($i=0;$i<count($rs);$i++)
								{
									if(isset($_REQUEST['loainha']) && $_REQUEST['loainha'] == $rs[$i]['id'])
										echo "<option value='".($i+1)."' selected>".$rs[$i][1]."</option>";
									else
										echo "<option value='".($i+1)."'>".$rs[$i][1]."</option>";	
								}
							?>
						</select>
						<select id="tinh">
							<option value="-1">-- Tỉnh/Thành phố --</option>
							<?php
								$rs=TinhBUS::GetAllTinh();
								for($i=0;$i<count($rs);$i++)
								{	
									if(isset($_REQUEST['tinh']) && $_REQUEST['tinh'] == $rs[$i]['id'])
										echo "<option value='".($i+1)."' selected>".$rs[$i][1]."</option>";
									else
										echo "<option value='".($i+1)."'>".$rs[$i][1]."</option>";
								}
							?>	
						</select>
						<select id="type">
							<option value="-2">-- Tình trạng tin --</option>
							<option value="0" <?php echo $type==0?"selected":""; ?>>Tin chờ duyệt</option>
							<option value="1" <?php echo $type==1?"selected":""; ?>>Tin đã duyệt</option>
							<option value="2" <?php echo $type==2?"selected":""; ?>>Tin đăng VIP</option>
							<option value="3" <?php echo $type==3?"selected":""; ?>>Tin hết hạn</option>
						</select>&nbsp;&nbsp;&nbsp;
						<input type="button" value="Tìm" onclick="return loadTinDangByFilter();" />
					</td>
				</tr>
			</table>
			<div class="list">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr class="title">
						<td width="20px" align="center">#</td>
						<td width="20px" align="center">
							<input type="checkbox" onclick="checkAll(this);" /></td>
						<td align="center">Tiêu đề</td>
						<td width="70px" align="center">Loại dịch vụ</td>
						<td width="120px" align="center">Loại căn hộ</td>
						<td align="center">Địa chỉ</td>
						<td align="center">Giá bán</td>
						<td width="70px" align="center">Ngày đăng</td>
						<td width="50px" align="center">Up VIP</td>
						<td width="90px" align="center">Tình trạng tin</td>
						<!--<td width="90px" align="center">Đổi trạng thái</td>
						<td width="50px" align="center">Nổi bật</td>-->
					</tr>
					<?php
						for ($i=0;$i<count($listTinDang);$i++)
						{
					?>
					<tr style="background:<?php echo ($i%2==0) ? "#EFF3FF" : "white"; ?>;">
						<td align="center"><?php echo $i+1; ?></td>
						<td align="center"><input type="checkbox" name="cbTinDang" id="cbTinDang" value="<?php echo $listTinDang[$i]["id"]; ?>" onclick="Check_Click(this)"></td>
						<td class="m_name"><?php echo "<a href='index.php?view=article&do=edit&aid=".$listTinDang[$i]["id"]."'>".$listTinDang[$i]["tieude"]."</a>"; ?></td>
						<?php
							$loaidv = LoaiDVBUS::GetLoaiDVByID($listTinDang[$i]["loaidv"]);
							echo "<td align='center'>".$loaidv[1]."</td>";
							$loainha = LoaiNhaBUS::getById($listTinDang[$i]["loainha"]);
							echo "<td align='center'>".$loainha[1];
							if ($listTinDang[$i]["rank"] == 1)
								echo "&nbsp;&nbsp;<img src='images/hot.gif' />";
							echo "</td>";
							$phuong = PhuongBUS::getPhuongById($listTinDang[$i]["phuong"]);
							$quan = QuanBUS::getQuanById($listTinDang[$i]["quan"]);
							echo "<td>".$listTinDang[$i]["sonha"]." ".$listTinDang[$i]["duong"].", ".$phuong[1].", ".$quan[1].", ";
							$tinh = TinhBUS::getTinhById($listTinDang[$i]["tinh"]);
							echo $tinh[1]."</td>";
							$donviTien = DonViTienBUS::selectId($listTinDang[$i]["donvitien"]);
							echo "<td align='right'>".number_format($listTinDang[$i]["giaban"])." $donviTien[1]</td>";
							if ($listTinDang[$i]["ngaydang"] != null)
							{
								$date = Utils::convertTimeDMY($listTinDang[$i]["ngaydang"]);
								echo "<td align='center'>".$date."</td>";
							}
							else
								echo "<td></td>";
							$tinvip = DichVuVIPBUS::GetTinVipById($listTinDang[$i]["id"]);
							if (count($tinvip) > 0)
								echo "<td align='center'><img src='images/vip.gif' /></td>";
							else
								echo "<td></td>";
							$str = "<td><select id='status[$i]' style='font-size:96%;color:";
							switch ($listTinDang[$i]["status"])
							{
								case 0: // đang chờ duyệt
									$str .= "green";
									break;
								case 1: // đã duyệt đăng miễn phí
									$str .= "blue";
									break;
								case 2: // tin vip
									$str .= "#B20751";
									break;
								case 3: // tin hết hạn
									$str .= "red";
									break;
							}
							// $str .= ";' onchange='return changeStatus(this.id, ".$listTinDang[$i]["id"].", this, ".$listTinDang[$i]["status"].");'>";
							$str .= ";' onchange='return changeStatus(this, ".$listTinDang[$i]["status"].", this.value, ".$listTinDang[$i]["id"].")';>";
							echo $str;
						?>
								<option value="0" <?php echo $listTinDang[$i]["status"]==0?"selected":"" ?> style="color:green;">Tin chờ duyệt</option>
								<option value="1" <?php echo $listTinDang[$i]["status"]==1?"selected":"" ?> style="color:blue;">Tin đã duyệt</option>
								<option value="2" <?php echo $listTinDang[$i]["status"]==2?"selected":"" ?> style="color:#B20751;">Tin đăng VIP</option>
								<option value="3" <?php echo $listTinDang[$i]["status"]==3?"selected":"" ?> style="color:red;">Tin hết hạn</option>
							</select>
						</td>
						<!--<td align="center">
							<img id="imgNoiBat" style="cursor:pointer;" src="images/icon_<?php echo ($listTinDang[$i]["rank"])?"yes":"no"; ?>.png" onclick="return setNoiBat(<?php echo $listTinDang[$i]["id"]; ?>);">
						</td>-->
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