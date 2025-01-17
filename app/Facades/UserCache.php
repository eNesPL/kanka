<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class UserCache
 * @package App\Facades
 *
 * @see \App\Services\Caches\UserCacheService
 * @mixin \App\Services\Caches\UserCacheService
 */
class UserCache extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'usercache';
    }
}
