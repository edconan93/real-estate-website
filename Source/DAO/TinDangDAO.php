<?php 
	include_once("DataProvider.php");

	class TinDangDAO
	{
		public static function GetAllTinDang()
		{
			$strSQL = "	select * from dichvu
						where status!=-1";
			
			$result = DataProvider::Query($strSQL);
			if (mysql_num_rows($result)==0)
				return null;
			while ($row= mysql_fetch_array ($result,MYSQL_BOTH))
                $return[]=$row;
            return $return;	
		}
	}
?>