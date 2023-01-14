<?php
require_once("phpqrcode/qrlib.php");

$path = "img/";
$filename = time() . ".png";

$qrcode = $path . $filename;

QRcode::png("Optometer Optika", $qrcode, "H", 4);

echo "<img src='" . $qrcode . "'>";
echo $qrcode;






// https://phpqrcode.sourceforge.net/index.php
