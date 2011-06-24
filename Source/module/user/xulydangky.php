<?php
		if(isset($_POST["btRegister"]))
		{
			// include ("BUS/UsersBUS.php");
			// include ("BUS/User_Personal_InformationBUS.php");
			// include ("BUS/User_Contact_InformationBUS.php");
			// include ("BUS/User_Basic_InformationBUS.php");
			// include ("BUS/User_StatusBUS.php");
			// include ("BUS/AlbumsBUS.php");
			// include ("BUS/PicturesBUS.php");
			$username = $_POST["txtUsername"];
			$email = $_POST["txtEmail"];
			$password = $_POST["txtPassword"];
			$repassword = $_POST["txtRePassword"];
			$sex = (int) $_POST["lbSex"];
			$day = (int) $_POST["lbDay"];
			$month = (int) $_POST["lbMonth"];
			$year = (int) $_POST["lbYear"];
			$birthday = sprintf ("%d-%d-%d",$year,$month,$day);
			$now = date ("Y-m-d H:i:s");
			$security_question = $_POST["lbSecurityQuestion"];
			$answer = $_POST["txtAnswer"];
			$fRegister="false";
			$user_id = UsersBUS::Add($username,$password,$email,null,$now,$security_question,$answer,$now);
			if(!empty ($user_id))
			{	
				User_Personal_InformationBUS::Add($user_id, null, null, null, null, null, null, null);
				User_Contact_InformationBUS::Add($user_id, null, null, null, null);
				User_Basic_InformationBUS::Add($user_id, null, null, null, $username, $sex, $birthday);
				User_StatusBUS::Add($user_id, null, $now,0);
				AlbumsBUS::Add("Avatar",null,$now,$user_id,null);
				$fRegister="true";
				header("Location:blog.php?id=$user_id");
			}
			
			$leftFile = "modules/home_modules/register_home.php";
		}	
?>