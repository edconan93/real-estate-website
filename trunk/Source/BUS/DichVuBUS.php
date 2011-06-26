<?php 
	include_once (str_replace("//","/",dirname(__FILE__)."/")  . "../DAO/DichVuDAO.php");
?>
<?php

/**
 * @author panda
 * @copyright 2011
 */

class DichVuBUS
{
    public static function getAll($offset,$numrow)
    {
        return DichVuDAO::getAll($offset,$numrow);
    }
    public static function countAll()
    {
        return DichVuDAO::countAll();
    }
    public static function find($sql)
    {
        return DichVuDAO::find($sql);
    }
    public static function getALLDichVuByLoai($idLoai,$offset,$numrow)
    {
        return DichVuDAO::getDichVuByLoai($idLoai,$offset,$numrow);
    }
    public static function countAllDichVuByLoai($idLoai)
    {
        return DichVuDAO::countAllDichVuByLoai($idLoai);
    }
}

?>