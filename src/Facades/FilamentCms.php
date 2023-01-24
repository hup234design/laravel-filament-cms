<?php

namespace Hup234design\FilamentCms\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Hup234design\FilamentCms\FilamentCms
 */
class FilamentCms extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Hup234design\FilamentCms\FilamentCms::class;
    }
}
