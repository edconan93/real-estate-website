<?php 
	include_once (str_replace("//","/",dirname(__FILE__)."/")  . "../DAO/TinDangDAO.php");

	class TinDangBUS
	{
		public static function GetAllTin()
		{
			return TinDangDAO::GetAllTin();
		}
	}
?>