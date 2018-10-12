<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {
	
	public $user;
	
	public function __construct() {
        parent::__construct();
		$this->load->library('table');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('site');
		$this->load->model('Meg_model');
    }
	
	public function apply_excel(){
		self::check_login();
		$start_time = $this->input->get('start_time');
		$end_time = $this->input->get('end_time');
		if(!$start_time || !$end_time){
			echo 'Incorrect parameters';
			exit;
		}
		
		$apply_list = $this->Meg_model->get_apply_list(array(
			'a.create_time >=' => $start_time,
			'a.create_time <=' => $end_time
		), 'a.create_time');
		
		if(empty($apply_list)){
			echo 'No record in this period';
			exit;
		}
		
		$filename = $start_time.'_'.$end_time.'.xls';
		self::sendXls($apply_list, $filename);
	}
	private function sendXls($apply_list, $filename){
		$this->load->library('PHPExcel');
		$objPHPExcel = new PHPExcel();
		// Set document properties
		$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
					 ->setLastModifiedBy("Maarten Balliauw")
					 ->setTitle("Office 2007 XLSX Test Document")
					 ->setSubject("Office 2007 XLSX Test Document")
					 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
					 ->setKeywords("office 2007 openxml php")
					 ->setCategory("Test result file");
		
		$objPHPExcel->getDefaultStyle()->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
		
		$i = 0;
		$objPHPExcel->setActiveSheetIndex(0)
					->setCellValueByColumnAndRow($i++, 1, 'Date&Time')
					->setCellValueByColumnAndRow($i++, 1, 'Event ID')
					->setCellValueByColumnAndRow($i++, 1, 'Course ID')
					->setCellValueByColumnAndRow($i++, 1, 'Promotion Code')
					->setCellValueByColumnAndRow($i++, 1, 'Amount')
            		->setCellValueByColumnAndRow($i++, 1, 'Join Meg Club?')
            		->setCellValueByColumnAndRow($i++, 1, 'Allow Promotion')
//            		->setCellValueByColumnAndRow($i++, 1, '登記查詢')
            		->setCellValueByColumnAndRow($i++, 1, 'Shop')
            		->setCellValueByColumnAndRow($i++, 1, 'Contact Timeslot')
            		->setCellValueByColumnAndRow($i++, 1, 'Apply Remark')            
					->setCellValueByColumnAndRow($i++, 1, 'Location')
					->setCellValueByColumnAndRow($i++, 1, 'Staff ID')
					->setCellValueByColumnAndRow($i++, 1, 'Staff Name')
					->setCellValueByColumnAndRow($i++, 1, 'Student Name')
				/*	->setCellValueByColumnAndRow($i++, 1, 'Student Birthday')
					->setCellValueByColumnAndRow($i++, 1, 'HKID')
					->setCellValueByColumnAndRow($i++, 1, 'Check_Digi')*/
					->setCellValueByColumnAndRow($i++, 1, 'Student Gender')
					->setCellValueByColumnAndRow($i++, 1, 'Tel')
					->setCellValueByColumnAndRow($i++, 1, 'Mail')
/*					->setCellValueByColumnAndRow($i++, 1, 'Address')
*/					->setCellValueByColumnAndRow($i++, 1, 'PayPal Transaction ID');

		// Miscellaneous glyphs, UTF-8
		$sheet = $objPHPExcel->setActiveSheetIndex(0);
		$r = 2;
		foreach($apply_list as $apply){
			$i = 0;
			$check_digi = '';
			if($apply['e_full_id']){
				$check_digi = substr($apply['student_id'], -2, 1);
				$apply['student_id'] = substr($apply['student_id'], 0, 7);
			}
            
            //print_r($apply);
            $e_code = $apply['e_code'];
             $e_code = ($apply['join_megclub']=='1') ? $e_code.JOIN_MEGCLUB_SUFFIX : $e_code;
            
            $price =  ($apply['join_megclub']=='1')  ?  $apply['price']-MEGCLUB_DISCOUNT :  $apply['price'];
            $join_megclub=$apply['join_megclub'];
            
          //  $shop=$apply['shop'];
            $contact_timeslot=$apply['contact_timeslot'];
            
            
              $shop = explode("|", $apply['shop']);
                $shop = $shop[0];
            
			
			$coupon_code_data = $this->Meg_model->get_coupon($apply['used_coupon']);
			//	print_r($data);
			$used_coupon_code = $coupon_code_data['coupon_code'] ?  $coupon_code_data['coupon_code'] : '沒有使用';
			
			
					
			if($coupon_code_data['coupon_code'])
			{
				    $price -=$coupon_code_data['discount'];
			}
			
			
			$sheet->setCellValueByColumnAndRow($i++, $r, $apply['create_time'])
					->setCellValueByColumnAndRow($i++, $r, $e_code)
					->setCellValueByColumnAndRow($i++, $r, $apply['c_code'])
					->setCellValueByColumnAndRow($i++, $r, $used_coupon_code)				
					->setCellValueByColumnAndRow($i++, $r, $price)
					->setCellValueByColumnAndRow($i++, $r, $join_megclub)
					->setCellValueByColumnAndRow($i++, $r, $apply['allow_promo'])
//                	->setCellValueByColumnAndRow($i++, $r, $apply['reg_enquiry'])                
					->setCellValueByColumnAndRow($i++, $r, $shop)
					->setCellValueByColumnAndRow($i++, $r, $contact_timeslot)      
                	->setCellValueByColumnAndRow($i++, $r, $apply['apply_remark'])      
                	->setCellValueByColumnAndRow($i++, $r, $apply['l_name'])
					->setCellValueByColumnAndRow($i++, $r, $apply['staff_code'])
					->setCellValueByColumnAndRow($i++, $r, $apply['staff_name'])
					->setCellValueByColumnAndRow($i++, $r, $apply['student_name'])
/*					->setCellValueByColumnAndRow($i++, $r, $apply['student_birthday'])
					->setCellValueByColumnAndRow($i++, $r, $apply['student_id'])
					->setCellValueByColumnAndRow($i++, $r, $check_digi)*/
					->setCellValueByColumnAndRow($i++, $r, $this->gender[$apply['student_gender']]['name'])
					->setCellValueByColumnAndRow($i++, $r, $apply['student_tel'])
					->setCellValueByColumnAndRow($i++, $r, $apply['student_email'])
/*					->setCellValueByColumnAndRow($i++, $r, $apply['student_address'])
*/					->setCellValueByColumnAndRow($i++, $r, $apply['pay_reference']);
			$r++;
		}
		
		for($i=0;$i<20;$i++){
			$sheet->getColumnDimensionByColumn($i)->setAutoSize(true);
		}
			
			
		// Rename worksheet
		$objPHPExcel->getActiveSheet()->setTitle('Records');

		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$objPHPExcel->setActiveSheetIndex(0);


		// Redirect output to a client’s web browser (Excel5)
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		// If you're serving to IE over SSL, then the following may be needed
		header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
		header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header ('Pragma: public'); // HTTP/1.0

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save('php://output');		
	}
	
	public function index(){
		if($this->Meg_model->get_admin_user()){
			redirect('/admin/apply_list/');
		} else {
			redirect('/admin/login/');
		}
	}
	
	public function admin(){
		self::check_login();
		
		$data = array();
		$data['message'] = array();
		if ($this->input->post('is_submit')) {
		//	$data['username'] = $this->input->post('username');
			$old_password = $this->input->post('old_password');
			$new_password1 = $this->input->post('new_password1');
			$new_password2 = $this->input->post('new_password2');
			
			$valid = true;
		//	if(!$data['username']){
		//		$valid = false;
		//		array_push($data['message'], array(MSG_ERR, '必須輸入用戶名'));
		//	}
			if(md5($old_password)!=$this->user['password']){
				$valid = false;
				array_push($data['message'], array(MSG_ERR, '密碼不正確'));
			}
			if($new_password1 || $new_password2){
				if($new_password1 != $new_password2){
					$valid = false;
					array_push($data['message'], array(MSG_ERR, '兩次密碼輸入不相同'));
				}
			}
			if($valid){
			//	if($new_password1){
			//		$affected_rows = $this->Meg_model->update_admin_user($data['username'], $new_password1);
			//	} else {
			//		$affected_rows = $this->Meg_model->update_admin_user($data['username']);
			//	}
				$affected_rows = $this->Meg_model->change_admin_password($new_password1);
				if($affected_rows>0){
					array_push($data['message'], array(MSG_SUCC, '更新成功'));
					$this->user = $this->Meg_model->verify_admin_user($this->user['username'], $new_password1);
					$this->Meg_model->set_admin_user($this->user);
				} else {
					array_push($data['message'], array(MSG_WARN, '更新失敗或內容沒有變更'));
				}
			}
		} else {
		//	$user = $this->Meg_model->get_admin_user(false);
		//	$data['username'] = $user['username'];
		}
		$this->load->view('admin/header');
		self::load_nav();
		$this->load->view('admin/admin', $data);
		$this->load->view('admin/footer');
	}
	
	/**
	 * Login
	 */
	public function login(){
		if($this->Meg_model->get_admin_user()){
			redirect('admin');
		} else {
			$data = array();
			if ($this->input->post('is_postback')) {
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$admin_user = $this->Meg_model->verify_admin_user($username, $password);
				if (!$admin_user) {
					$data['error'] = 'Incorrect username or password';
				} else {
					$this->Meg_model->set_admin_user($admin_user);
					redirect('admin');
				}
			}
			$this->load->view('admin/header');
			$this->load->view('admin/login', $data);
			$this->load->view('admin/footer');
		}
	}
	private function check_login(){
		$this->user = $this->Meg_model->get_admin_user();
		if(!$this->user) {
			redirect('admin/login');
		}
	}
	public function logout(){
		$this->Meg_model->set_admin_user(null);
		$this->user = null;
        redirect('admin');
	}
	
	/**
	 * Apply
	 */
	public function apply_list(){
		self::check_login();
		
	//	$data = array();
	//	$data['sort']['by'] = $this->input->get('sort_by');
	//	$data['sort']['as'] = $this->input->get('sort_as');
	//	$data['sort']['by'] = 'a.create_time';
	//	$data['sort']['as'] = 'DESC';
		
		$data = array();
		$data['sortby'] = $this->input->get('sortby');
		$data['sortas'] = $this->input->get('sortas');
		if(!$data['sortby']){
			$data['sortby'] = 'a.create_time';
		}
		if(!$data['sortas']){
			$data['sortas'] = 'DESC';
		}
		
        //print_r($data);
		$page = $this->input->get('page');
		if(!$page) $page = 1;
		$offset = ($page - 1) * PAGE_APPLY;
		$data['list'] = $this->Meg_model->get_apply_list(array(), $data['sortby'], $data['sortas'], PAGE_APPLY, $offset);
        
  //      print_r($data['list']) ;
		$data['message'] = array();
		$data['page'] = $page;
		
		$total_rows = $this->Meg_model->get_apply_count(array());
		
		$this->load->view('admin/header');
		self::load_nav();
		$this->load->view('admin/apply_list', $data);
		self::load_pagination(site_url('admin/apply_list/'), $total_rows, PAGE_APPLY, $offset, count($data['list']), $data['sortby'], $data['sortas']);
		$this->load->view('admin/footer');
	}
	public function apply($id){
		self::check_login();
		$data = $this->Meg_model->get_apply($id);
		if(is_null($data)){
			redirect('admin/apply_list/');
		}
		$this->load->view('admin/header');
		self::load_nav();
		$this->load->view('admin/apply', $data);
		$this->load->view('admin/footer');
	}
	
	/**
	 * Event
	 */
	public function event_list(){
		self::check_login();
		
		$data = array();
		$data['sortby'] = $this->input->get('sortby');
		$data['sortas'] = $this->input->get('sortas');
		if(!$data['sortby']){
			$data['sortby'] = 'create_time';
		}
		if(!$data['sortas']){
			$data['sortas'] = 'DESC';
		}
		
		$page = $this->input->get('page');
		if(!$page) $page = 1;
		$offset = ($page - 1) * PAGE_EVENT;
		$data['list'] = $this->Meg_model->get_event_list(array(), $data['sortby'], $data['sortas'], PAGE_EVENT, $offset);
		$data['message'] = array();
		$data['page'] = $page;
		
		$total_rows = $this->Meg_model->get_event_count(array());
		
		$this->load->view('admin/header');
		self::load_nav();
		$this->load->view('admin/event_list', $data);
		self::load_pagination(site_url('admin/event_list/'), $total_rows, PAGE_EVENT, $offset, count($data['list']), $data['sortby'], $data['sortas']);
		$this->load->view('admin/footer');
	}
	public function event($id = 0){
		self::check_login();
		$data = array(
			'message' => array(),
			'info' => array(),
			'course_list' => $this->Meg_model->get_course_list(array('meg_course.allow'=>1), 'name'),
			'location_list' => $this->Meg_model->get_location_list(array('meg_location.allow'=>1), 'name')
		);
		if ($this->input->post('submit_type') || $id==0) {
			$data['info']['code'] = $this->input->post('code');
			$data['info']['name'] = $this->input->post('name');
			$data['info']['status'] = $this->input->post('status');
			$data['info']['allow'] = $this->input->post('allow');
			$data['info']['start_time'] = $this->input->post('start_time');
			$data['info']['end_time'] = $this->input->post('end_time');
			
			$data['info']['show_staff'] = $this->input->post('show_staff');
            $data['info']['ask_megclub'] = $this->input->post('ask_megclub');
            $data['info']['ask_retake_part'] = $this->input->post('ask_retake_part');
			
			//
			$data['info']['coupon_code_input'] = $this->input->post('coupon_code_input');
			
        //    $data['info']['ask_reg_enquiry'] = $this->input->post('ask_reg_enquiry');


            
			$data['info']['full_id'] = $this->input->post('full_id');
			$data['info']['selected_course'] = $this->input->post('selected_course');
			if($data['info']['selected_course'] == NULL){
				$data['info']['selected_course'] = array();
			}
			$data['info']['selected_location'] = $this->input->post('selected_location');
			if($data['info']['selected_location'] == NULL){
				$data['info']['selected_location'] = array();
			}
			
			$data['info']['title'] = $this->input->post('title');
			$data['info']['banner'] = $this->input->post('banner');
			$data['info']['header'] = $this->input->post('header');
			$data['info']['policy'] = $this->input->post('policy');
			
			$data['info']['pay_email'] = $this->input->post('pay_email');
			$data['info']['pay_email_subject'] = $this->input->post('pay_email_subject');
			$data['info']['pay_email_content'] = $this->input->post('pay_email_content');
			$data['info']['pay_email_attach'] = $this->input->post('pay_email_attach');
		} else {
			$data['info'] = $this->Meg_model->get_event($id);
		}
	//	dump($data['info']['selected_course']);
		if(is_null($data['info'])){
			redirect('admin/event_list');
		}
		
		if ($this->input->post('submit_type') == SUBMIT_SAVE) {			
			//verify
			$valid = true;
			if(!$data['info']['code']){
				$valid = false;
				array_push($data['message'], array(MSG_ERR, '必須輸入活動編號'));
			} else {
				if($this->Meg_model->get_event(array('code'=>$data['info']['code'], 'meg_event.id <>'=>$id)) != NULL){
					$valid = false;
					array_push($data['message'], array(MSG_ERR, '活動編號已經存在'));
				}
			}
			if(!$data['info']['name']){
				$valid = false;
				array_push($data['message'], array(MSG_ERR, '必須輸入活動名稱'));
			}
			if(!$data['info']['start_time']){
				$valid = false;
				array_push($data['message'], array(MSG_ERR, '必須輸入活動開始時間'));
			}
			if(!$data['info']['end_time']){
				$valid = false;
				array_push($data['message'], array(MSG_ERR, '必須輸入活動結束時間'));
			} 
			if(empty($data['info']['selected_course'])){
				$valid = false;
				array_push($data['message'], array(MSG_ERR, '必須選擇至少一個課程'));
			} 
			
			if(empty($data['info']['selected_location'])){
				$valid = false;
				array_push($data['message'], array(MSG_ERR, '必須選擇至少一個地址'));
			} 
			if(!$data['info']['title']){
				$valid = false;
				array_push($data['message'], array(MSG_ERR, '必須輸入Title'));
			} 
			if(!$data['info']['banner']){
				$valid = false;
				array_push($data['message'], array(MSG_ERR, '必須輸入Banner'));
			} 
			if(!$data['info']['header']){
				$valid = false;
				array_push($data['message'], array(MSG_ERR, '必須輸入上款文字'));
			} 
			if(!$data['info']['policy']){
				$valid = false;
				array_push($data['message'], array(MSG_ERR, '必須輸入條款'));
			} 
			if($valid) {
				if($id==0){
					$data['info']['creator'] = $this->user['id'];
					$data['info']['a_username'] = $this->user['username'];
					$insert_id = $this->Meg_model->add_event($data['info']);
					if($insert_id > 0){
						$id = $insert_id;
						array_push($data['message'], array(MSG_SUCC, '新增活動成功'));
					} else {
						array_push($data['message'], array(MSG_ERR, '新增活動失敗'));
					}
				} else {
					$affected_rows = $this->Meg_model->update_event($id, $data['info']);
					if($affected_rows>0){
						$data['info'] = $this->Meg_model->get_event($id);
						array_push($data['message'], array(MSG_SUCC, '更新活動成功'));
					} else {
						array_push($data['message'], array(MSG_WARN, '更新活動失敗或內容沒有變更'));
					}
				}
			}
		}
		
		if($this->input->post('submit_type') == SUBMIT_DELETE){
			$affected_rows = $this->Meg_model->del_event($id);
			if($affected_rows>0){
				redirect('/admin/event_list/?del');
			} else {
				array_push($data['message'], array(MSG_ERR, '刪除失敗, 項目不存在或已被移除'));
			}
		}
		
		$data['id'] = $id;
		
		$this->load->view('admin/header');
		self::load_nav();
		if(!$data['info']['allow'] || $this->user['admin']){
			$this->load->view('admin/event', $data);
		} else {
			$this->load->view('admin/event_readonly', $data);
		}
		$this->load->view('admin/footer');
	}
	
	/**
	 * Course
	 */
	public function course_list(){
				self::check_login();

//		echo  $this->user['username'];
		$data = array();
		$data['sort']['by'] = $this->input->get('sort_by');
		$data['sort']['as'] = $this->input->get('sort_as');
		$data['sort']['by'] = 'create_time';
		$data['sort']['as'] = 'DESC';
		
		$page = $this->input->get('page');
		if(!$page) $page = 1;
		$offset = ($page - 1) * PAGE_COURSE;
		$data['list'] = $this->Meg_model->get_course_list(array(), $data['sort']['by'], $data['sort']['as'], PAGE_COURSE, $offset);
		$data['message'] = array();
		
		$total_rows = $this->Meg_model->get_course_count(array());
		

		$this->load->view('admin/header');
		self::load_nav();
		$this->load->view('admin/course_list', $data);
		self::load_pagination(site_url('admin/course_list/'), $total_rows, PAGE_COURSE, $offset, count($data['list']));
		$this->load->view('admin/footer');
	}
	public function course($id = 0){
		self::check_login();
		$data = array(
			'message' => array(),
			'info' => array()
		);
		if ($this->input->post('submit_type') || $id==0) {
			$data['info']['code'] = $this->input->post('code');
			$data['info']['name'] = $this->input->post('name');
			$data['info']['remark'] = $this->input->post('remark');
			$data['info']['price'] = $this->input->post('price');
			$data['info']['allow'] = $this->input->post('allow');
		} else {
			$data['info'] = $this->Meg_model->get_course($id);
			if(!$data['info']){
				redirect('/admin/course_list/');
			}
		}
		
		if ($this->input->post('submit_type') == SUBMIT_SAVE) {			
			//verify
			$valid = true;
			if(!$data['info']['code']){
				$valid = false;
				array_push($data['message'], array(MSG_ERR, '必須輸入課程編號'));
			} 
			if(!$data['info']['name']){
				$valid = false;
				array_push($data['message'], array(MSG_ERR, '必須輸入課程名稱'));
			} 
			if(!$data['info']['price']){
				$valid = false;
				array_push($data['message'], array(MSG_ERR, '必須輸入價錢'));
			} else if(!is_numeric($data['info']['price'])){
				$valid = false;
				array_push($data['message'], array(MSG_ERR, '價錢必須是數字'));
			}
			if($valid) {
				if($id==0){
					$data['info']['creator'] = $this->user['id'];
					$insert_id = $this->Meg_model->add_course($data['info']);
					$data['info']['a_username'] = $this->user['username'];
					if($insert_id > 0){
						$id = $insert_id;
						array_push($data['message'], array(MSG_SUCC, '新增課程成功'));
					} else {
						array_push($data['message'], array(MSG_ERR, '新增課程失敗'));
					}
				} else {
					$affected_rows = $this->Meg_model->update_course($id, $data['info']);
					if($affected_rows>0){
						$data['info'] = $this->Meg_model->get_course($id);
						array_push($data['message'], array(MSG_SUCC, '更新課程成功'));
					} else {
						array_push($data['message'], array(MSG_WARN, '更新課程失敗或內容沒有變更'));
					}
				}
			}
		}
		
		if($this->input->post('submit_type') == SUBMIT_DELETE){
			$affected_rows = $this->Meg_model->del_course($id);
			if($affected_rows>0){
				redirect('/admin/course_list/?del');
			} else {
				array_push($data['message'], array(MSG_ERR, '刪除失敗, 項目不存在或已被移除'));
			}
		}
		
		$data['id'] = $id;
		
		$this->load->view('admin/header');
		self::load_nav();
		if(!$data['info']['allow'] || $this->user['admin']){
			$this->load->view('admin/course', $data);
		} else {
			$this->load->view('admin/course_readonly', $data);
		}
		$this->load->view('admin/footer');
	}
	
	/**
	 * Location
	 */
	public function location_list(){
				self::check_login();

		$data = array();
		$data['sort']['by'] = $this->input->get('sort_by');
		$data['sort']['as'] = $this->input->get('sort_as');
		$data['sort']['by'] = 'create_time';
		$data['sort']['as'] = 'DESC';
		
		$page = $this->input->get('page');
		if(!$page) $page = 1;
		$offset = ($page - 1) * PAGE_LOCATION;
		$data['list'] = $this->Meg_model->get_location_list(array(), $data['sort']['by'], $data['sort']['as'], PAGE_LOCATION, $offset);
		$data['message'] = array();
		
		$total_rows = $this->Meg_model->get_location_count(array());
		
		$this->load->view('admin/header');
		self::load_nav();
		$this->load->view('admin/location_list', $data);
		self::load_pagination(site_url('admin/location_list/'), $total_rows, PAGE_LOCATION, $offset, count($data['list']));
		$this->load->view('admin/footer');
	}
	public function location($id = 0){
		

		self::check_login();
		$data = array(
			'message' => array(),
			'info' => array()
		);
		if ($this->input->post('submit_type') || $id==0) {
			$data['info']['name'] = $this->input->post('name');
			$data['info']['allow'] = $this->input->post('allow');
		} else {
			$data['info'] = $this->Meg_model->get_location($id);
			if(!$data['info']){
				redirect('/admin/location_list/');
			}
		}
		
		if ($this->input->post('submit_type') == SUBMIT_SAVE) {			
			//verify
			$valid = true;
			if(!$data['info']['name']){
				$valid = false;
				array_push($data['message'], array(MSG_ERR, '必須輸入地址'));
			} 
			if($valid) {
				if($id==0){
					$data['info']['creator'] = $this->user['id'];
					$insert_id = $this->Meg_model->add_location($data['info']);
					$data['info']['a_username'] = $this->user['username'];
					if($insert_id > 0){
						$id = $insert_id;
						array_push($data['message'], array(MSG_SUCC, '新增地址成功'));
					} else {
						array_push($data['message'], array(MSG_ERR, '新增地址失敗'));
					}
				} else {
					$affected_rows = $this->Meg_model->update_location($id, $data['info']);
					if($affected_rows>0){
						$data['info'] = $this->Meg_model->get_location($id);
						array_push($data['message'], array(MSG_SUCC, '更新地址成功'));
					} else {
						array_push($data['message'], array(MSG_WARN, '更新地址失敗或內容沒有變更'));
					}
				}
			}
		}
		
		if($this->input->post('submit_type') == SUBMIT_DELETE){
			$affected_rows = $this->Meg_model->del_location($id);
			if($affected_rows>0){
				redirect('/admin/location_list/?del');
			} else {
				array_push($data['message'], array(MSG_ERR, '刪除失敗, 項目不存在或已被移除'));
			}
		}
		
		$data['id'] = $id;
		
		$this->load->view('admin/header');
		self::load_nav();
		if(!$data['info']['allow'] || $this->user['admin']){
			$this->load->view('admin/location', $data);
		} else {
			$this->load->view('admin/location_readonly', $data);
		}
		$this->load->view('admin/footer');
	}
	
	
	
	/**
	 * Coupon Code
	 */
	public function coupon_code_list(){
	
	
	
		self::check_login();
		
		$data = array();
		$data['sortby'] = $this->input->get('sortby');
		$data['sortas'] = $this->input->get('sortas');
		if(!$data['sortby']){
			$data['sortby'] = 'create_time';
		}
		if(!$data['sortas']){
			$data['sortas'] = 'DESC';
		}
		
		$page = $this->input->get('page');
		if(!$page) $page = 1;
		$offset = ($page - 1) * PAGE_COUPON;
		$data['list'] = $this->Meg_model->get_coupon_list(array(), $data['sortby'], $data['sortas'], PAGE_COUPON, $offset);
		$data['message'] = array();
		$data['page'] = $page;
		
		$total_rows = $this->Meg_model->get_coupon_count(array());
		
		$this->load->view('admin/header');
		self::load_nav();
		$this->load->view('admin/coupon_code_list', $data);
		self::load_pagination(site_url('admin/coupon_code_list/'), $total_rows, PAGE_COUPON, $offset, count($data['list']), $data['sortby'], $data['sortas']);
		$this->load->view('admin/footer');
	
		
		
		
	}
	
	
	public function coupon_code($id = 0){
		
		self::check_login();
		$data = array(
			'message' => array(),
			'info' => array(),
			'course_list' => $this->Meg_model->get_course_list(array('meg_course.allow'=>1), 'name')

		);
		if ($this->input->post('submit_type') || $id==0) {
		//	$data['info']['name'] = $this->input->post('name');
		//	$data['info']['allow'] = $this->input->post('allow');
			$data['info']['coupon_name'] = $this->input->post('coupon_name');
			$data['info']['coupon_code'] = $this->input->post('coupon_code');
			$data['info']['discount'] = $this->input->post('discount');
			$data['info']['allow'] = $this->input->post('allow');
			$data['info']['start_time'] = $this->input->post('start_time');
			$data['info']['end_time'] = $this->input->post('end_time');
			$data['info']['status'] = $this->input->post('status');
			
			$data['info']['selected_course'] = $this->input->post('selected_course');
			if($data['info']['selected_course'] == NULL){
				$data['info']['selected_course'] = array();
			}
			
		} else {
			$data['info'] = $this->Meg_model->get_coupon($id);
			if(!$data['info']){
				redirect('/admin/coupon_code_list/');
			}
		}
		
		if ($this->input->post('submit_type') == SUBMIT_SAVE) {			
			//verify
			$valid = true;
			
			if(!$data['info']['coupon_name']){
				$valid = false;
				array_push($data['message'], array(MSG_ERR, '必須輸入優惠代碼名稱'));
			}
			
			if(!$data['info']['coupon_code']){
				$valid = false;
				array_push($data['message'], array(MSG_ERR, '必須輸入優惠代碼編號'));
			}
			
			if(empty($data['info']['selected_course'])){
				//	$valid = false;
			//	array_push($data['message'], array(MSG_ERR, '必須選擇至少一個課程'));
			} 
			
			if(!$data['info']['start_time']){
				$valid = false;
				array_push($data['message'], array(MSG_ERR, '必須輸入活動開始時間'));
			}
		
			if(!$data['info']['end_time']){
				$valid = false;
				array_push($data['message'], array(MSG_ERR, '必須輸入活動結束時間'));
			} 
			if(!$data['info']['discount']){
				$valid = false;
				array_push($data['message'], array(MSG_ERR, '必須輸入優惠銀碼'));
			} else if(!is_numeric($data['info']['discount'])){
				$valid = false;
				array_push($data['message'], array(MSG_ERR, '優惠銀碼必須是數字'));
			}
			
			
			
			if($valid) {
				if($id==0){
					$data['info']['creator'] = $this->user['id'];
					$insert_id = $this->Meg_model->add_coupon($data['info']);
				//	$data['info']['a_username'] = $this->user['username'];
					
					if($insert_id > 0){
						$id = $insert_id;
						array_push($data['message'], array(MSG_SUCC, '新增優惠代碼成功'));
					} else {
						array_push($data['message'], array(MSG_ERR, '新增優惠代碼失敗'));
					}
				} else {

					$affected_rows = $this->Meg_model->update_coupon($id, $data['info']);
					
					if($affected_rows>0){
						array_push($data['message'], array(MSG_SUCC, '更新優惠代碼成功'));
					} else {
						array_push($data['message'], array(MSG_WARN, '更新優惠代碼失敗或內容沒有變更'));
					}
				}
			}
		}
		
		if($this->input->post('submit_type') == SUBMIT_DELETE){
			$affected_rows = $this->Meg_model->del_coupon($id);
			if($affected_rows>0){
				redirect('/admin/coupon_code_list/?del');
			} else {
				array_push($data['message'], array(MSG_ERR, '刪除失敗, 項目不存在或已被移除'));
			}
		}
		
		$data['id'] = $id;

		
		$this->load->view('admin/header');
		self::load_nav();
		
		$data['info']['a_username'] = $this->user['username'];

		if(!$data['info']['allow'] || $this->user['admin']){
			$this->load->view('admin/coupon_code', $data);
		} else {
			$this->load->view('admin/coupon_code_readonly', $data);
		}
		$this->load->view('admin/footer');
	}
	
	/**
	 * Navigator
	 */
	private function load_nav(){
		$data = array();
		$this->load->view('admin/navigator', $data);
	}
	
	/**
	 * Pagination
	 */
	 private function get_pagination($base_url, $total_rows, $per_page){
		$this->load->library('pagination');
		$config['base_url'] = $base_url;
		$config['total_rows'] = $total_rows;
		$config['per_page'] = $per_page;
		$config['use_page_numbers'] = TRUE;
		$config['page_query_string'] = TRUE;
		$config['query_string_segment'] = 'page';
		$config['num_links'] = NUM_LINKS;
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['cur_tag_open'] = '<li class="paginate_button active"><span>';
		$config['cur_tag_close'] = '</span></li>';
		$config['num_tag_open'] = '<li class="paginate_button">';
		$config['num_tag_close'] = '</li>';
		$config['first_link'] = '第一頁';
		$config['first_tag_open'] = '<li class="paginate_button previous">';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = '最後一頁';
		$config['last_tag_open'] = '<li class="paginate_button next">';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = '下一頁';
	//	$config['next_link'] = '&gt;';
		$config['next_tag_open'] = '<li class="paginate_button next">';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '上一頁';
	//	$config['prev_link'] = '&lt;';
		$config['prev_tag_open'] = '<li class="paginate_button previous">';
		$config['prev_tag_close'] = '</li>';
		$this->pagination->initialize($config); 
		return $this->pagination->create_links();
	}
	private function load_pagination($url, $total_rows, $show_rows, $offset, $cur_count, $sortby = null, $sortas = null){
	//	$full_url = $url.'?'.( $_SERVER['QUERY_STRING'] ? $_SERVER['QUERY_STRING'] : '1=1');
		$full_url = $url.'?1=1';
		if($sortby) $full_url .= '&sortby='.$sortby;
		if($sortas) $full_url .= '&sortas='.$sortas;
		$page_data['links'] = self::get_pagination($full_url, $total_rows, $show_rows);
		$page_data['from_offset'] = $offset + 1;
		$page_data['to_offset'] = $offset + $cur_count;
		$page_data['total'] = $total_rows;
		$this->load->view('admin/pagination', $page_data);
	}
	
}

?>