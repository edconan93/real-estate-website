<?php
	//xu ly dang nhap
	if(isset($_POST["btnSubmitChangePass"]))
	{   
		include("../../BUS/UsersBUS.php");
		$id=$_POST["idUser"];
		$oldpass=$_POST["txtOldPassword"];
		$newpass=$_POST["txtNewPassword"];
		$repass=$_POST["txtRePassword"];
		//header("Location:../dichvu.php?do=login");
		$result=UsersBus::checkPassword($oldpass);
		// echo "<br>result=".$result;
		if($result==null || $newpass != $repass)
		{
			header("Location:../doimatkhau.php?error=error");
		}
		else
		{
			$resultChange=UsersBus::SetPassword($id,$newpass);
			echo "<br>resultChange=".$resultChange;
			if($resultChange == false)
			{
				header("Location:../doimatkhau.php?error=failed");
			}
			else
				header("Location:../doimatkhau.php?do=login");
			
		}  
	}                     
	
?>     