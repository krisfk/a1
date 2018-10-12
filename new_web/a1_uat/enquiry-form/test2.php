<?php

 if (empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $IP = $_SERVER['REMOTE_ADDR'];
        } else {
            $IP = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            $IP = $myip[0];
        }
    

echo 'IP: '.$IP.'<br/>';

 $browser = array(
    'version'   => '0.0.0',
    'majorver'  => 0,
    'minorver'  => 0,
    'build'     => 0,
    'name'      => 'unknown',
    'useragent' => ''
  );

  $browsers = array(
    'firefox', 'msie', 'opera', 'chrome', 'safari', 'mozilla', 'seamonkey', 'konqueror', 'netscape',
    'gecko', 'navigator', 'mosaic', 'lynx', 'amaya', 'omniweb', 'avant', 'camino', 'flock', 'aol'
  );

  if (isset($_SERVER['HTTP_USER_AGENT'])) {
    $browser['useragent'] = $_SERVER['HTTP_USER_AGENT'];
    $user_agent = strtolower($browser['useragent']);
    foreach($browsers as $_browser) {
      if (preg_match("/($_browser)[\/ ]?([0-9.]*)/", $user_agent, $match)) {
        $browser['name'] = $match[1];
        $browser['version'] = $match[2];
        @list($browser['majorver'], $browser['minorver'], $browser['build']) = explode('.', $browser['version']);
        break;
      }
    }
  }

echo 'USER AGENT: '.$browser['name'] ;


date_default_timezone_set('Asia/Hong_Kong');
$date = date('Y-m-d h:i:s', time());


echo $date;

?>