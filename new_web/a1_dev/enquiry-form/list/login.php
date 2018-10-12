<?php session_start(); ?>
<?php
//include the connection file
header('Content-Type: text/html; charset=utf-8');

require_once('connection.php');


//$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
//mysql_select_db($dbname);


$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
else
{
//    echo 'connection is successful';
}



$id = $_POST['id'];
$pw = $_POST['pw'];

//搜尋資料庫資料
/*$sql = "SELECT * FROM gatsby_dev_dance11_login where USERNAME = '$id'";
$result = mysql_query($sql);
$row = @mysql_fetch_row($result);
*/

if($id != null && $pw != null && $login_id == $id && $login_pw == $pw)
{

        $_SESSION['USERNAME'] = $id;
        echo '登入成功!';
        echo '<meta http-equiv=REFRESH CONTENT=1;url=get.php>';
}
else
{
        echo '登入失敗!';
        echo '<meta http-equiv=REFRESH CONTENT=1;url=index.html>';
}

?>