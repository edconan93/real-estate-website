<?php /*
Lớp LienHeBUS
	
*/ ?>
<?php 
	include_once (str_replace("//","/",dirname(__FILE__)."/")  . "../DAO/LienHeDAO.php");
?>
<?php 
	class LienHeBUS
	{
		public static function Add($hoten,$sdt,$email,$diachi, $noidung, $ngayguitin, $status)
		{
			
			return LienHeDAO::Add ($hoten,$sdt,$email,$diachi, $noidung, $ngayguitin, $status);
		}
		
		public static function Update($id,$hoten,$sdt,$email,$diachi, $noidung, $ngayguitin, $status)
		{	
			return LienHeDAO::Update ($id,$hoten,$sdt,$email,$diachi, $noidung, $ngayguitin, $status);
		}
		
	
		
		
		
		
		
	}
?>