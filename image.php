<?php
$myImage = imagecreatefromjpeg("The_Thinker,_Rodin.jpg");
$myCopyright = imagecreatefrompng("my_project-1.png");
$destWidth = imagesx($myImage);
$destHeight = imagesy($myImage);
$srcWidth = imagesx($myCopyright);
$srcHeight = imagesy($myCopyright);
$destX = ($destWidth - $srcWidth) / 2;
$destY = ($destHeight - $srcHeight) / 2;
imagecopy($myImage, $myCopyright, $destX, $destY, 0, 0, $srcWidth, $srcHeight);
header("Content-Type: image/jpeg");
imagejpeg($myImage);
imagedestroy($myImage);
imagedestroy($myCopyright);
?>