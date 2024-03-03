<?php

namespace Hymns\GoogleAdminConsole\Facade;

use SebastianBergmann\FileIterator\Facade;

class RestClient extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'restclient';
    }
}