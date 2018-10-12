<?php
class MY_Controller extends CI_Controller {
    public $pay_status = array(
        PAY_STATUS_ORDER => array( 'name' => '未付款', 'name_en' => 'Not Paid' ),
        PAY_STATUS_PAID => array( 'name' => '已付款', 'name_en' => 'Paid' ),
        PAY_STATUS_FAIL => array( 'name' => '付款失敗', 'name_en' => 'Pay Failed' )
    );

    public $event_status = array(
        EVENT_STATUS_NORMAL => array( 'name' => '正常' ),
        EVENT_STATUS_PAUSE => array( 'name' => '暫停' ),
        EVENT_STATUS_CANCEL => array( 'name' => '取消' )
    );

    public $gender = array(
        MALE => array( 'name' => '先生(Mr.)' ),
        FEMALE => array( 'name' => '女士(Ms.)' )
    );

    /**development**/
 
    /*production*/
    
      public $shop = array(
        0 => array( 'shop_name' => '選擇分店', 'shop_email' => '', 'map' => '' ),
		  1 => array( 'shop_name' => 'A1 深水埗總店',
            'branch_type' => 'a1_shop',
          'shop_email' => 'info@a1driving.com.hk',
        //    'shop_email' => 'dummy914914@gmail.com',
			'shop_address' => '長沙灣道264號 金輝大樓 地下B鋪',
            'map' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3690.572029968132!2d114.15880491550406!3d22.33201978530712!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3404074cab121027%3A0xa5cd5c034dfe8695!2sA1+Driving+School!5e0!3m2!1szh-TW!2shk!4v1523502911678' ),
	
		  2 => array( 'shop_name' => 'A1 土瓜灣分店暨電單車中心',
            'branch_type' => 'a1_shop',
          'shop_email' => 'tkw@a1driving.com.hk',
        //    'shop_email' => 'dummy914914@gmail.com',
			'shop_address' => '土瓜灣靠背壟道121號富裕閣F及G地舖 (落山道交界)',
		//https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3690.9403178679004!2d114.18529400086989!3d22.318096794807804!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x340400d75b469e91%3A0x3d87946449af0a10!2z5Zyf55Oc54Gj6Z2g6IOM5aOf6YGTMTIx6Jmf5a-M6KOV6Zaj!5e0!3m2!1szh-TW!2shk!4v1533633804883
            'map' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3690.9403181189427!2d114.18440671550393!3d22.31809678531442!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x340400d75b469e91%3A0x3d87946449af0a10!2z5Zyf55Oc54Gj6Z2g6IOM5aOf6YGTMTIx6Jmf5a-M6KOV6Zaj!5e0!3m2!1szh-TW!2shk!4v1533692240845' ),
		  3 => array( 'shop_name' => 'MEG 銅鑼灣分店',
            'branch_type' => 'meg_shop',
          'shop_email' => 'go@meg.hk',
        //    'shop_email' => 'dummy914914@gmail.com',
			'shop_address' => '銅鑼灣軒尼詩道 502 號黃金廣場 15 樓 1503 室 (港鐵銅鑼灣站F出口)',
            'map' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3691.950481809096!2d114.1820666149543!3d22.279865535334153!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x34040056bee1b80d%3A0xbc89d6035e84601a!2z6YqF6ZG854Gj6LuS5bC86Kmp6YGTNTAy6Jmf6buD6YeR5buj5aC0!5e0!3m2!1szh-TW!2shk!4v1519201129252' ),
           4 => array( 'shop_name' => 'MEG 旺角分店',
            'branch_type' => 'meg_shop',
          'shop_email' => 'kw@meg.hk',
        //    'shop_email' => 'dummy914914@gmail.com',
			'shop_address' => '旺角彌敦道 610 號荷李活商業中心 10 樓 1023 室 (港鐵旺角站E2出口，旺角百老匯戲院對面)',
            'map' => 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3690.973207851624!2d114.1701138!3d22.316853!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x340400c7043ff115%3A0xcc996721abaa70db!2zTUVH5LiA56uZ5byP5a246LuK6aGn5ZWP!5e0!3m2!1szh-TW!2shk!4v1519201068504' ),
           5 => array( 'shop_name' => 'MEG 荃灣分店',
            'branch_type' => 'meg_shop',
          'shop_email' => 'tw@meg.hk',
       //    'shop_email' => 'dummy914914@gmail.com',
			'shop_address' => '荃灣青山公路 263 - 267 號力生廣場地下 G8-10 號舖 (港鐵站 A 出口)',
            'map' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3689.4821010393666!2d114.11432931550479!3d22.373175985285705!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3403f8f2780ba971%3A0x54796bd27be98343!2zTUVH5LiA56uZ5byP5a246LuK6aGn5ZWP!5e0!3m2!1szh-TW!2shk!4v1519200984779' ),
           6 => array( 'shop_name' => 'MEG 元朗分店',
            'branch_type' => 'meg_shop',
          'shop_email' => 'ylp@meg.hk',
        //    'shop_email' => 'dummy914914@gmail.com',
			'shop_address' => '元朗廣場2樓 266 號舖',
            'map' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3687.579322751841!2d114.02171141550558!3d22.44485413524875!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3403f09fec61b02d%3A0x358aa0e3e6c8bf72!2zTUVH5LiA56uZ5byP5a246LuK6aGn5ZWP!5e0!3m2!1szh-TW!2shk!4v1519201215316' ),
           7 => array( 'shop_name' => 'MEG 屯門分店',
            'branch_type' => 'meg_shop',
           'shop_email' => 'tm@meg.hk',
        //    'shop_email' => 'dummy914914@gmail.com',
			'shop_address' => '屯門港鐵站TUM42號舖 (近港鐵站D出口)',
            'map' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d59022.30953810091!2d113.93158356119571!3d22.395340090353617!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3403fb3cc6141a21%3A0x2c36959cc530d91a!2z5riv6ZC15bGv6ZaA56uZ!5e0!3m2!1szh-TW!2shk!4v1519201290910' ),
           8 => array( 'shop_name' => 'MEG 觀塘分店',
            'branch_type' => 'a1_shop',
          'shop_email' => 'kt@meg.hk',
      //     'shop_email' => 'dummy914914@gmail.com',
			'shop_address' => '觀塘成業街 6 號 泓富廣場 13 樓 1309 室 (港鐵觀塘站 B1 出口)',
            'map' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3691.1404468131173!2d114.22349786550376!3d22.310527535318286!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3404014542a0d65f%3A0xe5becc5fd1402706!2z6KeA5aGY5oiQ5qWt6KGXNuiZn-azk-WvjOW7o-WgtA!5e0!3m2!1szh-TW!2shk!4v1519201398717' )
    
	  );
    

    /**production**/
  
    public $contact_timeslot = array(
        0 => '選擇聯絡時間',
        1 => '09:00 - 11:30',
        2 => '11:30 - 15:00',
        3 => '15:00 - 18:00',
        4 => '18:00 - 20:30'
    );
/*
      public $need = array(
        0 => '無需要',
        1 => '有需要'
    );
*/
    



    public
    function __construct() {
        parent::__construct();
    }
}