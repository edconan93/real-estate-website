<?php 
include_once (str_replace("//","/",dirname(__FILE__)."/")  . "../DAO/kientrucDAO.php");
require_once("Utils/Utils.php");

?>
<?php 
class kientrucBUS
{
	public static function getKienTruc ()
	{
		return KienTrucDAO::getKienTruc ();
	}
	
	public static function countAllBySQL($strSQL)
    {
		return kientrucDAO::countAllBySQL($strSQL);
	}
	public static function getAllBySQL($strSQL)
    {
		return kientrucDAO::getAllBySQL($strSQL);
	}
	public static function  display($strLink,$business,$totalItems,$curPage,$maxPages,$maxItems)
    {     
		 $strResult="<br>";
        $strResult.="<table id='tblist' width='100%' border='0' style='border:solid 1px #D3D3D3;' cellpadding='0' cellspacing='0'>";
		
			for($i=0;$i<count($business);$i++)
			{
				$images = "select* from kientruc";
				
				
				$strResult.="<table>";
				$strResult.="<tr><div><b style='font-size:14px;font-weight:bold;color: #006DB9;'>".$business[$i]['name']." </b></div></tr>";
				$strResult.="<tr>";
				$strResult.="</br>";
				
				$strResult.="<td style='border-right:solid 1px #D3D3D3; padding:4px;'  > <img width='70px'; heigh='70px'; src='../images/kientruc/".$business[$i]['hinhanh1']."' style='vertical-align: middle;'/></td>";
				
				$strResult.="<td style='border-right:solid 1px #D3D3D3; padding:4px;' width='450px'>".$business[$i]['noidung']." </td>";
				$strResult.="</tr>";
				$strResult.="</table>";
				$strResult.="</br>";
				$strResult.="</br>";
				
			}
		$strPaging =Utils::paging ($strLink,$totalItems,$curPage,$maxPages,$maxItems);
		$strResult.=$strPaging; 
		$strResult.="</table>";
		return $strResult; 
		
		
    
  		
	}
}
?>
			