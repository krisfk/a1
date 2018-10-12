<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends MY_Controller {
		
	public function __construct() {
        parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('site');
		$this->load->model('Meg_model');
    }
	
    
    
     public function regen_captcha(){
        		$this->load->model('Captcha_model');
                $data['cap_img'] =  $this->Captcha_model->gen_captcha(SESSION_CAPTCHA);
                echo  $data['cap_img'];
    }
    
    
//	public function test(){
//		$data = $this->Meg_model->get_apply(42);
//		$this->load->model('Email_model');
//		$this->Email_model->apply_to_user($data['e_pay_email_subject'],$data['e_pay_email_content'],$data['student_email'],str_replace('index.php', '', $_SERVER["SCRIPT_FILENAME"]).'attachs/'.$data['e_pay_email_attach']);
//	}
	
	private function event_enabled($data){
		$now = date('Y-m-d H:i:s');
		return $now >= $data['start_time'] && $now <= $data['end_time'] && $data['status'] == EVENT_STATUS_NORMAL && $data['allow'];
	}
	private function check_status($data){
		if(!self::event_enabled($data)){
			redirect('app/status/'.$data['code']);
		}
	}
	
	public function status($event_code){
		$data = array();
		$data['event'] = $this->Meg_model->get_event(array('code'=>$event_code));
		if(is_null($data['event'])){
			exit;
		}
		if(self::event_enabled($data['event'])){
			redirect('app/index/'.$event_code);
		}
		$data['now'] = date('Y-m-d H:i:s');
		
		self::load_header($data['event']['title'], $data['event']['title'], $data['event']['title'], array(
			'img/style.css'
		));
		$this->load->view('/app/status', $data);
		self::load_footer(array(
			'img/web_js.js'
		));
	}
	
	public function index($event_code = NULL){
		if(is_null($event_code)){
			exit;
		}
		$data = array();
		$data['event'] = $this->Meg_model->get_event(array('code'=>$event_code));
		if(is_null($data['event'])){
			exit;
		}
		self::check_status($data['event']);
		$data['error'] = array();
		$this->load->library('session');
		$this->load->model('Captcha_model');
		
		if ($this->input->post('is_submit')) {
			$data['info']['event'] = $data['event']['id'];
			$data['info']['course'] 			= $this->input->post('course');
			$data['info']['location'] 			= $this->input->post('location');
			$data['info']['join_megclub'] 	= $this->input->post('join_megclub');
//            $data['info']['reg_enquiry'] 	= $this->input->post('reg_enquiry');            
            $data['info']['staff_code'] 		= $this->input->post('staff_code');
			$data['info']['staff_name'] 		= $this->input->post('staff_name'); 
			$data['info']['student_name'] 		= strtoupper($this->input->post('student_name'));
			$data['info']['student_id'] 		= $this->input->post('student_id');
			$data['info']['student_gender'] 	= $this->input->post('student_gender');
			$data['info']['year'] 				= $this->input->post('year');
			$data['info']['month'] 				= $this->input->post('month');
			$data['info']['day'] 				= $this->input->post('day');
			$data['info']['student_tel'] 		= $this->input->post('student_tel');
			$data['info']['student_email'] 		= $this->input->post('student_email');
			$data['info']['student_address'] 	= $this->input->post('student_address');
            $data['info']['shop']                   = $this->input->post('shop');
            $data['info']['contact_timeslot'] = $this->input->post('contact_timeslot');
            $data['info']['remark'] = $this->input->post('remark');

			$this->session->set_userdata('apply_data'.$data['event']['id'], $data['info']);
			
			$valid = true;
			
          
            if(!$this->input->post('captcha')){
				$data['error']['captcha'] = '驗證碼必須填寫';
				$valid = false;
			} else if(!$this->Captcha_model->is_captcha_valid(SESSION_CAPTCHA, $this->input->post('captcha'))){
				$data['error']['captcha'] = '驗證碼不正確';
				$valid = false;
			} 
            
            
			if($data['info']['course'] <= 0){
				$data['error']['course'] = '請選擇所需課程';
				$valid = false;
			}
			if($data['info']['location'] <= 0){
				$data['error']['location'] = '請選擇上課地點';
				$valid = false;
			}
			if($data['event']['show_staff'] && !$data['info']['staff_code']){
				$data['error']['staff_code'] = '請填寫Staff ID(職員編號)';
				$valid = false;
			}
			if($data['event']['show_staff'] && !$data['info']['staff_name']){
				$data['error']['staff_name'] = '請填寫Staff Name(職員名稱)';
				$valid = false;
			}
			if(!$data['info']['student_name']){
				if(!$data['event']['show_staff']){
					$data['error']['student_name'] = '請填寫英文全名';
					$valid = false;
				}
			} else if(!preg_match("/^[a-zA-Z ]*$/",$data['info']['student_name'])){
				$data['error']['student_name'] = '名稱格式不正確(請填寫英文全名)';
				$valid = false;	
			}
			if($data['event']['full_id']){
				if(!$data['info']['student_id']){
					$data['error']['student_id'] = '請填寫完整身份証號碼';
					$valid = false;
				} else if(!preg_match("/^[a-zA-Z][0-9]{6}\([0-9a-zA-Z]\)$/",$data['info']['student_id'])){
					$data['error']['student_id'] = '身分證號碼格式不正確';	
					$valid = false;
				}
			} else {
				if(!$data['info']['student_id']){
					$data['error']['student_id'] = '請填寫身份証首四位數字';
					$valid = false;
			//	} else if(!preg_match("/^[a-zA-Z][0-9]{3}$/",$data['info']['student_id'])){
				} else if(!preg_match("/^[0-9]{4}$/",$data['info']['student_id'])){
					$data['error']['student_id'] = '身分證號碼格式不正確';	
					$valid = false;
				}
			}
			
			if(!$data['info']['student_tel']){
				$data['error']['student_tel'] = '請填寫聯絡電話';
				$valid = false;
			} else if(!preg_match("/^[0-9]{8}$/",$data['info']['student_tel'])){
				$data['error']['student_tel'] = '聯絡電話格式不正確 (必須為8位數字)';	
				$valid = false;
			}
            
            
			if(!$data['info']['student_email']){
				$data['error']['student_email'] = '請填寫電郵地址';
				$valid = false;
			} else if(!filter_var($data['info']['student_email'], FILTER_VALIDATE_EMAIL)){
				$data['error']['student_email'] = '電郵格式不正確';	
				$valid = false;
			}
            
			if($data['info']['shop'] == '0'){
				$data['error']['shop'] = '請選擇服務地點';
				$valid = false;
			}
            
        //    echo 999;
                  
             
			if($data['info']['contact_timeslot'] == '0'){
				$data['error']['contact_timeslot'] = '請選擇聯絡時間';
				$valid = false;
			}
            
            
            
            
            
			if(!$data['info']['student_address']){
				$data['error']['student_address'] = '請填寫郵寄地址';
				$valid = false;
			}
            
			if($valid){
				redirect('app/confirm/'.$event_code);
			}
		} else {
			if(isset($_SERVER['HTTP_REFERER']) && strrpos($_SERVER['HTTP_REFERER'], 'confirm') >= 0){
				$data['info'] = $this->session->userdata('apply_data'.$data['event']['id']);
				if(is_null($data['info']) || $data['info']['event'] != $data['event']['id']){
					$this->session->unset_userdata('apply_data'.$data['event']['id']);
				}
			} else {
				$data['info'] = NULL;
				$this->session->unset_userdata('apply_data'.$data['event']['id']);
			}
		}
		
		$data['cap_img'] =  $this->Captcha_model->gen_captcha(SESSION_CAPTCHA);
      //  echo $data['cap_img'];
		
		self::load_header($data['event']['title'], $data['event']['title'], $data['event']['title'], array(
			'img/style.css?t='.time()
		));
		$this->load->view('/app/index', $data);
		self::load_footer(array(
			'img/web_js.js'
		));
	}
	
	public function confirm($event_code){
		$data = array();
		$data['event'] = $this->Meg_model->get_event(array('code'=>$event_code));
		if(is_null($data['event'])){
			exit;
		}
		$this->load->library('session');
		$data['info'] = $this->session->userdata('apply_data'.$data['event']['id']);
		if(is_null($data['info']) || $data['info']['event'] != $data['event']['id']){
			redirect('app/index/'.$event_code);
		}
		$data['info']['student_birthday'] = $data['info']['year'] . '-' . $data['info']['month'] . '-' . $data['info']['day'];
		foreach($data['event']['course_list'] as $course){
			if($data['info']['course']==$course['id']){
				$data['info']['course'] = $course;
			}
		}
		foreach($data['event']['location_list'] as $location){
			if($data['info']['location']==$location['id']){
				$data['info']['location'] = $location;
			}
		}
		
		self::load_header($data['event']['title'], $data['event']['title'], $data['event']['title'], array(
			'img/style.css'
		));
		$this->load->view('/app/confirm', $data);
		self::load_footer(array(
			'img/web_js.js'
		));
	}
	
	public function save($event_code){
		$data = array();
		$data['event'] = $this->Meg_model->get_event(array('code'=>$event_code));
		if(is_null($data['event'])){
			exit;
		}
		$this->load->library('session');
		$data['info'] = $this->session->userdata('apply_data'.$data['event']['id']);
		if(is_null($data['info']) || $data['info']['event'] != $data['event']['id']){
			redirect('app/index/'.$event_code);
		}
		$data['info']['allow_promo'] = is_null($this->input->post('allow_promo')) ? '0' : '1';
		$data['info']['student_birthday'] = $data['info']['year'] . '-' . $data['info']['month'] . '-' . $data['info']['day'];
		$apply_id = $this->Meg_model->add_apply($data['info']);
		$this->session->unset_userdata('apply_data'.$data['event']['id']);
        
            //    echo 111222333;

		if($apply_id > 0){
			redirect('app/payment/'.$apply_id);
		} else {
			die('Apply failed');
		}
	}
	
	public function payment($apply_id){
      
		$data = $this->Meg_model->get_apply($apply_id);
      //  print_r($data);
//       echo MEGCLUB_DISCOUNT;
     //   echo 999888777;
       // echo $haveMCD;
        
     //   $autoload['libraries'] = array('globals');
        //    echo $web_Address;
//        $config['session']   = "test";
    //    $config['session']   = "testa";
//    $this->config->item('session') =999;
//    echo 11;
//            $this->config->item('session')=111;
        
//        $this->config->set_item('session', 'your value');

        
    //    echo  $this->config->item('megclub_discount');
           //  echo $this->meg_club_discount;
//        echo $this->meg_club_discount;
        
   /*     if( $this->meg_club_discount==1)
        {
            $data['price']=10;
        }
   */     
        
       


        
		if(is_null($data)){
			exit;
		}
        
		if($data['pay_status']==PAY_STATUS_PAID){
			redirect('app/complete/'.$apply_id);
		}
		$this->load->library('merchant');
		$this->merchant->load('paypal_express');
		$settings = $this->merchant->default_settings();
		$settings = array(
			'username' => PAYPAL_USERNAME,
			'password' => PAYPAL_PASSWORD,
			'signature' => PAYPAL_SIGNATURE,
			'test_mode' => false
		);
        
         $this->load->library("session");

        if ($this->session->userdata("MEGCLUB_DISCOUNT")=='1')
        {
                         $data['price'] -= MEGCLUB_DISCOUNT;
        }
        
          //  $data['first_name'] = $this->session->userdata('first_name');

        
        
		$this->merchant->initialize($settings);
		$params = array(
			'amount' => 1,
            'item' => $data['c_name'],
            'description' => $data['c_name'],
	//		'amount' => $data['price'],
            //not here
            'amount' => $data['price'],
			'currency' => 'HKD',
			'return_url' => site_url('app/pay_return/'.$apply_id),
			'cancel_url' => site_url('app/pay_cancel/'.$apply_id)
		);
		$response = $this->merchant->purchase($params);
		if ($response->success()){
			$gateway_reference = $response->reference();
		}
		else{
			$message = $response->message();
			echo('Error processing payment: ' . $message);
			exit;
		}
	}
	
	public function pay_return($apply_id){ 
//        echo 'pay_Return';
		$data = $this->Meg_model->get_apply($apply_id);
		if(is_null($data)){
			exit;
		}
		if($data['pay_status']==PAY_STATUS_PAID){
			redirect('app/complete/'.$apply_id);
		}
		
		$this->load->library('merchant');
		$this->merchant->load('paypal_express');
		$settings = $this->merchant->default_settings();
		$settings = array(
			'username' => PAYPAL_USERNAME,
			'password' => PAYPAL_PASSWORD,
			'signature' => PAYPAL_SIGNATURE,
			'test_mode' => false
		);
		$this->merchant->initialize($settings);
        
                 $this->load->library("session");

          if ($this->session->userdata("MEGCLUB_DISCOUNT")=='1')
        {
                         $data['price'] -= MEGCLUB_DISCOUNT;
        }
        
        
        
		$params = array(
			'amount' => 1,
            'item' => $data['c_name'],
            'description' => $data['c_name'],
			'amount' => $data['price'],
			'currency' => 'HKD',
			'return_url' => site_url('app/pay_return/'.$apply_id),
			'cancel_url' => site_url('app/pay_cancel/'.$apply_id)
		);
		$response = $this->merchant->purchase_return($params);
//		echo 999;
		if ($response->success()){
	//		echo 111;
            $pay_status = PAY_STATUS_PAID;
			$this->Meg_model->set_pay_status($apply_id, $pay_status, $response->reference());
	//		echo 123;
            $data = $this->Meg_model->get_apply($apply_id);
//			echo 456;
            
   //         print_r($data);
            $this->load->model('Email_model');
			$this->Email_model->apply($data);
            
            
            
			if($data['e_pay_email']){
                
                
                                 $this->load->library("session");

                
                   if ($this->session->userdata("MEGCLUB_DISCOUNT")=='1')
                    {
                                     $data['price'] -= MEGCLUB_DISCOUNT;
                                      $data['price'].=' (已扣除MEG Club 提供的會員折扣優惠$200)';
                    }
        
                $student_gender = $this->gender[$data['student_gender']]['name'] ;
                
                
                   $shop = explode("|", $data['shop']);
                                $shop = $shop[0];
                
                $join_megclub_str = ($data['join_megclub'] == '1') ? 'YES' : 'NO';
                
                $email_html='<br/><table align="left" border="0" cellspacing="0" cellpadding="0" class="result-table">
				
                
                <tbody><tr>
                    <td colspan="2" class="table-title no-border"><b>- 交易資料 -</b></td>

                </tr>
                
                <tr>
				  <td class="bold" style="width:120px;">交易編號：</td>
				  <td>'.$data['pay_reference'].'</td>
				</tr>
				<tr>
				  <td class="bold">所選課程：</td>
				  <td>'.$data['c_name'].'</td>
				</tr>
				<tr>
				  <td class="bold">數量：</td>
				  <td>1</td>
				</tr>
				<tr>
				  <td class="bold">價錢：</td>
				  <td>'.$data['price'].'</td>
				</tr>
                <tr>
                <tr>
				  <td class="bold">選擇跟進網上報名服務地點：</td>
				  <td>'.$shop.'</td>
				</tr>
                <tr>
                <tr>
				  <td class="bold">聯絡時間：</td>
				  <td>'.$data['contact_timeslot'].'</td>
				</tr>';
                
                
            /*     if ($data['ask_reg_enquiry'])
                {
              
                 $email_html.='<tr>
                <td align="left" valign="middle" class="bold">登記查詢：</td>
                <td align="left" valign="middle" class="txt01">'.$this->need[$data['reg_enquiry']].'</td></tr>';
                }*/
                
                $email_html.= '<tr>
				  <td class="bold">備註：</td>
				  <td>'.$data['apply_remark'].'</td>
				</tr>
                <tr>
                    <td colspan="2" class="table-title no-border"><br><b>- 個人資料 -</b></td>

                </tr>';

                
                if ($data['staff_code'])
                {
              
                   $email_html.= '<tr>
                    <td align="left" valign="middle" class="bold">員工編號：</td>
                    <td align="left" valign="middle" >'.$data['staff_code'].'</td>
                    </tr>
                    <tr>
                    <td align="left" valign="middle" class="bold">員工姓名：</td>
                    <td align="left" valign="middle" >'.$data['staff_name'].'</td>
                    </tr>';
                }

                   
                
           $email_html.= ' <tr>
                <td align="left" valign="middle" class="bold">稱謂：</td>
                <td align="left" valign="middle">'.$student_gender.'</td>
                </tr><tr>
                <td align="left" valign="middle" class="bold">學員姓名：</td>
                <td align="left" valign="middle">'.$data['student_name'].'</td>
                </tr>
              <tr>
              </tr>
             <!-- <tr>
                <td align="left" valign="middle" class="bold">出生日期：</td>
                <td align="left" valign="middle" >1900-1-1</td>
                </tr>-->
             <!-- <tr>
                <td align="left" valign="middle" class="bold">身份證：</td>
                <td align="left" valign="middle" >3333</td>
                </tr>--> 
              <tr>
                <td align="left" valign="middle" class="bold">聯絡電話：</td>
                <td align="left" valign="middle">'.$data['student_tel'].'</td>
              </tr>
              <tr>
                <td align="left" valign="middle" class="bold">電郵地址：</td>
                <td align="left" valign="middle">'.$data['student_email'].'</td>
                </tr>
              <!--<tr>
                <td align="left" valign="middle" class="bold">郵寄地址：</td>
                <td align="left" valign="middle">'.$data['student_address'].'</td>
                </tr>-->
                
			</tbody></table>';
                $this->Email_model->apply_to_user($data['e_pay_email_subject'],$data['e_pay_email_content'].$email_html,$data['student_email'],str_replace('index.php', '', $_SERVER["SCRIPT_FILENAME"]).'attachs/'.$data['e_pay_email_attach'],false);
			}
		}
		else{
			$message = $response->message();
			log_message('debug', 'Paypal purchase failed when retrun, status='.$response->status().' message='.$message.' reference='.$response->reference());
		//	$pay_status = PAY_STATUS_FAIL;
		}
		redirect('app/complete/'.$apply_id);
	}
	
	public function pay_cancel($apply_id){ 
		redirect('app/complete/'.$apply_id);
	//exit;
	//	echo "Loading...";
	//	echo '<script>location.href = "'.site_url('app/complete/'.$apply_id).'";</script>';
		
	//	echo '<form id="form" action="'.site_url('app/complete/'.$apply_id).'" >';
	//	echo '</form>';
	//	echo '<script>document.getElementById("form").submit();</script>';
	}
	
	public function complete($apply_id){
		$data = $this->Meg_model->get_apply($apply_id);
        
                 $this->load->library("session");

//        print_r($data);
        if ($this->session->userdata("MEGCLUB_DISCOUNT")=='1')
        {
                         $data['price'] -= MEGCLUB_DISCOUNT;
                         $data['megclub_discount']='1';
        }
        else
        {
                         $data['megclub_discount']='0';
        }
        
		if(is_null($data)){
			exit;
		}
		self::load_header($data['title'], $data['title'], $data['title'], array(
			'img/style.css'
		));
		$this->load->view('/app/complete', $data);
		self::load_footer(array(
			'img/web_js.js'
		));
	}
	
	private function load_header($title, $keywords, $description, $css){
		if($css==null){
			$css = array();
		}
		array_unshift($css, 'css/global.css', 'css/responsive.css?t='.time(),'css/magnific-popup.css');
		$data = array(
			'title'			=> $title,
			'keywords'		=> $keywords,
			'description'	=> $description,
			'css'			=> $css
		);
		$this->load->view('app/header', $data);
	}

	private function load_footer($js){
		if($js==null){
			$js = array();
		}
		array_unshift($js, 'js/jquery.min.js', 'js/responsive.js','js/jquery.magnific-popup.js','js/global.js?t='.time());
		$this->load->view('app/footer', array('js'=>$js));
	}
	
}

?>