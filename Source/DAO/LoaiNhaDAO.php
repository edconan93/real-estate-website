<?php
/*Lớp LoaiNhaDAO
	
*/?>
<?php 
	include_once("DataProvider.php");
?>

<?php
	class LoaiNhaDAO
	{
		public static function GetAllLoaiNha()
		{
			$strSQL = "select *
					from loainha";
            $result = DataProvider::Query($strSQL);
			if(mysql_num_rows($result)==0)
				 return null;
			while($row = mysql_fetch_row($result,MYSQL_BOTH))
			    $temp[]= $row;
			return $temp;	
		}
		public static function getById($id)
		{
			$strSQL = "select * from loainha where id='$id'";					
				
				$result = DataProvider::Query($strSQL);
				if(mysql_num_rows($result)==0)
					return null;
				return mysql_fetch_row ($result,MYSQL_BOTH);
		}
    	
     	
	}
?>