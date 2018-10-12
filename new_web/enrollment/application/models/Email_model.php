<?php
require_once(APPPATH.'libraries/PHPMailer_5.2.2/class.phpmailer.php');


class Email_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
	
	public function apply($data){

        $e_code = ($data['join_megclub']=='1') ? $data['e_code'].JOIN_MEGCLUB_SUFFIX : $data['e_code'];
        //    echo  $e_code;
		$subject = '['.$e_code.' - '.$data['c_name'].']';
		if($data['staff_name']){
			$subject .= '['.$data['staff_name'].']';
		}
		if($data['student_name']){
			$subject .= '['.$data['student_name'].']';
		}
		$subject .= $data['create_time'];
		$message = $this->load->view('email/apply', $data, true);
        
        
		
      //  $emails = explode(',', EMAILS);
        
    //    $shop_emails = explode(',', $data['shop']);
        $emails = explode('|', $data['shop']);
        $emails = $emails[1];
//        $emails = explode(',', $emails);
//        echo $emails[0];
        
// 		foreach($emails as $email){
			self::send_mail(EMAIL_SENDER, trim($emails), $subject, $message,false,true);
	//	}
        
        if($data['join_megclub']=='1')
        {
          //  echo 111;
            		$message = $this->load->view('email/megclub', $data, true);           
        	
            $subject2 = '新會員加入MEG CLUB通知'.$data['create_time'].'['.$data['student_name'].']';

            self::send_mail(EMAIL_SENDER, MEG_CLUB_NOTIF_EMAIL, $subject2, $message,false,false);

            
        }
        
        
	}
	
	public function apply_to_user($subject, $message, $email, $attach,$have_cc){
		self::send_mail(EMAIL_SENDER, $email, $subject, $message, $attach,$have_cc);
	}
	
	private function send_mail($from, $to, $subject, $message, $attach=false,$have_cc){
		
		
		
//		$message = str_replace(' ', '', $message);
 
	//	$message = preg_replace('/\s+/', '', $message);
 
//		$url = 'http://www.hksm.com.hk/sendmail/?to='.$to.'&from='.$from.'&subject='.$subject.'&message='.$message.'&cc='.$have_cc;
	//	$result = file_get_contents($url);
		
		
		
//		$url = 'https://www.a1driving.com.hk/sendmail/';
//		$url = 'https://www.ec2pass.com.hk/sendmail/';
//        $url = 'https://www.meghongkong.com/sendmail/';
	
      $url = 'https://www.hksm.com.hk/sendmail/';
        
//        echo "'to' => $to, 'from' => $from,'subject' => $subject , 'message' => $message , 'have_cc' => $have_cc,'cc'=> CC_EMAILS,$site_name=>SITE_NAME";
   //   echo 'to:'.$to.'<br/>';
	//  echo 'from:'. $from.'<br/>';
	 // echo 'subject:'.$subject.'<br/>';
	 // echo 'message:'.$message.'<br/>';
	 // echo 'have_cc:'.$have_cc.'<br/>';
	//  echo 'CC_EMAILS:'.CC_EMAILS.'<br/>';
	//  echo 'SITE_NAME:'.SITE_NAME;
		
		
		$data = array('to' => $to,
                            'from' => $from,
                            'subject' => $subject ,
                            'message' => $message ,
                            'have_cc' => $have_cc,
                            'cc'=> CC_EMAILS,
                            'site_name'=>SITE_NAME);
 
		// use key 'http' even if you send the request to https://...
		$options = array(
			'http' => array(
				'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
				'method'  => 'POST',
				'content' => http_build_query($data)
			)
		);
		$context  = stream_context_create($options);

		$result = file_get_contents($url, false, $context);
		
		/*
		//phpmailer

	//	$to = $_POST['to'];
//		$from = $_POST['from'];
//		$subject = $_POST['subject'];
//		$have_cc = $_POST['have_cc'];
		$cc = CC_EMAILS;
	//	$message = $_POST['message'];
		$site_name = SITE_NAME;
		
		$from_addr = $from;
		$from_name = $site_name;
		$to_addr = $to;
		$to_name = '';
		$header = ''; 


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


		$mail->WordWrap = 50;
		$mail->IsHTML(true);
		$mail->Subject  = $subject;
		$mail->Body     = $message;
		$mail->AltBody  = $message;
		$mail->CharSet  = 'utf-8';

		$success = $mail->Send();

		if($success) { 
			// success
		//	echo 'success';
		} else {
		//	echo "Message was not sent <p>";
	//		echo "Mailer Error: " . $mail->ErrorInfo;
		}
		
		////phpmailer end
		
		
		*/
		
		
		
		
		
		
//		$result = file_get_contents($url, false, $context);
//		if ($result === FALSE) { /* Handle error*/  }

		
/*
  'protocol' => 'smtp',
    'smtp_host' => 'ssl://smtp.googlemail.com',
    'smtp_port' => 465,
    'smtp_user' => 'xxx',
    'smtp_pass' => 'xxx',
*/

        
        
        
        
        
        
        
        
        /*$this->load->library('email'); 
		$this->email->initialize(array('mailtype'=>'html'));
	 
		
		$this->email->from($from, SITE_NAME);
		$this->email->to($to); 
        if($have_cc)
        {
            $this->email->cc(CC_EMAILS); 
        }
		$this->email->subject($subject);
		$this->email->message($message);	
		if($attach){
			$this->email->attach($attach);
		}
		$this->email->send();*/
		
		
	
	}
	
}