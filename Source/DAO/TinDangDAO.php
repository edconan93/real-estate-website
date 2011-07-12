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
		public static function setTinDangNoiBat($aid, $value)
		{
			$strSQL = "	update dichvu set rank=$value
						where id=$aid";
			
			$cn = DataProvider::Open ();
			DataProvider::MoreQuery ($strSQL,$cn);
			
			if(mysql_affected_rows () == 0)
				$result=false;
			else
				$result=true;
			DataProvider::Close ($cn);
            return $result;
		}
		public static function setStatusTinDang($aid, $status)
		{
			$strSQL = "	update dichvu set status=$status
						where id=$aid";
			
			$cn = DataProvider::Open ();
			DataProvider::MoreQuery ($strSQL,$cn);
			
			if(mysql_affected_rows () == 0)
				$result=false;
			else
				$result=true;
			DataProvider::Close ($cn);
            return $result;
		}
	}
?>