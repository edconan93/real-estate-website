<?php /*
Lớp DiaOcPhapLuatBUS

*/ ?>
<?php 
	include_once (str_replace("//","/",dirname(__FILE__)."/")  . "../DAO/DiaOcPhapLyDAO.php");
?>
<?php 
	class DiaOcPhapLyBUS
	{

		public static function GetAllDiaOcPhapLy ()
		{
			return DiaOcPhapLyDAO::GetAllDiaOcPhapLy();
		}
		public static function selectId($id)
		{
			return DiaOcPhapLyDAO::selectId($id);
		}
		public static function countAllBySQL($strSQL)
		{
			return DiaOcPhapLyDAO::countAllBySQL($strSQL);
		}
		public static function getAllBySQL($strSQL)
		{
			return DiaOcPhapLyDAO::getAllBySQL($strSQL);
		}
		public static function  display($strLink,$business,$totalItems,$curPage,$maxPages,$maxItems)
		{     
			$strResult="<br>";
			$strResult.="<table id='tblist' width='100%' border='0' style='border:solid 1px #D3D3D3;' cellpadding='0' cellspacing='0'>";
			
				for($i=0;$i<count($business);$i++)
				{
					$images = "select* from diaocphapluat";
					
					
					$strResult.="<table>";
					$strResult.="<br><tr><div><a href='chitietdiaocphaply.php?iddiaocphaply=".$business[$i]['id']."'><b style='font-size:14px;font-weight:bold;color: #006DB9;'>".$business[$i]['tieude']." </b></a></div></tr>";
					$strResult.="<tr>";
					$strResult.="</br>";
					
					$strResult.="<td style=' padding:4px;'  > <img width='70px'; heigh='70px'; src='../images/phapluat/".$business[$i]['hinhanh']."' style='vertical-align: middle;'/></td>";
					
					$strResult.="<td style=' padding:4px;' width='450px'>".$business[$i]['chitiet']." </td>";
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