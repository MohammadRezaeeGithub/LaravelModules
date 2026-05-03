<?php

use App\Modules\AccessControl\Providers\AccessControlServiceProvider;
use App\Providers\AppServiceProvider;

return [
    AppServiceProvider::class,
    AccessControlServiceProvider::class,
];
