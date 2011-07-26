<?php 
include_once (str_replace("//","/",dirname(__FILE__)."/")  . "../DAO/GioiThieuDAO.php");
require_once("Utils/Utils.php");
?>
<?php 
class GioiThieuBUS
{
	public static function getGioiThieu ()
	{
		return GioiThieuDAO::getGioiThieu ();
	}
	
	public static function selectID($id)
    {
		return GioiThieuDAO::selectID($id);
	}
}
?>
			