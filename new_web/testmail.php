<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
    fff
    <?php
     // Always set content-type when sending HTML email
 $headers = "MIME-Version: 1.0" . "\r\n";
 $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
 $from_mails= 'sales@meghongkong.com';
//     $from_mails= 'fdasf@fda.com';
 $headers .= 'From: <'.$from_mails.'>' . "\r\n";
 //$headers .= 'From: '.$subject.'<'.$_CONFIG['smtp_account'].'>' . "\r\n";
// $headers .= 'From: [HKSM][電單車課程][Cheng PiK Nam][08/12/2017 07:39:29] [mailto:sales@meghongkong.com] ';

//    $to='krisfk@gmail.com';
       $to='krisfk@gmail.com';
    $subject='test subject';
    
    $message='test message';
    
    
    
    
$result=mail($to,$subject,$message,$headers);
//   $result=mail($to,$subject,$message);
   
    
    if($result)
    {
        echo 'succeed';
    }
    else
    {
        echo 'error';
    }
    
    ?>
</body>
</html>