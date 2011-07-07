<?php 
	include_once (str_replace("//","/",dirname(__FILE__)."/")  . "../DAO/ThuChiDAO.php");
?>
<?php 
	class ThuChiBUS
	{
	   public static function add($sotien,$donvi,$congviec,$ngay,$nhanvien,$loai)
        {
            $email = addslashes($email);
            return ThuChiDAO::Add($sotien,$donvi,$congviec,$ngay,$nhanvien,$loai);
        }
        public static function getAll($offset,$max)
        {
            return ThuChiDAO::getAll($offset,$max);
        }
    }
 ?>