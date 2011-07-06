<?php 
	include_once (str_replace("//","/",dirname(__FILE__)."/")  . "../DAO/LevelDAO.php");

	class LevelBUS
	{
		public static function GetLevelByID ($id)
		{
			return LevelDAO::GetLevelByID ($id);
		}
		public static function GetLevelByNhanVien()
		{
			return LevelDAO::GetLevelByNhanVien();
		}
	}
?>