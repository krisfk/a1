<?php



//	'hostname' => 'localhost:3307',
	//'hostname' => 'localhost:/var/run/mysqld/mysqld.sock',
//	'username' => 'meghongk_user2',
//	'password' => 'Fui8kdDdWWOi',
//	'database' => 'meghongk_db3',
//	'username' => 'meghongk_user3',
//	'password' => ')h9b7xKvML[)',
	
//	'database' => 'meghongk_db3',


         $dbhost  = "localhost:3307";
         $dbuser  = "root";
         $dbpass  = "";
         $dbname  = "meghongk_db3";
     
//         $con = mysqli_connect( $dbhost , $dbuser , $dbpass ) or die( mysqli_error() ); 

   //      mysqli_query("SET NAMES 'utf8'");
    //?     mysqli_select_db($dbname, $con);
          
   
// Create connection
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
/*
    create table enquiry_log (
    log_date         datetime,
    log_ip           varchar(20),
    log_browser      varchar(100),
    log_source       varchar(20), -- A1, MEG, HKSM
    course_name      varchar(50), 
    student_name     varchar(100),
    student_phone    varchar(8),
    student_email    varchar(100),
    selected_branch  varchar(15),
    selected_time    varchar(15),
    comment          text
);

insert into enquiry_log values(now(), '192.9.204.24', 'Safari', 'A1', '私家車課程', 'Barry Li', '91234567', 'barryli@hksm.com.hk', 'A1 土瓜灣電單車中心', '16:00 - 19:00', 'Testin Record')

*/

 if (empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $IP = $_SERVER['REMOTE_ADDR'];
        } else {
            $IP = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            $IP = $myip[0];
        }

$sql = "INSERT INTO enquiry_log (log_date, log_ip, log_browser,log_source,course_name,student_name,student_phone,student_email,selected_branch,selected_time,comment)
VALUES (NOW(), '$IP', 'Safari', 'A1', '私家車課程', 'Barry Li', '91234567', 'barryli@hksm.com.hk', 'A1 土瓜灣電單車中心', '16:00 - 19:00', 'Testin Record')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


?>