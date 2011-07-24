<?php 
include_once (str_replace("//","/",dirname(__FILE__)."/")  . "../DAO/phongthuyDAO.php");
require_once("Utils/Utils.php");
include_once (str_replace("//","/",dirname(__FILE__)."/")  . "../DAO/DataProvider.php");
?>
<?php 
class phongthuyBUS
{
	public static function getPhongThuy ()
	{
		return phongthuyDAO::getPhongThuy ();
	}
	/*public static function getHinhAnh ()
	{
		return phongthuyDAO::getHinhAnh ();
	}*/
	public static function countAllBySQL($strSQL)
    {
		return phongthuyDAO::countAllBySQL($strSQL);
	}
	public static function getAllBySQL($strSQL)
    {
		return phongthuyDAO::getAllBySQL($strSQL);
	}
	public static function  display($strLink,$business,$totalItems,$curPage,$maxPages,$maxItems)
    {     
		 $strResult="<br>";
        $strResult.="<table id='tblist' width='100%' border='0' style='border:solid 1px #D3D3D3;' cellpadding='0' cellspacing='0'>";
		//$strResult.= "<tr style='height:20px; font-weight:bold; font-size:10px; background:#8BC5F4;'>Name</tr>";
		//$strResult.= "<tr style='height:36px; font-weight:bold; font-size:13px; background:#8BC5F4;'>NoiDung</tr>";
		//$strResult.= "<td style='border-right:solid 1px #D3D3D3; padding:4px;'>idconnect</td>";
		//$strResult.= "<td style='border-right:solid 1px #D3D3D3; padding:4px;'>NoiDung</td></tr>";
		
		 //$strResult.= "<td style='border-right:solid 1px #D3D3D3; padding:4px;'>Name</td>";
		
			for($i=0;$i<count($business);$i++)
			{
				$images = "select* from phongthuy";
				//div style="margin-left: 10px; margin-top: 10px; font-family: tahoma; font-size: 18px;
				//					font-weight: bold; color:#890C29; text-transform:uppercase;">
				
				$strResult.="<table>";
				$strResult.="<tr><div><b style='font-size:14px;font-weight:bold;color: #006DB9;'>".$business[$i]['Name']." </b></div></tr>";
				$strResult.="<tr>";
				$strResult.="</br>";
				//$strResult.="<tr>";
				
				//$strResult.="<img src='../images/phongthuy/".$business[$i]['HinhAnh']."'>";
				$strResult.="<td style='border-right:solid 1px #D3D3D3; padding:4px;' width='150px' > <img src='../images/phongthuy/".$business[$i]['HinhAnh1']."' style='vertical-align: middle;'/></td>";
				//$strResult.= echo $business[$i]['HinhAnh'] ;
				//$strResult.="<a href='chitietphongthuy.php?id=".$business[$i]['id']."'><img src='../".$images[0]['path']."' width='150px' /></a></td>";
				$strResult.="<td style='border-right:solid 1px #D3D3D3; padding:4px;' width='450px'>".$business[$i]['NoiDung']." </td>";
				$strResult.="</tr>";
				$strResult.="</table>";
				$strResult.="</br>";
				$strResult.="</br>";
				
			}
		$strPaging =Utils::paging ($strLink,$totalItems,$curPage,$maxPages,$maxItems);
		$strResult.=$strPaging; 
		$strResult.="</table>";
		return $strResult; 
		
		
        //echo $strPaging;
  		
	}
}
?>
			