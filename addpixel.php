<?php
$myImage = imagecreatefromjpeg("The_Thinker,_Rodin.jpg");
$black = imagecolorallocate($myImage, 0, 0, 0);
$width = imagesx($myImage);
$height = imagesy($myImage);
imagerectangle($myImage, 0, 0, $width-1, $height-1, $black);
header("Content-Type: image/jpeg");
imagejpeg($myImage);
imagedestroy($myImage);
?>