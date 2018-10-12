<?php
         $dbhost  = "localhost:3307";
         $dbuser  = "root";
         $dbpass  = "";
         $dbname  = "meghongk_db3";
     
         $con = mysql_connect( $dbhost , $dbuser , $dbpass ) or die( mysql_error() ); 
       /*  mysql_query("SET NAMES 'utf8'");
         mysql_select_db($dbname, $con);*/
          
    /*    if (empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $IP = $_SERVER['REMOTE_ADDR'];
        } else {
            $IP = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            $IP = $myip[0];
        }
    */     

    echo 'test';
         
?>