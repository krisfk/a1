<?php

//		$url = 'http://www.a1driving.com.hk/sendmail/?to='.$to.'&from='.$from.'&subject='.$subject.'&have_cc';


/*$to = $_GET['to'];
$from = $_GET['from']; 
$subject = $_GET['subject']; 
$cc = $_GET['cc']; 
$message = $_GET['message'];*/

$to = $_POST['to'];
$from = $_POST['from'];
$subject = $_POST['subject'];

$have_cc = $_POST['have_cc'];
$cc = $_POST['cc'];

$message = $_POST['message'];


//$headers = $_GET['headers'];
/*$headers = 'From: '.$from . "\r\n" .
    'Reply-To: info@hksm.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
*/
// To send HTML mail, the Content-type header must be set
  $headers[]= "Reply-To: $from"; 
  $headers[]= "Return-Path: $from"; 
$headers[] = 'To: '.$to;
$headers[] = 'From: '.$from;
  $headers[]= "Organization: hksm";

$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=utf-8';
  $headers[]= "X-Priority: 3";
  $headers[]= "X-Mailer: PHP". phpversion() ;

// Additional headers



if($have_cc=='1')
{
	$headers[] = 'Cc: '.$cc;
}
//$headers[] = 'Bcc: birthdaycheck@example.com';

// Mail it
$result = mail($to, $subject, $message, implode("\r\n", $headers));


//$result =   mail($to, $subject, $message, $headers);

if($result)
{
    echo 'succeed';
}
else
{
    echo 'fail';    
}
    

?>