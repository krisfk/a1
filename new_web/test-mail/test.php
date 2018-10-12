<?

/*
$_CONFIG['smtp_host'] = 'superhub.hk';

$_CONFIG['smtp_port'] = 587;

$_CONFIG['smtp_secure'] = 'tls';

$_CONFIG['smtp_account'] = 'sales@meghongkong.com';

$_CONFIG['smtp_password'] = 'canonbox448';
*/
require("PHPMailer_5.2.2/class.phpmailer.php");

$from_addr = 'noreply@meg.com.hk';
$from_name = 'fasf';
$to_addr = 'krisfk@gmail.com';
$to_name = '';
$subject = 'hello';
$message = 'message'; 
$header = ''; 
$greeting = '';

$mail = new PHPMailer();

/*		$mail->IsSMTP();
		$mail->Host     = "smtp2.wtt-mail.com"; 
		$mail->SMTPAuth = true; 
		$mail->Username = ""; 
		$mail->Password = "";
		$mail->From     = $from_addr;
		$mail->FromName = $from_name;
*/ 

$mail->IsSMTP(); // send via SMTP
$mail->Host = "superhub.hk"; // SMTP servers
$mail->SMTPAuth = true;               // turn on SMTP authentication
$mail->Username = "sales@meghongkong.com";    // SMTP username
$mail->Password = "canonbox448";         // SMTP password
$mail->SMTPSecure ='tls';
$mail->SMTPDebug  = 1;


/*
    $mail->Host = "smtp2.webhost.com.hk"; // SMTP servers
        $mail->SMTPAuth = true;               // turn on SMTP authentication
        $mail->Username = "smtp@meghk.hk";    // SMTP username
        $mail->Password = "ZBk5T2XQ";         // SMTP password
*/

        $mail->From = $from_addr;
        $mail->FromName = $from_name;

        $mail->AddAddress($to_addr, $to_name);
		$mail->WordWrap = 50;
		$mail->IsHTML(true);
		$mail->Subject  = $subject;
		$mail->Body     = $message;
		$mail->AltBody  = $message;



		if ($greeting != "") {
		//	$mail->AddEmbeddedImage($greeting, 'greeting');
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
