<?php
include_once("../../../DAO/DataProvider.php");
?>
<?php
class AutoUpdateServer
{
    public static function updateDichVu()
    {
        $strSQL = "update dichvu set status= '-1' where  ADDDATE(ngaydang, INTERVAL thoihantin MONTH)<CURDATE()";
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
AutoUpdateServer::updateDichVu();
?>