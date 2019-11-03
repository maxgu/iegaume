<?php

declare(strict_types=1);

namespace Infrastructure\Handler;

use Psr\Container\ContainerInterface;
use Zend\Expressive\Authentication\AuthenticationInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class LoginHandlerFactory
{
    public function __invoke(ContainerInterface $container) : LoginHandler
    {
        return new LoginHandler(
            $container->get(AuthenticationInterface::class),
            $container->get(TemplateRendererInterface::class)
        );
    }
}
