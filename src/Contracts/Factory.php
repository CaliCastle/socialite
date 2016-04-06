<?php

namespace Cali\Socialite\Contracts;

interface Factory {

    /**
     * Get an OAuth provider implementation.
     *
     * @param  string $driver
     * @return \Cali\Socialite\Contracts\Provider
     */
    public function driver($driver = null);
}
