<?php 
include_once (str_replace("//","/",dirname(__FILE__)."/")  . "../DAO/kientrucDAO.php");
require_once("Utils/Utils.php");
include_once (str_replace("//","/",dirname(__FILE__)."/")  . "../DAO/DataProvider.php");
?>
<?php 
class kientrucDAO
{
	public static function getKienTruc()
	{
		$strSQL = "select * from kientruc";
		$result = DataProvider::Query($strSQL);
		if(mysql_num_rows($result)==0)
			return null;
		while($row = mysql_fetch_row($result))
			$temp[]= $row;
		return $temp;
	}
	public static function selectID($id)
	{
		$strSQL = "select * from kientruc where id='$id'";
        $result = DataProvider::Query($strSQL);
         if(mysql_num_rows($result)==0)
				return null;
         $row=mysql_fetch_row($result,MYSQL_BOTH);
         return $row;
	}
	public static function countAllBySQL($strSQL)
    {
        $result = DataProvider::Query($strSQL);
        $resultSet=mysql_fetch_array ($result);
        return $resultSet[0];
    }
	public static function getAllBySQL($strSQL)
    {
         $result = DataProvider::Query($strSQL);
         if(mysql_num_rows($result)==0)
				return null;
         while($row=mysql_fetch_row($result,MYSQL_BOTH))
             $return[]=$row;
         return $return;
    }
}
?>
			