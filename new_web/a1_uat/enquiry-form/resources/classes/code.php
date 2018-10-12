<?php
@session_start();
header("Content-type: image/jpeg");

//$code_char = array("2","3","4","5","6","7","8","9","A","B","C","D","E","F","G","H","J","K","L","M","N","P","Q","R","S","T","W","X","Y","Z");
$code_char = array("0","1","2","3","4","5","6","7","8","9","A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");

$code = '';
$_SESSION['verifier_number'] = '';
$i = 0;
while($i<4) {
	$code .=$code_char[rand(0,29)];
	$i++;
}

$_SESSION['verifier_number'] = $code;

$size = 12;
$left = 5;
$top = 2;
$width = 45;
$height = 20;
$image = imagecreate($width ,$height);

$bg = imagecolorallocate($image,209,223,222);

$linecolor = imagecolorallocate($image,255,255,255);

$txtColor = imagecolorallocate($image,155,155,155);

for($i = 0; $i<10; $i++){
	imageline($image,rand(0,$width),rand(0,$height),rand(0,$width),rand(0,$height),$linecolor);
}


imagestring($image,$size,$left,$top, $code, $txtColor);
imagejpeg($image);
imagedestroy($image);
?>
