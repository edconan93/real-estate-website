<?php /*
Lớp PhapLyBUS

*/ ?>
<?php 
	include_once (str_replace("//","/",dirname(__FILE__)."/")  . "../DAO/PhapLyDAO.php");
?>
<?php 
	class PhapLyBUS
	{

		public static function GetAllPhapLy ()
		{
			return PhapLyDAO::GetAllPhapLy ();
		}
		public static function GetPhapLyById($id)
		{
			return PhapLyDAO::GetPhapLyById($id);
		}
	}
?>