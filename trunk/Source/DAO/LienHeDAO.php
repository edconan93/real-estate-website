<?php
/*Lớp DichVuVIPDAO
	
*/?>
<?php 
	include_once("DataProvider.php");
?>

<?php
	class LienHeDAO
	{
    	public static function Add ($hoten,$sdt,$email,$diachi, $noidung, $ngayguitin, $status)
        {
            $strSQL = "Insert into lienhe values (NULL,'$hoten', '$sdt', '$email', '$diachi', '$noidung','$ngayguitin','$status')";
			$cn = DataProvider::Open ();
			DataProvider::MoreQuery ($strSQL,$cn);
			
			if(mysql_affected_rows () == 0)
				$result=false;
			else
				$result=mysql_insert_id ();
				
			DataProvider::Close ($cn);
            return $result;
        }

    	public static function Update ($id,$hoten,$sdt,$email,$diachi, $noidung, $ngayguitin, $status)
        {
            $strSQL = "update lienhe set hoten='$hoten', sdt='$sdt',email='$email',diachi='$diachi',noidung='$noidung',ngayguitin='$ngayguitin',
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