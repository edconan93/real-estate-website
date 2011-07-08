<?php
/*Lớp PhapLyDAO
	
*/?>
<?php 
	include_once("DataProvider.php");
?>

<?php
	class PhapLyDAO
	{
    	public static function GetAllPhapLy()
		{
			$strSQL = "select *
					from tinhtrangphaply";
            $result = DataProvider::Query($strSQL);
			if(mysql_num_rows($result)==0)
				 return null;
			while($row = mysql_fetch_row($result))
			    $temp[]= $row;
			return $temp;
		}
		public static function GetPhapLyById($id)
		{
			$strSQL = "select *
					from tinhtrangphaply where id='$id'";
            $result = DataProvider::Query($strSQL);
			if(mysql_num_rows($result)==0)
				return null;
			return mysql_fetch_array ($result);	
		}
     	
	}
?>