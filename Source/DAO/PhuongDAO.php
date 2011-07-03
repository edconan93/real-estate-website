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
			while($row = mysql_fetch_row($result,MYSQL_BOTH))
			    $temp[]= $row;
			return $temp;
		}
		public static function GetAllPhuongById($id)
		{
			$strSQL = "select *
					from phuong where idquan='$id'";
            $result = DataProvider::Query($strSQL);
			if(mysql_num_rows($result)==0)
				 return null;
			while($row = mysql_fetch_row($result,MYSQL_BOTH))
			    $temp[]= $row;
			return $temp;
		}
        public static function getPhuongById($id)
        {
            $strSQL = "select *
					from phuong where id='$id'";
            $result = DataProvider::Query($strSQL);
			if(mysql_num_rows($result)==0)
				 return null;
            return mysql_fetch_row($result,MYSQL_BOTH);
        }
     	
	}
?>