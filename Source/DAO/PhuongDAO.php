<?php
/*Lớp PhuongDAO
	
*/?>
<?php 
	include_once("DataProvider.php");
?>

<?php
	class PhuongDAO
	{
    	public static function GetAllPhuong()
		{
			$strSQL = "select *
					from phuong";
            $result = DataProvider::Query($strSQL);
			if(mysql_num_rows($result)==0)
				return null;
			return mysql_fetch_array ($result);	
		}
		public static function GetAllPhuongById($id)
		{
			$strSQL = "select *
					from phuong where id='$id'";
            $result = DataProvider::Query($strSQL);
			if(mysql_num_rows($result)==0)
				return null;
			return mysql_fetch_array ($result);	
		}
     	
	}
?>