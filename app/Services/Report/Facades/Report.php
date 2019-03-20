<?php

namespace App\Services\Report\Facades;
use Illuminate\Support\Facades\Facade;


class Report extends Facade {

    /**
     * Return facade accessor
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Report';
    }
}