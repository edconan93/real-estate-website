<?php
	include ("../../../BUS/QuangCaoBUS.php");
	
	if (isset($_POST["action"]))
	{
		$action = $_POST["action"];
		switch ($action)
		{
			case "add":
				$chusohuu = $_POST["txtChuSoHuu"];
				$sdt = $_POST["txtSDT"];
				$email = $_POST["txtEmail"];
				$diachi = $_POST["txtDiaChi"];
				$ngaydang = date('Y-m-d');
				$sothang = $_POST["txtThang"];
				$hinhanh = $_POST["fupQuangCao"];
				$link = $_POST["txtLink"];
				$status = 1;
				//upload banner
				
				QuangCaoBUS::Add($chusohuu, $sdt, $email, $diachi, $ngaydang, $sothang, $hinhanh, $link, $status);
				break;
		}

		header("Location:../../index.php?view=advertisement");
	}
?>