<?php
//echo "first";
		// if(isset($_POST["btRegister"]))
		// {
			include ("../../BUS/DichVuBUS.php");
			include ("../../BUS/DichVu_TienIchBUS.php");
			$tieude = $_POST["txtTieuDeTin"];
			$mota=stripcslashes($_POST["summary"]);
			$chusohuu=(int) $_GET['id'];

			$tinh =(int) $_POST["cbbTinhTP"];
			echo "tinh=".$tinh;
			$quan =(int) $_POST['cbbQuanHuyen'];
			echo "quan="+$quan;
			$phuong =(int) $_POST['cbbPhuongXa'];
			echo "phuong=".$phuong;
			// $quan =(int) $_POST["cbbQuanHuyen"];
			// $tinh =(int) $_POST["cbbTinhTP"];
			$time = date('d-m-Y');
			$timeupdate = date('d-m-Y');
			$duong = $_POST["txtDuongPho"];
			$dai =(float) $_POST["txtDai"];
			$rong =(float) $_POST["txtRong"];
			$tang =(int) $_POST["txtTang"];
			$phongngu =(int) $_POST["txtPhongNgu"];
			$phongtam =(int) $_POST["txtPhongTam"];
			$giaban =(float) $_POST["txtGia"];
			$donvitien =(int) $_POST["cbbDonViTien"];
			$status =(int) "0";//
			$thoihandangtin= (int) "15";
			$loainha = (int)$_POST["cbbBatDongSan"];
			$phaply = (int)$_POST["cbbPhapLy"];
			$huongnha = (int)$_POST["cbbHuongNha"];
			$khuyenmai = $_POST["txtKhuyenMai"];
			$loaiDV = (int)$_POST["txtIDLoaiDV"];
			//echo "id=". $loaiDV;
			$donviDV = (int)$_POST["cbbDonViDichVu"];
			$X = "0";
			$Y = "0";
			DichVuBUS::Add($tieude,$mota,$chusohuu,$phuong,$quan,$tinh,$time,$timeupdate,$duong,$dai,$rong,$tang,$phongngu,$phongtam,$giaban,$donvitien,$status,$thoihandangtin,$loainha,$phaply,$huongnha,$khuyenmai,$loaiDV,$donviDV,$X,$Y);
			// $idcanho = DichVuBUS::GetIDDichVu();
			 
//add dichvu_tienich
			 // $arraycheck = $_POST["cbId"];
			 // echo "so=".count($arraycheck);
			 // for($i=0;$i<count($arraycheck);$i++)
			 // {
				// DichVu_TienIchBUS::Add($idcanho,$i);
			 // }
			 
			// $summary=stripcslashes($_POST["summary"]);
			// echo "sum=".$summary;			
			// $password = $_POST["txtPassword"];
			// $username = $_POST["txtUsername"];
			// $dt1 = $_POST["txtPhone"];
			// $dt2 = $_POST["txtMobile"];
			// $email = $_POST["txtEmail"];
			// $address = $_POST["txtAddress"];
			
			
			
			// $sex = (int) $_POST["lbSex"];
			// $day = (int) $_POST["lbDay"];
			// $month = (int) $_POST["lbMonth"];
			// $year = (int) $_POST["lbYear"];
			// $birthday = sprintf ("%d-%d-%d",$year,$month,$day);
			// $now = date ("Y-m-d H:i:s");
			// $security_question = $_POST["lbSecurityQuestion"];
			// $answer = $_POST["txtAnswer"];
			//$fRegister="false";			
			// $id = UsersBUS::Add($password,$email,$username,null,$address,$dt1,$dt2,4,4,0);
			// echo "id="+ $id;
			// if(!empty ($id))
			// {	
				//User_Personal_InformationBUS::Add($user_id, null, null, null, null, null, null, null);
				//User_Contact_InformationBUS::Add($user_id, null, null, null, null);
				//User_Basic_InformationBUS::Add($user_id, null, null, null, $username, $sex, $birthday);
				//User_StatusBUS::Add($user_id, null, $now,0);
				//AlbumsBUS::Add("Avatar",null,$now,$user_id,null);
				// $fRegister="true";
				// header("Location:../dichvu.php?do=login");
			// }
			// else
			// {
				//header("Location:../dangky.php?do="$fRegister);
			//}
			
			//$leftFile = "modules/home_modules/register_home.php";
		//}	
?>