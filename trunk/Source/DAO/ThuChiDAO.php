<?php 
	include_once("DataProvider.php");
?>
<?php
class ThuChiDAO
{
    public static function add($sotien,$donvi,$congviec,$ngay,$nhanvien,$loai)
    {
        $strSQL = "Insert into thuchi values (NULL,$sotien,$donvi,$congviec,$ngay,$nhanvien,$loai)";
        $cn = DataProvider::Open ();
		DataProvider::MoreQuery ($strSQL,$cn);
			
		if(mysql_affected_rows () == 0)
			$result=false;
		else
			$result=mysql_insert_id ();
				
		DataProvider::Close ($cn);
        return $result;
    }
    public static function getAll($offset,$max)
    {
        $strSQL="select * from thuchi ORDER BY ngay limit $offset,$max";
         $result = DataProvider::Query($strSQL);
         if(mysql_num_rows($result)==0)
				return null;
         while($row=mysql_fetch_row($result,MYSQL_BOTH))
             $return[]=$row;
         return $return;
    }
}
?>