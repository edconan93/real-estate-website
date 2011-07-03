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
		public static function GetAllQuanById ($id)//$id of tinh
		{
			return QuanDAO::GetAllQuanById ($id);
		}
		public static function getQuanById($id)
        {
            return QuanDAO::getQuanById($id);
        }
	}
?>