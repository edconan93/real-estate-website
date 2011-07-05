<?php 
	include_once ("../BUS/DichVuBUS.php");
	include_once ("../BUS/LoaiDichVuBUS.php");
	include_once ("../BUS/HuongNhaBUS.php");
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
	public static function display($strLink,$business,$totalItems,$curPage,$maxPages,$maxItems)
    {
		$strResult="";
		//echo "<br>business=".count($business);
		for($i=0;$i<count($business);$i++)
        {
			$strResult.="<tr bgcolor='#ffffff'>";
			$strResult.="<td width='60' valign='middle' align='center' style='border-bottom:solid 1px #CCCCCC;'>";
			$strResult.="<b>".$business[$i][0]."</b></td>";//id
			
			$strResult.="<td valign='top' align='left' style='border-left: 1px solid rgb(204, 204, 204); border-bottom: 1px solid rgb(204, 204, 204);'>";
			$strResult.="<span style='color: rgb(255, 0, 0);'>Tin đã duyệt</span><br>";//loai tin
			$strResult.="<b>".$business[$i][1]."</b><br>";//tên tiêu đề
			$loaidv=LoaiDichVuBUS::getById($business[$i][19]);
			$huongnha = HuongNhaBUS::GetHuongNhaById($business[$i][17]);
			echo "<br>huong nha=".$huongnha[0];
			$strResult.="- <a target='_blank' href='http://www.nhaban.com/nha-dat/?loaitin=1'>".$loaidv[1]."</a>";//tên loại dv
			$strResult.="- <a target='_blank' href='http://www.nhaban.com/nha-dat/?category=2'>Cửa hàng, Văn phòng</a> - <a target='_blank' href='http://www.nhaban.com/nha-dat/?vt=7'>Mặt tiền</a>
						- ".$huongnha[1]."<br>";//Hướng nhà
			$strResult.="<b>- Giá:<b>7</b> Tỷ - KT: 4 x 20m - DTXD : 90 m<sup>2</sup> </b><br>";//giá nhà và kt
			$strResult.="</td>";//giá nhà và kt
			$strResult.="<td width='260' valign='top' style='border-left: 1px solid rgb(204, 204, 204); border-bottom: 1px solid rgb(204, 204, 204);'>";//column 3
			$strResult.="<div style='margin-bottom: 5px; font-weight: normal; color: rgb(51, 51, 51);'>";
			$strResult.="- 1 lượt xem tin <br>"; //so nguoi xem tin
			$strResult.="- Ngày đăng: &nbsp;&nbsp;&nbsp;&nbsp;23-06-2011<br>"; //ngay dang
			$strResult.="- Ngày hết hạn: 17-08-2011<br>"; //ngay het han
			$strResult.="</div>"; 
			$strResult.="<div style='padding: 3px; background-color: rgb(242, 245, 249); border: 1px solid rgb(204, 204, 204);font-weight: bold;'>"; 
			$strResult.="<b title='23-06-2011' style='color: green;'>"; 
			$strResult.="<img align='center' style='margin: 0px;position:relative;top:-4px;' src='../images/action_check2.png'>Đã cập nhật</b>&nbsp;&nbsp;"; 
			$strResult.="<a href='http://www.nhaban.com/member/submit.php?id=677638&amp;act=nha&amp;step=1'>"; 
			$strResult.="<img align='center' style='margin: 0px;position:relative;top:-4px;' src='../images/edit.png'><b>Sửa tin</b></a>&nbsp;&nbsp;"; 
			$strResult.="<a onclick='' href='#'>"; 
			$strResult.="<img align='center' style='margin: 0px;position:relative;top:-4px;' src='../images/action_delete2.png'><b>Xóa tin</b></a></div>"; 
			$strResult.="</td></tr>"; 
		}
		$strResult.="</table>";
		$strPaging = Utils::paging ($strLink,$totalItems,$curPage,$maxPages,$maxItems);
  		$strResult.="<center>".$strPaging;

        return $strResult;
	}
}
?>