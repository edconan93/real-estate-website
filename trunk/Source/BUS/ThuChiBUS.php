<?php 
	include_once (str_replace("//","/",dirname(__FILE__)."/")  . "../DAO/ThuChiDAO.php");
?>
<?php 
	class ThuChiBUS
	{
	   public static function add($sotien,$donvi,$congviec,$ngay,$nhanvien,$loai)
        {
            return ThuChiDAO::Add($sotien,$donvi,$congviec,$ngay,$nhanvien,$loai);
        }
        public static function getAll($offset,$max,$type)
        {
            return ThuChiDAO::getAll($offset,$max,$type);
        }
        public static function count($type)
        {
            return ThuChiDAO::count($type);
        }
    }
 ?>