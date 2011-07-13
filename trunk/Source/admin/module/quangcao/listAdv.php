<?php 
	if($_SESSION["curUser"][8] != 1)
		header("Location: index.php");

	$PATH = str_replace('//','/',dirname(__FILE__).'/');
	
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
							echo "<b>Có ".count($listUsers)." mẫu tin.</b>";
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
			</div>
		</form>
	</div>
	<div class="bl"></div>
	<div class="br"></div>
	<div class="bm"></div>
</div>