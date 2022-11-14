<?php

namespace Jmnn\Map\Facade;

use Illuminate\Support\Facades\Facade;

class MapFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'j-map';
    }
}
