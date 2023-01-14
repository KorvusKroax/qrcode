<?php
    include("phpqrcode/qrlib.php");

    $path = "img/";
    $filename = time() . ".png";
    $qrcode_image = $path . $filename;

    if (isset($_POST["submit"])) 
    {
        $qrcode_content = $_POST["content"];

        QRcode::png($qrcode_content, $qrcode_image, "H", 10);      // https://phpqrcode.sourceforge.net

        echo "<img src='" . $qrcode_image . "'>";

        echo "<pre>";
        echo "content: " . $qrcode_content . "\n\n";
        echo "image file: " . $qrcode_image;
        echo "</pre>";
    }







    // if not working (..Call to undefined function imagecreate() in..)
    // - open c:\xampp\php\php.ini
    // - find ;extension=gd and remove ;(semicolon)
    // - find ;gd.jpeg_ignore_warning = 1 and remove ;(semicolon)
    // - stop and start Apache