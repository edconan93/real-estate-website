<?php 
	include_once ("../BUS/DichVuBUS.php");
	include_once ("../BUS/LoaiDichVuBUS.php");
	include_once ("../BUS/HuongNhaBUS.php");
	include_once ("../BUS/DonViTienBUS.php");
	include_once ("../BUS/DonViDichVuBUS.php");
	include_once ("../BUS/LoaiNhaBUS.php");
	require_once("Utils/Utils.php");
/**
 * @author sieudang
 * @copyright 2011
 */

class MessageTypeProcessor
{
		
    public static function loadAllMessage()
    {
        $strLink = "tindadang.php?";
        $curPage=1;   
        $totalItems =null;
        $business = null;
        if(isset($_REQUEST['page']))
            $curPage=$_REQUEST['page'];
        $maxItems = 2;
	    $maxPages = 25;
        $offset=($curPage-1)*$maxItems; 
        // if(isset($_REQUEST['loaidv']))
        // {
            // $strLink.="loaidv=".$_REQUEST['loaidv']."&";
            // $totalItems=DichVuBUS::countAllDichVuByLoai($_REQUEST['loaidv']);
            // $business=DichVuBUS::getALLDichVuByLoai($_REQUEST['loaidv'],$offset,$maxItems);
        // }
        // else
        // {
            $totalItems=DichVuBUS::countAll();
			// echo "<br>totalItems=".$totalItems;
			// echo "<br>offset=".$offset;
			// echo "<br>offset=".$offset;
			 
            $business=DichVuBUS::getAll($offset,$maxItems);
        // }
       
        return MessageTypeProcessor::display($strLink,$business,$totalItems,$curPage,$maxPages,$maxItems);
    }
	public static function findBussiness()
    {
        //create string sql
		if(isset($_POST['btnSearch']))
		{
			$messageID = $_POST["txtMessageID"];
			$serviceType =(int) $_POST["cbbServiceType"];
			$category =(int) $_POST["cbbCategory"];
			$location =(int) $_POST["cbbLocation"];
			echo "<br>messageID=".$messageID;
			echo "<br>deviceType=".$serviceType;
			echo "<br>category=".$category;
			echo "<br>location=".$location;
			$strLink= "tindadang.php?";
			$strSQL="select * from ";
			$strTable="dichvu";
			$strWhere=" where 1=1 ";
			if(isset($_POST["txtMessageID"]) && $_POST["txtMessageID"] != null)
			{
				$strLink.="txtMessageID=".$_POST["txtMessageID"]."&";
				$strWhere.=" and dichvu.id=".$_POST["txtMessageID"];
			}
			if(isset($_POST["cbbCategory"])&& $category !=-1)
			{
				$strLink.="cbbLoaiBDS=".$category."&";
				$strWhere.=" and dichvu.loainha=".$category;
			}
			if(isset($_POST["cbbLocation"])&& $_POST["cbbLocation"] !=-1)
			{
				$strLink.="cbbTinh=".$_POST["cbbLocation"]."&";
				$strWhere.=" and dichvu.tinh=".$_POST["cbbLocation"];
			}
			if(isset($_POST["cbbServiceType"])&&$_POST["cbbServiceType"]!=-1)
			{
				$strLink.="cbbLoaidv=".$_POST["cbbServiceType"]."&";
				$strWhere.=" and dichvu.loaidv=".$_POST["cbbServiceType"];
			}
			$strSQL.=$strTable.$strWhere;
			return MessageTypeProcessor::findBusiness($strLink,$strSQL);
		}
		 return null;  
	}

	public static function display($strLink,$business,$totalItems,$curPage,$maxPages,$maxItems)
    {
		$strResult="";
		// echo "<br>business=".count($business);
		for($i=0;$i<count($business);$i++)
        {
			$strResult.="<tr bgcolor='#ffffff'>";
			$strResult.="<td width='60' valign='middle' align='center' style='border-bottom:solid 1px #CCCCCC;'>";
			$strResult.="<b>".$business[$i][0]."</b></td>";//id
			
			$strResult.="<td valign='top' align='left' style='border-left: 1px solid rgb(204, 204, 204); border-bottom: 1px solid rgb(204, 204, 204);'>";
			$strResult.="<span style='color: rgb(255, 0, 0);'>Tin đã duyệt</span><br>";//loai tin
			$strResult.="<b>".$business[$i][1]."</b><br>";//tên tiêu đề
			
			$loaidv=LoaiDichVuBUS::getById($business[$i][19]);
			$huongnha = HuongNhaBUS::GetHuongNhaById($business[$i]['huongnha']);
			$donvitien= DonViTienBUS::selectId($business[$i]['donvitien']);
			$donvidv= DonViDichVuBUS::selectId($business[$i]['donvidv']);
			$loainha= LoaiNhaBUS::getById($business[$i]['loainha']);
			if($business[$i]['ngaydang'] != null)
			{
				$date=Utils::convertTimeDMY($business[$i]['ngaydang']);
				$declinetime=Utils::convertDecline_Time($business[$i]['ngaydang']);
			}
			else
			{
				$date ="00:00:00";
				$declinetime ="00:00:00";
			}
			
			$strResult.="- <b style='color: #0D5DA8;font-weight:bold;font-size:11px;text-decoration: none;'	>Loại nhà:".$loainha['ten']." </b><br> - <a target='_blank' href='#'>".$loaidv[1]."</a>";//tên loại dv
			$strResult.="- Hướng nhà:".$huongnha[1]."<br>";//Hướng nhà
			$strResult.="<b>- Giá:<b>".$business[$i]['giaban']."</b> ".$donvitien['ten']."/ ".$donvidv['ten']."  - Kích thước: ".$business[$i]['dai']." x ".$business[$i]['rong']."m<sup>2</sup> </b><br>";//giá nhà và kt
			$strResult.="</td>";//giá nhà và kt
			$strResult.="<td width='260' valign='top' style='border-left: 1px solid rgb(204, 204, 204); border-bottom: 1px solid rgb(204, 204, 204);'>";//column 3
			$strResult.="<div style='margin-bottom: 5px; font-weight: normal; color: rgb(51, 51, 51);'>";
			$strResult.="- 1 lượt xem tin <br>"; //so nguoi xem tin
			$strResult.="- Ngày đăng: &nbsp;&nbsp;&nbsp;&nbsp;".$date."<br>"; //ngay dang
			$strResult.="- Ngày hết hạn: ".$declinetime."<br>"; //ngay het han
			$strResult.="</div>"; 
			$strResult.="<div style='padding: 3px; background-color: rgb(242, 245, 249); border: 1px solid rgb(204, 204, 204);font-weight: bold;'>"; 
			$strResult.="<b title='23-06-2011' style='color: green;'>"; 
			$strResult.="<img align='center' style='margin: 0px;position:relative;top:-4px;' src='../images/action_check2.png'>Đã cập nhật</b>&nbsp;&nbsp;"; 
			$strResult.="<a href='#' style='color: #0D5DA8;font-weight:bold;font-size:11px;text-decoration: none;'>"; 
			$strResult.="<img align='center' style='margin: 0px;position:relative;top:-4px;' src='../images/edit.png'>Sửa tin</a>&nbsp;&nbsp;"; 
			$strResult.="<a onclick='' href='#' style='color: #0D5DA8;font-weight:bold;font-size:11px;text-decoration: none;'>"; 
			$strResult.="<img align='center' style='margin: 0px;position:relative;top:-4px;' src='../images/action_delete2.png'>Xóa tin</a></div>"; 
			$strResult.="</td></tr>"; 
		}
		$strResult.="</table>";
		
		$strPaging = Utils::paging ($strLink,$totalItems,$curPage,$maxPages,$maxItems);
  		$strResult.="<center>".$strPaging;
		//echo "<br>business=".$strPaging;
        return $strResult;
	}
	//search
	public static function findSearchInContext()
    {
        //create string sql
		if(isset($_POST['btnSearch']))
		{
			$messageID = $_POST["txtMessageID"];
			$serviceType =(int) $_POST["cbbServiceType"];
			$category =(int) $_POST["cbbCategory"];
			$location =(int) $_POST["cbbLocation"];
			$strLink= "tindadang.php?";
			$strSQL="select * from ";
			$strTable="dichvu";
			$strWhere=" where 1=1 ";
			if(isset($_POST["txtMessageID"]) && $_POST["txtMessageID"] != null)
			{
				$strLink.="txtMessageID=".$_POST["txtMessageID"]."&";
				$strWhere.=" and dichvu.id=".$_POST["txtMessageID"];
			}
			if(isset($_POST["cbbCategory"])&& $category != -1)
			{
				$strLink.="cbbLoaiBDS=".$category."&";
				$strWhere.=" and dichvu.loainha=".$category;
			}
			if(isset($_POST["cbbLocation"])&& $_POST["cbbLocation"] != -1)
			{
				$strLink.="cbbTinh=".$_POST["cbbLocation"]."&";
				$strWhere.=" and dichvu.tinh=".$_POST["cbbLocation"];
			}
			if(isset($_POST["cbbServiceType"])&&$_POST["cbbServiceType"]!= -1)
			{
				$strLink.="cbbLoaidv=".$_POST["cbbServiceType"]."&";
				$strWhere.=" and dichvu.loaidv=".$_POST["cbbServiceType"];
			}
			$strSQL.=$strTable.$strWhere;
			return MessageTypeProcessor::findSearchContext2($strLink,$strSQL);
		}
		 return null;  
	}
	 public static function findSearchContext2($strLink,$strSQL)
    {
        $curPage=1;
		$totalItems =null;
		$business = null;		
        if(isset($_REQUEST['page']))
              $curPage=$_REQUEST['page'];
        $maxItems = 2;
    	$maxPages = 25;      
        $offset=($curPage-1)*$maxItems; 
        $strCountSQL=str_replace("*"," count(*) ",$strSQL);
        $totalItems=DichVuBUS::countAllBySQL($strCountSQL); 
        $strSQL.=" limit $offset,$maxItems";
             
        $business=DichVuBUS::getAllBySQL($strSQL);                
        $totalItems=count($business); 
		
// echo "<br>strlink=".$strLink;		
// echo "<br>totalItems=".$totalItems;		
// echo "<br>curPage=".$curPage;		
// echo "<br>strSQL=".$strSQL;

        return MessageTypeProcessor::display($strLink,$business,$totalItems,$curPage,$maxPages,$maxItems);
		
    }
}
?>