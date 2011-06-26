<?php 
	include_once("DataProvider.php");
?>
<?php

class HinhAnhDAO
{
    public static function insert($path,$iddichvu)
    {
         $strSQL = "Insert into users values(NULL,$path,$iddichvu)";
         $result = DataProvider::Query($strSQL);
         if(mysql_affected_rows($result)==0)
            return false;
         return true;
    }
    public static function getHinhAnhByDichVu($idDichVu)
    {
        $strSQL = "select * from hinhanh where iddichvu=$idDichVu";
         $result = DataProvider::Query($strSQL);
         if(mysql_num_rows($result)==0)
				return null;
         while($row= mysql_fetch_row($result,MYSQL_BOTH))
            $return[]=$row;
         return $return;
    }
}

?>