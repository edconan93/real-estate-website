<?php
	include ("../../../BUS/UsersBUS.php");
	$action = $_GET["action"];
	switch ($action)
	{
		case "add":
			$password = $_POST["txtPassword"];
			$email = $_POST["txtEmail"];
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
			echo "<br>role=".$role;
			echo "<br>level=".$level;
			echo "<br>";
			$id = UsersBUS::Add($password,$email,$hoten,$gender,$diachi,$sdt1,$sdt2,$role,$level,1,$time,$ip);
			break;
			
		case "lock":
			$uid = explode(',', $_GET["uid"]);
			for ($i=0;$i<count($uid);$i++)
				UsersBUS::SetStatus($uid[$i], 0);
			break;
			
		case "unlock":
			$uid = explode(',', $_GET["uid"]);
			for ($i=0;$i<count($uid);$i++)
				UsersBUS::SetStatus($uid[$i], 1);
			break;
		
		case "delete":
			$uid = explode(',', $_GET["uid"]);
			for ($i=0;$i<count($uid);$i++)
				UsersBUS::Delete($uid[$i]);
			break;
	}
	$status = isset($_REQUEST["status"])?$_REQUEST["status"]:-1;
	$type = isset($_REQUEST["type"])?(int)$_REQUEST["type"]:-1;
	header("Location:../../index.php?view=user&type=".$type."&status=".$status);
?>