<?php

return [
    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    'allowed_methods' => ['*'],

    'allowed_origins' => ['http://localhost:4200'], // Substitua pelo domínio do Angular

    'allowed_headers' => ['Content-Type', 'X-Requested-With', 'Authorization', 'X-CSRF-TOKEN', 'Accept'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => true,

];
