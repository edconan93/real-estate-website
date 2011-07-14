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
						   where status=$status
						   order by ngaydang desc";
			$result = DataProvider::Query($strSQL);
			if (mysql_num_rows($result)==0)
				return null;
			while ($row= mysql_fetch_array ($result,MYSQL_BOTH))
                $return[]=$row;
            return $return;	
		}
	}
?>