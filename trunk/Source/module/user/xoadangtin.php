<?php 
	if(isset($_REQUEST["idtin"]) && $_REQUEST["idtin"] !=null)
	{
		$PATH_BASE = str_replace('//','/',dirname(__FILE__).'/');
		include_once ($PATH_BASE . '../../BUS/DichVuBUS.php');
		$user = DichVuBUS::UpdateStatus($_REQUEST["idtin"],-1);
		if($user == true)
		{
			echo"abc";
		}
	}
	
?>