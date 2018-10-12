<?php
require './config.php';
$lang = isset($_GET['lang']) && in_array($_GET['lang'], $_CONFIG['language_support']) ? htmlspecialchars($_GET['lang']) : 'zh';
require './resources/language/lang.'. $lang .'.php';
require './resources/phpmailer/PHPMailerAutoload.php';
require './resources/classes/func.php';


$sent = emailToJoin('aaa', 'haha', 'haha', 'haha', 'barryli@hksm.com.hk', 'haha', 'haha',  'haha');
// $sent = emailToJoin($events_code, $_LANG['courses'][$course], $name, $phone, is_empty($email) ? $_LANG['empty'] : $email, $_LANG['shops'][$shop],$_LANG['timeslots'][$timeslot],  $comment );

if($sent){ echo 'Success'; }
else { echo 'Fail'; }

?>
