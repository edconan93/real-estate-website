<?php
	if($_SESSION["curUser"][8] != 1)
		header("Location: index.php");

	$PATH = str_replace('//','/',dirname(__FILE__).'/');
	include_once($PATH . "../../../BUS/TinDangBUS.php");
	include_once($PATH . "../../../BUS/LoaiDVBUS.php");
	include_once($PATH . "../../../BUS/TinhBUS.php");
	include_once($PATH . "../../../BUS/DonviTienBUS.php");
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
	
	$tukhoa = isset($_REQUEST["key"])?$_REQUEST["key"]:-1;
	$loaidv = isset($_REQUEST["loaidv"])?$_REQUEST["loaidv"]:-1;
	$loainha = isset($_REQUEST["loainha"])?$_REQUEST["loainha"]:-1;
	$province = isset($_REQUEST["province"])?$_REQUEST["province"]:-1;
	$type = isset($_REQUEST["type"])?(int)$_REQUEST["type"]:-1;
?>

<div id="listItem">
	<div class="tl"></div>
	<div class="tr"></div>
	<div class="tm"></div>
	<div class="mid">
		<script language="javascript">
			function loadTinDangTheoLoai()
			{
				var type = document.getElementById("type");
				window.location = "index.php?view=article&type=" + type.value;
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
					objMaSoTin.value = "-- Mã số tin --";
				else
					objMaSoTin.value = Trim(objMaSoTin.value);;
			}
		</script>
		<form method="post" name="frmListItem" id="frmListItem">
			<input name="page" type="hidden" value="<?php echo $curPage; ?>">
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td width="30%">
						<?php
							$type = "";
							if (isset($_GET["type"]) && $_GET["type"] != -2)
								$type = $_GET["type"];
							else
								$type = -2;
							$listTinDang = TinDangBUS::GetAllTinByType($type);
							echo "<b>Có ".count($listTinDang)." mẫu tin.</b>";
						?>
					</td>
					<td width="70%" align="right">
						<input type="text" style="width: 100px;" value="-- Mã số tin --" onfocus="select();" onblur="nhapMaSoTin(this);">
						<select name="cbbServiceType">
							<option value="-1">-- Loại dịch vụ --</option>
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
						<select name="cbbCategory">
							<option value="-1">-- Loại căn hộ --</option>
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
						<select name="cbbLocation">
							<option value="-1">-- Tỉnh/Thành phố --</option>
							<?php
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
						<select name="type" id="type" onchange="return loadTinDangTheoLoai();">
							<option value="-2">-- Tình trạng tin --</option>
							<option value="0" <?php echo $type==0?"selected":""; ?>>Tin chờ duyệt</option>
							<option value="1" <?php echo $type==1?"selected":""; ?>>Tin đã duyệt</option>
							<option value="2" <?php echo $type==2?"selected":""; ?>>Tin đăng VIP</option>
							<option value="3" <?php echo $type==3?"selected":""; ?>>Tin hết hạn</option>
						</select>
					</td>
				</tr>
			</table>
			<div class="list">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr class="title">
						<td width="30px" align="center">#</td>
						<td width="30px" align="center">
							<input type="checkbox" onclick="checkAll(this);" /></td>
						<td align="center">Tiêu đề</td>
						<td width="100px" align="center">Loại dịch vụ</td>
						<td width="120px" align="center">Loại căn hộ</td>
						<td align="center">Địa chỉ</td>
						<td width="100px" align="center">Giá bán</td>
						<td width="70px" align="center">Ngày đăng</td>
						<td width="100px" align="center">Tình trạng tin</td>
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
							echo "<td align='center'>".$loainha[1]."</td>";
							echo "<td>".$listTinDang[$i]["sonha"]." ".$listTinDang[$i]["duong"].", P.".$listTinDang[$i]["phuong"].", Q.".$listTinDang[$i]["quan"].", ";
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
							switch ($listTinDang[$i]["status"])
							{
								case 0: // đang chờ duyệt
									echo "<td align='center' style='color:green;'>Tin chờ duyệt</td>";
									break;
								case 1: // đã duyệt đăng miễn phí
									echo "<td align='center' style='color:blue;'>Tin đã duyệt</td>";
									break;
								case 2: // tin vip
									echo "<td align='center' style='color:#B20751; font-weight:bold;'>Tin đăng VIP</td>";
									break;
								case 3: // tin hết hạn
									echo "<td align='center' style='color:red;'>Tin hết hạn</td>";
									break;
							}
						?>
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