<?php // https://github.com/chillerlan/php-qrcode

    use chillerlan\QRCode\{QRCode, QROptions};
    use chillerlan\QRCode\Data\QRMatrix;
    use chillerlan\QRCode\Common\EccLevel;

    require_once('php-qrcode-main/vendor/autoload.php');

    $options = new QROptions([
        'quietzoneSize' => 0,

        'drawCircularModules' => true,
        // 'circleRadius' => 0.4,

        'connectPaths' => true,
        'keepAsSquare' => [
            QRMatrix::M_FINDER_DARK,
            QRMatrix::M_FINDER_DOT,
            QRMatrix::M_ALIGNMENT_DARK,
        ],

        'eccLevel' => EccLevel::M,
        // 'addLogoSpace' => true,
        // 'logoSpaceWidth' => 13,
        // 'logoSpaceHeight' => 13,
    ]);

    $QRCodeImage = (new QRCode($options))->render($content);

    echo 'qrCode_chillerlan.php<br>';
    echo '<img src="' . $QRCodeImage . '" style="max-width: 50vw">';
