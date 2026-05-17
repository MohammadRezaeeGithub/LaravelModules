<?php

use App\Modules\AccessControl\Providers\AccessControlServiceProvider;
use App\Modules\Basket\Providers\BasketServiceProvider;
use App\Providers\AppServiceProvider;

return [
    AppServiceProvider::class,
    AccessControlServiceProvider::class,
    BasketServiceProvider::class
];
