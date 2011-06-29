<?php 
	include_once (str_replace("//","/",dirname(__FILE__)."/")  . "../DAO/DichVu_TienIchDAO.php");
?>
<?php

/**
 * @author panda
 * @copyright 2011
 */

class DichVu_TienIchBUS
{
    public static function Add($idcanho,$idtienich)
    {
        return DichVu_TienIchDAO::Add($idcanho,$idtienich);
    }
   
}

?>