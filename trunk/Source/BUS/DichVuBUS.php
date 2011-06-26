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
}

?>