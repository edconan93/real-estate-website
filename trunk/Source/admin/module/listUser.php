<?php 
	if($_SESSION["curUser"][8] != 1)
		header("Location: index.php");

	$PATH = str_replace('//','/',dirname(__FILE__).'/') ;
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
				UsersBUS::SetStatus($id,0);
		}
	}
	if(isset($_REQUEST["btEnable"]))
	{
		if($_REQUEST['cbId'])
		{
			$cb = $_REQUEST['cbId'];
			foreach ($cb as $id)
				UsersBUS::SetStatus($id,1);
		}
	}
	if(isset($_REQUEST["btDelete"]))
	{
	 	$cb = $_REQUEST['cbId'];
		foreach ($cb as $id)
			UsersBUS::Delete($id);
	}
	
	$status = isset($_REQUEST["status"])?$_REQUEST["status"]:-1;
	$type = isset($_REQUEST["type"])?(int)$_REQUEST["type"]:-1;
	$kw = isset($_REQUEST["kw"])?$_REQUEST["kw"]:"";	
	$totalItems = 0;//UsersBUS::Count($type,$status,$kw);
	$users = "";//UsersBUS::getUsers($curItem,$maxItems,$type,$status,$kw);
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
			var url = "modules/forms/listUser.php";
			var status = $("#status").attr("value");
			var type = $("#type").attr("value");
			var kw = $("#kw").attr("value");
			url += "?status=" + status ;
			url += "&type=" + type ;
			url += "&kw=" + kw ;;
			$("#listItem").load(url);
		});
		
		$("#type").change (function ()
		{
			var url = "modules/forms/listUser.php";
			var status = $("#status").attr("value");
			var type = $("#type").attr("value");
			var kw = $("#kw").attr("value");
			url += "?status=" + status ;
			url += "&type=" + type ;
			url += "&kw=" + kw ;
			$("#listItem").load(url);
		});
		
		$("#btSearch").click (function ()
		{
			var url = "modules/forms/listUser.php";
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
        <td width="69%">Từ khóa: 
          <label>
          <input type="text" name="kw" id="kw" value="<?php echo $kw; ?>"  />
          <input type="submit" name="btSearch" id="btSearch" value="Tìm" />
          </label></td>
        <td width="31%"><label>
          <div align="right">
            <select name="type" id="type">
              <option value="-1" <?php echo $type==-1?"selected":""; ?>> - Nhóm thành viên - </option>
              <option value="0"  <?php echo $type==0?"selected":""; ?>>Thành viên</option>
              <option value="1"  <?php echo $type==1?"selected":""; ?>>Quản trị</option>
            </select>
            <select name="status" id="status">
              <option value="-1"  <?php echo $status==-1?"selected":""; ?>>- Chọn trạng thái - </option>
              <option value="0" <?php echo $status==0?"selected":""; ?>>Bị khóa</option>
              <option value="1" <?php echo $status==1?"selected":""; ?>>Bình thường</option>
            </select>
            </div>
        </label></td>
      </tr>
    </table>
    <div class="list">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr class="title">
          <td width="30px"><div align="center">#</div></td>
          <td width="30px"><label>
            <div align="center">
              <input type="checkbox" name="cbAll" id="cbAll" />
              </div>
          </label></td>
          <td><div align="center">Họ tên</div></td>
          <td><div align="center">Email đăng nhập</div></td>
          <td width="50px"><div align="center">Giới tính</div></td>
          <td><div align="center">Địa chỉ</div></td>
          <td width="80px"><div align="center">Số ĐT 1</div></td>
          <td width="80px"><div align="center">Số ĐT 2</div></td>
          <td><div align="center">Vai trò</div></td>
          <td><div align="center">Cấp độ</div></td>
		  <td><div align="center">Kích hoạt</div></td>
        </tr>
		<tr>
			<td align="center">20</td>
			<td></td>
			<td>Nguyễn Thị Thanh Phương Đoàn</td>
			<td>nguyenthithanhphuong@yahoo.com</td>
			<td align="center">Nam</td>
			<td>769/44/14 Phạm Thể Hiển, P4, Q.8, Tp.HCM</td>
			<td>0934.100286</td>
			<td>01934.100286</td>
			<td align="center">Nhân viên</td>
			<td align="center">Nhân viên cấp bậc 3</td>
			<td></td>
		</tr>
        <?php
			$i=$curItem+1; 
			//while ($user = mysql_fetch_array($users)) 
			{
		?>
        <!--<tr>
			<td><div align="center"><?php echo $i++; ?></div></td>
			<td><label>
				<div align="center">
					<input type="checkbox" name="cbId[]" id="cbId[]" value="<?php echo $user[0]; ?>" /></div></label></td>
			<td><?php echo "<a href='index.php?view=user&do=edit&uid=$user[0]'>$user[1]</a>";  ?></td>
			<td>
				<div align="center">
				<?php
					if($user[9] == 1)
						echo "<img src='images/tick.png' alt='Bình thường' />";
					else 
						echo "<img src='images/publish_x.png' alt='Bị khóa' />";
				?>           
				</div></td>
			<td><div align="center">
				<?php  echo $user[10]==0?"Thành viên":"Quản trị" ?></div></td>
			<td><?php echo $user[3]; ?></td>
			<td><div align="center"><?php echo $user[8]=="0000-00-00 00:00:00"?"chưa đăng nhập bao giờ":convert_time($user[8]) ?></div></td>
			<td><div align="center"><?php echo convert_time($user[5]) ?></div></td>
			<td><div align="center"><?php echo EntriesBUS::GetCountEntriesByPostedUser($user[0]); ?></div></td>
			<td><div align="center"><?php echo $user[0] ?></div></td>
        </tr>-->
        <?php
			}
		?>
      </table>
    </div>
    <?php 
		$strLink = "index.php?view=user&";
		if($status!=-1)
			$strLink .= "status=$status&";
		if($type!=-1)
			$strLink .= "type=$type&";
		if($kw!="")
			$strLink .= "kw=$kw&";
		$strPaging = paging ($strLink,$totalItems,$curPage,$maxPages,$maxItems);
		echo $strPaging; 
	?>
</form>
</div>
<div class="bl"></div>
<div class="br"></div>
<div class="bm"></div>
</div>