<?php
/*Lớp PhuongDAO
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
        - Tham số: toàn bộ thông tin của user tương ứng, trừ username
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
	class PhuongDAO
	{
    	public static function Add ($ten, $idquan)
        {
            $strSQL = "Insert into phuong values (NULL,'$ten', '$idquan')";
		    $cn = DataProvider::Open ();
			DataProvider::MoreQuery ($strSQL,$cn);
			
			if(mysql_affected_rows () == 0)
				$result=false;
			else
				$result=mysql_insert_id ();
				
			DataProvider::Close ($cn);
            return $result;
        }

    	public static function Update ($id, '$ten', '$idquan')
        {

            $strSQL = "update phuong set ten='$ten',idquan='$idquan'
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