<?php 
	include_once("DataProvider.php");
?>
<?php

class HinhAnhDAO
{
    public static function insert($path,$iddichvu)
    {
         $strSQL = "Insert into hinhanh values(NULL,'$path','$iddichvu')";
         $cn = DataProvider::Open ();
		DataProvider::MoreQuery ($strSQL,$cn);
		
		if(mysql_affected_rows () == 0)
			$result=false;
		else
			$result=mysql_insert_id ();
			
		DataProvider::Close ($cn);
		return $result;
		
    }
    public static function getHinhAnhByDichVu($idDichVu)
    {
        $strSQL = "select * from hinhanh where iddichvu=$idDichVu";
         $result = DataProvider::Query($strSQL);
         if(mysql_num_rows($result) == 0)
				return null;
         while($row= mysql_fetch_row($result,MYSQL_BOTH))
            $return[]=$row;
         return $return;
    }
}

?>