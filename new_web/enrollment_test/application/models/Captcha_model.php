<?php

class Captcha_model extends CI_Model {
	
    public function __construct() {
        parent::__construct();
    }
	
	public function gen_captcha($session_name){
		$this->load->helper("url");
		$this->load->helper('captcha');
		$this->load->helper('string');
		$vals = array(
			'word'	=> random_string('numeric', 4),
			'img_path' => './captcha/',
			'img_url' => base_url().'captcha/'
		);
	//	dump($vals);
		$cap = create_captcha($vals);
		
	//	dump($cap);
		$this->load->library('session');
		$this->session->set_userdata($session_name, $cap['word']);
		
		return $cap['image'];
	}
	
	public function is_captcha_valid($session_name, $captcha){
		$this->load->library('session');
		return $this->session->userdata($session_name) == $captcha;
	}
	
}