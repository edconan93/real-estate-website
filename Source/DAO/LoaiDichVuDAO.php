<?php

/**
 * @author panda
 * @copyright 2011
 */

class LoaiDichVuDAO
{
    public static function getById($id)
    {
        $strSQL = "select * from loaidichvu where id=$id";					
			
            $result = DataProvider::Query($strSQL);
			if(mysql_num_rows($result)==0)
				return null;
            return mysql_fetch_row ($result,MYSQL_BOTH);
    }
}

?>