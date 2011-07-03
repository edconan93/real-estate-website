<?php /*
Lớp PhuongBUS

*/ ?>
<?php 
	include_once (str_replace("//","/",dirname(__FILE__)."/")  . "../DAO/PhuongDAO.php");
?>
<?php 
	class PhuongBUS
	{

		public static function GetAllPhuong ()
		{
			return PhuongDAO::GetAllPhuong ();
		}
		public static function GetAllPhuongById ($id)
		{
			return PhuongDAO::GetAllPhuongById ($id);
		}
		public static function getPhuongById($id)
        {
            return PhuongDAO::getPhuongById($id);
        }
	}
?>