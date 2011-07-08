<?php 
	include_once("DataProvider.php");
?>
<?php

/**
 * @author panda
 * @copyright 2011
 */

class DonviTienDAO{
	public static function selectId($id)
    {
        $strSQL = "select * from donvitien where id='$id'";
         $result = DataProvider::Query($strSQL);
         if(mysql_num_rows($result)==0)
            return null;
         return mysql_fetch_row($result,MYSQL_BOTH);
    }
	public static function GetAllDonViTien()
    {
        $strSQL = "select * from donvitien";
        $result = DataProvider::Query($strSQL);
		if(mysql_num_rows($result)==0)
			 return null;
		while($row = mysql_fetch_row($result,MYSQL_BOTH))
			$temp[]= $row;
		return $temp;
    }
}

?>