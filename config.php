<?php

return [

    /*
    |--------------------------------------------------------------------------
    | ePay.bg Merchant Information and app configuration
    |--------------------------------------------------------------------------
    |
    | Before accepting payments you must fill in the secret key and id for
    | your merchant account. SUBMIT_URL defines whether the app is posting to
    | the sandbox version or the real API (default is sandbox).
    |
    */

    'MERCHANT_SECRET_KEY' => '',
    'MERCHANT_IDENTIFIER' => '',
    'SUBMIT_URL'          => 'https://devep2.datamax.bg/ep2/epay2_demo/',
    'URL_OK'              => '',
    'URL_CANCEL'          => '',
    'PAGE'                => 'paylogin'

];