<?php

/**
 * @author panda
 * @copyright 2011
 */

class DonviDichVuDAO
{
    public static function selectId($id)
    {
        $strSQL = "select * from donvidichvu where id=$id";
         $result = DataProvider::Query($strSQL);
         if(mysql_num_rows($result)==0)
            return null;
         return mysql_fetch_row($result,MYSQL_BOTH);
    }
}

?>