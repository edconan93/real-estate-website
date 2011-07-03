<?php
	//xu ly dang nhap
	if(isset($_POST["btnSubmitChangePass"]))
	{   
		include("../../BUS/UsersBUS.php");
		$id=$_POST["idUser"];
		$oldpass=$_POST["txtOldPassword"];
		$newpass=$_POST["txtNewPassword"];
		$repass=$_POST["txtRePassword"];
		
		$result=UsersBus::checkPassword($oldpass);
		echo "<br>result=".$result;
		if($result==null || $newpass != $repass)
		{
			header("Location:../doimatkhau.php?error=error");
		}
		else
		{
			$resultChange=UsersBus::changePassword($id,$newpass);
			if($resultChange == null)
			{
				header("Location:../doimatkhau.php?error=failed");
			}
			else
				header("Location:../doimatkhau.php?do=login");
			
		}  
	}                     
	
?>     