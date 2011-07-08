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
        public static function SumTongTien($type)
        {
            return ThuChiDAO::SumTongTien($type);
        }
        public static function SumTongTienByMonth($type,$monthFrom,$monthTo,$year)
        {
            return ThuChiDAO::SumTongTienByMonth($type,$monthFrom,$monthTo,$year);
        }
        public static function getAllByMonth($offset,$max,$type,$monthFrom,$monthTo,$year)
        {
            return ThuChiDAO::getAllByMonth($offset,$max,$type,$monthFrom,$monthTo,$year);
        }
        public static function countByMonth($type,$monthFrom,$monthTo,$year)
        {
             return ThuChiDAO::countByMonth($type,$monthFrom,$monthTo,$year);
        }
        public static function delete($id)
        {
            return ThuChiDAO::delete($id);
        }
    }
 ?>