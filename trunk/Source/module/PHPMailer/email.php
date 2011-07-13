<?php
class SendEmail
{
	public static function send_Email($emailFrom,$password,$emailTo,$content_Subject,$content_Body)
	{
		include_once("class.phpmailer.php");
		$mail = new PHPMailer();
		$mail->IsSMTP(); // send via SMTP
		//IsSMTP(); // send via SMTP
		$mail->SMTPAuth = true; // turn on SMTP authentication
		//$mail->Username = "sieudanglegend@gmail.com"; // SMTP username
		$mail->Username = "sieudangf2@yahoo.com"; // SMTP username
		$mail->Password = "123456"; // SMTP password
		//$mail->Password = "27219872006"; // SMTP password
		//$webmaster_email = "sieudanglegend@gmail.com"; //Reply to this email ID
		$webmaster_email = "sieudangf2@yahoo.com"; //Reply to this email ID
		// $email="sieudanglegend@gmail.com"; // Recipients email ID
		$email="sieudangf2@yahoo.com"; // Recipients email ID
		$name="HoSonLam"; // Recipient's name
		$mail->From = $webmaster_email;
		$mail->FromName = "Webmaster";
		$mail->AddAddress($email,$name);//send to
		$mail->AddReplyTo($webmaster_email,"Webmaster");
		$mail->WordWrap = 50; // set word wrap
		//$mail->AddAttachment("../var/tmp/file.tar.gz"); // attachment
		//$mail->AddAttachment("/tmp/image.jpg", "new.jpg"); // attachment
		$mail->IsHTML(true); // send as HTML
		$mail->Subject = "This is the subject";
		$mail->Body = "Hi,This is the HTML BODY "; //HTML Body
		$mail->AltBody = "This is the body when user views in plain text format"; //Text Body
		if(!$mail->Send())
		{
			echo "<br>Mailer Error: " . $mail->ErrorInfo;
		}
		else
		{
			echo "Message has been sent";
		}
	}
}

?>
