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
            $strSQL = "Insert into dichvu_tienich values (NULL, '$idcanho', '$idtienich')";
		    $cn = DataProvider::Open ();
			DataProvider::MoreQuery ($strSQL,$cn);
			
			if(mysql_affected_rows () == 0)
				$result=false;
			else
				$result=mysql_insert_id ();
				
			DataProvider::Close ($cn);
            return $result;
        }

    	

     	


		
	}
?>