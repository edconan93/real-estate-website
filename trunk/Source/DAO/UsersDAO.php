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
    	public static function Add ($password, $email,$hoten, $gioitinh,$diachi,$sdt1,$sdt2,$role, $level, $status)
        {
            $strSQL = "Insert into user values (NULL, '$password', '$email', '$hoten','$gioitinh', '$diachi','$sdt1','$sdt2','$role','$level','$status')";
		    $cn = DataProvider::Open ();
			DataProvider::MoreQuery ($strSQL,$cn);
			
			if(mysql_affected_rows () == 0)
				$result=false;
			else
				$result=mysql_insert_id ();
				
			DataProvider::Close ($cn);
            return $result;
        }

    	public static function Update ($id,$password, $email,$hoten, $gioitinh,$diachi,$sdt1,$sdt2,$role, $level, $status)
        {

            $strSQL = "update khgiaodich set password='$password', email='$email',hoten='$hoten',gioitinh='$gioitinh',diachi='$diachi'
						sdt1='$sdt1',sodt2='$sodt2', role='$role',
			 			level='$level', status= '$status' 
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

     	public static function SetStatus ($id, $status)
        {
            $strSQL = "update khgiaodich set status= '$status' where id=$id";
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
            $strSQL = "update user set password= '$newPassword' where id=$id";
            $cn = DataProvider::Open ();
			DataProvider::MoreQuery ($strSQL,$cn);
			
			if(mysql_affected_rows () == 0)
				$result=false;
			else
				$result=true;
				
			DataProvider::Close ($cn);
            return $result;
        }
		
		
		public static function SetEmail ($id , $Email)
        {
            $strSQL = "update user set email= '$Email' where id=$id";
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
            $strSQL = "select * from user where email='$email' and password='$password' and status=1";
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
		


		
	}
?>