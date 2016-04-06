<?php

namespace Cali\Socialite\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Cali\Socialite\SocialiteManager
 */
class Socialite extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Cali\Socialite\Contracts\Factory';
    }
}
