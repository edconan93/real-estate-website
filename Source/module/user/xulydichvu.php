<script>
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
	
	//alert(BASIC_GetCookie("ccbQuanHuyen"));
	//document.getElementById("ccbQuanHuyen").value = "3";//BASIC_GetCookie("ccbQuanHuyen");
	//document.getElementById("ccbPhuongXa").value = BASIC_GetCookie("ccbPhuongXa");
	//alert(BASIC_GetCookie("ccbPhuongXa"));
</script>
<?php
	include ("../../BUS/HinhAnhBUS.php");
	
	if (isset($_GET["step"]) && $_GET["step"] == 1)
	{
		include ("../../BUS/DichVuBUS.php");
		include ("../../BUS/DichVu_TienIchBUS.php");
		
		$tieude = $_POST["txtTieuDeTin"];
		
		echo "<br>tieude=".$tieude;
		$mota=stripcslashes($_POST["summary"]);
		echo "<br>mota=".$mota;
		$chusohuu=(int) $_GET['id'];
		echo "<br>chusohuu=".$chusohuu;
		
		$time = date('Y-m-d h:i:s');
		echo "time=".$time;
		$timeupdate = date('d-m-Y');
		$duong = $_POST["txtDuongPho"];
		echo "<br>duong=".$duong;
		$dai =(float) $_POST["txtDai"];
		echo "<br>dai=".$dai;
		$rong =(float) $_POST["txtRong"];
		echo "<br>rong=".$rong;
		$tang =(int) $_POST["txtTang"];
		echo "<br>tang=".$tang;
		$phongngu =(int) $_POST["txtPhongNgu"];
		echo "<br>phongngu=".$phongngu;
		$phongtam =(int) $_POST["txtPhongTam"];
		echo "<br>phongtam=".$phongtam;
		$giaban =(float) $_POST["txtGia"];
		echo "<br>giaban=".$giaban;
		$donvitien =(int) $_POST["cbbDonViTien"];
		echo "<br>donvitien=".$donvitien;
		$status =(int) "0";
		$thoihandangtin= (int) "15";
		$loainha = (int)$_POST["cbbBatDongSan"];
		echo "<br>loainha=".$loainha;
		$phaply = (int)$_POST["cbbPhapLy"];
		echo "<br>phaply=".$phaply;
		$huongnha = (int)$_POST["cbbHuongNha"];
		echo "<br>huongnha=".$huongnha;
		$khuyenmai = $_POST["txtKhuyenMai"];
		echo "<br>khuyenmai=".$khuyenmai;
		$loaiDV = (int)$_GET['loaidvcandang'];
		echo "<br>loaiDV=".$loaiDV;
		$donviDV = (int)$_POST["cbbDonViDichVu"];
		echo "<br>donviDV=".$donviDV;
		$X = "0";
		$Y = "0";
		$khanang=(int) "1";
		$flagInsert = true;
		//process quan huyen tinh
		$tinh =(int) $_POST["cbbTinhTP"];
		echo "<br>tinh=".$tinh;
		$quan =(int) $_COOKIE["ccbQuanHuyen"];
		echo "<br>quan=".$_COOKIE["ccbQuanHuyen"];
		$phuong= (int) $_COOKIE["ccbQuanHuyen"];
		echo "<br>phuong=".$_COOKIE["ccbPhuongXa"];
		if( $quan == -1)
		{
			$quan = 25;
			$phuong = 23;
		}
		if( $phuong == -1)
		{
			//$quan = 25;
			$phuong = 23;
		}
		
		//xu ly loai dv cho or can thue
		
	//	echo "<br>update==".$_GET['update'];
		//add or update into dichvu
		if(isset($_GET['update']) && $_GET['update'] != null)
		{
			
			$rs=DichVuBUS::Update($_GET['update'],$tieude,$mota,$chusohuu,$phuong,$quan,$tinh,$time,$timeupdate,$duong,$dai,$rong,$tang,$phongngu,$phongtam,$giaban,$donvitien,$status,$thoihandangtin,$loainha,$phaply,$huongnha,$khuyenmai,$loaiDV,$donviDV,$X,$Y,$khanang);
			echo "<br>rs in update=".$rs;
		}
		else
		{
			
			$rs=DichVuBUS::Add($tieude,$mota,$chusohuu,$phuong,$quan,$tinh,$time,$timeupdate,$duong,$dai,$rong,$tang,$phongngu,$phongtam,$giaban,$donvitien,$status,$thoihandangtin,$loainha,$phaply,$huongnha,$khuyenmai,$loaiDV,$donviDV,$X,$Y,$khanang);
			echo "<br>rs in add=".$rs;
		}
		if($rs == false)
		{
			$flagInsert = false;
			echo "Can't insert or update into database.Please check again!";
		}
		//check and update or add into dichvu_tienich table
		if(isset($_GET['update']) && $_GET['update'] != null)
		{
			//include_once("../BUS/DichVu_TienIchBUS.php");
			$dv_tienich = DichVu_TienIchBUS::getAllByIDDichVu($_GET['update']);
			for($i=0;$i<count($dv_tienich);$i++)
			{
				$kqDelete =DichVu_TienIchBUS::Delete($dv_tienich[$i][0]);
			}
			$rs= $_GET['update'];
		}
		 if(isset($_POST["cbId"]) && count($_POST["cbId"]) > 0 )
		{
			$arraycheck = $_POST["cbId"];
			echo "<br>so=".count($arraycheck);
			for($i=0;$i<count($arraycheck);$i++)
			{
				DichVu_TienIchBUS::Add((int)$rs,(int)$arraycheck[$i]);
			}
		}
		if($flagInsert == true)
		{
			$length = strlen($_COOKIE["url"]);
			$url = $_COOKIE["url"];
			$url[$length - 1] = 2;
			if ($_GET["loaidvcandang"] == 1 || $_GET["loaidvcandang"] == 3)
			{
				if(isset($_GET['update']) && $_GET['update'] != null)
				{
					header("Location:".$url."&update=".$_GET['update']."&newid=".$rs);
				}
				else
					header("Location:".$url."&newid=".$rs);
			}
			else
				header("Location:".$url."&dangtin=success");
		}
		else
		{
			header("Location:../dangtindichvu.php?dangtin=fail");
		}
	}
	//upload file
	if (isset($_GET["newid"]))
	{
		if(isset($_GET['update']) && $_GET['update'] != null)
		{
			$hinhanh=HinhAnhBUS::getAllHinhAnhByDichVuID($_GET['update']);
			echo "<br>so ha can delete=".count($hinhanh);
			for($i=0;$i<count($hinhanh);$i++)
				HinhAnhBUS::Delete($hinhanh[$i][0]);
		}
		for ($i=1;$i<=5;$i++)
		{
			$flag = true;
			if($_FILES["ffImage".$i]["error"] > 0)
				$flag = false;
			if($flag && $_FILES["ffImage".$i]["size"] == 0 || $_FILES["ffImage".$i]["size"] > 1024 * 1024)
				$flag = false;
			
			if($flag)
			{
				$chusohuu =(int)$_GET['id'];
				echo "<br>chu so huu=".$chusohuu;
				echo "<br> file uploaded not failed";
				$arrType = explode ("/",$_FILES["ffImage".$i]["type"]);
				if($arrType[0]!="image")
				{
					$flagInsert = false;
					$flag = false;
				}

				$PATH_BASE = str_replace("//","/",dirname(__FILE__)."/");
				$random = rand (1,1000000);		
				$path = $PATH_BASE . "../../images/upload";
				if(!is_dir("$path/$chusohuu"))
				{
					mkdir("$path/$chusohuu");
				}
				if(!is_dir("$path/$chusohuu/Picture_House"))
					mkdir("$path/$chusohuu/Picture_House");
				$path = "$path/$chusohuu/Picture_House/";
				
				move_uploaded_file($_FILES["ffImage".$i]["tmp_name"],$path.$random.$_FILES["ffImage".$i]["name"]);
				$picture_path = "images/upload/$chusohuu/Picture_House/".$random.$_FILES["ffImage".$i]["name"];
				echo "<br>path=".$picture_path;
				$kq=HinhAnhBUS::insert($picture_path,(int)$_GET["newid"]);
				if($kq == false)
				{
					$flagInsert = false;
					echo "<br>Insert image = false";
				}
				else
					echo "upload picture finish!";
			}
		}
		$length = strlen($_COOKIE["url"]);
		$url = $_COOKIE["url"];
		$url[$length - 1] = 3;
		header("Location:".$url);
		//header("Location:../dangtindichvu.php?dangtin=success");
	}
?>