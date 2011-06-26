<?php /*
Lớp LoaiNhaBUS

*/ ?>
<?php 
	include_once (str_replace("//","/",dirname(__FILE__)."/")  . "../DAO/LoaiNhaDAO.php");
?>
<?php 
	class LoaiNhaBUS
	{

		public static function GetAllLoaiNha ()
		{
			return LoaiNhaDAO::GetAllLoaiNha ();
		}
		
	}
?>