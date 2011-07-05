
<?php
/*Lớp DonViDichVuDAO
	
*/?>
<?php 
	include_once("DataProvider.php");
?>

<?php
	class DonViDichVuDAO
	{
    	public static function GetAllDonViDichVu()
		{
			$strSQL = "select *
					from donvidichvu";
            $result = DataProvider::Query($strSQL);
			if(mysql_num_rows($result)==0)
				 return null;
			while($row = mysql_fetch_row($result))
			    $temp[]= $row;
			return $temp;
		}
		public static function GetAllDonViDichVuById($id)
		{
			$strSQL = "select *
					from donvidichvu where id='$id'";
            $result = DataProvider::Query($strSQL);
			if(mysql_num_rows($result)==0)
				return null;
			return mysql_fetch_array ($result);	
		}
		 public static function selectId($id)
		{
			 $strSQL = "select * from donvidichvu where id='$id'";
			 $result = DataProvider::Query($strSQL);
			 if(mysql_num_rows($result)==0)
				return null;
			 return mysql_fetch_row($result,MYSQL_BOTH);
		}
     	
	}
?>

