<?php session_start(); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>A1 ENQUIRY FORM LOG</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
<!--<a href="export.php">Excel</a>-->
    <a href="logout.php">logout</a>
<?php

if($_SESSION['USERNAME'] != null)
{

	require_once('connection.php');

    
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
else
{
//    echo 'connection is successful';
}
    

         $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
        $limit = 100;
        $startpoint = ($page * $limit) - $limit;


        $query="SELECT * FROM enquiry_log ORDER BY log_date DESC  LIMIT {$startpoint} , {$limit} ";
        $result = mysqli_query($conn,$query);

    ?>
    
    <h1>A1 Web Enquiry Log </h1>

    
    
<?php

$sql = "SELECT COUNT(log_source) FROM enquiry_log ORDER BY log_date DESC";  
$rs_result = mysqli_query($conn,$sql);  
$row = mysqli_fetch_row($rs_result);  
$total_records = $row[0];  
$total_pages = ceil($total_records / $limit);  
$pagLink = "<div class='pagination'>";  
for ($i=1; $i<=$total_pages; $i++) {  
    if($page==$i)
    {
             $pagLink .= "<a class='active' href='?page=".$i."'>".$i."</a>";  
    }
    else
    {
             $pagLink .= "<a href='?page=".$i."'>".$i."</a>";          
    }
};  
echo $pagLink . "</div>";  

?>
    
    <br/>
Showing number of records per page: <?php echo $limit;?>
<br/>
<br/>

<table>
  <thead style="background: #000;color: #fff;">
    <tr>
      <?php
      $row = mysqli_fetch_assoc($result);
            foreach ($row as $col => $value) {
                echo "<th>";
                echo $col;
                echo "</th>";
            }
      ?>
      <!--<th>Edit</th>-->
    </tr>
  </thead>
  <tbody>
    <?php
  // Write rows
  mysqli_data_seek($result, 0);
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
    <tr>
      <?php         
    foreach($row as $key => $value){
        echo "<td>";
        echo $value;
        echo "</td>";
    }
    ?>
<!--      <td><button id="edit_project_button(<?php echo $row['ID']; ?>)" class="edit-project-button edit button" onclick="editproject(<?php echo $row['ID']; ?>)">Edit</button></td>
-->    </tr>
    <?php }
      
      
    
      ?>
      
      
  </tbody>
</table>

<style type="text/css">
    html,body{
        font-family: "Gill Sans", "Gill Sans MT", "Myriad Pro", "DejaVu Sans Condensed", Helvetica, Arial, "sans-serif";
    }
    .pagination a{
    border: 1px solid #000;
        padding: 5px 10px;
        margin: 0 10px 0 0 ;
        text-decoration: none;
        background: #efefef;
    }
    
    .pagination a.active{
        background: #4d4545;
        color: #fff;
    }
    
    table td{
        padding: 5px 30px 5px 30px;
        border: 1px solid #000;
    }
</style>

    <?php
    
}
else
{
        ?>
    <script type="text/javascript">
    alert("Please Login");    
    </script>
    <?php
        echo '<meta http-equiv=REFRESH CONTENT=0;url=login.html>';
}

?>
</body>
</html>