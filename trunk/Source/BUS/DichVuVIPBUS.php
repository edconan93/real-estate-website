<?php 
	include_once (str_replace("//","/",dirname(__FILE__)."/")  . "../DAO/DichVuVIPDAO.php");

	class DichVuVIPBUS
	{
		public static function Add($iddichvu, $noidung, $ngayguitin, $ngaynangcap, $thoihan, $status)
		{
			return DichVuVIPDAO::Add ($iddichvu, $noidung, $ngayguitin, $ngaynangcap, $thoihan, $status);
		}
		public static function Update($id,$iddichvu, $noidung, $ngayguitin, $ngaynangcap, $thoihan, $status)
		{
			return DichVuVIPDAO::Update ($id,$iddichvu, $noidung, $ngayguitin, $ngaynangcap, $thoihan, $status);
		}
		public static function GetTinVipById($id)
		{
			return DichVuVIPDAO::GetTinVipById($id);
		}
		public static function SetStatusTinVIP($iddv, $value)
		{
			return DichVuVIPDAO::SetStatusTinVIP($iddv, $value);
		}
	}
?>