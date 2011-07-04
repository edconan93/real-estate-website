<?php /*
Lớp UsersBUS
	1. Add($username, $password, $email, $avatar,$registered_date,$security_question, $answer, $last_visited, $status, $user_type)
    	- Chức năng: thêm 1 user mới 
        - Tham số: 
        	+username: không được phép trùng với username đã tốn tại
            +password: được mã hóa md5
            +Các tham số còn lại như trong mô tả CSDL
        - Trả về:
        	+false: nếu vì 1 lý do nào đó insert ko thành công
            +Ngược lại, trả về user_id mới được tự động phát sinh
    2. Update ($user_id, $password, $email, $avatar,$registered_date,$security_question, $answer, $last_visited, $status, $user_type)
    	- Chức năng: cập nhật toàn bộ thông tin của 1 user
        - Tham số: toàn bộ thông tin của user tương ứng trừ username
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
*/ ?>
<?php 
	include_once (str_replace("//","/",dirname(__FILE__)."/")  . "../DAO/UsersDAO.php");
?>
<?php 
	class UsersBUS
	{
		public static function Add($password, $email, $hoten, $gioitinh, $diachi, $sdt1, $sdt2,$role, $level, $status,$updatedate,$ip)
		{
			$password=trim($password);
			$password = md5 ($password);
			$email =addslashes($email);
			// $hoten=addslashes($hoten);
			// $gioitinh=addslashes($gioitinh);
			// $diachi=addslashes($diachi);
			// $sdt1=addslashes($sdt1);
			// $sdt2=addslashes($sdt2);
			// $role=addslashes($role);
			// $level=addslashes($level);
			
			return UsersDAO::Add ($password, $email, $hoten, $gioitinh, $diachi, $sdt1, $sdt2,$role, $level, $status,$updatedate,$ip);
			
		}
		
		public static function checkPassword($password)
		{
			$password=trim($password);
			$password = md5 ($password);
			return UsersDAO::checkPassword($password);
		}
		
		// public static function changePassword($id,$password)
		// {
			// $password=trim($password);
			// $password = md5 ($password);
			// return UsersDAO::changePassword($id,$password);
		// }
		
		public static function Update($id,$password, $email,$hoten, $gioitinh,$diachi,$sdt1,$sdt2,$role, $level, $status=1,$updatedate,$ip)
		{
		    $password = md5 ($password);
			$email =addslashes($email);	
			
			return UsersDAO::Update ($id, $password, $email, $hoten, $gioitinh, $diachi, $sdt1, $sdt2,$role, $level, $status,$updatedate,$ip);
		}
		
		public static function SetStatus ($id, $status)
		{
			return UsersDAO::SetStatus ($id, $status);
		}
		
		public static function SetPassword ($id, $newPassword)
		{
			$newPassword=md5($newPassword);
			return UsersDAO::SetPassword ($id, $newPassword);
		}
		
		
		public static function SetEmail ($id, $Email)
		{
			$email =addslashes($email);
			return UsersDAO::SetEmail ($id, $Email);
		}
		
		public static function SetAvatar ($user_id, $avatar)
		{
			return UsersDAO::SetAvatar ($user_id, $avatar);
		}
		
		public static function Login ($email, $password)
		{
			$email =addslashes($email);
			$password = md5 ($password);
			return UsersDAO::Login ($email, $password);
		}
		
		public static function GetUserByID ($id)
		{
			$user= UsersDAO::GetUserByID ($id);
			$user[1] = stripcslashes($user[1]);
			$user[3] = stripcslashes($user[3]);
			$user[7] = stripcslashes($user[7]);
			return $user;
		}
		public static function GetUserByEmail ($email)
		{
			return UsersDAO::GetUserByEmail ($email);
		}
		
		public static function GetUserByName ($username)
		{
			return UsersDAO::GetUserByName ($username);
		}
		
		public static function FindByName ($keyWord,$index=0,$limit=10)
		{
			$index=(int)$index;
			$limit=(int)$limit;
			$keyWord =addslashes($keyWord);
			return UsersDAO::FindByName ($keyWord,$index,$limit);
		}
		
		public static function countResultByName ($keyWord)
		{
			$keyWord =addslashes($keyWord);
			return UsersDAO::countResultByName ($keyWord);
		}
		
		public static function FindByEmail ($keyWord,$index=0,$limit=10)
		{
			$index=(int)$index;
			$limit=(int)$limit;
			$keyWord =addslashes($keyWord);
			return UsersDAO::FindByEmail ($keyWord,$index,$limit);
		}
		
		public static function getUsers ()
		{
			return UsersDAO::getUsers ();
		}
		
		
		// public static function countResultByEmail ($keyWord)
		// {
			// $keyWord =addslashes($keyWord);
			// return UsersDAO::countResultByEmail ($keyWord);
		// }
		
		// public static function getRandomUsers ($num)
		// {
			// $num = (int) $num;
			// return UsersDAO::getRandomUsers($num);
		// }
		
		
		// public static function Count($type=-1,$status=-1,$keyword="")
		// {
			// $status = (int)$status;
			// $type = (int)$type;
			// $keyword=addslashes($keyword);
			// return UsersDAO::Count ($type,$status,$keyword);
		// }
		
		// public static function getVisitedUsers($day=1,$limit=10)
		// {
			// return UsersDAO::getVisitedUsers ($day,$limit);
		// }
		
		// public static function getNewUsers($day=1,$limit=10)
		// {
			// return UsersDAO::getNewUsers ($day,$limit);
		// }
		/*
		public static function getUsers ($index=0,$limit=15,$type=-1,$status=-1,$keyword="",$sort=0)
		{
			if($index<0)
				$index=0;
			$keyword=addslashes($keyword);
			return UsersDAO::getUsers ($index,$limit,$type,$status,$keyword,$sort);
		}*/
		
		// public static function Delete ($user_id)
		// {
			// $user_id = (int) $user_id;
			// return UsersDAO::Delete ($user_id);
		// }
		
		// public static function SetSecurityQuestion ($user_id, $security_question,$answer)
		// {
			// $user_id = (int) $user_id;
			// $security_question =(int)  $security_question;
			// $answer = addslashes($answer);
			// return UsersDAO::SetSecurityQuestion ($user_id, $security_question,$answer);
		// }
		// public static function SetType($user_id, $type)
		// {
			// $user_id = (int) $user_id;
			// $type =(int)  $type;
			// return UsersDAO::SetType ($user_id, $type);
		// }
	}
?>