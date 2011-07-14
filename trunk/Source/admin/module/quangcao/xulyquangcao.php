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
				$link = $_POST["txtLink"];
				$status = 1;
				//upload banner
				$flag = true;
				if($_FILES["fileUpQuangCao"]["error"] > 0)
					$flag = false;
				if($flag && $_FILES["fileUpQuangCao"]["size"] == 0 || $_FILES["fileUpQuangCao"]["size"] > 1024 * 1024)
					$flag = false;
				if($flag)
				{	
					echo "<br> file uploaded not failed";
					$arrType = explode ("/",$_FILES["fileUpQuangCao"]["type"]);
					echo "<br>array=".$arrType[0];
					echo "<br>array=".$arrType[1];
					
					if($arrType[0]!="image" || $arrType[0]!="application" )
					{
						$flagInsert = false;
						$flag = false;
					}
					//$PATH_BASE = str_replace("//","/",dirname(__FILE__)."/");
					$PATH_BASE = str_replace("//","/",dirname(__FILE__)."/");
					$path = $PATH_BASE . "../../upload";
					$random = rand (1,1000000);		
					$filename=$random.$_FILES["fileUpQuangCao"]["name"];
					if(!is_dir("$path"))
					{
						mkdir("$path");
					}
					if(!is_dir("$path/quangcao"))
						mkdir("$path/quangcao");
				    $path = "$path/quangcao/";
					
					move_uploaded_file($_FILES["fileUpQuangCao"]["tmp_name"],$path.$random.$_FILES["fileUpQuangCao"]["name"]);
					$kq=QuangCaoBUS::Add($chusohuu, $sdt, $email, $diachi, $ngaydang, $sothang, $hinhanh, $link, $status);
					if($kq == false)
					{
						$flagInsert = false;
						echo "<br>Insert image = false";
					}
					else
						echo "upload picture finish!";

				}
				//end processor banner
			//	QuangCaoBUS::Add($chusohuu, $sdt, $email, $diachi, $ngaydang, $sothang, $hinhanh, $link, $status);
				break;
			    header("Location:../../index.php?view=advertisement&add=success");
		}
	}
?>