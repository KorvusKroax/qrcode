<?php
    $content = '';

    if (isset($_POST['submit']))
    {
        $content = $_POST['content'];
        $size = 10;

        require_once('qrCode_master.php');
        // require_once('qrCode_dzienia.php');
        // require_once('qrCode_chillerlan.php');

        echo '<pre>content: ' . $content . '</pre>';
        echo '<hr>';
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

    <body style="text-align: center">
        <h1>QR code generator</h1>
        <br>
        <form method="post">
            <span>QR code content:</span>
            <input type="text" name="content" value="<?= $content ?>" required>
            <input type="submit" name="submit" value="submit">
        </form>
    </body>
</html>
