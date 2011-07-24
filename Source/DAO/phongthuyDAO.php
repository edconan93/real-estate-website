<?php 
		include_once("DataProvider.php");
?>
 
 <?php
class phongthuyDAO
{
	public static function getPhongThuy()
	{
		$strSQL = "select * from phongthuy";
		$result = DataProvider::Query($strSQL);
		if(mysql_num_rows($result)==0)
			return null;
		while($row = mysql_fetch_row($result))
			$temp[]= $row;
		return $temp;
	}
	
	/*public static function getHinhAnh()
	{
		$strSQL = "select * from hinhanh where idconnect=1";
		$result = DataProvider::Query($strSQL);
		if(mysql_num_rows($result)==0)
			return null;
		while($row = mysql_fetch_row($result))
			$temp[]= $row;
		return $temp;
	}
	*/
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