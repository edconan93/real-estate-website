<?php
/*Lớp ThongTinNhaDatDAO
	1. Add($chusohuu, $phuong, $ngay, $duong,$rong,$dai, $dientich, $giaban, $donvi, $khanangban,$status)
    	- Chức năng: thêm 1 user mới 
        - Tham số: 
        	+username: không được phép trùng với username đã tốn tại
            +password: được mã hóa md5
            +Các tham số còn lại như trong mô tả CSDL
        - Trả về:
        	+false: nếu vì 1 lý do nào đó insert ko thành công
            +Ngược lại, trả về user_id mới được tự động phát sinh
    2. Update ($id, $chusohuu, $phuong, $ngay, $duong, $rong, $dai , $dientich, $giaban, $donvi, $khanangban,$status)
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
	class ThongTinNhaDatDAO
	{
    	public static function Add ($chusohuu, $phuong, $ngay, $duong,$rong,$dai, $dientich, $giaban, $donvi, $khanangban,$status)
        {
            $strSQL = "Insert into thongtinnhadat values (NULL,'$chusohuu', '$phuong', '$ngay', '$duong', '$rong','$dai','$dientich', '$giaban' ,'$donvi', '$khanangban',$status)";
		    $cn = DataProvider::Open ();
			DataProvider::MoreQuery ($strSQL,$cn);
			
			if(mysql_affected_rows () == 0)
				$result=false;
			else
				$result=mysql_insert_id ();
				
			DataProvider::Close ($cn);
            return $result;
        }

    	public static function Update ($id, $chusohuu, $phuong, $ngay, $duong, $rong, $dai , $dientich, $giaban, $donvi, $khanangban,$status)
        {

            $strSQL = "update thongtinnhadat set chusohuu='$chusohuu',phuong='$phuong',ngay='$ngay',
						duong='$duong',rong='$rong', dai='$dai',
			 			dientich='$dientich', giaban= '$giaban', donvi='$donvi', khanangban='$khanangban', status='$status'
						where user_id=$user_id";
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
            $strSQL = "update thongtinnhadat set status= '$status' where id=$id";
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