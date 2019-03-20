<?php

namespace App\Services\Report\Facades;
use Illuminate\Support\Facades\Facade;


class Api extends Facade {

    /**
     * Return facade accessor
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Report\Api';
    }
}