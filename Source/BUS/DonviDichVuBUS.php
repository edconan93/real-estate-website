<?php 
	include_once (str_replace("//","/",dirname(__FILE__)."/")  . "../DAO/DonviDichVuDAO.php");
?>
<?php

/**
 * @author panda
 * @copyright 2011
 */

class DonViDichVuBUS
{
    public static function selectId($id)
    {
        return DonviDichVuDAO::selectId($id);
    }
	public static function GetAllDonViDichVu()
    {
        return DonviDichVuDAO::GetAllDonViDichVu();
    }
}

?>