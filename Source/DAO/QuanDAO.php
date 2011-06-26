<?php
/*Lớp QuanDAO
	
*/?>
<?php 
	include_once("DataProvider.php");
?>

<?php
	class QuanDAO
	{
    	public static function GetAllQuan()
		{
			$strSQL = "select *
					from quan";
            $result = DataProvider::Query($strSQL);
			if(mysql_num_rows($result)==0)
				 return null;
			while($row = mysql_fetch_row($result))
			    $temp[]= $row;
			return $temp;
		}
		public static function GetAllQuanById($id)
		{
			$strSQL = "select *
					from quan where id='$id'";
            $result = DataProvider::Query($strSQL);
			if(mysql_num_rows($result)==0)
				return null;
			return mysql_fetch_array ($result);	
		}
     	
	}
?>