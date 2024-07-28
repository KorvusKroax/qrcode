<?php

    require_once("qrcode-generator-master/php/qrcode.php");

    $qrCode = QRCode::getMinimumQRCode($content, QR_ERROR_CORRECT_LEVEL_M);

    echo 'qrCode_master.php<br>';



    $qrCode->printSVG($size);



    // $width = $qrCode->getModuleCount() * $size;
    // $height = $width;
    // echo '<svg width="' . $width . '" height="' . $height . '" viewBox="0 0 ' . $width . ' ' . $height . '" xmlns="http://www.w3.org/2000/svg">';
    // for ($y = 0; $y < $qrCode->moduleCount; $y++) {
    //     for ($x = 0; $x < $qrCode->moduleCount; $x++) {
    //         if ($qrCode->isDark($y, $x)) {
    //             echo '<rect x="' . ($x * $size) . '" y="' . ($y * $size) . '" width="' . $size . '" height="' . $size . '" fill="black" shape-rendering="crispEdges"/>';
    //             // echo '<circle cx="' . ($x * $size + $size * .5) . '" cy="' . ($y * $size + $size * .5) . '" r="' . ($size * .45) . '" fill="black"/>';
    //         }
    //     }
    // }
    // echo '</svg>';
