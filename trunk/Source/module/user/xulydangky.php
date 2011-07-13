<?php
		if(isset($_POST["btnGuiTin"]))
		{
			 include_once("../../BUS/LienHeBUS.php");
			
			 $txtNoiDung = $_POST["txtNoiDung"];
			 $txtDienThoai = $_POST["txtDienThoai"];
			 $txtHoTen = $_POST["txtHoTen"];
			 $txtEmail = $_POST["txtEmail"];
			 $txtDiaChi = $_POST["txtDiaChi"];
			 $date = date('Y-m-d');
			 $status =0;
			 $process = LienHeBUS::Add($txtHoTen,$txtDienThoai,$txtEmail,$txtDiaChi,$txtNoiDung,$date,$status);
			 if($process != false)
			 {
				header("Location:../lienhe.php?send=success");
			 }
			 else
				header("Location:../lienhe.php?send=failed");
		}
		if(isset($_POST["btnNangVip"]) && isset($_GET['iddv']))
		{
			 include_once("../../BUS/DichVuVIPBUS.php");
			 $iddv= $_GET['iddv'];
			 $txtNoiDung = $_POST["txtNoiDung"];
			 $cbbMonth =((int) $_POST["cbbMonth"])*30;
			 $time_send   = date('Y-m-d');
			 $time_update = date('Y-m-d');
			 $status =0;
			 echo "<br>ngayupdate=".$time_update;
			 $process = DichVuVIPBUS::Add($iddv, $txtNoiDung, $time_send,$time_update,$cbbMonth,$status);
			 if($process != false)
			 {
				header("Location:../nangcaptinvip.php?iddv=".$iddv."&send=success");
			 }
			 else
				header("Location:../nangcaptinvip.php?iddv=".$iddv."&send=failed");
		}
		if(isset($_POST["btnChangeInfoUser"]))
		{
			 include ("../../BUS/UsersBUS.php");
			 $id = $_GET["id"];
			 $username = $_POST["txtUsername"];
			 $address =  $_POST["txtAddress"];
			 $dt1 = $_POST["txtTelephoneNumber"];
			 if(isset($_POST["txtMobileNumber"]))
				$dt2 = $_POST["txtMobileNumber"];
			else
			    $dt2 ="";
			 $time = date('Y-m-d');
			 $radio_gender = $_POST['gender'];
			 echo "<br>radio=".$radio_gender;
			 $rsUpdate=UsersBUS::UpdateInfor($id,$username,$radio_gender,$address,$dt1,$dt2,$time);
			 if($rsUpdate == true)
				header("Location:../thongtinkhachhang.php?update=success");
			else
			    header("Location:../thongtinkhachhang.php?update=failed");
		}
		if(isset($_POST["btRegister"]))
		{
			 include ("../../BUS/UsersBUS.php");				 
			$password = $_POST["txtPassword"];
			$username = $_POST["txtUsername"];
			$dt1 = $_POST["txtPhone"];
			$dt2 = $_POST["txtMobile"];
			$email = $_POST["txtEmail"];
			$address = $_POST["txtAddress"];
			$gender = $_POST["gender"];
			
			$fRegister="false";
			$time = date('Y-m-d');
			$ip="192.168.1.22";
			
			$id = UsersBUS::Add($password,$email,$username,$gender,$address,$dt1,$dt2,2,4,0,$time,$ip);
			if(!empty ($id))
			{	
				$fRegister="true";
				header("Location:../dichvu.php?do=login");
			}
			else
			{
				header("Location:../dangky.php?do=failed");
			}
			
		}	
?>