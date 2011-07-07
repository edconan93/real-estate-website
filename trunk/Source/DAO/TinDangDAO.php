<?php 
	include_once("DataProvider.php");

	class TinDangDAO
	{
		public static function GetAllTinByType($type)
		{
			$strSQL = "";
			if ($type != -2)
				$strSQL = "	select * 
							from dichvu
							where status=$type and status!=-1";
			else
				$strSQL = "	select * 
							from dichvu
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