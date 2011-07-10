<div style="width: 686px;" id="featuredpropertyv2">
	<div style="margin-left: 10px; margin-top: 10px; font-family: tahoma; font-size: 18px;
		font-weight: bold; color:#890C29;">
		CĂN HỘ NỔI BẬT
	</div>
	<hr style="color: rgb(211, 232, 248);" width="680" size="1">
	<?php 
	include_once ("../BUS/DichVuBUS.php");
	include_once ("../BUS/HinhAnhBUS.php");
	$canho = DichVuBUS::getCanHoNoiBat();
	 ?>
	<div class="mid_content">

		<?php 
		for($i = 0;$i<count($canho);$i++)
		{
			if($i<4)
			{
				$hinhanh=HinhAnhBUS::getAllHinhAnhByDichVuID($canho[$i]['id']);
				echo "<div style='width:170px;float:left;'>";
				echo "<a class='chnoibat' href='chitietdiaoc.php?iddichvu=".$canho[$i]['id']."'>";
				echo "<img src='../".$hinhanh[0]['path']."' style='height:100px; width:160px;'/><br>";
				echo $canho[$i]['tieude'];
				echo "</a></div>";
			}
			else
			{
				break;
			}
		}
		?>
		
		
	</div>	
	<div style="clear:both;">
	</div>
</div>
