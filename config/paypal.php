<?php

return [

    'client_id' => 'AfPrzIO8wHgm3Ik5OQsPutVVbB4kYlZLh0RncjzJSi8ygJglUZxvZlyYK0oOklCxDvX9LSvmyv5wkMAn',
    'secret' => 'EGcPI9ER-83X9vW9dsO1YcGpj6v5dpCDFlWcChh_WqiEev9gjmMpOa-J12YyFwsjRsIz0BQ7W51p6wEH',

    'settings' => [
        'mode' => env('PAYPAL_MODE','sandbox'),
        'http.ConnectionTimeOut' => 30,
        'log.LogEnabled' => true,
        'log.FileName' => storage_path('/logs/paypal.log'),
        'log.LogLaravel' => 'ERROR'
    ]
];