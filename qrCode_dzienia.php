<?php // https://phpqrcode.sourceforge.net

    require_once('phpqrcode/qrlib.php');

    $path = 'img/';
    $filename = time() . '.png';
    $qrCodeImage = $path . $filename;

    QRcode::png($content, $qrCodeImage, QR_ECLEVEL_M, $size, 0);

    echo 'qrCode_dzienia.php<br>';
    echo '<img src="' . $qrCodeImage . '" style="image-rendering: pixelated">';



/*
    if not working (..Call to undefined function imagecreate() in..)
    - open c:\xampp\php\php.ini
    - find ;extension=gd and remove ;(semicolon)
    - find ;gd.jpeg_ignore_warning = 1 and remove ;(semicolon)
    - stop and start Apache
*/
