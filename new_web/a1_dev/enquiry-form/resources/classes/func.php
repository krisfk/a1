<?php




function is_empty($var){
	$v = trim($var);
	return empty($v);
}

function is_name($var){
	return preg_match("/[a-zA-Z]\s*/", $var);
}

function is_gcode($var){
	return preg_match("/[0-9A-Za-z]{10}/", $var);
}

function is_cname($var){
	return preg_match("/[\x7f-\xff]+/", $var);
}

function is_ename($var){
	return preg_match("/[a-zA-Z]\s*/", $var);
}

function is_email($var){
	return preg_match("/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+\.[a-zA-Z]{2,4}/", $var);
}

function is_identity_number($var){
	return preg_match("/[0-9]{4}/", $var);
}

function is_birthday($var){
	return preg_match("/[0-9]{4}-[0-9]{2}-[0-9]{2}/", $var);
}

function is_phone($var){
	return preg_match("/[0-9]{8}/", $var);
}

function file_extension($var) {
	return strtolower(end(explode('.', $var)));
}
//    		$sent = emailToJoin($events_code, $_LANG['courses'][$course], $name, $phone, is_empty($email) ? $_LANG['empty'] : $email, $shop,$timeslot,  $comment );

function emailToJoin($events_code, $course, $name, $phone, $email, $shop,$timeslot, $comment){
	global $_CONFIG, $_LANG;

	if(function_exists('date_default_timezone_set')){
		date_default_timezone_set("Hongkong");
	}

	$mail = new PHPMailer();
	$mail->isSMTP();
	$mail->Host = $_CONFIG['smtp_host'];

	$mail->SMTPSecure = $_CONFIG['smtp_secure'];
	$mail->SMTPAuth = true;
	$mail->CharSet = "utf-8";
	$mail->Port = $_CONFIG['smtp_port'];
	$mail->Username = $_CONFIG['smtp_account'];
	$mail->Password = $_CONFIG['smtp_password'];
	$mail->SMTPDebug = 2;

	$suject = "[" .$events_code ."][" .$course ."][". $name ."][". date("d/m/Y H:i:s") ."]";

	$mail->setFrom($_CONFIG['smtp_account'], $suject);
	$mail->addReplyTo($_CONFIG['smtp_account'], $suject);

	foreach($_CONFIG['send_to_join_email'] as $k => $sendTo){
		$mail->addAddress($sendTo, $_CONFIG['send_to_join_user']);
	}
    
    

    
    //print_r($_CONFIG['send_to_join_email']);
    //echo $_CONFIG['send_to_join_email'];

	$mail->Subject = $suject;

	$data = array(
		'course'=>$course, 
		'name'=>$name,
		'phone'=>$phone,
		'email'=>$email,
//		'identity_number'=>$id,
//		'area'=>$area,
//		'age'=>$age,
//		'job'=>$job,
	    'shop'=>$shop,
        'timeslot'=>$timeslot,
        'comment'=>$comment,
		'events_code'=>$events_code,
		'events_code_title'=>$_LANG['events_p_code'],
		'apply_form'=>$_LANG['apply_form'],
		'course_title'=>$_LANG['courses_name'],
		'name_title'=>$_LANG['name_en'],
		'phone_title'=>$_LANG['phone_number'],
		'email_title'=>$_LANG['email_address'],
		'shop_title'=>$_LANG['shop'],
		'timeslot_title'=>$_LANG['timeslot'],
        /*'age_title'=>$_LANG['age'],
		'area_title'=>$_LANG['area'],
		'id_title'=>$_LANG['identity_number'],
		'job_title'=>$_LANG['job'],
        */
		'comment_title'=>$_LANG['comment']);

	$html = preg_replace("/%(\w+)%/e" , "\$data['\\1']" , file_get_contents(substr(dirname(__FILE__), 0, -8) . '/static/html/join_contents.html'));
	$mail->msgHTML($html);
    
    
 /* email part start */

        $to = implode (", ", $_CONFIG['send_to_join_email']);
     //   $to = "krisfk@gmail.com";
        $subject = $suject;

 $message = $html;

 // Always set content-type when sending HTML email
 $headers = "MIME-Version: 1.0" . "\r\n";
 $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: <'.$_CONFIG['smtp_account'].'>' . "\r\n";
 //$headers .= 'From: '.$subject.'<'.$_CONFIG['smtp_account'].'>' . "\r\n";
// $headers .= 'From: [HKSM][電單車課程][Cheng PiK Nam][08/12/2017 07:39:29] [mailto:sales@meghongkong.com] ';

    
mail($to,$subject,$message,$headers);
    /* email part end */    
    
//Insert to db    
$dbhost  = "localhost";
 /*$dbuser  = "a1drivin_tusr";
 $dbpass  = "tEdY5Dvl!9D."; 
 $dbname  = "a1drivin_test";
 */   
    $dbuser  = "a1drivin_pusr";
$dbpass  = "as,BJIN)9DYV";
$dbname  = "a1drivin_prod";
    

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
    
   //IP
     if (empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $IP = $_SERVER['REMOTE_ADDR'];
        } else {
            $IP = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            $IP = $myip[0];
        }
    //BROWSER
     $browser = array(
    'version'   => '0.0.0',
    'majorver'  => 0,
    'minorver'  => 0,
    'build'     => 0,
    'name'      => 'unknown',
    'useragent' => ''
  );

  $browsers = array(
    'firefox', 'msie', 'opera', 'chrome', 'safari', 'mozilla', 'seamonkey', 'konqueror', 'netscape',
    'gecko', 'navigator', 'mosaic', 'lynx', 'amaya', 'omniweb', 'avant', 'camino', 'flock', 'aol'
  );

  if (isset($_SERVER['HTTP_USER_AGENT'])) {
    $browser['useragent'] = $_SERVER['HTTP_USER_AGENT'];
    $user_agent = strtolower($browser['useragent']);
    foreach($browsers as $_browser) {
      if (preg_match("/($_browser)[\/ ]?([0-9.]*)/", $user_agent, $match)) {
        $browser['name'] = $match[1];
        $browser['version'] = $match[2];
        @list($browser['majorver'], $browser['minorver'], $browser['build']) = explode('.', $browser['version']);
        break;
      }
    }
  }
    
    $browser_name=$browser['name'];
    /*
    $queryt="SET time_zone='Asia/Hong_Kong'";
    
    $conn->query($queryt);
        */
    date_default_timezone_set('Asia/Hong_Kong');
    $date = date('Y-m-d h:i:s', time());

    //$_CONFIG['smtp_account'] = 'sales@meghongkong.com';
//$_CONFIG['send_to_join_email'] = array('kayli@meg.com.hk');
    //
    
    
    $from =$_CONFIG['smtp_account'];
  
    
    $sql = "INSERT INTO enquiry_log (log_date, log_ip, log_browser,log_source,sender,receiver,course_name,student_name,student_phone,student_email,selected_branch,selected_time,comment)
VALUES ('$date', '$IP', '$browser_name', '$events_code','$from','$to', '$course', '$name', '$phone', '$email', '$shop', '$timeslot', '$comment')";

if ($conn->query($sql) === TRUE) {
//    echo "New record created successfully";
} else {
//    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

    
  
    
    
   
    return true;
    
    
    
    
//	return !$mail->send() ? false : true;


}

function emailToApply($job, $job_code, $name, $address, $area, $phone, $email, $resume_file, $resume_name, $ps){
	global $_CONFIG, $_LANG;

	if(function_exists('date_default_timezone_set')){
		date_default_timezone_set("Hongkong");
	}

	$mail = new PHPMailer;
	$mail->isSMTP();
	$mail->Host = $_CONFIG['smtp_host'];
	$mail->SMTPSecure = $_CONFIG['smtp_secure'];
	$mail->SMTPAuth = true;
	$mail->CharSet = "utf-8";
	$mail->Port = $_CONFIG['smtp_port'];
	$mail->Username = $_CONFIG['smtp_account'];
	$mail->Password = $_CONFIG['smtp_password'];

	$suject = "[" .$job_code ."][". $name ."][". date("d/m/Y H:i:s") ."]";

	$mail->setFrom($_CONFIG['smtp_account'], $suject);
	$mail->addReplyTo($_CONFIG['smtp_account'], $suject);

	foreach($_CONFIG['send_to_apply_email'] as $k => $sendTo){
		$mail->addAddress($sendTo, $_CONFIG['send_to_apply_user']);
	}
	$mail->Subject = $suject;

	$data = array( 
		'name'=>$name,
		'phone'=>$phone,
		'email'=>$email,
		'area'=>$area,
		'job'=>$job,
		'address'=>$address,
		'ps'=>$ps,
		'job_code'=>$job_code,
		'job_code_title'=>$_LANG['job_position_code'],
		'apply_form'=>$_LANG['apply_form'],
		'name_title'=>$_LANG['name'],
		'area_title'=>$_LANG['area'],
		'phone_title'=>$_LANG['phone_number'],
		'email_title'=>$_LANG['email_address'],
		'address_title'=>$_LANG['address'],
		'ps_title'=>$_LANG['ps'],
		'job_title'=>$_LANG['job']);

	$html = preg_replace("/%(\w+)%/e" , "\$data['\\1']" , file_get_contents(substr(dirname(__FILE__), 0, -8) . '/static/html/apply_contents.html'));
	$mail->msgHTML($html);
	$mail->addAttachment($resume_file, $resume_name);

    
    return $mail->send();
}

function emailToGroupon($groupons_code, $gcode, $cname, $ename, $address, $birthday, $phone, $email, $id){
	global $_CONFIG, $_LANG;

	if(function_exists('date_default_timezone_set')){
		date_default_timezone_set("Hongkong");
	}

	$mail = new PHPMailer();
	$mail->isSMTP();
	$mail->Host = $_CONFIG['smtp_host'];

	$mail->SMTPSecure = $_CONFIG['smtp_secure'];
	$mail->SMTPAuth = true;
	$mail->CharSet = "utf-8";
	$mail->Port = $_CONFIG['smtp_port'];
	$mail->Username = $_CONFIG['smtp_account'];
	$mail->Password = $_CONFIG['smtp_password'];

	$suject = "[" .$groupons_code ."][". $gcode ."][". $cname ."][". $ename ."][". date("d/m/Y H:i:s") ."]";

	$mail->setFrom($_CONFIG['smtp_account'], $suject);
	$mail->addReplyTo($_CONFIG['smtp_account'], $suject);

	foreach($_CONFIG['send_to_groupon_email'] as $k => $sendTo){
		$mail->addAddress($sendTo, $_CONFIG['send_to_groupon_user']);
	}

	$mail->Subject = $suject;

	$data = array(
		'gcode'=>$gcode,
		'cname'=>$cname,
		'ename'=>$ename,
		'address'=>$address,
		'phone'=>$phone,
		'email'=>$email,
		'birthday'=>$birthday,
		'identity_number'=>$id,
		'groupons_code'=>$groupons_code,
		'groupons_code_title'=>$_LANG['groupons_p_code'],
		'apply_form'=>$_LANG['apply_form'],
		'gcode_title'=>$_LANG['gcode'],
		'cname_title'=>$_LANG['cname'],
		'ename_title'=>$_LANG['ename'],
		'address_title'=>$_LANG['address'],
		'birthday_title'=>$_LANG['birthday'],
		'phone_title'=>$_LANG['phone_number'],
		'email_title'=>$_LANG['email_address'],
		'id_title'=>$_LANG['identity_number']);

	$html = preg_replace("/%(\w+)%/e" , "\$data['\\1']" , file_get_contents(substr(dirname(__FILE__), 0, -8) . '/static/html/group_contents.html'));
	$mail->msgHTML($html);
	return !$mail->send() ? false : true;
}

function emailToDiscount($events_code, $name, $phone, $shop, $comment){
	global $_CONFIG, $_LANG;

	if(function_exists('date_default_timezone_set')){
		date_default_timezone_set("Hongkong");
	}

	$mail = new PHPMailer();
	$mail->isSMTP();
	$mail->Host = $_CONFIG['smtp_host'];

	$mail->SMTPSecure = $_CONFIG['smtp_secure'];
	$mail->SMTPAuth = true;
	$mail->CharSet = "utf-8";
	$mail->Port = $_CONFIG['smtp_port'];
	$mail->Username = $_CONFIG['smtp_account'];
	$mail->Password = $_CONFIG['smtp_password'];

	$suject = "[" .$events_code ."][". $name ."][". date("d/m/Y H:i:s") ."]";

	$mail->setFrom($_CONFIG['smtp_account'], $suject);
	$mail->addReplyTo($_CONFIG['smtp_account'], $suject);

	foreach($_CONFIG['send_to_discount_email'] as $k => $sendTo){
		$mail->addAddress($sendTo, $_CONFIG['send_to_discount_user']);
	}

	$mail->Subject = $suject;

	$data = array(
		'name'=>$name,
		'phone'=>$phone,
		'shop'=>$shop,
		'comment'=>$comment,
		'apply_form'=>$_LANG['apply_form'],
		'events_code'=>$events_code,
		'events_code_title'=>$_LANG['events_p_code'],
		'name_title'=>$_LANG['name_en'],
		'phone_title'=>$_LANG['phone_number'],
		'shop_title'=>$_LANG['shop'],
		'comment_title'=>$_LANG['comment']);

	$html = preg_replace("/%(\w+)%/e" , "\$data['\\1']" , file_get_contents(substr(dirname(__FILE__), 0, -8) . '/static/html/discount_contents.html'));
	$mail->msgHTML($html);
	return !$mail->send() ? false : true;
}

?>