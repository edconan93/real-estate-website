<?php 
	include_once("DataProvider.php");
?>
<?php
class KhenThuongDAO
{
    public static function insert($iduser,$loai,$khenthuong,$ngay)
    {
            $strSQL = "Insert into khenthuong values (NULL, $iduser, $loai,'$khenthuong','$ngay')";
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
            $strSQL = "update khenthuong set loai=$loai,thuong='$khenthuong', ngay='$ngay' where iduser=$iduser";
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
    public static function selectByUserLevel($offset,$max,$level)
    {
        $strSQL="select * from khenthuong,user where khenthuong.iduser=user.id and user.level=$level limit $offset,$max";
         $result = DataProvider::Query($strSQL);
         if(mysql_num_rows($result)==0)
				return null;
         while($row=mysql_fetch_row($result,MYSQL_BOTH))
             $return[]=$row;
         return $return;
    }
    public static function countByUserLevel($level)
    {
        $strSQL="select count(*) from khenthuong,user where khenthuong.iduser=user.id and user.level=$level";
        $result = DataProvider::Query($strSQL);
        if(mysql_num_rows($result)==0)
            return null;
        return mysql_fetch_row($result,MYSQL_BOTH);
    }
}
?>