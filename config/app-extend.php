<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Application Name (for display)
    |--------------------------------------------------------------------------
    */
    'title' => config('app.name', 'Laravel'),

    'allow-register' => env('ALLOW_REGISTER', false),

    'email-validation' => env('EMAIL_VALIDATION', true),
];
