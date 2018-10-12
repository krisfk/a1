<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ', 'rb');
define('FOPEN_READ_WRITE', 'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE', 'ab');
define('FOPEN_READ_WRITE_CREATE', 'a+b');
define('FOPEN_WRITE_CREATE_STRICT', 'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
define('EXIT_SUCCESS', 0); // no errors
define('EXIT_ERROR', 1); // generic error
define('EXIT_CONFIG', 3); // configuration error
define('EXIT_UNKNOWN_FILE', 4); // file not found
define('EXIT_UNKNOWN_CLASS', 5); // unknown class
define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
define('EXIT_USER_INPUT', 7); // invalid user input
define('EXIT_DATABASE', 8); // database error
define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code


define('STATUS_IDLE',				0);
define('STATUS_ENABLE',				1);
define('STATUS_DISABLED',			2);
define('STATUS_DELETE',				3);

define('EVENT_STATUS_NORMAL',		0);
define('EVENT_STATUS_PAUSE',		1);
define('EVENT_STATUS_CANCEL',		2);

define('PAY_STATUS_ORDER',		0);
define('PAY_STATUS_PAID',		1);
define('PAY_STATUS_FAIL',		2);

define('NUM_LINKS',		10);
define('PAGE_APPLY', 	20);
define('PAGE_EVENT', 	20);
define('PAGE_COURSE', 	20);
define('PAGE_LOCATION', 20);
define('PAGE_COUPON', 10);


define('SUBMIT_SAVE',				1);
define('SUBMIT_DELETE',				2);

define('MSG_SUCC',	'alert-success');
define('MSG_WARN',	'alert-warning');
define('MSG_ERR',	'alert-danger');

define('MALE',				1);
define('FEMALE',			2);

define('SESSION_CAPTCHA',		'captcha');

define('DEFAULT_POLICY',	'1.	根據運輸署規定，學習駕駛執照申請人必需年滿18歲。
2.	報讀此課程並不代表需要出席任何考試(包括運輸署駕駛考試)或保證該等考試之成績。
3.	以上優惠課程只提供廣東話授課。
4.	課程有效期為1年。
5.	客戶於作出選擇前已考慮清楚並明白所選之服務及以上資料，完成課程登記後，不得更改 或 取消課程內容。
6.	優惠課程費用必須以信用卡/PayPal.方式繳付，不設退款。
7.	完成付款後即代表客戶及付款人正式確認課程內容及有關條款。 
8.	學員須確認所提供之一切資料屬實, 如因資料錯誤導致之任何後果, 本公司恕不負責。
9.	完成網上登記後，本公司顧客服務中心將於兩個工作天內聯絡學員親臨所選擇的地點遞交身份證副本、住址證明 及 政府文件費用(學習駕駛執照申請費、運輸署考試表格費用 及 考試租車費)。
10.	所有有關運輸署之決定(包括但不限於考試日期、地點、時間、內容、結果等)以該署最終批核為準。
11.	學員同意本公司收集、使用、保留閣下之個人資料並用作辦理閣下的服務申請及提供服務、向閣下提供的優惠資訊、辦理閣下要求的任何付款指示及/或直接支賬付款安排及/或防止罪行的發生之用。
12.	本公司保留一切優惠之最終解釋權。');


define('MEGCLUB_DISCOUNT', '200');
define('JOIN_MEGCLUB_SUFFIX', '_JMC');




/**sandbox**/

/**
 * For paypal
 */

/*paypal development*/
/*define('PAYPAL_USERNAME', 'test-store2_api1.a1driving.com.hk');
define('PAYPAL_PASSWORD', 'BCC5G4UT9LYU27NZ');
define('PAYPAL_SIGNATURE', 'AJvnvEoT2SGuCFkUtbT.dLMayxdcARaTZaYjEsSYehtd3I9UG-Tj31jP');
*//*
Username:
test-store2_api1.a1driving.com.hk
Password:
BCC5G4UT9LYU27NZ
Signature:
AJvnvEoT2SGuCFkUtbT.dLMayxdcARaTZaYjEsSYehtd3I9UG-Tj31jP
*/
/*paypal production*/


define('PAYPAL_USERNAME', 'finance_api1.a1driving.com.hk');
define('PAYPAL_PASSWORD', 'RLS845KTZ9F8UZAD');
define('PAYPAL_SIGNATURE', 'ANuKxDG6o4XonOE2Oj8TLv.ZpDKaAKieo5tOuXUNLkOhYlNOMWlkjs2I');



/*
define('MEG_CLUB_NOTIF_EMAIL','kay@idea-play.com');
define('CC_EMAILS', 'kayli914914@gmail.com,djsweb914@gmail.com');
define('EMAIL_SENDER', 'info@a1driving.com.hk');
define('SITE_NAME', 'a1driving.com.hk');
define('COMPLETE_REDIRECT', 'https://www.a1driving.com.hk/');*/


/*production*/


define('MEG_CLUB_NOTIF_EMAIL','kay@idea-play.com');
define('CC_EMAILS', 'patrickyeung@meg.com.hk,admin@hksm.com.hk');
define('EMAIL_SENDER', 'info@a1driving.com.hk');
define('SITE_NAME', 'a1driving.com.hk');
define('COMPLETE_REDIRECT', 'https://www.a1driving.com.hk/');
