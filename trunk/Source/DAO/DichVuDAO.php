<?php 
	include_once("DataProvider.php");
?>
<?php
class DichVuDAO
{
    //phucnt3
    public static function getAll($offset,$numrow)
    {
         $strSQL = "select * from dichvu limit $offset,$numrow";
         $result = DataProvider::Query($strSQL);
         if(mysql_num_rows($result)==0)
				return null;
         while($row=mysql_fetch_row($result,MYSQL_BOTH))
             $return[]=$row;
         return $return;
    }
    //use to search dichvu
    public static function getAllBySQL($strSQL)
    {
         $result = DataProvider::Query($strSQL);
         if(mysql_num_rows($result)==0)
				return null;
         while($row=mysql_fetch_row($result,MYSQL_BOTH))
             $return[]=$row;
         return $return;
    }
    //phucnt3
    public static function countAllBySQL($strSQL)
    {
        $result = DataProvider::Query($strSQL);
        $resultSet=mysql_fetch_array ($result);
        return $resultSet[0];
    }
    //phucnt3
    public static function countAll()
    {
        $strSQL = "select count(*) from dichvu";
        $result = DataProvider::Query($strSQL);
        $resultSet=mysql_fetch_array ($result);
        return $resultSet[0];
    }
    //phucnt3
    public static function getDichVuByLoai($idLoai,$offset,$numrow)
    {
        $strSQL = "select * from dichvu where loaidv=$idLoai limit $offset,$numrow";
         $result = DataProvider::Query($strSQL);
         if(mysql_num_rows($result)==0)
				return null;
         while($row=mysql_fetch_row($result,MYSQL_BOTH))
             $return[]=$row;
         return $return;
    }
     //phucnt3
    public static function countAllDichVuByLoai($idLoai)
    {
        $strSQL = "select count(*) from dichvu where loaidv=$idLoai";
        $result = DataProvider::Query($strSQL);
        $resultSet=mysql_fetch_array ($result);
        return $resultSet[0];
    }
}

?>