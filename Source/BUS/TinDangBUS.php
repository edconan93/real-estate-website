<?php 
	include_once (str_replace("//","/",dirname(__FILE__)."/")  . "../DAO/TinDangDAO.php");

	class TinDangBUS
	{
		public static function GetAllTinByFilter($tukhoa, $loaidv, $loainha, $tinh, $type)
		{
			return TinDangDAO::GetAllTinByFilter($tukhoa, $loaidv, $loainha, $tinh, $type);
		}
		public static function GetAllTinDang()
		{
			return TinDangDAO::GetAllTinDang();
		}
	}
?>