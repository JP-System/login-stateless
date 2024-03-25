<?php

namespace LoginStateless\Facades;

use Illuminate\Support\Facades\Facade;

class Asset extends Facade
{
    /**
     * Get the registered name of the component.
     */
    public static function getFacadeAccessor(): string
    {
        return \LoginStateless\Asset::class;
    }
}
