<?php 
	include_once("DataProvider.php");

	class QuangCaoDAO
	{
		public static function Add($chusohuu, $sdt, $email, $diachi, $ngaydang, $sothang, $hinhanh, $link, $status)
        {
            $strSQL = "Insert into quangcao values (NULL, '$chusohuu', '$sdt', '$email', '$diachi', '$ngaydang', $sothang, '$hinhanh', '$link', $status)";
			$cn = DataProvider::Open();
			DataProvider::MoreQuery($strSQL,$cn);
			
			if(mysql_affected_rows() == 0)
				$result=false;
			else
				$result=mysql_insert_id();
				
			DataProvider::Close($cn);
            return $result;
        }
		public static function GetAdvByType($status)
		{
			$strSQL = "";
			if ($status == -2)
				$strSQL = "select * from quangcao
						   where status!=-1
						   order by ngaydang desc";
			else
				$strSQL = "select * from quangcao
						   where status=$status and status!=-1
						   order by ngaydang desc";
			$result = DataProvider::Query($strSQL);
			if (mysql_num_rows($result)==0)
				return null;
			while ($row= mysql_fetch_array ($result,MYSQL_BOTH))
                $return[]=$row;
            return $return;	
		}
		public static function setStatusQuangCao($id, $status)
		{
			$strSQL = "	update quangcao set status=$status
						where id=$id";
			
			$cn = DataProvider::Open ();
			DataProvider::MoreQuery ($strSQL,$cn);
			
			if(mysql_affected_rows () == 0)
				$result=false;
			else
				$result=true;
			DataProvider::Close ($cn);
            return $result;
		}
		public static function delete($id)
		{
			$strSQL = "update quangcao set status=-1 where id=$id";
			
			$cn = DataProvider::Open ();
			DataProvider::MoreQuery ($strSQL,$cn);
			if(mysql_affected_rows () == 0)
				$result=false;
			else
				$result=true;		
			DataProvider::Close ($cn);
			return $result;
		}
        public static function getBySQL($strSQL)
        {
            $result = DataProvider::Query($strSQL);
			if (mysql_num_rows($result)==0)
				return null;
			while ($row= mysql_fetch_array ($result,MYSQL_BOTH))
                $return[]=$row;
            return $return;	
        }
        public static function countBySQL($strSQL)
        {
            $result = DataProvider::Query($strSQL);
			if (mysql_num_rows($result)==0)
				return null;
			$return= mysql_fetch_array($result,MYSQL_BOTH);
            return $return[0];
        }
	}
?>