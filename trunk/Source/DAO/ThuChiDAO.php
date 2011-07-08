<?php 
	include_once("DataProvider.php");
?>
<?php
class ThuChiDAO
{
    public static function add($sotien,$donvi,$congviec,$ngay,$nhanvien,$loai)
    {
        
        $strSQL = "Insert into thuchi values (NULL,$sotien,$donvi,'$congviec','$ngay',$nhanvien,$loai)";
        $cn = DataProvider::Open ();
		DataProvider::MoreQuery ($strSQL,$cn);			
		if(mysql_affected_rows () == 0)
			$result=false;
		else
			$result=mysql_insert_id ();
				
		DataProvider::Close ($cn);
        return $result;
    }
    public static function getAll($offset,$max,$type)
    {
        $strSQL="select * from thuchi where loai=$type ORDER BY ngay DESC limit $offset,$max";
         $result = DataProvider::Query($strSQL);
         if(mysql_num_rows($result)==0)
				return null;
         while($row=mysql_fetch_row($result,MYSQL_BOTH))
             $return[]=$row;
         return $return;
    }
    public static function count($type)
    {
        $strSQL="select count(*) from thuchi where loai=$type";
        $result = DataProvider::Query($strSQL);
        if(mysql_num_rows($result)==0)
            return null;
        return mysql_fetch_row($result,MYSQL_BOTH);
    }
    public static function SumTongTien($type)
    {
        $strSQL="select sum(sotien*tigia) from thuchi,donvitien where loai=$type and donvi=donvitien.id";
        $result = DataProvider::Query($strSQL);
        if(mysql_num_rows($result)==0)
            return null;
        return mysql_fetch_row($result,MYSQL_BOTH);
    }
    public static function SumTongTienByMonth($type,$monthFrom,$monthTo,$year)
    {
        $strSQL="select sum(sotien*tigia) from thuchi,donvitien where loai=$type and MONTH(ngay)>=$monthFrom and MONTH(ngay)<=$monthTo and YEAR(ngay)=$year and donvi=donvitien.id";
        $result = DataProvider::Query($strSQL);
        if(mysql_num_rows($result)==0)
            return null;
        return mysql_fetch_row($result,MYSQL_BOTH);
    }
    public static function getAllByMonth($offset,$max,$type,$monthFrom,$monthTo,$year)
    {
        $strSQL="select * from thuchi where loai=$type and MONTH(ngay)>=$monthFrom and MONTH(ngay)<=$monthTo and YEAR(ngay)=$year ORDER BY ngay DESC limit $offset,$max";
         $result = DataProvider::Query($strSQL);
         if(mysql_num_rows($result)==0)
				return null;
         while($row=mysql_fetch_row($result,MYSQL_BOTH))
             $return[]=$row;
         return $return;
    }
    public static function countByMonth($type,$monthFrom,$monthTo,$year)
    {
        $strSQL="select count(*) from thuchi where loai=$type and MONTH(ngay)>=$monthFrom and MONTH(ngay)<=$monthTo and YEAR(ngay)=$year";
        $result = DataProvider::Query($strSQL);
        if(mysql_num_rows($result)==0)
            return null;
        return mysql_fetch_row($result,MYSQL_BOTH);
    }
}
?>