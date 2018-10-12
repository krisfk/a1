<?php

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
        $emails = explode(',', $emails);
//        echo $emails[0];
        
        
		foreach($emails as $email){
			self::send_mail(EMAIL_SENDER, trim($email), $subject, $message,false,true);
		}
        
        
	}
	
	public function apply_to_user($subject, $message, $email, $attach,$have_cc){
		self::send_mail(EMAIL_SENDER, $email, $subject, $message, $attach,$have_cc);
	}
	
	private function send_mail($from, $to, $subject, $message, $attach=false,$have_cc){
		$this->load->library('email');
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
		$this->email->send();
	}
	
}