<?php

return [
    'paths' => ['api/*', 'sanctum/csrf-cookie'],
    'allowed_methods' => ['*'],
    'allowed_origins' => explode(',', env('ALLOWED_ORIGINS', '*')),
    'allowed_headers' => ['*'],
    'supports_credentials' => true,
];
