<?php 
	include_once("DataProvider.php");
?>
<?php
class DichVuDAO
{
	//lam
	public static function Add($tieude,$mota,$chusohuu,$phuong,$quan,$tinh,$ngaydang,$ngaycapnhat,$duong,$rong,$dai,$tang,$sophongngu,$sophongtam,$giaban,$donvitien,$status,$thoihandangtin,$loainha,$phaply,$huongnha,$khuyenmai,$loaidichvu,$donvidv,$X,$Y,$khanang,$rank,$sonha)
    {
		 $strSQL = "Insert into dichvu values (NULL, '$tieude', '$mota','$chusohuu','$phuong','$quan','$tinh','$ngaydang','$ngaycapnhat','$duong','$rong','$dai','$tang','$sophongngu','$sophongtam','$giaban','$donvitien','0','$thoihandangtin','$loainha','$phaply','$huongnha','$khuyenmai','$loaidichvu','$donvidv','$X','$Y','$khanang','$rank','$sonha')";
		    $cn = DataProvider::Open ();
			DataProvider::MoreQuery ($strSQL,$cn);
			
			if(mysql_affected_rows () == 0)
				$result=false;
			else
				$result=mysql_insert_id ();
				
			DataProvider::Close ($cn);
            return $result;
	}
	public static function Update($id,$tieude,$mota,$chusohuu,$phuong,$quan,$tinh,$ngaydang,$ngaycapnhat,$duong,$rong,$dai,$tang,$sophongngu,$sophongtam,$giaban,$donvitien,$status,$thoihantin,$loainha,$phaply,$huongnha,$khuyenmai,$loaidv,$donvidv,$X,$Y,$khanang,$rank,$sonha)
	{
	
		$strSQL = "update dichvu set tieude='$tieude',mota='$mota',chusohuu='$chusohuu',phuong='$phuong',quan='$quan',tinh='$tinh',
		ngaydang ='$ngaydang',ngaycapnhat='$ngaycapnhat',duong='$duong',rong='$rong',dai='$dai',tang='$tang',
		sophongngu='$sophongngu',sophongtam='$sophongtam',giaban='$giaban',donvitien='$donvitien',status='$status',thoihantin='$thoihantin',
		loainha='$loainha',phaply='$phaply',huongnha='$huongnha',khuyenmai='$khuyenmai',loaidv= '$loaidv',donvidv='$donvidv',
		X='$X',Y='$Y',khanang='$khanang',rank='$rank',sonha='$sonha' where id='$id'";
		
		$cn = DataProvider::Open ();
		DataProvider::MoreQuery ($strSQL,$cn);
		if(mysql_affected_rows () == 0)
			$result=false;
		else
			$result=true;		
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
            $cn = DataProvider::Open ();
			DataProvider::MoreQuery ($strSQL,$cn);
			if(mysql_affected_rows () == 0)
				$result=false;
			else
				$result=true;
				
			DataProvider::Close ($cn);
            return $result;
	}
	 //hoaphuong
    public static function getCanHoNoiBat()
    {
         $strSQL = "select * from dichvu where rank >=1 and (status = 1 or status = 2) order by ngaydang desc";
         $result = DataProvider::Query($strSQL);
         if(mysql_num_rows($result)==0)
				return null;
         while($row=mysql_fetch_row($result,MYSQL_BOTH))
             $return[]=$row;
         return $return;
    }
    //hoaphuong3
    public static function getAll($offset,$numrow)
    {
         $strSQL = "select * from dichvu where status >-1 order by status=2 desc limit $offset,$numrow";
         $result = DataProvider::Query($strSQL);
         if(mysql_num_rows($result)==0)
				return null;
         while($row=mysql_fetch_row($result,MYSQL_BOTH))
             $return[]=$row;
         return $return;
    }
	 //hoaphuong0
    public static function getAll0($chusohuu,$offset,$numrow)
    {
         $strSQL = "select * from dichvu where status >-1 and chusohuu='$chusohuu' limit $offset,$numrow";
         $result = DataProvider::Query($strSQL);
         if(mysql_num_rows($result)==0)
				return null;
         while($row=mysql_fetch_row($result,MYSQL_BOTH))
             $return[]=$row;
         return $return;
    }
    public static function select($id)
    {
         $strSQL = "select * from dichvu where id='$id' and status >-1";
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
    //hoaphuong3
    public static function countAllBySQL($strSQL)
    {
        $result = DataProvider::Query($strSQL);
        $resultSet=mysql_fetch_array ($result);
        return $resultSet[0];
    }
    //hoaphuong0
    public static function countAll0($chusohuu)
    {
        $strSQL = "select count(*) from dichvu where chusohuu='$chusohuu'";
        $result = DataProvider::Query($strSQL);
        $resultSet=mysql_fetch_array ($result);
        return $resultSet[0];
    }
	//hoaphuong3
    public static function countAll()
    {
        $strSQL = "select count(*) from dichvu";
        $result = DataProvider::Query($strSQL);
        $resultSet=mysql_fetch_array ($result);
        return $resultSet[0];
    }
    //hoaphuong3
    public static function getDichVuByLoai($idLoai,$offset,$numrow)
    {
        $strSQL = "select * from dichvu where loaidv=$idLoai and status >-1 order by status=2 desc limit $offset,$numrow";
         $result = DataProvider::Query($strSQL);
         if(mysql_num_rows($result)==0)
				return null;
         while($row=mysql_fetch_row($result,MYSQL_BOTH))
             $return[]=$row;
         return $return;
    }
     //hoaphuong3
    public static function countAllDichVuByLoai($idLoai)
    {
        $strSQL = "select count(*) from dichvu where loaidv=$idLoai and status >-1";
        $result = DataProvider::Query($strSQL);
        $resultSet=mysql_fetch_array ($result);
        return $resultSet[0];
    }
	//hoaphuong0
	public static function countAllDichVuByStatus0($status,$chusohuu)
    {
        $strSQL = "select count(*) from dichvu where status='$status' and chusohuu='$chusohuu'";
        $result = DataProvider::Query($strSQL);
        $resultSet=mysql_fetch_array ($result);
        return $resultSet[0];
    }
	//hoaphuong0
	public static function getALLDichVuByStatus0($status,$chusohuu,$offset,$numrow)
    {
        $strSQL = "select * from dichvu where status='$status' and chusohuu='$chusohuu' limit $offset,$numrow";
         $result = DataProvider::Query($strSQL);
         if(mysql_num_rows($result)==0)
				return null;
         while($row=mysql_fetch_row($result,MYSQL_BOTH))
             $return[]=$row;
         return $return;
    }
	//hoaphuong0
	public static function countStatusType($status,$user)
    {
        $strSQL = "select count(*) from dichvu where status='$status' and 	chusohuu='$user'";
        $result = DataProvider::Query($strSQL);
        $resultSet=mysql_fetch_array ($result);
        return $resultSet[0];
    }
	public static function delete($id)
	{
		$strSQL = "update dichvu set status=-1 where id=$id";
		
		$cn = DataProvider::Open ();
		DataProvider::MoreQuery ($strSQL,$cn);
		if(mysql_affected_rows () == 0)
			$result=false;
		else
			$result=true;		
		DataProvider::Close ($cn);
		return $result;
	}
}
?>