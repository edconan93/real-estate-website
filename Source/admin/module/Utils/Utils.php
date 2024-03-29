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
	public static function convertTimeDMY($time)
    {
    	$arrDate = explode ("-", $time);
    	$d = (int) $arrDate[2];
    	$m = (int) $arrDate[1];
    	$y = (int) $arrDate[0];
    	//$arrTime = explode (":",substr($arrDate[2],2));
    	
    	$time_out = $d."/".$m."/".$y;
    	return $time_out;
    }
	public static function convertDecline_Time($time)
    {
    	$arrDate = explode ("-", $time);
    	$d = (int) $arrDate[2] + 15;
    	$m = (int) $arrDate[1];
		$y = (int) $arrDate[0];
		if($m == 1 || $m == 3 ||$m == 5 ||$m == 7||$m == 8||$m == 10 || $m == 12)
		{
			if($d>31)
			{
				$d=$d-31;
				$m++;
				if($m>12)
				{
					$y++;
					$m=1;
				}
			}
				
		}
		else if($m == 4 || $m == 6 ||$m == 9 ||$m == 11)
		{
			if($d>30)
			{
				$d=$d-30;
				$m++;			
			}
		}
		else
		{
			if($d>28)
			{
				$d=$d-28;
				$m++;
				
			}
		}
    	
    	//$arrTime = explode (":",substr($arrDate[2],2));
    	
    	$time_out = $d."/".$m."/".$y;
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
    			$paging.="<td><img src='../images/previous_disable.gif' border='0'></td> \n";
    		}
    		else
    		{ 
    			$paging.=sprintf ("<td><a href='javascript:gotopage(%d)' style='text-decoration:none'>Trang đầu</a></td> \n",'1');
    			$paging.=sprintf ("<td><a href='javascript:gotopage(%d)'class='link_image'><img src='../images/prev.png' border='0'></a></td> \n",$curPage-1);
    		}				 	 
    		for($i=1;$i<=$totalPages;$i++)
    		{	
    			if(($i>((int)(($curPage-1)/$mxP))* $mxP) && ($i<=((int)(($curPage-1)/$mxP+1))* $mxP))
    			{
    				if($i==$curPage)      
    					$paging .= "<td> \n <span class='curpage'>". $i."</span>&nbsp;&nbsp;"."</td> \n";
    				else    
    					$paging .= sprintf ("<td><a href='javascript:gotopage(%d)'>%d</a>&nbsp;&nbsp;</td> \n",$i,$i);
    			}
    		}
    		if ($curPage<$totalPages)
    		{
    			
    			$paging.=sprintf ("<td><a href='javascript:gotopage(%d)' class='link_image'><img src='../images/next.png' border='0'></a></td> \n",$curPage+1);
    			$paging.=sprintf ("<td><a href='javascript:gotopage(%d)' style='text-decoration:none'>Trang cuối</a></td> \n",$totalPages);
    		}
    		else
    			$paging.="<td><img src='../images/next_disable.gif' border='0'></td> \n";
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