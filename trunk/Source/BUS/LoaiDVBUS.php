<?php 
	include_once (str_replace("//","/",dirname(__FILE__)."/")  . "../DAO/LoaiDVDAO.php");

	class LoaiDVBUS
	{
		public static function GetLoaiDVByID($id)
		{
			return LoaiDVDAO::GetLoaiDVByID($id);
		}
	}
?>