<?php /*
Lớp QuanBUS

*/ ?>
<?php 
	include_once (str_replace("//","/",dirname(__FILE__)."/")  . "../DAO/QuanDAO.php");
?>
<?php 
	class QuanBUS
	{

		public static function GetAllQuan ()
		{
			return QuanDAO::GetAllQuan ();
		}
		public static function GetAllQuanById ($id)
		{
			return QuanDAO::GetAllQuanById ($id);
		}
		
	}
?>