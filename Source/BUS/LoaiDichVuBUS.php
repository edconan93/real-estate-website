<?php 
	include_once (str_replace("//","/",dirname(__FILE__)."/")  . "../DAO/LoaiDichVuDAO.php");
?>
<?php

/**
 * @author panda
 * @copyright 2011
 */

class LoaiDichVuBUS
{
     public static function getById($id)
     {
        return LoaiDichVuDAO::getById($id);
     } 
}
?>