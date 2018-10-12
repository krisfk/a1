<?php
date_default_timezone_set('Asia/Hong_Kong');


    $date = date('Y-m-d h:i:s A', time());
echo $date;
echo '<br/><br/>';


$d = new DateTime();
echo $d->format('Y-m-d H:i');
?>