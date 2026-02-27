<?php

declare(strict_types=1);

return [
    'enabled' => env('CHARGEBACK_ENABLED', false),
    'url' => env('CHARGEBACK_URL'),
    'username' => env('CHARGEBACK_USERNAME'),
    'password' => env('CHARGEBACK_PASSWORD'),
];
