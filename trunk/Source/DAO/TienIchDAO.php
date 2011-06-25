<?php
/*Lớp TienIchDAO
	
*/?>
<?php 
	include_once("DataProvider.php");
?>

<?php
	class TienIchDAO
	{
    	public static function GetAllTienIch()
		{
			$strSQL = "select *
					from tienich";
            $result = DataProvider::Query($strSQL);
			if(mysql_num_rows($result)==0)
				return null;
			return mysql_fetch_array ($result);	
		}
		public static function GetAllTienIchId($id)
		{
			$strSQL = "select *
					from tienich where id='$id'";
            $result = DataProvider::Query($strSQL);
			if(mysql_num_rows($result)==0)
				return null;
			return mysql_fetch_array ($result);	
		}
     	
	}
?>