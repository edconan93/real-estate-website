<?php
class Utils
{
    public static function convert_time($time)
    {
    	$arrDate = explode ("-", $time);
    	$d = (int) $arrDate[2];
    	$m = (int) $arrDate[1];
    	$y = (int) $arrDate[0];
    	$arrTime = explode (":",substr($arrDate[2],2));
    	
    	$time_out = $arrTime[0].":".$arrTime[1].":".$arrTime[2]." ngày ".$d."/".$m."/".$y;
    	return $time_out;
    }

    public static function paging($href,$totalProducts,$curPage,$maxShowedPage=5,$maxProductPerPage=15)
    {			 				
    	$paging="";	         		 
    	$mxR = $maxProductPerPage;
    	$mxP = $maxShowedPage;
    	if($totalProducts%$mxR==0)  
    		$totalPages = (int)($totalProducts/$mxR);
    	else 
    		$totalPages = (int)($totalProducts/$mxR+1);
    			
    	if($totalProducts>$mxR)
    	{
    		$paging="<div align='center'><br><table border='0' cellspacing='0' cellpadding='0' align='center'><tr> \n";
    		if ($curPage==1)
    		{
    			$paging.="<td><img src='images/previous_disable.gif' border='0'></td> \n";
    		}
    		else
    		{ 
    			$paging.=sprintf ("<td><a href='%spage=1' style='text-decoration:none'>Trang đầu</a></td> \n",$href);
    			$paging.=sprintf ("<td><a href='%spage=%d'class='link_image'><img src='../images/prev.png' border='0'></a></td> \n",$href,$curPage-1);
    		}				 	 
    		for($i=1;$i<=$totalPages;$i++)
    		{	
    			if(($i>((int)(($curPage-1)/$mxP))* $mxP) && ($i<=((int)(($curPage-1)/$mxP+1))* $mxP))
    			{
    				if($i==$curPage)      
    					$paging .= "<td> \n <span class='curpage'>". $i."</span>&nbsp;&nbsp;"."</td> \n";
    				else    
    					$paging .= sprintf ("<td><a href='%spage=%d'>%d</a>&nbsp;&nbsp;</td> \n",$href,$i,$i);
    			}
    		}
    		if ($curPage<$totalPages)
    		{
    			
    			$paging.=sprintf ("<td><a href='%spage=%d' class='link_image'><img src='../images/next.png' border='0'></a></td> \n",$href,$curPage+1);
    			$paging.=sprintf ("<td><a href='%spage=%d' style='text-decoration:none'>Trang cuối</a></td> \n",$href,$totalPages);
    		}
    		else
    			$paging.="<td><img src='images/next_disable.gif' border='0'></td> \n";
    		$paging.="</tr></table><br></div>";
    	}
    	return $paging;
    }
    public static function getMoneyPerHouse($business)
    {
        //1.000.000 => 1
        require_once("../BUS/DonviTienBUS.php");
        $dvTien=DonViTienBUS::selectId($business['donvitien']);
        $money=$business['giaban'];
        $money=$money*$dvTien['tigia'];
        if($business['donvidv']==1)//so tien tren m2
            $money=$money*$business['dai']*$business['rong'];
    //    echo "alibaba".$money;
        return $money;
    }
}
?>