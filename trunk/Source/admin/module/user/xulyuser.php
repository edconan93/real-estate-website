<?php
	$action = $_GET["action"];
	switch ($action)
	{
		case "add":
			include ("../../../BUS/UsersBUS.php");
			$password = $_POST["txtPassword"];
			$email = $_POST["txtUsername"];
			$hoten = $_POST["txtHoten"];
			$gender = $_POST["gender"];
			$diachi = $_POST["txtDiaChi"];
			$sdt1 = $_POST["sdt1"];
			$sdt2 = "";
			if (isset($_POST["sdt2"]))
				$sdt2 = $_POST["sdt2"];
			$role = $_POST["role"];
			$level = $_POST["level"];
			if ($role != 3)
				$level = 5;
			$status = 1;
			$time = date('Y-m-d');
			$ip = "";
			
			$id = UsersBUS::Add($password,$email,$hoten,$gender,$diachi,$sdt1,$sdt2,$role,$level,1,$time,$ip);
			if(!empty($id))
			{	
				header("Location:../../index.php?view=user");
			}
			else
			{
				//header("Location:../dangky.php?do="$fRegister);
			}
			break;
	}
?>