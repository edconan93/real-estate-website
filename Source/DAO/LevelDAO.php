<?php 
	include_once("DataProvider.php");

	class LevelDAO
	{
		public static function GetLevelByID($id)
		{
			$strSQL = "select * 
					   from level
					   where idlevel='$id'";
			
            $result = DataProvider::Query($strSQL);
			if (mysql_num_rows($result)==0)
				return null;
            return mysql_fetch_array($result);
		}
		public static function GetLevelByNhanVien()
		{
			$strSQL = "select * 
					   from level
					   where idlevel<3";
			$result = DataProvider::Query($strSQL);
			if (mysql_num_rows($result)==0)
				return null;
			while ($row= mysql_fetch_array ($result,MYSQL_BOTH))
                $return[]=$row;
            return $return;
		}
	}
?>