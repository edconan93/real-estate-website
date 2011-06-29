<?php
		
	include ("../../BUS/DichVuBUS.php");
	include ("../../BUS/DichVu_TienIchBUS.php");
	$tieude = $_POST["txtTieuDeTin"];
	echo "<br>tieude=".$tieude;
	$mota=stripcslashes($_POST["summary"]);
	echo "<br>mota=".$mota;
	$chusohuu=(int) $_GET['id'];
	echo "<br>chusohuu=".$chusohuu;
	 
	$tinh =(int) $_POST["cbbTinhTP"];
	echo "<br>tinh=".$tinh;
	$quan =(int) $_POST["cbbQuanHuyen"];
	echo "<br>quan=".$quan;
	$phuong= (int) $_POST["cbbPhuongXa"];
	echo "<br>phuong=".$phuong;
	$time = date('d-m-Y');
	echo "<br>time=".$time;
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
	$status =(int) "0";//
	$thoihandangtin= (int) "15";
	$loainha = (int)$_POST["cbbBatDongSan"];
	echo "<br>loainha=".$loainha;
	$phaply = (int)$_POST["cbbPhapLy"];
	echo "<br>phaply=".$phaply;
	$huongnha = (int)$_POST["cbbHuongNha"];
	echo "<br>huongnha=".$huongnha;
	$khuyenmai = $_POST["txtKhuyenMai"];
	echo "<br>khuyenmai=".$khuyenmai;
	$loaiDV = (int)$_POST["txtIDLoaiDV"];
	echo "<br>loaiDV=".$loaiDV;
	//echo "id=". $loaiDV;
	$donviDV = (int)$_POST["cbbDonViDichVu"];
	echo "<br>donviDV=".$donviDV;
	$X = "0";
	$Y = "0";
	if(isset($_POST["cbId"]))
	{
		$arraycheck = $_POST["cbId"];
		 echo "<br>so=".count($arraycheck);
		 for($i=0;$i<count($arraycheck);$i++)
		 {
				//DichVu_TienIchBUS::Add($idcanho,$i);
				echo "<br>so=".$arraycheck[$i];
		 }
	}
	//DichVuBUS::Add($tieude,$mota,$chusohuu,$phuong,$quan,$tinh,$time,$timeupdate,$duong,$dai,$rong,$tang,$phongngu,$phongtam,$giaban,$donvitien,$status,$thoihandangtin,$loainha,$phaply,$huongnha,$khuyenmai,$loaiDV,$donviDV,$X,$Y);
    // $idcanho = DichVuBUS::GetIDDichVu();

	
			
?>