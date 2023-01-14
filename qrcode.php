<?php
require_once("phpqrcode/qrlib.php");

$path = "img/";
$filename = time() . ".png";

$qrcode = $path . $filename;

QRcode::png("Optometer Optika", $qrcode, "H");      // https://phpqrcode.sourceforge.net

echo "<img src='" . $qrcode . "'>";

echo "<pre>";
echo $qrcode;
echo "</pre>";










// if not working (..Call to undefined function imagecreate() in..) 
//  - open c:\xampp\php\php.ini
//  - find ;extension=gd               and remove ;(semicolon)
//  - find ;gd.jpeg_ignore_warning = 1 and remove ;(semicolon)
//  - stop and start Apache
