<?php
	//xu ly dang nhap
	if(isset($_POST["btn_Login"]))
	{   
		include("../BUS/UsersBUS.php");
		$user=$_POST["txtUsernameLogin"];
		$pass=$_POST["txtPasswordLogin"];
		$result=UsersBus::Login($user,$pass);
		if($result==null)
			$fLogin=false;
		else
		{
			$_SESSION["curUser"] = $result;
			if ($result["role"] == 1) //admin => log thang vao trang admin.php
			{
				header("Location:../admin/");
			}
			else
			{
				//xet timeout in file php.ini search words: session.gc_maxlifetime
				// $timeout = 600;
				// ini_set('session.gc_maxlifetime', $timeout);
				// echo ini_get("session.gc_maxlifetime");
				$_SESSION["time_start"]=time();
				$_SESSION["flag"]=true;
				header("Location:thanhvien.php?id=".$result['id']);
			}
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