<?php
/*Lớp HuongNhaDAO
	
*/?>
<?php 
	include_once("DataProvider.php");
?>

<?php
	class HuongNhaDAO
	{
    	public static function GetAllHuongNha()
		{
			$strSQL = "select *
					from huongnha";
            $result = DataProvider::Query($strSQL);
			if(mysql_num_rows($result)==0)
				 return null;
			while($row = mysql_fetch_row($result))
			    $temp[]= $row;
			return $temp;
		}
		public static function GetHuongNhaById($id)
		{
			$strSQL = "select *
					from huongnha where id='$id'";
            $result = DataProvider::Query($strSQL);
			if(mysql_num_rows($result)==0)
				return null;
			return mysql_fetch_array ($result);	
		}
     	
	}
?>