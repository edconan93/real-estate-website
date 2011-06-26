<?php /*
Lớp DonViDichVuBUS

*/ ?>
<?php 
	include_once (str_replace("//","/",dirname(__FILE__)."/")  . "../DAO/DonViDichVuDAO.php");
?>
<?php 
	class DonViDichVuBUS
	{

		public static function GetAllDonViDichVu ()
		{
			return DonViDichVuDAO::GetAllDonViDichVu ();
		}
		
	}
?>