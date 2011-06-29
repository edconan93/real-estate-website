<?php
	//xu ly dang nhap
	if(isset($_POST["btn_Login"]))
	{   
		include("../BUS/UsersBUS.php");
		$user=$_POST["txtUsernameLogin"];
		$pass=$_POST["txtPasswordLogin"];
		//echo $user;
		//echo $pass;
		$result=UsersBus::Login($user,$pass);
		if($result==null)
			$fLogin=false;
		else
		{
			$_SESSION["curUser"] = $result;
			//echo $resultl["role"];
			if ($resultl["role"] == 1) //admin => log thang vao trang admin.php
				header("Location:../admin/");
			else
				header("Location:thanhvien.php?id=".$result['id']);
		}  
	}                     
	if(isset($fLogin)&&$fLogin==false)
	{                            
		echo "<script language='javascript' type='text/javascript'>";
		echo "document.getElementById('messRegister').innerHTML='Bạn đã nhập sai tên hoặc mật khẩu';";
		echo "document.getElementById('messRegister').style.color='blue';";
		echo "document.getElementById('popup').style.visibility = 'visible';";
		echo "</script>";
	}
?>       