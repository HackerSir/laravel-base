<?php

return [
    'enabled'      => env('APP_DEBUG', false),
    'showBar'      => true,
    'accepts'      => [
        'text/html',
    ],
    'editor'       => 'subl://open?url=file://%file&line=%line',
    'maxDepth'     => 4,
    'maxLength'    => 1000,
    'scream'       => true,
    'showLocation' => true,
    'strictMode'   => true,
    'panels'       => [
        'routing'        => true,
        'database'       => true,
        'view'           => true,
        'event'          => true,
        'session'        => true,
        'request'        => true,
        'auth'           => true,
        'html-validator' => true,
        'terminal'       => true,
    ],
];
