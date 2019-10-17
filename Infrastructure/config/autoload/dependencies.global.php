<?php

declare(strict_types=1);

use Infrastructure\Handler;

return [
    // Provides application-wide services.
    // We recommend using fully-qualified class names whenever possible as
    // service names.
    'dependencies' => [
        // Use 'aliases' to alias a service name to another service. The
        // key is the alias name, the value is the service to which it points.
        'aliases' => [
            // Fully\Qualified\ClassOrInterfaceName::class => Fully\Qualified\ClassName::class,
        ],
        // Use 'invokables' for constructor-less services, or services that do
        // not require arguments to the constructor. Map a service name to the
        // class name.
        'invokables' => [
            Handler\PingHandler::class => Handler\PingHandler::class,
        ],
        // Use 'factories' for services provided by callbacks/factory classes.
        'factories'  => [
            Handler\HomePageHandler::class => Handler\HomePageHandlerFactory::class,
        ],
    ],
];
