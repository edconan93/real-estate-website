<?php 
	$txtEmail = $_REQUEST["txtEmail"];
	if(!empty($txtEmail))
	{
		$PATH_BASE = str_replace('//','/',dirname(__FILE__).'/');
		//echo $PATH_BASE;
		include_once ($PATH_BASE . '../../BUS/UsersBUS.php');
		$user = UsersBUS::GetUserByEmail($txtEmail);
		if(empty($user))
		{
			echo "<img src='../../images/user/valid.png' alt='Hợp lệ' title='Hợp lệ' width=20 height=20>";
		}
		else
		{
		echo "aaaaaa";
			//echo "<img src='../../images/user/incorrect.png' alt='Đã được sử dụng' title='Đã được sử dụng' width=20 height=20>";
			//echo "<span style='position:relative;top:-6px;color:red;'> Email đã được sử dụng</span>";
			//echo "<input type='hidden' id='hdEmailError' value='true' />";
		}
	}
?>