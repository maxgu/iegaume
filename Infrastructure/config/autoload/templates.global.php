<?php

declare(strict_types=1);

return [
    'templates' => [
        'paths' => [
            'app'    => ['templates/app'],
            'error'  => ['templates/error'],
            'layout' => ['templates/layout'],
        ],
    ],

    'view_helpers' => [
        'aliases' => [
            'getAuthorizedUser' => Infrastructure\ViewHelper\GetAuthorizedUserHelper::class,
            'breadcrumb' => Infrastructure\ViewHelper\LessonBreadcrumbHelper::class,
        ],
        'abstract_factories' => [
            \Infrastructure\DefaultServiceAbstractFactory::class,
        ],
    ],
];
