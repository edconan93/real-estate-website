<?php
//echo "first";
		// if(isset($_POST["btRegister"]))
		// {

			 include ("../../BUS/UsersBUS.php");

						
			$password = $_POST["txtPassword"];
			//$repassword = $_POST["txtRePassword"];
			$username = $_POST["txtUsername"];
			$dt1 = $_POST["txtPhone"];
			$dt2 = $_POST["txtMobile"];
			$email = $_POST["txtEmail"];
			$address = $_POST["txtAddress"];
			
			// $sex = (int) $_POST["lbSex"];
			// $day = (int) $_POST["lbDay"];
			// $month = (int) $_POST["lbMonth"];
			// $year = (int) $_POST["lbYear"];
			// $birthday = sprintf ("%d-%d-%d",$year,$month,$day);
			// $now = date ("Y-m-d H:i:s");
			// $security_question = $_POST["lbSecurityQuestion"];
			// $answer = $_POST["txtAnswer"];
			$fRegister="false";
			
			$id = UsersBUS::Add($password,$email,$username,null,$address,$dt1,$dt2,4,4,0);
			echo "id="+ $id;
			if(!empty ($id))
			{	
				$fRegister="true";
				header("Location:../dichvu.php?do=login");
			}
			else
			{
				//header("Location:../dangky.php?do="$fRegister);
			}
			
			//$leftFile = "modules/home_modules/register_home.php";
		//}	
?>