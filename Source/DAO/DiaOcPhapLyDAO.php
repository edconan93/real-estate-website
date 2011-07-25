<?php
/*Lớp PhapLyDAO
	
*/?>
<?php 
	include_once("DataProvider.php");
	require_once("Utils/Utils.php");

?>

<?php
	class DiaOcPhapLyDAO
	{
    	public static function GetAllDiaOcPhapLy()
		{
			$strSQL = "select *
					from diaocphaply";
            $result = DataProvider::Query($strSQL);
			if(mysql_num_rows($result)==0)
				 return null;
			while($row = mysql_fetch_row($result))
			    $temp[]= $row;
			return $temp;
		}
		public static function selectId($id)
		{
			$strSQL = "select *
					from diaocphaply where id='$id'";
            $result = DataProvider::Query($strSQL);
			if(mysql_num_rows($result)==0)
				return null;
			return mysql_fetch_array ($result);	
		}
     	public static function countAllBySQL($strSQL)
		{
			$result = DataProvider::Query($strSQL);
			$resultSet=mysql_fetch_array ($result);
			return $resultSet[0];
		}
		public static function getAllBySQL($strSQL)
		{
			 $result = DataProvider::Query($strSQL);
			 if(mysql_num_rows($result)==0)
					return null;
			 while($row=mysql_fetch_row($result,MYSQL_BOTH))
				 $return[]=$row;
			 return $return;
		}
	}
?>