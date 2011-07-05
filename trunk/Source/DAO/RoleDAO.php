<?php 
	include_once("DataProvider.php");

	class RoleDAO
	{
		public static function GetRoleByID($id)
		{
			$strSQL = "select * 
					   from role
					   where id='$id'";
			
            $result = DataProvider::Query($strSQL);
			if (mysql_num_rows($result)==0)
				return null;
            return mysql_fetch_array($result);
		}
	}
?>