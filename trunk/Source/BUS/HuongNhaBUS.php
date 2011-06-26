<?php /*
Lớp HuongNhaBUS

*/ ?>
<?php 
	include_once (str_replace("//","/",dirname(__FILE__)."/")  . "../DAO/HuongNhaDAO.php");
?>
<?php 
	class HuongNhaBUS
	{

		public static function GetAllHuongNha ()
		{
			return HuongNhaDAO::GetAllHuongNha ();
		}
		
	}
?>