<?php
$textImage = imagecreate(200,100);
$white = imagecolorallocate($textImage, 255, 255, 255);
$black = imagecolorallocate($textImage, 0, 0, 0);
imagefttext($textImage, 16, 0, 10, 50, $black, "/users/Curtis Crose/appdata/local/microsoft/windows/fonts/Vera.ttf", "Vera, 16 pixels");
header("Content-Type: image/png");
imagepng($textImage);
imagedestroy($textImage);
?>
