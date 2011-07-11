<?php 
	include_once (str_replace("//","/",dirname(__FILE__)."/")  . "../DAO/KhenThuongDAO.php");
?>
<?php
class KhenThuongBUS
{
    public static function insert($iduser,$loai,$khenthuong,$nam)
    {
        return KhenThuongDAO::insert($iduser,$loai,$khenthuong,$nam);
    }
    public static function update($id,$iduser,$loai,$khenthuong,$nam)
    {
        return KhenThuongDAO::update($id,$iduser,$loai,$khenthuong,$nam);
    }
    public static function select($offset,$max)
    {
        return KhenThuongDAO::select($offset,$max);
    }
    public static function count()
    {
        return KhenThuongDAO::count();
    }
}
?>