<?php 
	include_once("DataProvider.php");

	class LoaiDVDAO
	{
		public static function GetLoaiDVByID($id)
		{
			$strSQL = "select * 
					   from loaidichvu
					   where id='$id'";
			
            $result = DataProvider::Query($strSQL);
			if (mysql_num_rows($result)==0)
				return null;
            return mysql_fetch_array($result);
		}
	}
?>