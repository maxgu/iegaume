<?php

declare(strict_types=1);

namespace Infrastructure\Middleware;

use Infrastructure\Repository\UserRepository;
use Psr\Container\ContainerInterface;
use Psr\Http\Server\MiddlewareInterface;

class AuthMiddlewareFactory
{
    public function __invoke(ContainerInterface $container) : MiddlewareInterface
    {
        return new AuthMiddleware(
            $container->get(UserRepository::class)
        );
    }
}
