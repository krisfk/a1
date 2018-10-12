<?php

$dbhost  = "localhost";
 $dbuser  = "a1drivin_tusr";
 $dbpass  = "tEdY5Dvl!9D.";
 $dbname  = "a1drivin_test";

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
else
{
    echo 'successful';
}
  

$query="INSERT INTO enquiry_log (log_date, log_ip, log_browser,log_source,course_name,student_name,student_phone,student_email,selected_branch,selected_time,comment)
VALUES (NOW(), '192.9.204.24', 'Safari', 'A1', '私家車課程', 'Barry Li', '91234567', 'barryli@hksm.com.hk', 'A1 土瓜灣電單車中心', '16:00 - 19:00', 'Testin Record')";

$results = mysqli_query($conn,$query);

/*while ($row = mysqli_fetch_array($results)) {
    echo '<tr>';
    foreach($row as $field) {
        echo '<td>' . htmlspecialchars($field) . '</td>';
    }
    echo '</tr>';
}
*/

?>