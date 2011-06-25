<?php /*
Lớp TinhBUS

*/ ?>
<?php 
	include_once (str_replace("//","/",dirname(__FILE__)."/")  . "../DAO/TinhDAO.php");
?>
<?php 
	class TinhBUS
	{

		public static function GetAllTinh ()
		{
			return TinhDAO::GetAllTinh ();
		}
		
	}
?>