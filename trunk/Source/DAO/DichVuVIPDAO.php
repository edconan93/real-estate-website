<?php 
	include_once("DataProvider.php");

	class DichVuVIPDAO
	{
    	public static function Add ($iddichvu, $noidung, $ngayguitin, $ngaynangcap, $thoihan, $status)
        {
            $strSQL = "Insert into dichvuvip values (NULL,'$iddichvu', '$noidung', '$ngayguitin', '$ngaynangcap', '$thoihan','$status')";
			$cn = DataProvider::Open ();
			DataProvider::MoreQuery ($strSQL,$cn);
			
			if(mysql_affected_rows () == 0)
				$result=false;
			else
				$result=mysql_insert_id ();
				
			DataProvider::Close ($cn);
            return $result;
        }
    	public static function Update ($id,$iddichvu, $noidung, $ngayguitin, $ngaynangcap, $thoihan, $status)
        {
            $strSQL = "update dichvuvip set iddichvu='$iddichvu', noidung='$noidung',ngayguitin='$ngayguitin',ngaynangcap='$ngaynangcap',thoihan='$thoihan',
						status= '$status' where id=$id";
		    $cn = DataProvider::Open ();
			DataProvider::MoreQuery ($strSQL,$cn);
			
			if(mysql_affected_rows () == 0)
				$result=false;
			else
				$result=true;
			DataProvider::Close ($cn);
            return $result;
        }
		public static function GetTinVipById($id)
        {
            $strSQL = "select * from dichvuvip
					   where iddichvu='$id' and status=0";
			
		    $result = DataProvider::Query($strSQL);
			if (mysql_num_rows($result)==0)
				return null;
			while ($row= mysql_fetch_array ($result,MYSQL_BOTH))
                $return[]=$row;
            return $return;	
        }
		public static function SetStatusTinVIP($iddv, $value)
        {
            $strSQL = "	update dichvuvip set status=$value
						where iddichvu=$iddv";
						
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