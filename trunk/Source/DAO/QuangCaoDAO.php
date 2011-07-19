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
		public static function GetAdvByID($id)
		{
			$strSQL = "	select * from quangcao
						where id='$id'";
            $result = DataProvider::Query($strSQL);
			if(mysql_num_rows($result)==0)
				return null;
			return mysql_fetch_array ($result,MYSQL_BOTH);	
		}
		public static function Update($id, $chusohuu, $sdt, $email, $diachi, $sothang, $filename, $link)
        {
			$strSQL = "";
			if ($filename != null)
				$strSQL = "	update quangcao set chusohuu='$chusohuu', sdt='$sdt', email='$email', diachi='$diachi',
							sothang=$sothang, hinhanh='$filename', link='$link'
							where id=$id";
			else
				$strSQL = "	update quangcao set chusohuu='$chusohuu', sdt='$sdt', email='$email', diachi='$diachi',
							sothang=$sothang, link='$link'
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
	}
?>