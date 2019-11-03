<?php

declare(strict_types=1);

return [
    'authentication' => [
        'redirect' => '/login',
        'pdo' => [
            'dsn' => 'mysql:dbname=iegaume;host=db',
            'username' => 'iegaume',
            'password' => '111',
            'table' => 'ie_users',
            'field' => [
                'identity' => 'login',
                'password' => 'password',
            ],
        ],
    ],
];
