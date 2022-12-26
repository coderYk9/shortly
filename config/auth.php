<?php

/**
 * add the midddleware here as array of auth
 */

use App\middleware\FirstMiddleware;
use App\middleware\SecondMiddleware;
use App\middleware\authmiddleware;
use App\middleware\Gusetmiddileware;

return [
    'routegroupe' => [
        new FirstMiddleware,
        new SecondMiddleware,
    ],
    'groupe' => [
        'auth' => new authmiddleware,
        'guest' => new Gusetmiddileware,
    ],
];
