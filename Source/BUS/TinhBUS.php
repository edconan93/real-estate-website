<?php 
	include_once (str_replace("//","/",dirname(__FILE__)."/")  . "../DAO/TinhDAO.php");

	class TinhBUS
	{
		public static function GetAllTinh()
		{
			return TinhDAO::GetAllTinh();
		}
		public static function getTinhById($tinh)
        {
            return TinhDAO::getTinhById($tinh);
        }
	}
?>