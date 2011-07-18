<?php
include_once("../../../BUS/ThuChiBUS.php"); 
include_once("../../../BUS/DonviTienBUS.php");
?>
<?php
class ProfitProcessor
{
    public static function display($header,$chiphi,$doanhthu,$loinhuan)
    {
        $str=null;
        $str.='<table align="center" border="0" cellpadding="0" cellspacing="0" style="font-weight:bold;">';
		$str.='<tr>';
		$str.='<td colspan="2" style="color:red;">'.$header.'</td>';
		$str.='</tr>';
		$str.='<tr>';
		$str.='<td width="120px">Tổng chi phí:</td>';
		$str.='<td align="right">'.$chiphi.' VND</td>';
		$str.='</tr>';
		$str.='<tr>';
		$str.='<td>Tổng doanh thu:</td>';
		$str.='<td align="right">'.$doanhthu.' VND</td>';
		$str.='</tr>';
		$str.='<tr>';
		$str.='<td>Tổng lợi nhuận:</td>';
		$str.='<td align="right">'.$loinhuan.' VND</td>';
		$str.='</tr>';
		$str.='</table>';
        return $str;
    }
}
if(isset($_REQUEST['do'])&&$_REQUEST['do']=='profit')
{
    if(isset($_REQUEST['action'])&&$_REQUEST['action']=='show')
    {
        $nam=$quy=$thang=$option=-1;
        if(isset($_REQUEST['nam']))
            $nam=$_REQUEST['nam'];
        if(isset($_REQUEST['quy']))
            $quy=$_REQUEST['quy'];
        if(isset($_REQUEST['thang']))
            $thang=$_REQUEST['thang'];
        if(isset($_REQUEST['radio']))
            $option=$_REQUEST['radio'];    
       if($option==1)
                {
                    $thu=ThuChiBUS::SumTongTienByMonth(0,$thang,$thang,$nam);
                    $chi=ThuChiBUS::SumTongTienByMonth(1,$thang,$thang,$nam);
                    $thu=$thu==null?0:$thu;
                        $chi=$chi==null?0:$chi;
                    echo ProfitProcessor::display('Thống kê tháng '.$thang.'/'.$nam,$chi,$thu,$thu-$chi);
                }
         elseif($option==0)
            {     
            
            switch($quy)
            {
                    case 1:
                        $thu=ThuChiBUS::SumTongTienByMonth(0,1,3,$nam);
                        $chi=ThuChiBUS::SumTongTienByMonth(1,1,3,$nam);
                        $thu=$thu==null?0:$thu;
                        $chi=$chi==null?0:$chi;
                        echo ProfitProcessor::display('Thống kê quý '.$quy.'/'.$nam,$chi,$thu,$thu-$chi);
                    break;
                    case 2:
                        $thu=ThuChiBUS::SumTongTienByMonth(0,4,6,$nam);
                        $chi=ThuChiBUS::SumTongTienByMonth(1,4,6,$nam);
                        $thu=$thu==null?0:$thu;
                        $chi=$chi==null?0:$chi;
                        echo ProfitProcessor::display('Thống kê quý '.$quy.'/'.$nam,$chi,$thu,$thu-$chi);
                    break;
                    case 3:
                        $thu=ThuChiBUS::SumTongTienByMonth(0,7,9,$nam);
                        $chi=ThuChiBUS::SumTongTienByMonth(1,7,9,$nam);
                        $thu=$thu==null?0:$thu;
                        $chi=$chi==null?0:$chi;
                        echo ProfitProcessor::display('Thống kê quý '.$quy.'/'.$nam,$chi,$thu,$thu-$chi);
                    break;
                    case 4:
                        $thu=ThuChiBUS::SumTongTienByMonth(0,10,12,$nam);
                        $chi=ThuChiBUS::SumTongTienByMonth(1,10,12,$nam);
                        $thu=$thu==null?0:$thu;
                        $chi=$chi==null?0:$chi;
                        echo ProfitProcessor::display('Thống kê quý '.$quy.'/'.$nam,$chi,$thu,$thu-$chi);
                   
                    break;
                    default:
                    $thu=ThuChiBUS::SumTongTienByMonth(0,1,12,$nam);
                    $chi=ThuChiBUS::SumTongTienByMonth(1,1,12,$nam);
                    $thu=$thu==null?0:$thu;
                    $chi=$chi==null?0:$chi;
                    echo ProfitProcessor::display('Thống kê năm '.$nam,$chi,$thu,$thu-$chi);
                    break;
                }
            }
            else
            {
                    $thu=ThuChiBUS::SumTongTienByMonth(0,1,12,$nam);
                    $chi=ThuChiBUS::SumTongTienByMonth(1,1,12,$nam);
                    $thu=$thu==null?0:$thu;
                    $chi=$chi==null?0:$chi;
                    echo ProfitProcessor::display('Thống kê năm '.$nam,$chi,$thu,$thu-$chi);
            }   
                
    }
     else
            {
                    $thu=ThuChiBUS::SumTongTienByMonth(0,1,12,date("Y"));
                    $chi=ThuChiBUS::SumTongTienByMonth(1,1,12,date("Y"));
                    $thu=$thu==null?0:$thu;
                    $chi=$chi==null?0:$chi;
                    echo ProfitProcessor::display('Thống kê năm '.date("Y"),$chi,$thu,$thu-$chi);
            }      
    
}
?>