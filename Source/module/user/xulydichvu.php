<?php
//echo "first";
		// if(isset($_POST["btRegister"]))
		// {

			 include ("../../BUS/DichVuBUS.php");
echo "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
			$summary=stripcslashes($_POST["summary"]);
			echo "sum=".$summary;			
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
				//User_Personal_InformationBUS::Add($user_id, null, null, null, null, null, null, null);
				//User_Contact_InformationBUS::Add($user_id, null, null, null, null);
				//User_Basic_InformationBUS::Add($user_id, null, null, null, $username, $sex, $birthday);
				//User_StatusBUS::Add($user_id, null, $now,0);
				//AlbumsBUS::Add("Avatar",null,$now,$user_id,null);
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