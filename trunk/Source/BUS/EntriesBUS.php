<?php /*
Lớp EntriesBUS
	1. Add($entry_id, $posted_user, $posted_day, $title, $content, $public, $allow_comment, $status)
    	- Chức năng: thêm 1 dòng vào bảng entries
        - Tham số:  Các tham số  như trong mô tả CSDL
        - Giá trị mặc định :$status=1 
        - Trả về:
        	+false: nếu vì 1 lý do nào đó insert ko thành công
            +Ngược lại, trả về true
    2. Update ($entry_id, $posted_user, $posted_day, $title, $content, $public, $allow_comment, $status)
    	- Chức năng: cập nhật toàn bộ thông tin của 1 entries
        - Tham số: toàn bộ thông tin của entry tương ứng
        - Giá trị mặc định :$status=1 
        - Trả về: 
        	+true: thành công
            +false: không có dòng nào trong bảng bị thay đổi
    3. SetPublic($entry_id, $public): thay đổi public của user Entries
    4. SetStatus($entry_id, $status): thay đổi status của Entries
    5. SetAllowComment($entry_id, $allow_comment): thay đổi cho phép comment của Entries
    6. GetNEntriesByPostedUser ($posted_user, $n): lấy n entry của 1 user trong bảng entries. Trả về null nếu không có entry nào
    7. GetXtoYEntriesByPostedUser ($posted_user, $posted_datex, $posted_datey): lấy entry từ ngày X đến ngày Y của 1 user trong bảng entries. Trả về null nếu không có entry nào
    8. GetCountEntriesByPostedUser ($posted_user): đếm số entry của 1 user trong bảng entries. Trả về null nếu không có entry nào
    9. GetNNewestEntriesByPostedUser($posted_user, $n)
	10. GetAllEntriesByPostedUser($posted_user): lấy toàn bộ entry của một user
	11. GetEntryByPostedUser($posted_user, $entry_id): lấy entry có $entry_id của một user
	12. GetNewestEntry($n): lấy $n entry mới nhất trong bảng entries. Mỗi user_id chỉ lấy 1 entry.
	13. FindIdMax(): tìm id lớn nhất hiện có của Entries.
	14. GetEntriesByTagIdsPaging($entryids, $start, $pagesize)
	15. GetCountEntriesByTagId($tag_id)
*/ ?>
<?php 
	include_once (str_replace("//","/",dirname(__FILE__)."/")  . "../DAO/EntriesDAO.php");
?>

<?php
	class EntriesBUS
	{
    	public static function Add ($posted_user, $posted_date, $title, $content, $public, $allow_comment, $status=1)
        {
            $title =addslashes($title);
			$content =addslashes($content);
			$arrDate = explode ("-",$posted_date);
			if(checkdate($arrDate[1],$arrDate[2],$arrDate[0]) == false)
				return false;

			return EntriesDAO::Add ($posted_user, $posted_date, $title, $content, $public, $allow_comment, $status);
        }

		public static function Update ($entry_id, $posted_user, $posted_date, $title, $content, $public, $allow_comment, $status=1)
        {

            $title =addslashes($title);
			$content =addslashes($content);
			$arrDate = explode ("-",$posted_date);
			if(checkdate($arrDate[1],$arrDate[2],$arrDate[0]) == false)
				return false;

			return EntriesDAO::Update ($entry_id, $posted_user, $posted_date, $title, $content, $public, $allow_comment, $status);
        }
		
		public static function SetPublic ($entry_id, $public)
        {
            return EntriesDAO::SetPublic ($entry_id, $public);
        }
		
     	public static function SetStatus ($entry_id, $status)
        {
            return EntriesDAO::SetStatus ($entry_id, $status);
        }
		
		public static function SetAllowComment ($entry_id, $allow_comment)
        {
            return EntriesDAO::SetAllowComment ($entry_id, $allow_comment);
        }

		public static function GetNEntriesByPostedUser ($posted_user, $n)
		{
			if( $n < 0)
				return false;
				
			$info = EntriesDAO::GetNEntriesByPostedUser ($posted_user, $n);
			return $info;
		}
		
		public static function GetXtoYEntriesByPostedUser ($posted_user, $posted_datex, $posted_datey)
		{
			$arrDate = explode ("-",$posted_datex);
			if(checkdate($arrDate[1],$arrDate[2],$arrDate[0]) == false)
				return false;
			
			$arrDate = explode ("-",$posted_datey);
			if(checkdate($arrDate[1],$arrDate[2],$arrDate[0]) == false)
				return false;
			
			$info = EntriesDAO::GetXtoYEntriesByPostedUser ($posted_user, $posted_datex, $posted_datey);
			return $info;
		}
		
		public static function GetCountEntriesByPostedUser ($posted_user,$status=1)
		{
			$info = EntriesDAO::GetCountEntriesByPostedUser ($posted_user,$status);
			return $info;
		}
		
		public static function GetNNewestEntriesByPostedUser ($posted_user, $n)
		{
			$info = EntriesDAO::GetNNewestEntriesByPostedUser ($posted_user, $n);
			return $info;
		}
		
		public static function GetAllEntriesByPostedUser ($posted_user)
		{
			$info = EntriesDAO::GetAllEntriesByPostedUser ($posted_user);
			return $info;
		}
		
		public static function GetAllEntriesByPostedUserPaging($posted_user, $start, $pagesize)
		{
			$info = EntriesDAO::GetAllEntriesByPostedUserPaging($posted_user, $start, $pagesize);
			return $info;
		}
		
		public static function GetEntryByPostedUser($posted_user, $entry_id)
		{
			$info = EntriesDAO::GetEntryByPostedUser($posted_user, $entry_id);
			return $info;
		}
		
		public static function getNewestEntries ($n=6)
		{
			return EntriesDAO::getNewestEntries($n);
		}
		
		public static function FindByTitle ($keyWord)
		{
			$keyWord = addslashes($keyWord);
			return EntriesDAO::FindByTitle($keyWord);
		}
		
		public static function countResultByTitle ($keyWord)
		{
			$keyWord = addslashes($keyWord);
			return EntriesDAO::countResultByTitle($keyWord);
		}
		

		public static function getNewEntries($limit=10)  
		{
			return EntriesDAO::getNewEntries($limit);
		}

		public static function FindIdMax ()
		{
			return EntriesDAO::FindIdMax();
		}
		
		public static function getEntries ($index=0,$limit=15,$status=-1,$type=0,$keyword="",$sort=0)
		{
			if($index<0)
				$index=0;
			$keyword=addslashes($keyword);
			return EntriesDAO::getEntries ($index,$limit,$status,$type,$keyword,$sort);
		}
		
		public static function Count($status=-1,$type=0,$keyword="")
		{
			$status = (int)$status;
			$type = (int)$type;
			$keyword = addslashes($keyword);
			return EntriesDAO::Count ($status,$type,$keyword);
		}
		
		public static function Delete($eid)
		{
			$eid = (int)$eid;
			return EntriesDAO::Delete($eid);
		}
		
		public static function GetEntriesByTagIdsPaging($tag_id, $uid, $start, $pagesize)
		{
			$info = EntriesDAO::GetEntriesByTagIdsPaging($tag_id, $uid, $start, $pagesize);
			return $info;
		}
		
		public static function GetCountEntriesByTagId($tag_id, $uid)
		{
			$info = EntriesDAO::GetCountEntriesByTagId($tag_id, $uid);
			return $info;
		}
	}
?>
