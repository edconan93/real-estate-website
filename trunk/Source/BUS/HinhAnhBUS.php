<?php 
	include_once (str_replace("//","/",dirname(__FILE__)."/")  . "../DAO/HinhAnhDAO.php");
?>
<?php

/**
 * @author panda
 * @copyright 2011
 */
class HinhAnhBUS
{
    public static function insert($path,$dichvu)
    {
        return HinhAnhDAO::insert($path,$dichvu);
    }
    public static function getAllHinhAnhByDichVu($dichvu)
    {
        return HinhAnhDAO::getHinhAnhByDichVu($dichvu);
    }
	public static function Delete($id)
	{
		return HinhAnhDAO::Delete($id);
	}
	public static function getAllHinhAnhByDichVuID ($iddichvu)
	{
		return HinhAnhDAO::getAllHinhAnhByDichVuID ($iddichvu);
	}
}


?>