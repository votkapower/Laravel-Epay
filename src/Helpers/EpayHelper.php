<?php

namespace Kondov\EpayWrapper\Helpers;

class EpayHelper {

    /**
     * EpayHelper constructor.
     */
    public function __construct() {

    }

    /**
     * Set encoded data string to be sent to ePay
     *
     * @param $attributes
     * @return string
     */
    public function setEncodedData($attributes) {
        $data = '';

        $data .= "MIN=" . config('config.MERCHANT_IDENTIFIER') . "\n";
        $data .= "INVOICE=" . $attributes['INVOICE'] . "\n";
        $data .= "AMOUNT=" . number_format($attributes['AMOUNT'], 2) . "\n";
        $data .= "EXP_TIME=" . date('d.m.Y', strtotime($attributes['EXP_TIME'])) . "\n";
        $data .= "DESCR=" . $attributes['DESCR'] . "\n";

        return base64_encode($data);
    }

    /**
     * Set hashed data string to be sent to ePay
     *
     * @param $encodedData
     * @return string
     */
    public function hashData($encodedData) {
        //Get merchant secret key from the configuration file
        $secretKey = config('config.MERCHANT_SECRET_KEY');
        //Hash the encoded data using the SHA-1 algorithm
        $hashedData = self::hash('sha1', $encodedData, $secretKey);

        return $hashedData;
    }

    /**
     * Hash the payment details using the specified algorithm
     *
     * @param $algorithm
     * @param $data
     * @param $key
     * @return string
     */
    private function hash($algorithm, $data, $key) {

        $algorithm = strtolower($algorithm);
        $p = array(
            'md5' => 'H32',
            'sha1' => 'H40'
        );

        if(strlen($key) > 64) {
            $key = pack($p[$algorithm], $algorithm($key));
        }
        else if(strlen($key) < 64) {
            $key = str_pad($key, 64, chr(0));
        }

        $ipad = substr($key, 0, 64) ^ str_repeat(chr(0x36), 64);
        $opad = substr($key, 0, 64) ^ str_repeat(chr(0x5C), 64);

        return($algorithm($opad.pack($p[$algorithm], $algorithm($ipad.$data))));
    }

}