<?php
/*Lớp DichVu_TienIchDAO
*/
?>
<?php 
	include_once("DataProvider.php");
?>

<?php
	class DichVu_TienIchDAO
	{
    	public static function Add ($idcanho, $idtienich)
        {
            $strSQL = "Insert into user values (NULL, '$idcanho', '$idtienich')";
		    $cn = DataProvider::Open ();
			DataProvider::MoreQuery ($strSQL,$cn);
			
			if(mysql_affected_rows () == 0)
				$result=false;
			else
				$result=mysql_insert_id ();
				
			DataProvider::Close ($cn);
            return $result;
        }

    	public static function Update ($id,$password, $email,$hoten, $gioitinh,$diachi,$sdt1,$sdt2,$role, $level, $status)
        {

            $strSQL = "update khgiaodich set password='$password', email='$email',hoten='$hoten',gioitinh='$gioitinh',diachi='$diachi'
						sdt1='$sdt1',sodt2='$sodt2', role='$role',
			 			level='$level', status= '$status' 
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