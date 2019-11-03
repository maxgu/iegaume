<?php

declare(strict_types=1);

namespace Infrastructure\Middleware;

use Infrastructure\Repository\UserRepository;
use Infrastructure\ViewHelper\GetAuthorizedUserHelper;
use Psr\Container\ContainerInterface;
use Psr\Http\Server\MiddlewareInterface;
use Zend\View\HelperPluginManager;

class AuthMiddlewareFactory
{
    public function __invoke(ContainerInterface $container) : MiddlewareInterface
    {
        $helperManager = $container->get(HelperPluginManager::class);

        return new AuthMiddleware(
            $container->get(UserRepository::class),
            $helperManager->get(GetAuthorizedUserHelper::class)
        );
    }
}
