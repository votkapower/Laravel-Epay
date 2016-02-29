<?php

namespace Kondov\EpayWrapper\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class Epay
 * Provides static interface for the EpayHandler class
 *
 * @package Kondov\EpayWrapper\Facades
 */
class Epay extends Facade {

    /**
     * Define which class to resolve from the container
     *
     * @return string
     */
    protected static function getFacadeAccessor() {
        return 'ePay';
    }

}