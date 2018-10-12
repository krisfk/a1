<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>

    
<?php
$string = file_get_contents("test.json");
$json_a = json_decode($string, true);

//    print_r ($json_a[0]); 
    echo $json_a[0]['testHTML'];
//print_r($json_a);
    
?>
    
    </body>
</html>