<?php 
		include_once("DataProvider.php");
?>
 
 <?php
class GioiThieuDAO
{
	public static function getGioiThieu()
	{
		$strSQL = "select * from gioithieu";
		$result = DataProvider::Query($strSQL);
		if(mysql_num_rows($result)==0)
			return null;
		while($row = mysql_fetch_row($result))
			$temp[]= $row;
		return $temp;
	}
	

	public static function selectID($id)
	{
		$strSQL = "select * from gioithieu where id='$id'";
        $result = DataProvider::Query($strSQL);
         if(mysql_num_rows($result)==0)
				return null;
         $row=mysql_fetch_row($result,MYSQL_BOTH);
         return $row;
	}
	
	
}
?>