<?php
	if($_SESSION["curUser"][8] != 1)
		header("Location: index.php");

	include_once(rtrim(dirname(__FILE__),"e\admin\module")."e\BUS\TinDangBUS.php");
	include_once(rtrim(dirname(__FILE__),"e\admin\module")."e\BUS\LoaiDVBUS.php");
	include_once(rtrim(dirname(__FILE__),"e\admin\module")."e\BUS\TinhBUS.php");
	include_once(rtrim(dirname(__FILE__),"e\admin\module")."e\BUS\DonviTienBUS.php");
	include_once(rtrim(dirname(__FILE__),"e\admin\module")."e\module\Utils\Utils.php");
	//include_once($PATH . "../../../BUS/UsersBUS.php");
	//include_once($PATH . "../../../BUS/EntriesBUS.php");
	//include_once($PATH . "common_functions.php");
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
	
	$status = isset($_REQUEST["status"])?$_REQUEST["status"]:-1;
	$type = isset($_REQUEST["type"])?(int)$_REQUEST["type"]:-1;
	$kw = isset($_REQUEST["kw"])?$_REQUEST["kw"]:"";	
	$totalItems = 0;//EntriesBUS::Count($status,$type,$kw);
	$articles = "";//EntriesBUS::getEntries($curItem,$maxItems,$status,$type,$kw);
?>

<div id="listItem">
	<div class="tl"></div>
	<div class="tr"></div>
	<div class="tm"></div>
	<div class="mid">
		<script language="javascript">
			$(document).ready(function ()
			{
				$("#frmListItem").submit (function ()
				{
					return false;
				});
				
				$("#status").change (function ()
				{
					var url = "modules/forms/listArticle.php";
					var status = $("#status").attr("value");
					var type = $("#type").attr("value");
					var kw = $("#kw").attr("value");
					url += "?status=" + status ;
					url += "&type=" + type ;
					url += "&kw=" + kw ;;
					$("#listItem").load(url);
				});
				$("#btSearch").click (function ()
				{
					var url = "modules/forms/listArticle.php";
					var status = $("#status").attr("value");
					var type = $("#type").attr("value");
					var kw = $("#kw").attr("value");
					url += "?status=" + status ;
					url += "&type=" + type ;
					url += "&kw=" + kw ;
					$("#listItem").load(url);
				});
				
				$("#cbAll").click (function ()
				{
					 var checked_status = this.checked;
					 $("input[name=cbId[]]").each(function()
					 {
						 this.checked = checked_status;
					 });
				});
			});
		</script>
		<form method="post" name="frmListItem" id="frmListItem">
			<input name="page" type="hidden" value="<?php echo $curPage; ?>">
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td width="69%">
					</td>
					<td width="31%">
						<div align="right">
							<select name="type" id="type">
								<option value="-2">-- Tất cả --</option>
								<option value="-1">Tin đã xóa</option>
								<option value="0">Tin chờ duyệt</option>
								<option value="1">Tin đã duyệt</option>
								<option value="2">Tin đăng VIP</option>
								<option value="3">Tin hết hạn</option>
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
							<input type="checkbox" name="cbAll" id="cbAll" /></td>
						<td align="center">Tiêu đề</td>
						<td width="100px" align="center">Loại dịch vụ</td>
						<td align="center">Địa chỉ</td>
						<td width="100px" align="center">Giá bán</td>
						<td width="70px" align="center">Ngày đăng</td>
						<td width="100px" align="center">Tình trạng tin</td>
					</tr>
					<?php
						$listTinDang = TinDangBUS::GetAllTin();
						for ($i=0;$i<count($listTinDang);$i++)
						{
					?>
					<tr>
						<td align="center"><?php echo $i+1; ?></td>
						<td align="center"><input type="checkbox" name="cbId[]" id="cbId[]" value=""></td>
						<td class="m_name"><?php echo "<a href='index.php?view=article&do=edit&aid=".$listTinDang[$i]["id"]."'>".$listTinDang[$i]["tieude"]."</a>"; ?></td>
						<?php
							$loaidv = LoaiDVBUS::GetLoaiDVByID($listTinDang[$i]["loaidv"]);
							echo "<td align='center'>".$loaidv[1]."</td>";
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
								case -1: // đã xóa
									echo "<td align='center' style='color:red;'>Tin đã xóa</td>";
									break;
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
					<?php  /*
						$i=$curItem+1; 
						while ($article = mysql_fetch_array($articles)) 
						{ 
							$user = UsersBUS::GetUserByID($article[1]);
					?>
					<tr>
						<td><div align="center"><?php echo $i++; ?></div></td>
						<td><div align="center">
							<input type="checkbox" name="cbId[]" id="cbId[]" value="<?php echo $article[0]; ?>" />
							</div></td>
						<td><?php echo "<a href='../blog.php?uid=$article[1]&entry_id=$article[0]'>$article[3]</a>";  ?></td>
						<td><div align="center">
							<?php
								if($article[7] == 1)
									echo "<img src='images/tick.png' alt='Bình thường' title='Bình thường'/>";
								else 
									echo "<img src='images/publish_x.png' alt='Bị khóa' title='Bị khóa'/>";
							?>
							</div></td>
						<td><?php
								switch($article[5])
								{		
								case 0:
									echo "mọi người";
									break;
								case 1:
									echo "bạn bè";
									break;
								case 1:
									echo "tác giả";
									break;
								}
							?>
						</td>
						<td><div align="center">
							<?php 
								echo "<a href='index.php?view=user&uid=$user[0]&do=edit'>$user[1]</a>";
							?>
							</div></td>
						<td><div align="center"><?php echo convert_time($article[2]) ?></div></td>
						<td><div align="center"><?php echo $article[0] ?></div></td>
					</tr>
					<?php
						}*/
					?>
				</table>
			</div>
			<?php /*
				$strLink = "index.php?view=article&";
				if($status!=-1)
					$strLink .= "status=$status&";
				if($type!=-1)
					$strLink .= "type=$type&";
				if($kw!="")
					$strLink .= "kw=$kw&";
				$strPaging = paging ($strLink,$totalItems,$curPage,$maxPages,$maxItems);
				echo $strPaging; */
			?>
		</form>
	</div>
	<div class="bl"></div>
	<div class="br"></div>
	<div class="bm"></div>
</div>