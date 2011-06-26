<?php /*
Lớp DonViTienBUS

*/ ?>
<?php 
	include_once (str_replace("//","/",dirname(__FILE__)."/")  . "../DAO/DonViTienDAO.php");
?>
<?php 
	class DonViTienBUS
	{

		public static function GetAllDonViTien ()
		{
			return DonViTienDAO::GetAllDonViTien ();
		}
		
	}
?>