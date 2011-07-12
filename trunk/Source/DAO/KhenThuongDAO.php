<?php 
	include_once("DataProvider.php");
?>
<?php
class KhenThuongDAO
{
    public static function insert($iduser,$loai,$khenthuong,$nam)
    {
            $strSQL = "Insert into khenthuong values (NULL, $iduser, $loai,'$khenthuong','$nam')";
		    $cn = DataProvider::Open ();
			DataProvider::MoreQuery ($strSQL,$cn);
			
			if(mysql_affected_rows () == 0)
				$result=false;
			else
				$result=mysql_insert_id ();
				
			DataProvider::Close ($cn);
            return $result;
    }
    public static function update($iduser,$loai,$khenthuong,$nam)
    {
            $strSQL = "update khenthuong set loai=$loai,thuong='$khenthuong', nam='$nam' where iduser=$iduser";
		    $cn = DataProvider::Open ();
    		DataProvider::MoreQuery ($strSQL,$cn);
    		if(mysql_affected_rows () == 0)
    			$result=false;
    		else
    			$result=true;		
    		DataProvider::Close ($cn);
    		return $result;
    }
	public static function selectByIdUser($id)
	{
		$strSQL="select * from khenthuong where iduser=$id";
         $result = DataProvider::Query($strSQL);
         if(mysql_num_rows($result)==0)
				return null;
         return mysql_fetch_row($result,MYSQL_BOTH);
	}
    public static function select($offset,$max)
    {
        $strSQL="select * from khenthuong limit $offset,$max";
         $result = DataProvider::Query($strSQL);
         if(mysql_num_rows($result)==0)
				return null;
         while($row=mysql_fetch_row($result,MYSQL_BOTH))
             $return[]=$row;
         return $return;
    }
    public static function count()
    {
        $strSQL="select count(*) from khenthuong";
        $result = DataProvider::Query($strSQL);
        if(mysql_num_rows($result)==0)
            return null;
        return mysql_fetch_row($result,MYSQL_BOTH);
    }
}
?>