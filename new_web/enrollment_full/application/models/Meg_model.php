<?php
class Meg_model extends CI_Model {
	
	private static $SESSION_ADMIN_USER = 'admin_user';
	
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
	
	/**
	 * Admin
	 */
	public function verify_admin_user($username, $password) {
		$query = $this->db->get_where("meg_admin", array('username' => $username, 'password' => md5($password)), 1);
        return $query->row_array();
	}
    public function set_admin_user($user) {
		$this->load->library('session');
        if ($user === null) {
			$this->session->unset_userdata(self::$SESSION_ADMIN_USER);
        } else {
			$this->session->set_userdata(self::$SESSION_ADMIN_USER, $user);
        }
    }
	public function get_admin_user($session = true){
		if($session){
			$this->load->library('session');
			return $this->session->userdata(self::$SESSION_ADMIN_USER);
		} else {
			$query = $this->db->get("meg_admin", 1);
			return $query->row_array();
		}
	}
	public function update_admin_user($username, $password = NULL){
		$data = array('username' => $username);
		if(!is_null($password)){
			$data['password'] = md5($password);
		}
		$this->db->update("meg_admin", $data);
		$rows = $this->db->affected_rows();
		return $rows;
	}
	public function change_admin_password($password){
		$user = self::get_admin_user();
		if($user){
			$data = array(
				'password' => md5($password)
			);
			$this->db->update("meg_admin", $data, array('id' => $user['id']));
			$rows = $this->db->affected_rows();
			return $rows;
		}
		return 0;
	}
	
	/**
	 * Event
	 */
	public function get_event_count($search){
		if(is_array($search)){
			foreach($search as $key=>$val){
				$this->db->where($key, $val);
			}
		} else {
			$this->db->where($search);
		}
		$this->db->where('meg_event.del', 0);
		return $this->db->count_all_results('meg_event');
	}
	public function get_event_list($search, $order_by, $order_as = "ASC", $limit = 0, $offset = 0) {
		$this->db->select('*, meg_event.id as id, a.username as a_username, end_time<=NOW() AS ended');
		$this->db->join('meg_admin as a', 'a.id=meg_event.creator', 'left');
		$this->db->where('meg_event.del', 0);
		$this->db->order_by($order_by, $order_as);
		$query = $this->db->get('meg_event', $limit, $offset);
        $result = $query->result_array();
	//	echo $this->db->last_query();
		return $result;
	}
	public function get_event($id){
		$this->db->select('*, meg_event.id as id, a.username as a_username');
		$this->db->join('meg_admin as a', 'a.id=meg_event.creator', 'left');
		if(is_array($id)){
			$this->db->where($id);
		} else {
			$this->db->where(array('meg_event.id'=>$id));
		}
		$this->db->where('meg_event.del', 0);
		//Select event
		$query = $this->db->get('meg_event');
		$data = $query->row_array();
	//	dump($this->db->last_query());
	//	dump($data);
	//	dump(is_null($data));
		if(!is_null($data)){
			//Select course
			$data['selected_course'] = array();
			$this->db->join('meg_event_course as ec', 'ec.course_id=c.id and ec.event_id='.$data['id'], 'left');
			$query = $this->db->get_where('meg_course as c', array('ec.event_id'=>$data['id']));
			$data['course_list'] = $query->result_array();
		//	dump($this->db->last_query());
		//	dump($data['course_list']);
			foreach($data['course_list'] as $val){
				array_push($data['selected_course'], $val['id']);
			}
			
			//Select location
			$data['selected_location'] = array();
			$this->db->join('meg_event_location as el', 'el.location_id=l.id and el.event_id='.$data['id'], 'left');
			$query = $this->db->get_where('meg_location as l', array('el.event_id'=>$data['id']));
			$data['location_list'] = $query->result_array();
			foreach($data['location_list'] as $val){
				array_push($data['selected_location'], $val['id']);
			}
		} 
	//	else {
	//		$data['course_list'] = array();
	//		$data['selected_course'] = array();
	//		$data['location_list'] = array();
	//		$data['selected_location'] = array();
	//	}
	//	dump($data);
		return $data;
	}
	private function get_event_data($data){
		$now = date('Y-m-d H:i:s');
		$d = array(
			'code'			=> $data['code'],
			'name'			=> $data['name'],
			'status'		=> $data['status'],
			'allow'			=> $data['allow'],
			'start_time'	=> $data['start_time'],
			'end_time'		=> $data['end_time'],
			'show_staff'	=> $data['show_staff'] == "1" ? "1" : "0",
            'ask_megclub'	=> $data['ask_megclub'] == "1" ? "1" : "0",
    //        'ask_reg_enquiry'	=> $data['ask_reg_enquiry'] == "1" ? "1" : "0",
            'full_id'		=> $data['full_id'] == "1" ? "1" : "0",
			'title'			=> $data['title'],
			'banner'		=> $data['banner'],
			'header'		=> $data['header'],
			'policy'		=> $data['policy'],
			'pay_email'				=> $data['pay_email'] == "1" ? "1" : "0",
			'pay_email_subject'		=> $data['pay_email_subject'],
			'pay_email_content'		=> $data['pay_email_content'],
			'pay_email_attach'		=> $data['pay_email_attach'],
			'update_time'	=> $now,
			'create_time'	=> $now
		);
		if(isset($data['creator'])) $d['creator'] = $data['creator'];
		return $d;
	}
	//Add
	public function add_event($data){
		$this->db->insert('meg_event', self::get_event_data($data));
		$event_id = $this->db->insert_id();
		self::add_event_course_list($event_id, $data['selected_course']);
		self::add_event_location_list($event_id, $data['selected_location']);
		return $event_id;
	}
	private function add_event_course_list($event_id, $course_list){
		$data = array();
		foreach($course_list as $course_id){
			array_push($data, array(
				'event_id' => $event_id,
				'course_id' => $course_id
			));
		}
		$this->db->insert_batch('meg_event_course', $data);
	}
	private function add_event_location_list($event_id, $location_list){
		$data = array();
		foreach($location_list as $location_id){
			array_push($data, array(
				'event_id' => $event_id,
				'location_id' => $location_id
			));
		}
		$this->db->insert_batch('meg_event_location', $data);
	}
	//Update
	public function update_event($event_id, $data){
		$this->db->update('meg_event', self::get_event_data($data), array('id'=>$event_id));
		$rows = $this->db->affected_rows();
		self::update_event_course_list($event_id, $data['selected_course']);
		self::update_event_location_list($event_id, $data['selected_location']);
		return $rows;
	}
	private function update_event_course_list($event_id, $course_list){
		$query = $this->db->get_where('meg_event_course', array('event_id', $event_id));
		$cur_course_list = $query->result_array();
		$changed = false;
		if(count($cur_course_list) != count($course_list)){
			$changed = true;
		} else {
			foreach($cur_course_list as $event_course){
				if(!in_array($event_course['course_id'], $course_list)){
					$changed = true;
					break;
				}
			}
		}
		if($changed){
			$this->db->delete('meg_event_course', array('event_id'=>$event_id));
			self::add_event_course_list($event_id, $course_list);
		}
	}
	private function update_event_location_list($event_id, $location_list){
		$query = $this->db->get_where('meg_event_location', array('event_id', $event_id));
		$cur_location_list = $query->result_array();
		$changed = false;
		if(count($cur_location_list) != count($location_list)){
			$changed = true;
		} else {
			foreach($cur_location_list as $event_location){
				if(!in_array($event_location['location_id'], $location_list)){
					$changed = true;
					break;
				}
			}
		}
		if($changed){
			$this->db->delete('meg_event_location', array('event_id'=>$event_id));
			self::add_event_location_list($event_id, $location_list);
		}
	}
	//Delete
	public function del_event($id){
		$this->db->update('meg_event', array('meg_event.del'=>1), array('id'=>$id));
		$rows = $this->db->affected_rows();
		return $rows;
	}
	
	/**
	 * Course
	 */
	private function select_course($search){
		if(is_array($search)){
			foreach($search as $key=>$val){
				$this->db->where($key, $val);
			}
		} else {
			$this->db->where($search);
		}
		$this->db->where('status <>', STATUS_DELETE);
	}
	public function get_course_list($search, $order_by, $order_as = "ASC", $limit = 0, $offset = 0) {
		self::select_course($search);
		$this->db->select('*, meg_course.id as id, a.username as a_username');
		$this->db->join('meg_admin as a', 'a.id=meg_course.creator', 'left');
		$this->db->order_by($order_by, $order_as);
		$query = $this->db->get('meg_course', $limit, $offset);
        $result = $query->result_array();
		return $result;
	}
	public function get_course_count($search){
		self::select_course($search);
		return $this->db->count_all_results('meg_course');
	}
	public function get_course($id){
		$this->db->select('*, meg_course.id as id, a.username as a_username');
		$this->db->join('meg_admin as a', 'a.id=meg_course.creator', 'left');
		$query = $this->db->get_where('meg_course', array(
			'meg_course.id' => $id,
			'status <>' => STATUS_DELETE
		));
		$data = $query->row_array();
		return $data;
	}
	public function add_course($data){
		$data['status'] = STATUS_ENABLE;
		$data['update_time'] = date('Y-m-d H:i:s');
		$data['create_time'] = $data['update_time'];
		$this->db->insert('meg_course', $data);
		$id = $this->db->insert_id();
		return $id;
	}
	public function update_course($id, $data){
		$data['update_time'] = date('Y-m-d H:i:s');
		$this->db->update('meg_course', $data, array('id'=>$id));
		$rows = $this->db->affected_rows();
		return $rows;
	}
	public function del_course($id){
		return self::update_course($id, array('status'=>STATUS_DELETE));
	}
	
	/**
	 * Location
	 */
	private function select_location($search){
		if(is_array($search)){
			foreach($search as $key=>$val){
				$this->db->where($key, $val);
			}
		} else {
			$this->db->where($search);
		}
		$this->db->where('status <>', STATUS_DELETE);
	}
	public function get_location_list($search, $order_by, $order_as = "ASC", $limit = 0, $offset = 0) {
		self::select_location($search);
		$this->db->select('*, meg_location.id as id, a.username as a_username');
		$this->db->join('meg_admin as a', 'a.id=meg_location.creator', 'left');
		$this->db->order_by($order_by, $order_as);
		$query = $this->db->get('meg_location', $limit, $offset);
        $result = $query->result_array();
		return $result;
	}
	public function get_location_count($search){
		self::select_location($search);
		return $this->db->count_all_results('meg_location');
	}
	public function get_location($id){
		$this->db->select('*, meg_location.id as id, a.username as a_username');
		$this->db->join('meg_admin as a', 'a.id=meg_location.creator', 'left');
		$query = $this->db->get_where('meg_location', array(
			'meg_location.id' => $id,
			'status <>' => STATUS_DELETE
		));
		$data = $query->row_array();
		return $data;
	}
	public function add_location($data){
		$data['status'] = STATUS_ENABLE;
		$data['update_time'] = date('Y-m-d H:i:s');
		$data['create_time'] = $data['update_time'];
		$this->db->insert('meg_location', $data);
		$id = $this->db->insert_id();
		return $id;
	}
	public function update_location($id, $data){
		$data['update_time'] = date('Y-m-d H:i:s');
		$this->db->update('meg_location', $data, array('id'=>$id));
		$rows = $this->db->affected_rows();
		return $rows;
	}
	public function del_location($id){
		return self::update_location($id, array('status'=>STATUS_DELETE));
	}
	
	/**
	 * Apply
	 */
	private function select_apply($search){
		$this->db->select('*, 
			a.id as id, a.create_time as create_time, 
			e.id as e_id, e.name as name, e.code as e_code, e.full_id as e_full_id, 
			e.pay_email as e_pay_email, e.pay_email_subject as e_pay_email_subject, e.pay_email_content as e_pay_email_content, e.pay_email_attach as e_pay_email_attach, 
			e.status as e_status, e.allow as e_allow, e.update_time as e_udpate_time, e.create_time as e_create_time, 
			c.id as c_id, c.name as c_name, c.code as c_code, c.update_time as c_udpate_time, c.create_time as c_create_time, 
			l.id as l_id, l.name as l_name, l.update_time as l_udpate_time, l.create_time as l_create_time
		');
		$this->db->join('meg_event as e', 'a.event_id=e.id', 'left');
		$this->db->join('meg_course as c', 'a.course_id=c.id', 'left');
		$this->db->join('meg_location as l', 'a.location_id=l.id', 'left');
		if(is_array($search)){
			foreach($search as $key=>$val){
				$this->db->where($key, $val);
			}
		} else {
			$this->db->where($search);
		}
	}
	public function get_apply_count($search){
		self::select_apply($search);
		return $this->db->count_all_results('meg_apply as a');
	}
	public function get_apply_list($search, $order_by, $order_as = "ASC", $limit = 0, $offset = 0) {
		self::select_apply($search);
		$this->db->order_by($order_by, $order_as);
		$query = $this->db->get('meg_apply as a', $limit, $offset);
        $result = $query->result_array();
	//	dump($this->db->last_query());
		return $result;
	}
	public function get_apply($id){
		self::select_apply(array());
		$query = $this->db->get_where('meg_apply as a', array('a.id'=>$id));
		$data = $query->row_array();
		return $data;
	}
	public function add_apply($data){
        
        $this->load->library("session");
        $suffix ="";
    //    echo $this->session->userdata("MEGCLUB_DISCOUNT");
        
            $data_join_megclub=$data['join_megclub'] ? $data['join_megclub'] : 0;    

        
        
    //     $shop = explode("|", $data['shop']);
       //  $shop = $shop[0];
            $shop =  $data['shop'];
          $contact_timeslot = $this->contact_timeslot[$data['contact_timeslot']];
  
    //    echo $shop;
    //    echo $contact_timeslot;
        //    echo  $data['contact_timeslot'];
        
        $this->db->insert('meg_apply', array(
			'event_id'			=> $data['event'],
			'course_id'			=> $data['course'],
			'location_id'		=> $data['location'],
			'staff_name'		=> $data['staff_name'],
			'staff_code'		=> $data['staff_code'],
			'student_name'		=> $data['student_name'],
			'student_id'		=> $data['student_id'],
			'student_tel'		=> $data['student_tel'],
            'join_megclub'      => $data_join_megclub,
//            'reg_enquiry'      => $data['reg_enquiry'],
            'shop'		=> $shop,
            'contact_timeslot'		=> $contact_timeslot,
            'apply_remark'		=> $data['remark'],
            'student_gender'	=> $data['student_gender'],
			'student_email'		=> $data['student_email'],
			'student_address'	=> $data['student_address'],
			'student_birthday'	=> $data['student_birthday'],
			'allow_promo'		=> $data['allow_promo'],
			'ip'				=> $this->input->ip_address(),
			'create_time'		=> date('Y-m-d H:i:s')
		));
		$id = $this->db->insert_id();
		return $id;
	}
	public function set_pay_status($apply_id, $pay_status, $reference){
		$this->db->update('meg_apply', array(
			'pay_status'		=> $pay_status,
			'pay_reference'		=> $reference,
			'pay_time'			=> date('Y-m-d H:i:s')
		), array('id'=>$apply_id));
		$rows = $this->db->affected_rows();
		return $rows;
	}
	
}

?>