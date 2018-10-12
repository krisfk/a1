<?

require("PHPMailer_5.2.2/class.phpmailer.php");

$from_addr = 'noreply@meg.com.hk';
$from_name = 'fasf';
$to_addr = 'barryli@hksm.com.hk';
$to_name = '';
$subject = 'hello';
$message = 'message'; 
$header = ''; 
$greeting = '';

$mail = new PHPMailer();

		$mail->IsSMTP();
		$mail->Host     = "smtp2.wtt-mail.com";
		$mail->SMTPAuth = true;
		$mail->Username = "";
		$mail->Password = "";
		$mail->From     = $from_addr;
		$mail->FromName = $from_name;
		$mail->AddAddress($to_addr, $to_name);
		$mail->WordWrap = 50;
		$mail->IsHTML(true);
		$mail->Subject  = $subject;
		$mail->Body     = $message;
		$mail->AltBody  = $message;

		if ($greeting != "") {
			$mail->AddEmbeddedImage($greeting, 'greeting');
		}

		$success = $mail->Send();

		if($success) {
			// success
			echo 'success';
		} else {
			echo "Message was not sent <p>";
			echo "Mailer Error: " . $mail->ErrorInfo;
		}

?>
