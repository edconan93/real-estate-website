<?php /*
Lớp TienIchBUS

*/ ?>
<?php 
	include_once (str_replace("//","/",dirname(__FILE__)."/")  . "../DAO/TienIchDAO.php");
?>
<?php 
	class TienIchBUS
	{

		public static function GetAllTienIch ()
		{
			return TienIchDAO::GetAllTienIch ();
		}
		public static function GetAllTienIchById ($id)
		{
			return TienIchDAO::GetAllTienIchById ($id);
		}
		
	}
?>