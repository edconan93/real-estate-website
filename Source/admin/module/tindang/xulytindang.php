<?php
	include ("../../../BUS/DichVuBUS.php");
	
	if (isset($_GET["step"]) && $_GET["step"] == 1)
	{
		include ("../../../BUS/HinhAnhBUS.php");
		include ("../../../BUS/DichVu_TienIchBUS.php");
		
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
		$rank=0;
		$sonha=$_POST['txtSoNha'];
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
		
		echo "<br>update==".$_GET['update'];
		//add or update into dichvu
		if(isset($_GET['update']) && $_GET['update'] != null)
		{
			
			$rs=DichVuBUS::Update($_GET['update'],$tieude,$mota,$chusohuu,$phuong,$quan,$tinh,$time,$timeupdate,$duong,$dai,$rong,$tang,$phongngu,$phongtam,$giaban,$donvitien,$status,$thoihandangtin,$loainha,$phaply,$huongnha,$khuyenmai,$loaiDV,$donviDV,$X,$Y,$khanang,$rank,$sonha);
			echo "<br>rs in update=".$rs;
		}
		else
		{
			
			$rs=DichVuBUS::Add($tieude,$mota,$chusohuu,$phuong,$quan,$tinh,$time,$timeupdate,$duong,$dai,$rong,$tang,$phongngu,$phongtam,$giaban,$donvitien,$status,$thoihandangtin,$loainha,$phaply,$huongnha,$khuyenmai,$loaiDV,$donviDV,$X,$Y,$khanang,$rank,$sonha);
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
			include_once("../../../BUS/DichVu_TienIchBUS.php");
			$dv_tienich = DichVu_TienIchBUS::getAllByIDDichVu($_GET['update']);
			for($i=0;$i<count($dv_tienich);$i++)
			{
				DichVu_TienIchBUS::Delete($dv_tienich[0]);
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
				header("Location:".$url."&newid=".$rs);
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
	}
	if (isset($_GET["action"]))
	{
		$action = $_GET["action"];
		switch ($action)
		{
			case "delete":
				$uid = explode(',', $_GET["uid"]);
				for ($i=0;$i<count($uid);$i++)
					DichVuBUS::delete($uid[$i]);
				break;
			case "noibat1":
				include ("../../../BUS/TinDangBUS.php");
				$aid = $_GET["idtin"];
				TinDangBUS::setTinDangNoiBat($aid, 1);
				break;
			case "noibat0":
				include ("../../../BUS/TinDangBUS.php");
				$aid = $_GET["idtin"];
				TinDangBUS::setTinDangNoiBat($aid, 0);
				break;
			case "status":
				include ("../../../BUS/TinDangBUS.php");
				include ("../../../BUS/DichVuVIPBUS.php");
				$aid = $_GET["aid"];
				$status = $_GET["status"];
				TinDangBUS::setStatusTinDang($aid, $status);
				if ($status == 2)
					DichVuVIPBUS::SetStatusTinVIP($aid, 1);
				break;
		}
		$tukhoa = isset($_REQUEST["tukhoa"])?$_REQUEST["tukhoa"]:-1;
		$loaidv = isset($_REQUEST["loaidv"])?$_REQUEST["loaidv"]:-1;
		$loainha = isset($_REQUEST["loainha"])?$_REQUEST["loainha"]:-1;
		$tinh = isset($_REQUEST["tinh"])?$_REQUEST["tinh"]:-1;
		$type = isset($_REQUEST["type"])?(int)$_REQUEST["type"]:-2;
		
		$aid = isset($_REQUEST["idtin"])?$_REQUEST["idtin"]:-1;
		
		$url = "index.php?view=article";
		
		if ($tukhoa != -1)
			$url .= "&tukhoa=".$tukhoa;
		if ($loaidv != -1)
			$url .= "&loaidv=".$loaidv;
		if ($loainha != -1)
			$url .= "&loainha=".$loainha;
		if ($tinh != -1)
			$url .= "&tinh=".$tinh;
		if ($type != -2)
			$url .= "&type=".$type;
		if ($aid != -1)
			$url .= "&do=edit&aid=".$aid;

		header("Location:../../".$url);
	}
?>