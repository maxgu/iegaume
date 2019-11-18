<?php

declare(strict_types=1);

use Zend\Expressive\Authentication;

return [
    // Provides application-wide services.
    // We recommend using fully-qualified class names whenever possible as
    // service names.
    'dependencies' => [
        'abstract_factories' => [
            \Infrastructure\DefaultServiceAbstractFactory::class,
        ],
        // Use 'aliases' to alias a service name to another service. The
        // key is the alias name, the value is the service to which it points.
        'aliases' => [
            Authentication\AuthenticationInterface::class => Authentication\Session\PhpSession::class,
            Authentication\UserRepositoryInterface::class => Authentication\UserRepository\PdoDatabase::class,

            \Domain\Repository\SectionRepositoryInterface::class => \Infrastructure\Repository\SectionRepository::class,
            \Domain\Repository\LessonRepositoryInterface::class => \Infrastructure\Repository\LessonRepository::class,
            \Domain\Repository\WordRepositoryInterface::class => \Infrastructure\Repository\WordRepository::class,
        ],
        // Use 'invokables' for constructor-less services, or services that do
        // not require arguments to the constructor. Map a service name to the
        // class name.
        'invokables' => [
        ],
        // Use 'factories' for services provided by callbacks/factory classes.
        'factories'  => [
            Authentication\UserInterface::class => Authentication\DefaultUserFactory::class,
        ],
    ],
];
