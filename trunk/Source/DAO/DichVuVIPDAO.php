<?php
/*Lớp DichVuVIPDAO
	
*/?>
<?php 
	include_once("DataProvider.php");
?>

<?php
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
		
	}
?>