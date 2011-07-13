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
	}
?>