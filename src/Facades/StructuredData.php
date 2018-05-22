<?php

namespace Agencms\StructuredData\Facades;

use Illuminate\Support\Facades\Facade;

class StructuredData extends Facade
{

    /**
     * Get the binding in the IoC container
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'agencms-structured-data';
    }
}
