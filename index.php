<?php
    $content = '';

    if (isset($_POST['submit']))
    {
        $content = $_POST['content'];

        // qrCode_dzienia($content);
        qrCode_master($content);

        echo '<pre>';
        echo 'content: ' . $qrcode_content ."\n\n";
        echo '</pre>';
        echo '<hr>';
    }

    function qrCode_dzienia($code)
    {
        require_once('phpqrcode/qrlib.php');

        $content = 'validate.optometeroptika.hu/qrcode/' . $code;

        $path = 'img/';
        $filename = time() . '.png';
        $qrcode_image = $path . $filename;

        QRcode::png($content, $qrcode_image, QR_ECLEVEL_L, 10, 1); // https://phpqrcode.sourceforge.net

        echo '<img src="' . $qrcode_image . '">';

        // if not working (..Call to undefined function imagecreate() in..)
        // - open c:\xampp\php\php.ini
        // - find ;extension=gd and remove ;(semicolon)
        // - find ;gd.jpeg_ignore_warning = 1 and remove ;(semicolon)
        // - stop and start Apache
    }

    function qrCode_master($code)
    {
        // require_once("qrcode-generator-master\php\qrcode.php");
        // $qr = QRCode::getMinimumQRCode($content, QR_ERROR_CORRECT_LEVEL_L);
        // $qr->printSVG(10);

        echo '<img src="qrCodeImage.php?code='.$code.'">';
    }
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta author="Korvus">

    <title>QR code</title>
</head>

<style>
    body {
        text-align: center;
    }
    img {
        margin: 0 auto;
        image-rendering: pixelated;
    }
</style>

<body>
    <h1>QR code generator</h1>
    <br>
    <form method="post">
        <span>QR code content:</span>
        <pre>validate.optometeroptika.hu/qrcode/<input type="text" name="content" value="<?= $content ?>" required></pre>
        <input type="submit" name="submit" value="submit">
    </form>
</body>

</html>