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
    if(isset($_REQUEST['loai']))
    {
        switch($_REQUEST['loai'])
        {
            case 1:
            $thang=$_REQUEST['thang'];
            $thu=ThuChiBUS::SumTongTienByMonth(0,$thang,$thang,date("Y"));
            $chi=ThuChiBUS::SumTongTienByMonth(1,$thang,$thang,date("Y"));
            echo ProfitProcessor::display('Thống kê tháng '.$thang.'/'.date('Y'),$chi[0],$thu[0],$thu[0]-$chi[0]);
            break;
            case 2:
            $quy=$_REQUEST['quy'];
            switch($quy)
            {
                case 1:
                    $thu=ThuChiBUS::SumTongTienByMonth(0,1,3,date("Y"));
                    $chi=ThuChiBUS::SumTongTienByMonth(1,1,3,date("Y"));
                    echo ProfitProcessor::display('Thống kê quý '.$quy.'/'.date('Y'),$chi[0],$thu[0],$thu[0]-$chi[0]);
                break;
                case 2:
                    $thu=ThuChiBUS::SumTongTienByMonth(0,4,6,date("Y"));
                    $chi=ThuChiBUS::SumTongTienByMonth(1,4,6,date("Y"));
                    echo ProfitProcessor::display('Thống kê quý '.$quy.'/'.date('Y'),$chi[0],$thu[0],$thu[0]-$chi[0]);
                break;
                case 3:
                    $thu=ThuChiBUS::SumTongTienByMonth(0,7,9,date("Y"));
                    $chi=ThuChiBUS::SumTongTienByMonth(1,7,9,date("Y"));
                    echo ProfitProcessor::display('Thống kê quý '.$quy.'/'.date('Y'),$chi[0],$thu[0],$thu[0]-$chi[0]);
                break;
                    $thu=ThuChiBUS::SumTongTienByMonth(0,10,12,date("Y"));
                    $chi=ThuChiBUS::SumTongTienByMonth(1,10,12,date("Y"));
                    echo ProfitProcessor::display('Thống kê quý '.$quy.'/'.date('Y'),$chi[0],$thu[0],$thu[0]-$chi[0]);
                case 4:
                break;
            }
            
            break;
            case 3:
                $nam=$_REQUEST['nam'];
                $thu=ThuChiBUS::SumTongTienByMonth(0,1,12,$nam);
                $chi=ThuChiBUS::SumTongTienByMonth(1,1,12,$nam);
                echo ProfitProcessor::display('Thống kê năm '.$nam,$chi[0],$thu[0],$thu[0]-$chi[0]);
            break;
            default:
                $thu=ThuChiBUS::SumTongTienByMonth(0,1,12,date("Y"));
                $chi=ThuChiBUS::SumTongTienByMonth(1,1,12,date("Y"));
                echo ProfitProcessor::display('Thống kê năm '.date("Y"),$chi[0],$thu[0],$thu[0]-$chi[0]);
            break;
        }
    }
}
?>