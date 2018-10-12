<?php
require_once("./PHPMailer_5.2.2/class.phpmailer.php");

//echo 999;
/*$to = $_POST['to'];
$from = $_POST['from'];
$subject = $_POST['subject'];
$have_cc = $_POST['have_cc'];
$cc = $_POST['cc'];
$message = $_POST['message'];
$site_name = $_POST['site_name'];*/


$to = 'KRISFK@GMAIL.COM';
$from = 'info@hksm.com.hk';
$subject = 'subject';
$have_cc = '0';
$cc = $_POST['cc'];
$message = 'message';
$site_name = 'site name';



$from_addr = $from;
$from_name = $site_name;
$to_addr = $to;
$to_name = '';
//$subject = 'hello';
//$message = 'message'; 
$header = ''; 
//$greeting = '';


/*		$mail->IsSMTP();
		$mail->Host     = "smtp2.wtt-mail.com"; 
		$mail->SMTPAuth = true; 
		$mail->Username = ""; 
		$mail->Password = "";
		$mail->From     = $from_addr;
		$mail->FromName = $from_name;
*/ 
$mail = new PHPMailer();
        $mail->IsSMTP(); // send via SMTP
        $mail->Host = "smtp2.webhost.com.hk"; // SMTP servers
        $mail->SMTPAuth = true;               // turn on SMTP authentication
        $mail->Username = "smtp@meghk.hk";    // SMTP username
        $mail->Password = "ZBk5T2XQ";         // SMTP password
        $mail->From = $from_addr;
        $mail->FromName = $from_name;
        
        if($have_cc=='1')
        {
            $cc_arr = explode(",", $cc);
            
            for($i=0;$i<sizeof($cc_arr);$i++)
            {
                         $mail->AddCC($cc_arr[$i]);
            }
        }


            $to_arr = explode(",", $to);
            
            for($i=0;$i<sizeof($to_arr);$i++)
            {
                         $mail->AddAddress($to_arr[$i]);
            }

//        $mail->AddAddress($to_addr, $to_name);


		$mail->WordWrap = 50;
		$mail->IsHTML(true);
		$mail->Subject  = $subject;
		$mail->Body     = $message;
		$mail->AltBody  = $message;
		$mail->CharSet  = 'utf-8';




	//	if ($greeting != "") {
		//	$mail->AddEmbeddedImage($greeting, 'greeting');
//		}

		$success = $mail->Send();

		if($success) { 
			// success
			echo 'success';
		} else {
			echo "Message was not sent <p>";
			echo "Mailer Error: " . $mail->ErrorInfo;
		}

?>
