<?php
/*Lớp LoaiNhhaDAO
	
*/?>
<?php 
	include_once("DataProvider.php");
?>

<?php
	class LoaiNhhaDAO
	{
		public static function GetAllLoaiNha()
		{
			$strSQL = "select *
					from loainha";
            $result = DataProvider::Query($strSQL);
			if(mysql_num_rows($result)==0)
				return null;
			return mysql_fetch_array ($result);	
		}
    	
     	
	}
?>