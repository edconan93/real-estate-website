<?php
/*Lớp LoaiNhhaDAO
	
*/?>
<?php 
	include_once("DataProvider.php");
?>

<?php
	class TinhDAO
	{
		public static function GetAllTinh()
		{
			$strSQL = "select *
					from tinh";
            $result = DataProvider::Query($strSQL);
			if(mysql_num_rows($result)==0)
				return null;
			return mysql_fetch_array ($result);	
		}
    	
     	
	}
?>