<?php
	if (!isset($_SESSION["curUser"]))
		header("Location: index.php");
	$flag = 0;
	if ($_SESSION["curUser"][8] == 1) $flag = 1;
	if ($_SESSION["curUser"][8] == 4) $flag = 1;
	
	if ($flag == 0) // Khong duoc phep di tiep
		header("Location: index.php");

	$PATH = str_replace('//','/',dirname(__FILE__).'/');
	include_once($PATH . "../../../BUS/UsersBUS.php");
	include_once($PATH . "../../../BUS/RoleBUS.php");
	include_once($PATH . "../../../BUS/LevelBUS.php");
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
	$users = "";//UsersBUS::getUsers();
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
			function loadUsersByCondition()
			{
				var type = document.getElementById("type");
				var status = document.getElementById("status");
				window.location = "index.php?view=user&type=" + type.value + "&status=" + status.value;
			}
		</script>
		<form method="post" name="frmListItem" id="frmListItem">
			<input name="page" type="hidden" value="<?php echo $curPage; ?>" />
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<!--<td width="69%">Từ khóa: 
						<input type="text" name="kw" id="kw" value="<?php echo $kw; ?>"  />
						<input type="submit" name="btSearch" id="btSearch" value="Tìm" />
					</td>-->
					<td width="69%">
						<?php
                        $strLink = "index.php?view=user&type=".$type."&status=".$status."&";
                        $curPage=1;   
                        $totalItems =null;  
                        $business = null; 
                        if(isset($_REQUEST['page']))
                            $curPage=$_REQUEST['page'];
                        $maxItems = 5;
                	    $maxPages = 25;      
                        $offset=($curPage-1)*$maxItems; 
					   $listRole = RoleBUS::GetAllRole();
							$listUsers = UsersBUS::GetUsersByFilter($type, $status,$offset,$maxItems);
                            $totalItems=UsersBUS::CountUsersByFilter($type, $status,$offset,$maxItems);
							echo "<b>Có ".$totalItems." mẫu tin.</b>";
						?>
					</td>
					<td width="31%">
						<div align="right">
							<select id="type" onchange="return loadUsersByCondition();">
								<option value="-1" <?php echo $type==-1?"selected":""; ?>> - Nhóm thành viên - </option>
								<?php
									for($i=0;$i<count($listRole);$i++)
										if ($listRole[$i]["id"]==$type)
											echo "<option value='".$listRole[$i]["id"]."' selected>".$listRole[$i]["ten"]."</option>";
										else
											echo "<option value='".$listRole[$i]["id"]."'>".$listRole[$i]["ten"]."</option>";
								?>
							</select>
							<select id="status" onchange="return loadUsersByCondition();">
								<option value="-1" <?php echo $status==-1?"selected":""; ?>> - Chọn trạng thái - </option>
								<option value="1"  <?php echo $status==1?"selected":""; ?>>Kích hoạt</option>
								<option value="0"  <?php echo $status==0?"selected":""; ?>>Bị khóa</option>
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
						<td align="center">Họ tên</td>
						<td align="center">Email đăng nhập</td>
						<td width="50px" align="center">Giới tính</td>
						<td align="center">Địa chỉ</td>
						<td width="80px" align="center">Số ĐT 1</td>
						<td width="80px" align="center">Số ĐT 2</td>
						<td width="100px" align="center">Vai trò</td>
						<td width="120px" align="center">Cấp độ</td>
						<td width="70px" align="center">Kích hoạt</td>
					</tr>
					<?php
						
						for ($i=0;$i<count($listUsers);$i++)
						{
					?>
					<tr style="background:<?php echo ($i%2==0) ? "#EFF3FF" : "white"; ?>;">
						<td align="center"><?php echo $i+1; ?></td>
						<td align="center"><input type="checkbox" name="cbUser" id="cbUser" value="<?php echo $listUsers[$i]["id"]; ?>" onclick="Check_Click(this)"></td>
						<td class="m_name"><?php echo "<a href='index.php?view=user&do=edit&uid=".$listUsers[$i]["id"]."'>".$listUsers[$i]["hoten"]."</a>"; ?></td>
						<td style="color:blue;font-weight:bold;"><?php echo $listUsers[$i]["email"]; ?></td>
						<td align="center"><?php echo ($listUsers[$i]["gioitinh"]==1)?"Nam":"Nữ"; ?></td>
						<td><?php echo $listUsers[$i]["diachi"]; ?></td>
						<td align="right"><?php echo $listUsers[$i]["sdt1"]; ?></td>
						<td align="right"><?php echo $listUsers[$i]["sdt2"]; ?></td>
						<?php
							$role = RoleBUS::GetRoleByID($listUsers[$i]["role"]);
							if ($role[0] == 2)//Khach hang
								echo "<td align='center' style='color:red;'>".$role[1]."</td>";
							else
								echo "<td align='center' style='color:#23776B;'>".$role[1]."</td>";

							$level = LevelBUS::GetLevelByID($listUsers[$i]["level"]);
							echo "<td align='center'>".$level[2]."</td>";
							
							if ($listUsers[$i]["status"] == 1)
								echo "<td align='center'><img src='images/icon_yes.png' alt='Đã kích hoạt' /></td>";
							else
								echo "<td align='center'><img src='images/icon_no.png' alt='Đã bị khóa' /></td>";
						?>
					</tr>
					<?php
						}
                        
					?>
				</table>
                <?php echo Utils::paging ($strLink,$totalItems,$curPage,$maxPages,$maxItems);
                ?>
			</div>
		</form>
	</div>
	<div class="bl"></div>
	<div class="br"></div>
	<div class="bm"></div>
</div>