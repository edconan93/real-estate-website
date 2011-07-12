<html>
<head>
<title>Gửi mail bằng PHP qua SMTP (Gmail) Test thử by SinhVienIT.Net</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

</head>
<body>

<?php

//error_reporting(E_ALL);
error_reporting(E_STRICT);

date_default_timezone_set('Asia/Krasnoyarsk');

require_once('class.phpmailer.php');
//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

$mail             = new PHPMailer();

$body             = "Nội dung Email";
$body             = eregi_replace("[\]",'',$body);

$mail->IsSMTP();
//$mail->Host       = "mail.sinhvienit.net"; // SMTP server (Dien gi cung dc)
$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
                                           // 1 = errors and messages
                                           // 2 = messages only
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
$mail->Port       = 465;                   // set the SMTP port for the GMAIL server
$mail->Username   = "vuthanhlai@gmail.com";  // GMAIL username
$mail->Password   = "123456";            // GMAIL password

$mail->SetFrom('admin@sinhvienit.net', 'Admin SinhVienIT.Net'); //Định danh người gửi

$mail->AddReplyTo("admin@sinhvienit.net","Admin SinhVienIT.Net"); //Định danh người sẽ nhận trả lời

$mail->Subject    = "Test gửi mail qua Gmail"; //Tiêu đề Mail

$mail->AltBody    = "Để xem tin này, vui lòng bật tương thích chế độ hiển thị mã HTML!"; // optional, comment out and test

$mail->MsgHTML($body);

$address = "vuthanhlai@gmail.com"; //Địa chỉ mail cần gửi tới
$mail->AddAddress($address, "Vũ Thanh Lai"); //Gửi tới ai ?

$mail->AddAttachment("dinhkem/02.jpg");      // Đính kèm
$mail->AddAttachment("dinhkem/200_100.jpg"); // Đính kèm

if(!$mail->Send()) {
  echo "Lỗi gửi mail: " . $mail->ErrorInfo;
} else {
  echo "Mail đã được gửi!";
}

?>

</body>
</html>
