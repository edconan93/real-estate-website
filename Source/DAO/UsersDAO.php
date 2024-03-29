<?php
/*Lớp UsersDAO
	1. Add($hoten, $email, $gioitinh,$sdt1,$sodt2, $loaikh, $status)
    	- Chức năng: thêm 1 kh mới 
        - Tham số: 
        	+username: không được phép trùng với username đã tốn tại
            +password: được mã hóa md5
            +Các tham số còn lại như trong mô tả CSDL
        - Trả về:
        	+false: nếu vì 1 lý do nào đó insert ko thành công
            +Ngược lại, trả về user_id mới được tự động phát sinh
    2. Update ($id, $hoten, $email, $gioitinh,$sdt1,$sodt2, $loaikh, $status)
    	- Chức năng: cập nhật toàn bộ thông tin của 1 user
        - Tham số: toàn bộ thông tin của user tương ứng, trừ id
        - Trả về: 
        	+true: thành công
            +false: không có dòng nào trong bảng bị thay đổi
    3. SetStatus($user_id, $status): thay đổi status của user $user_id
    4. SetPassword ($user_id, $newPassword): thay đổi password của user $user_id
    5. SetLastVisited ($user_id, $LastVisited)
    6. SetEmail ($user_id, $Email)
    7. SetAvatar ($user_id, $avatar)
    8. Login ($username, $password)
    	- Chức năng: kiểm tra thông tin đăng nhập
        - Tham số
        	+ $username: tên đăng nhập
            + $password; mật khẩu đã được mã hóa md5
        - Trả về: 
        	+ null: không tồn tại user có username và password như trên
            + 1 dòng trong bảng user: thông tin đăng nhập đúng & status của user =1 
    9. GetUserByID ($user_id): lấy 1 dòng trong bảng users (thuộc tính avatar được thay = link đến ảnh tương ứng) . Trả về null nếu không tồn tại $user_id
    10. GetUserByName ($username): lấy 1 đòng trong bảng users. Trả về null nếu không tồn tại $username
    11. Find ($keyWord): tìm các dòng trong bảng users mà cột username có chứa $keyWord
    	- Trả về: kết quả của hàm mysql_query
*/?>
<?php 
	include_once("DataProvider.php");
?>

<?php
	class UsersDAO
	{
    	public static function Add ($password, $email,$hoten, $gioitinh,$diachi,$sdt1,$sdt2,$role, $level, $status,$updatedate,$ip)
        {
            $strSQL = "Insert into user values (NULL, '$password', '$email', '$hoten', $gioitinh, '$diachi','$sdt1','$sdt2','$role','$level','$status','$updatedate','$ip')";
			$cn = DataProvider::Open ();
			DataProvider::MoreQuery ($strSQL,$cn);
			
			if(mysql_affected_rows () == 0)
				$result=false;
			else
				$result=mysql_insert_id ();
				
			DataProvider::Close ($cn);
            return $result;
        }

    	public static function Update ($id,$password, $email,$hoten, $gioitinh,$diachi,$sdt1,$sdt2,$role, $level, $status,$updatedate,$ip)
        {
            $strSQL = "update user set password='$password', email='$email',hoten='$hoten',gioitinh=$gioitinh,diachi='$diachi',
						sdt1='$sdt1',sdt2='$sdt2', role='$role',
			 			level='$level', status= '$status', ngaycapnhat='$updatedate',$ip='$ip' 
						where id=$id";
		    $cn = DataProvider::Open ();
			DataProvider::MoreQuery ($strSQL,$cn);
			
			if(mysql_affected_rows () == 0)
				$result=false;
			else
				$result=true;
			DataProvider::Close ($cn);
            return $result;
        }
		public static function UpdateInfor ($id,$username,$radio_gender,$address,$dt1,$dt2,$time)
        {
            $strSQL = "update user set hoten='$username',gioitinh=$radio_gender,diachi='$address',
						sdt1='$dt1',sdt2='$dt2', ngaycapnhat='$time' where id=$id";
		    $cn = DataProvider::Open ();
			DataProvider::MoreQuery ($strSQL,$cn);
			
			if(mysql_affected_rows () == 0)
				$result=false;
			else
				$result=true;
			DataProvider::Close ($cn);
            return $result;
        }
		
     	public static function SetStatus ($id, $status)
        {
            $strSQL = "update user set status=$status where id='$id'";
            $cn = DataProvider::Open ();
			DataProvider::MoreQuery ($strSQL,$cn);
			if(mysql_affected_rows () == 0)
				$result=false;
			else
				$result=true;
				
			DataProvider::Close ($cn);
            return $result;
        }
		
		public static function Delete($id)
        {
            $strSQL = "update user set status=-1 where id='$id'";
            $cn = DataProvider::Open ();
			DataProvider::MoreQuery ($strSQL,$cn);
			if(mysql_affected_rows () == 0)
				$result=false;
			else
				$result=true;
				
			DataProvider::Close ($cn);
            return $result;
        }
		
		public static function SetPassword ($id, $newPassword)
        {
            $strSQL = "update user set password= '$newPassword' where id='$id'";
            $cn = DataProvider::Open ();
			DataProvider::MoreQuery ($strSQL,$cn);
			
			if(mysql_affected_rows () == 0)
			{	
				$result=false;
				}
			else
				$result=true;
				
			DataProvider::Close ($cn);
            return $result;
        }
		
		
		public static function SetEmail ($id , $Email)
        {
            $strSQL = "update user set email= '$Email' where id='$id'";
            $cn = DataProvider::Open ();
			DataProvider::MoreQuery ($strSQL,$cn);
			
			if(mysql_affected_rows () == 0)
				$result=false;
			else
				$result=true;
				
			DataProvider::Close ($cn);
            return $result;
        }
		
		// public static function SetAvatar ($user_id, $avatar)
        // {
            // $strSQL = "update user set avatar= '$avatar' where user_id=$user_id";
            // $cn = DataProvider::Open ();
			// DataProvider::MoreQuery ($strSQL,$cn);
			
			// if(mysql_affected_rows () == 0)
				// $result=false;
			// else
				// $result=true;
				
			// DataProvider::Close ($cn);
            // return $result;
        // }
		
		public static function Login ($email, $password)
        {
            $strSQL = "select * from user where email='$email' and password='$password' and status>0";
		    $result = DataProvider::Query($strSQL);
			if(mysql_num_rows($result)==0)
				return null;
            return mysql_fetch_array($result);
        }
		
		public static function GetUserByID ($id)
		{
			$strSQL = "select *
					from user
					where id='$id'";
            $result = DataProvider::Query($strSQL);
			if(mysql_num_rows($result)==0)
				return null;
			return mysql_fetch_array ($result,MYSQL_BOTH);	
		}
		public static function GetUserByEmail ($email)
		{
			$strSQL = "select * 
						from user
						where email='$email' ";
			
            $result = DataProvider::Query($strSQL);
			if(mysql_num_rows($result)==0)
				return null;
            return mysql_fetch_array ($result);
		}
		public static function GetUser_StatusByEmail ($email)
		{
			$strSQL = "select * 
						from user
						where email='$email' and status='1' ";
			
            $result = DataProvider::Query($strSQL);
			if(mysql_num_rows($result)==0)
				return null;
            return mysql_fetch_array ($result);
		}
		// public static function GetUserByName ($username)
		// {
			// $strSQL = "select id , hoten, email, gioitinh, sdt1, sdt2, loaikh, status 
						// from khgiaodich
						// where hoten='$username' ";
            // $result = DataProvider::Query($strSQL);
			// if(mysql_num_rows($result)==0)
				// return null;
            // return mysql_fetch_array ($result);
		// }
		
		
		
		public static function FindByName ($keyWord,$index=0,$limit=10)
		{
			$strSQL = "	select * 
						from khgiaodich 
						where hoten like '%$keyWord%'
						limit $index, $limit";
            $result = DataProvider::Query($strSQL);
            return $result;
		}
		
		// public static function countResultByName ($keyWord)
		// {
			// $strSQL = "select count(*) from users where username like '%$keyWord%'";
            // $result = DataProvider::Query($strSQL);
			// $temp = mysql_fetch_array($result);
            // return $temp[0];
		// }
		
		public static function FindByEmail ($keyWord,$index=0,$limit=10)
		{
			$strSQL = "	select * 
						from khgiaodich 
						where email like '%$keyWord%'
						limit $index, $limit";
            $result = DataProvider::Query($strSQL);
            return $result;
		}
		
		public static function countResultByEmail ($keyWord)
		{
			$strSQL = "select count(*) from khgiaodich where email like '%$keyWord%'";
            $result = DataProvider::Query($strSQL);
			$temp = mysql_fetch_array($result);
            return $temp[0];
		}
		
		public static function getUsers ()
		{
			$strSQL = "	select * 
						from user 
						where role!=1 and status>-1";
			$result = DataProvider::Query($strSQL);
			if (mysql_num_rows($result)==0)
				return null;
			while ($row= mysql_fetch_array ($result,MYSQL_BOTH))
                $return[]=$row;
            return $return;	
		}
		
		public static function GetUserByActive($active)
		{
			$strSQL = "";
			if ($active == -1)
				$strSQL = "select * 
						   from user
						   where role!=1 and status!=-1";
			else
				$strSQL = "select * 
						   from user
						   where status=$active and role!=1 and status!=-1";
			$result = DataProvider::Query($strSQL);
			if (mysql_num_rows($result)==0)
				return null;
			while ($row= mysql_fetch_array ($result,MYSQL_BOTH))
                $return[]=$row;
            return $return;	
		}
		
		public static function checkPassword($password)
		{
			$strSQL = "select * from user where password='$password'";
            $result = DataProvider::Query($strSQL);
			if(mysql_num_rows($result)==0)
				return null;
			return mysql_fetch_array ($result);	
		}
        public static function getUsersByRole ($role)
		{
			$strSQL = "";
			if ($role == -1)
				$strSQL = "select * from user where role>1 and status>-1";
			else
				$strSQL = "select * from user where role=$role and role>1 and status>-1";
            $result = DataProvider::Query($strSQL);
			if(mysql_num_rows($result)==0)
				return null;
			while ($row= mysql_fetch_array ($result,MYSQL_BOTH))
                $return[]=$row;
            return $return;	
        }
		
		public static function GetUsersByFilter($role, $status,$offset,$max)
		{
			$strSQL = "";
			if ($role == -1)
			{
				if ($status == -1)
					$strSQL = "	select * from user 
								where role!=1 and status!=-1 limit $offset,$max";
				else
					$strSQL = "	select * from user 
								where role!=1 and status=$status limit $offset,$max";
			}
			else
			{
				if ($status == -1)
					$strSQL = "	select * from user 
								where role=$role and status!=-1 limit $offset,$max";
				else
					$strSQL = "	select * from user 
								where role=$role and status=$status limit $offset,$max";
			}
			$result = DataProvider::Query($strSQL);
			if (mysql_num_rows($result)==0)
				return null;
			while ($row= mysql_fetch_array ($result,MYSQL_BOTH))
                $return[]=$row;
            return $return;	
		}
        public static function CountUsersByFilter($role, $status,$offset,$max)
		{
			$strSQL = "";
			if ($role == -1)
			{
				if ($status == -1)
					$strSQL = "	select count(*) from user 
								where role!=1 and status!=-1";
				else
					$strSQL = "	select count(*) from user 
								where role!=1 and status=$status";
			}
			else
			{
				if ($status == -1)
					$strSQL = "	select count(*) from user 
								where role=$role and status!=-1";
				else
					$strSQL = "	select count(*) from user 
								where role=$role and status=$status";
			}
			$result = DataProvider::Query($strSQL);
			if (mysql_num_rows($result)==0)
				return null;
			$row= mysql_fetch_array ($result,MYSQL_BOTH);
            return $row[0];	
		}
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
		public static function Update2($id, $hoten, $gioitinh, $diachi, $sdt1, $sdt2, $newpass, $ngaycapnhat)
        {
			$strSQL = "";
			if ($newpass != -1)
				$strSQL = "	update user set hoten='$hoten', gioitinh=$gioitinh, diachi='$diachi',
								sdt1='$sdt1', sdt2='$sdt2', password='$newpass', ngaycapnhat='$ngaycapnhat' 
							where id=$id";
			else
				$strSQL = "	update user set hoten='$hoten', gioitinh=$gioitinh, diachi='$diachi',
								sdt1='$sdt1', sdt2='$sdt2', ngaycapnhat='$ngaycapnhat' 
							where id=$id";
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