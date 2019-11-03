<?php

declare(strict_types=1);

namespace Infrastructure\Handler;

use Psr\Container\ContainerInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class DashboardHandlerFactory
{
    public function __invoke(ContainerInterface $container) : RequestHandlerInterface
    {
        return new DashboardHandler($container->get(TemplateRendererInterface::class));
    }
}
