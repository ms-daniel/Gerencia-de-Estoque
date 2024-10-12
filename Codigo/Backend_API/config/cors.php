<?php

return [
    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    'allowed_methods' => ['*'],

    'allowed_origins' => ['http://localhost:4200'],

    'allowed_headers' => ['*'],

    'exposed_headers' => ['Authorization', 'Set-Cookie', 'Custom-Header'],

    'max_age' => 0,

    'supports_credentials' => true,
];
