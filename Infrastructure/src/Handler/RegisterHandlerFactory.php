<?php

declare(strict_types=1);

namespace Infrastructure\Handler;

use Domain\Command\Register\RegisterCommand;
use Psr\Container\ContainerInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class RegisterHandlerFactory
{
    public function __invoke(ContainerInterface $container) : RegisterHandler
    {
        return new RegisterHandler(
            $container->get(RegisterCommand::class),
            $container->get(LoginHandler::class),
            $container->get(TemplateRendererInterface::class)
        );
    }
}
