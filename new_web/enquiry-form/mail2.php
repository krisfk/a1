<?php
 // Always set content-type when sending HTML email
$to ='kayli@meg.com.hk';
$subject='haha';
$message='hehe';

 $headers = "MIME-Version: 1.0" . "\r\n";
 $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
 $headers .= 'From: [HKSM][電單車課程][Cheng PiK Nam][08/12/2017 07:39:29]<sales@meghongkong.com>'."\r\n";

// $headers .= 'From: '.$subject.'<'.$_CONFIG['smtp_account'].'>' . "\r\n";
// $headers .= 'From: [HKSM][電單車課程][Cheng PiK Nam][08/12/2017 07:39:29] [mailto:sales@meghongkong.com] ';

    
$result =mail($to,$subject,$message,$headers);

if(!$result) {   
     echo "Error";   
} else {
    echo "Success";
}

?>