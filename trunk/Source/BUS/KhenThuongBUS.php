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
    public static function update($iduser,$loai,$khenthuong,$nam)
    {
		if(KhenThuongDAO::selectByIdUser($iduser)==null)
			return KhenThuongDAO::insert($iduser,$loai,$khenthuong,$nam);
        return KhenThuongDAO::update($iduser,$loai,$khenthuong,$nam);
    }
    public static function select($offset,$max)
    {
        return KhenThuongDAO::select($offset,$max);
    }
    public static function selectByIdSQL($strSQL)
	{
	   return KhenThuongDAO::selectByIdSQL($strSQL);
    }
    public static function count()
    {
        return KhenThuongDAO::count();
    }
    public static function countBySQL($strSQL)
    {
        return KhenThuongDAO::countBySQL($strSQL);
    }
	public static function selectByIdUser($iduser)
	{
		return KhenThuongDAO::selectByIdUser(iduser);
	}
    public static function selectByUserLevel($offset,$max,$level)
    {
        return KhenThuongDAO::selectByUserLevel($offset,$max,$level);
    }
    public static function countByUserLevel($level)
    {
        return KhenThuongDAO::countByUserLevel($level);
    }
}
?>