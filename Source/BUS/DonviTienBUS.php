<?php 
	include_once (str_replace("//","/",dirname(__FILE__)."/")  . "../DAO/DonviTienDAO.php");

/**
 * @author panda
 * @copyright 2011
 */

class DonViTienBUS
{
    public static function selectId($id)
    {
        return DonviTienDAO::selectId($id);
    }
	public static function GetAllDonViTien()
    {
        return DonviTienDAO::GetAllDonViTien();
    }
}
?>