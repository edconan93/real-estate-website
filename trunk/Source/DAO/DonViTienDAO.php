<?php
/*Lớp DonViTienDAO
	
*/?>
<?php 
	include_once("DataProvider.php");
?>

<?php
	class DonViTienDAO
	{
    	public static function GetAllDonViTien()
		{
			$strSQL = "select *
					from donvitien";
            $result = DataProvider::Query($strSQL);
			if(mysql_num_rows($result)==0)
				 return null;
			while($row = mysql_fetch_row($result))
			    $temp[]= $row;
			return $temp;
		}
		public static function GetAllDonViTienById($id)
		{
			$strSQL = "select *
					from donvitien where id='$id'";
            $result = DataProvider::Query($strSQL);
			if(mysql_num_rows($result)==0)
				return null;
			return mysql_fetch_array ($result);	
		}
     	
	}
?>