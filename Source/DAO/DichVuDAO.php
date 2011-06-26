<?php 
	include_once("DataProvider.php");
?>
<?php
class DichVuDAO
{
    public static function getAll($offset,$numrow)
    {
         $strSQL = "select * from dichvu limit $offset,$numrow";
         $result = DataProvider::Query($strSQL);
         if(mysql_num_rows($result)==0)
				return null;
         while($row=mysql_fetch_row($result))
             $return[]=$row;
         return $return;
    }
}

?>