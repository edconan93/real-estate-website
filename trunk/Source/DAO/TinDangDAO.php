<?php 
	include_once("DataProvider.php");

	class TinDangDAO
	{
		public static function GetAllTin()
		{
			$strSQL = "	select * 
						from dichvu";
			$result = DataProvider::Query($strSQL);
			if (mysql_num_rows($result)==0)
				return null;
			while ($row= mysql_fetch_array ($result,MYSQL_BOTH))
                $return[]=$row;
            return $return;	
		}
	}
?>