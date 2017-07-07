<?php

// Set the content-type
header('Content-Type: image/png');
header("Content-Disposition: filename='sample.png'");
$main = imagecreatetruecolor(150, 180);
$qr = imagecreatefrompng("https://api.qrserver.com/v1/create-qr-code/?size=150x150&format=png&margin=5&data=sample");
// Create the image
$im = imagecreatetruecolor(150, 30);
// Create some colors
$black = imagecolorallocate($im, 255, 255, 255);
imagefilledrectangle($im, 0, 0, 399, 29, $black);
// Font path
$font = 'arial.ttf';
// Add the text
imagettftext($im, 20, 0, 5, 25, $black, $font, 'sample');
imagecopymerge_alpha($main, $qr, 0, 0, 0, 0, 150, 150, 100);
imagecopymerge_alpha($main, $im, 0, 150, 0, 0, 150, 30, 100);
imagepng($main);
imagedestroy($main);
