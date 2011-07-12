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
		public static function setTinDangNoiBat($aid, $value)
		{
			return TinDangDAO::setTinDangNoiBat($aid, $value);
		}
		public static function setStatusTinDang($aid, $status)
		{
			return TinDangDAO::setStatusTinDang($aid, $status);
		}
	}
?>