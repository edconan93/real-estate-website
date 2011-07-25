<?php
    
    function showError()
   {
      die("SQL Error " . mysql_errno(  ) . " : " . mysql_error(  ));
   }
    function Query($sql)
	{
	   $hostName = "localhost";
   	    $databaseName = "qldo";
   	    $username = "root";
   	    $password = "";	
		// Tạo kết nối đến CSDL
		if (!($connection = @mysql_connect($hostName,$username,$password)))
			die ("Couldn't connect to database");
			
		if (!(@mysql_select_db($databaseName,$connection)))
			showError();
		mysql_query("SET character_set_results=utf8", $connection);
		//Thực thi câu truy vấn SQL
		if (!($result = @mysql_query($sql, $connection)))
			showError();
		
		// Đóng kết lối
		if (!(@mysql_close($connection)))
			showError();
		
		return $result;
	}	
?>
<?php
   function updateDichVu()
    {
        $strSQL = "update dichvu set status= '-1' where  ADDDATE(ngaydang, INTERVAL thoihantin MONTH)<CURDATE()";     
        Query ($strSQL);
        if(mysql_affected_rows () == 0)
            $result=false;
        else
			$result=true;
				
		return $result;
    }
    updateDichVu();

?>