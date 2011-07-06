<?php 
	include_once("DataProvider.php");
?>
<?php
class DichVuDAO
{
	//lam
	public static function Add($tieude,$mota,$chusohuu,$phuong,$quan,$tinh,$ngaydang,$ngayupdate,$duong,$rong,$dai,$tang,$sophongngu,$sophongtam,$giaban,$donvitien,$status,$thoihandangtin,$loainha,$phaply,$huongnha,$khuyenmai,$loaidichvu,$donvidv,$X,$Y,$khanang)
    {
		 $strSQL = "Insert into dichvu values (NULL, '$tieude', '$mota','$chusohuu','$phuong','$quan','$tinh','$ngaydang','$ngayupdate','$duong','$rong','$dai','$tang','$sophongngu','$sophongtam','$giaban','$donvitien','0','$thoihandangtin','$loainha','$phaply','$huongnha','$khuyenmai','$loaidichvu','$donvidv','$X','$Y',$khanang)";
		    $cn = DataProvider::Open ();
			DataProvider::MoreQuery ($strSQL,$cn);
			
			if(mysql_affected_rows () == 0)
				$result=false;
			else
				$result=mysql_insert_id ();
				
			DataProvider::Close ($cn);
            return $result;
	}
	public static function GetIdByViewDate($viewdate)
	{
		    $strSQL = "select id from dichvu where ngaydang='$viewdate'";
		    $cn = DataProvider::Open ();
			DataProvider::MoreQuery ($strSQL,$cn);
			
			if(mysql_affected_rows () == 0)
				$result=false;
			else
				$result=mysql_insert_id ();
				
			DataProvider::Close ($cn);
            return $result;
	}
	public static function UpdateStatus($id,$status)
	{
		$strSQL = "update dichvu set status= '$status' where id='$id'";
		echo "update.........";
            $cn = DataProvider::Open ();
			DataProvider::MoreQuery ($strSQL,$cn);
			if(mysql_affected_rows () == 0)
				$result=false;
			else
				$result=true;
				
			DataProvider::Close ($cn);
            return $result;
	}
	
    //phucnt3
    public static function getAll($offset,$numrow)
    {
         $strSQL = "select * from dichvu limit $offset,$numrow";
         $result = DataProvider::Query($strSQL);
         if(mysql_num_rows($result)==0)
				return null;
         while($row=mysql_fetch_row($result,MYSQL_BOTH))
             $return[]=$row;
         return $return;
    }
    public static function select($id)
    {
         $strSQL = "select * from dichvu where id='$id'";
         $result = DataProvider::Query($strSQL);
         if(mysql_num_rows($result)==0)
				return null;
         $row=mysql_fetch_row($result,MYSQL_BOTH);
         return $row;
    }
    //use to search dichvu
    public static function getAllBySQL($strSQL)
    {
         $result = DataProvider::Query($strSQL);
         if(mysql_num_rows($result)==0)
				return null;
         while($row=mysql_fetch_row($result,MYSQL_BOTH))
             $return[]=$row;
         return $return;
    }
    //phucnt3
    public static function countAllBySQL($strSQL)
    {
        $result = DataProvider::Query($strSQL);
        $resultSet=mysql_fetch_array ($result);
        return $resultSet[0];
    }
    //phucnt3
    public static function countAll()
    {
        $strSQL = "select count(*) from dichvu";
        $result = DataProvider::Query($strSQL);
        $resultSet=mysql_fetch_array ($result);
        return $resultSet[0];
    }
    //phucnt3
    public static function getDichVuByLoai($idLoai,$offset,$numrow)
    {
        $strSQL = "select * from dichvu where loaidv=$idLoai limit $offset,$numrow";
         $result = DataProvider::Query($strSQL);
         if(mysql_num_rows($result)==0)
				return null;
         while($row=mysql_fetch_row($result,MYSQL_BOTH))
             $return[]=$row;
         return $return;
    }
     //phucnt3
    public static function countAllDichVuByLoai($idLoai)
    {
        $strSQL = "select count(*) from dichvu where loaidv=$idLoai";
        $result = DataProvider::Query($strSQL);
        $resultSet=mysql_fetch_array ($result);
        return $resultSet[0];
    }
	//hoaphuong0
	public static function countAllDichVuByStatus($status)
    {
        $strSQL = "select count(*) from dichvu where status='$status'";
        $result = DataProvider::Query($strSQL);
        $resultSet=mysql_fetch_array ($result);
        return $resultSet[0];
    }
	//hoaphuong0
	public static function getALLDichVuByStatus($status,$offset,$numrow)
    {
        $strSQL = "select * from dichvu where status='$status' limit $offset,$numrow";
         $result = DataProvider::Query($strSQL);
         if(mysql_num_rows($result)==0)
				return null;
         while($row=mysql_fetch_row($result,MYSQL_BOTH))
             $return[]=$row;
         return $return;
    }
	//hoaphuong0
	public static function countStatusType($status)
    {
        $strSQL = "select count(*) from dichvu where status='$status'";
        $result = DataProvider::Query($strSQL);
        $resultSet=mysql_fetch_array ($result);
        return $resultSet[0];
    }
	
	
}

?>