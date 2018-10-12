<?php

function is_empty($var){
	$v = trim($var);
	return empty($v);
}

function is_name($var){
	return preg_match("/[a-zA-Z]\s*/", $var);
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

function is_phone($var){
	return preg_match("/[0-9]{8}/", $var);
}

function file_extension($var) {
	return strtolower(end(explode('.', $var)));
}

/*function emailToGroupon($events_code, $cname, $ename, $phone, $email, $id){
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

	foreach($_CONFIG['send_to_groupon_email'] as $k => $sendTo){
		$mail->addAddress($sendTo, $_CONFIG['send_to_groupon_user']);
	}

	$mail->Subject = $suject;

	$data = array(
		'cname'=>$cname,
		'ename'=>$ename,
		'phone'=>$phone,
		'email'=>$email,
		'identity_number'=>$id,
		'events_code'=>$events_code,
		'events_code_title'=>$_LANG['events_p_code'],
		'apply_form'=>$_LANG['apply_form'],
		'cname_title'=>$_LANG['name_tc'],
		'ename_title'=>$_LANG['name_eng'],
		'phone_title'=>$_LANG['phone_number'],
		'email_title'=>$_LANG['email_address'],
		'id_title'=>$_LANG['identity_number'],

	$html = preg_replace("/%(\w+)%/e" , "\$data['\\1']" , file_get_contents(substr(dirname(__FILE__), 0, -8) . '/static/html/group_contents.html'));
	$mail->msgHTML($html);
	return !$mail->send() ? false : true;
}*/

function emailToJoin($events_code, $course, $name, $phone, $email, $id, $area, $age, $job, $comment){
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

	$suject = "[" .$events_code ."][" .$course ."][". $name ."][". date("d/m/Y H:i:s") ."]";

	$mail->setFrom($_CONFIG['smtp_account'], $suject);
	$mail->addReplyTo($_CONFIG['smtp_account'], $suject);

	foreach($_CONFIG['send_to_join_email'] as $k => $sendTo){
		$mail->addAddress($sendTo, $_CONFIG['send_to_join_user']);
	}

	$mail->Subject = $suject;

	$data = array(
		'course'=>$course, 
		'name'=>$name,
		'phone'=>$phone,
		'email'=>$email,
		'identity_number'=>$id,
		'area'=>$area,
		'age'=>$age,
		'job'=>$job,
		'comment'=>$comment,
		'events_code'=>$events_code,
		'events_code_title'=>$_LANG['events_p_code'],
		'apply_form'=>$_LANG['apply_form'],
		'course_title'=>$_LANG['courses_name'],
		'name_title'=>$_LANG['name_en'],
		'phone_title'=>$_LANG['phone_number'],
		'email_title'=>$_LANG['email_address'],
		'age_title'=>$_LANG['age'],
		'area_title'=>$_LANG['area'],
		'id_title'=>$_LANG['identity_number'],
		'job_title'=>$_LANG['job'],
		'comment_title'=>$_LANG['comment']);

	$html = preg_replace("/%(\w+)%/e" , "\$data['\\1']" , file_get_contents(substr(dirname(__FILE__), 0, -8) . '/static/html/join_contents.html'));
	$mail->msgHTML($html);
	return !$mail->send() ? false : true;
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

?>