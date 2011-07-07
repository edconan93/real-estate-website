<?php 
	include_once (str_replace("//","/",dirname(__FILE__)."/")  . "../DAO/TinDangDAO.php");

	class TinDangBUS
	{
		public static function GetAllTinByType($type)
		{
			return TinDangDAO::GetAllTinByType($type);
		}
	}
?>