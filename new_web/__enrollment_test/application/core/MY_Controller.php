<?php
class MY_Controller extends CI_Controller
{
	public $pay_status = array(
		PAY_STATUS_ORDER => array('name'=>'未付款', 'name_en'=>'Not Paid'),
		PAY_STATUS_PAID => array('name'=>'已付款', 'name_en'=>'Paid'),
		PAY_STATUS_FAIL => array('name'=>'付款失敗', 'name_en'=>'Pay Failed')
	);
	
	public $event_status = array(
		EVENT_STATUS_NORMAL => array('name'=>'正常'),
		EVENT_STATUS_PAUSE => array('name'=>'暫停'),
		EVENT_STATUS_CANCEL => array('name'=>'取消')
	);
	
	public $gender = array(
		MALE => array('name'=>'先生(Mr.)'),
		FEMALE => array('name'=>'女士(Ms)')
	);
    
    public $shop = array(
    	0 =>array('shop_name'=>'選擇分店/駕駛中心','shop_email'=>''),
		1 =>array('shop_name'=>'銅鑼灣黃金商場','shop_email'=>'krisfk@gmail.com'),
		2 =>array('shop_name'=>'旺角荷李活商業中心','shop_email'=>'krisfk@gmail.com'),
		3 =>array('shop_name'=>'荃灣力生廣場','shop_email'=>'krisfk@gmail.com'),
		4 =>array('shop_name'=>'屯門港鐵站','shop_email'=>'krisfk@gmail.com'),
		5 =>array('shop_name'=>'觀塘汐泓富廣場','shop_email'=>'krisfk@gmail.com'),
        6 =>array('shop_name'=>'深水埗金輝大樓分店','shop_email'=>'krisfk@gmail.com'),
        7 =>array('shop_name'=>'土瓜灣美嘉大廈分店','shop_email'=>'krisfk@gmail.com')
    );
    
    public $contact_timeslot= array(
        0 => '聯絡時間',
		1 =>'09:00 - 11:30',
		2 =>'11:30 - 15:00',
		3 =>'15:00 - 18:00',
		4 =>'18:00 - 20:30', 
		5 =>'其他時段'
    );

	
    public function __construct()
    {
		parent::__construct();
    }
}