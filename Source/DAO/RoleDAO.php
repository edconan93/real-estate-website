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
		public static function GetRoleMember()
		{
			$strSQL = "select * 
					   from role
					   where id>2";
			$result = DataProvider::Query($strSQL);
			if (mysql_num_rows($result)==0)
				return null;
			while ($row= mysql_fetch_array ($result,MYSQL_BOTH))
                $return[]=$row;
            return $return;
		}
		public static function GetAllRole()
		{
			$strSQL = "select * 
					   from role
					   where id>1";
			$result = DataProvider::Query($strSQL);
			if (mysql_num_rows($result)==0)
				return null;
			while ($row= mysql_fetch_array ($result,MYSQL_BOTH))
                $return[]=$row;
            return $return;
		}
	}
?>