<?php session_start (); 
	if($_SESSION["curUser"][10] != 1)
		header("Location: index.php");
?>
<?php 
	$PATH = str_replace('//','/',dirname(__FILE__).'/') ;
	include_once($PATH . "../../../BUS/UsersBUS.php");
	include_once($PATH . "../../../BUS/EntriesBUS.php");
	include_once($PATH . "common_functions.php");
	$maxItems = 20;
	$maxPages = 5;
	$curPage = (int) $_GET["page"];
    $curPage = $curPage>0?$curPage:1;
	$curItem = ($curPage-1)*$maxItems;
	if($_REQUEST["btDisable"])
	{
		if($_REQUEST['cbId'])
		{
			$cb = $_REQUEST['cbId'];
			foreach ($cb as $id)
				EntriesBUS::SetStatus($id,0);
		}
	}
	if($_REQUEST["btEnable"])
	{
		if($_REQUEST['cbId'])
		{
			$cb = $_REQUEST['cbId'];
			foreach ($cb as $id)
				EntriesBUS::SetStatus($id,1);
		}
	}
	if($_REQUEST["btDelete"])
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
	$totalItems = EntriesBUS::Count($status,$type,$kw);
	$articles = EntriesBUS::getEntries($curItem,$maxItems,$status,$type,$kw);
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
        <td width="69%"><label>
          <select name="type" id="type">
            <option value="0" <?php echo $type==0?"selected":"" ?>>Tiêu đề</option>
            <option value="1" <?php echo $type==1?"selected":"" ?>>Tác giả</option>
                    </select>
        </label>
          <label>
          <input type="text" name="kw" id="kw" value="<?php echo $kw; ?>"  />
          <input type="submit" name="btSearch" id="btSearch" value="Tìm" />
          </label></td>
        <td width="31%"><label>
          <div align="right">
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
          <td width="3%"><div align="center">#</div></td>
          <td width="3%"><div align="center">
              <input type="checkbox" name="cbAll" id="cbAll" />
          </div></td>
          <td width="29%"><div align="center">Tiêu đề</div></td>
          <td width="11%"><div align="center">Trạng thái</div></td>
          <td width="11%"> Ai được xem</td>
          <td width="22%"><div align="center">Tác giả</div></td>
          <td width="16%"><div align="center">Ngày đăng</div></td>
          <td width="5%"><div align="center">ID</div></td>
        </tr>
        <?php  $i=$curItem+1; 
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
        <?php } ?>
      </table>
    </div>
    <?php 
		$strLink = "index.php?view=article&";
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