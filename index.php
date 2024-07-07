<?php
    include_once("phpqrcode/qrlib.php");

    $content = "";

    if (isset($_POST["submit"]))
    {
        $content = $_POST["content"];

        $path = "img/";
        $filename = time() . ".png";
        $qrcode_image = $path . $filename;

        $qrcode_content = "https://optometeroptika.hu/qrcode/" . $content;

        QRcode::png($qrcode_content, $qrcode_image, QR_ECLEVEL_L, 10, 1); // https://phpqrcode.sourceforge.net

        echo "<img src='" . $qrcode_image . "'>";

        echo "<pre>";
        echo "content: " . $qrcode_content . "\n\n";
        echo "</pre>";
        echo "<hr>";
    }

    // if not working (..Call to undefined function imagecreate() in..)
    // - open c:\xampp\php\php.ini
    // - find ;extension=gd and remove ;(semicolon)
    // - find ;gd.jpeg_ignore_warning = 1 and remove ;(semicolon)
    // - stop and start Apache
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
        image-rendering: pixelated;
    }
</style>

<body>
    <h1>QR code generator</h1>
    <br>
    <form method="post">
        <span>QR code content:</span>
        <pre>https://optometeroptika.hu/qrcode/<input type="text" name="content" value="<?= $content ?>" required></pre>
        <input type="submit" name="submit" value="submit">
    </form>
</body>

</html>