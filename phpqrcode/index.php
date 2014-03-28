<?php
include "qrlib.php";

/**
 * 生成二维码
 **/
class Qr {

    public static function getQr($data) {
        //set it to writable location, a place for temp generated PNG files
        $PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;
        //html PNG location prefix
        $PNG_WEB_DIR = 'Uploads/temp';
        //ofcourse we need rights to create temp dir
        if (!file_exists($PNG_TEMP_DIR)) {
            mkdir($PNG_TEMP_DIR);
        }
        $filename = $PNG_TEMP_DIR.'test.png';
        //remember to sanitize user input in real-life solution !!!
        $errorCorrectionLevel = 'L';
        $matrixPointSize = 4;

        // user data
        $filename = $PNG_TEMP_DIR.'test'.md5($data.'|'.$errorCorrectionLevel.'|'.$matrixPointSize).'.png';
        QRcode::png($data, $filename, $errorCorrectionLevel, $matrixPointSize, 2);


        //display generated file
        return '<img src="'.$PNG_WEB_DIR.basename($filename).'" />';

    }
}

echo Qr::getQr('http://www.baidu.com');
