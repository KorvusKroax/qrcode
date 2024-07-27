<?php

    require_once("qrcode-generator-master/php/qrcode.php");

    if (isset($_GET['code'])) {
        $content = 'validate.optometeroptika.hu/qrcode/' . $_GET['code'];

        $qrcode = QRCode::getMinimumQRCode($content, QR_ERROR_CORRECT_LEVEL_L);
        $image = $qrcode->createImage(10);

        header('Content-type: image/png');
        imagepng($image);
    } else {
        echo 'NO CODE';
    }
