<?php
require_once (dirname(__FILE__).'/phpqrcode/qrlib.php');

/**
 * 生成二维码
 **/
class Qr {

    public static function getQr($data) {
        return QRcode::png($data);
    }
}

