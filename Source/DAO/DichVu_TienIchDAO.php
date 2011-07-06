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
		public static function getAllByIDDichVu ($idDichVu)
        {
            $strSQL = "Select * from dichvu_tienich where idcanho='$idDichVu'";
		    $result = DataProvider::Query($strSQL);
			if (mysql_num_rows($result)==0)
				return null;
			while ($row= mysql_fetch_array ($result,MYSQL_BOTH))
                $return[]=$row;
            return $return;
			DataProvider::Close ($cn);
            return $result;
        }
		public static function Update($id,$idcanho,$idtienich)
		{
			$strSQL = "update dichvu_tienich set idcanho= '$idcanho',idtienich= '$idtienich'
			where id='$id'";
			
			$cn = DataProvider::Open ();
			DataProvider::MoreQuery ($strSQL,$cn);
			if(mysql_affected_rows () == 0)
				$result=false;
			else
				$result=true;		
			DataProvider::Close ($cn);
			return $result;
		}
		public static function Delete($id)
		{
			$strSQL = "delete from dichvu_tienich where id='$id'";
			
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