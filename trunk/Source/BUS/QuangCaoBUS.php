<?php 
	include_once (str_replace("//","/",dirname(__FILE__)."/")  . "../DAO/QuangCaoDAO.php");

	class QuangCaoBUS
	{
		public static function Add($chusohuu, $sdt, $email, $diachi, $ngaydang, $sothang, $hinhanh, $link, $status)
		{
			return QuangCaoDAO::Add($chusohuu, $sdt, $email, $diachi, $ngaydang, $sothang, $hinhanh, $link, $status);
		}
		public static function GetAdvByType($status)
		{
			return QuangCaoDAO::GetAdvByType($status);
		}
		public static function setStatusQuangCao($id, $status)
		{
			return QuangCaoDAO::setStatusQuangCao($id, $status);
		}
		public static function delete($id)
		{
			return QuangCaoDAO::delete($id);
		}
	}
?>