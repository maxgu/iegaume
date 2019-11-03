<?php

declare(strict_types=1);

namespace Infrastructure\Handler;

use Psr\Container\ContainerInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class SectionHandlerFactory
{
    public function __invoke(ContainerInterface $container) : RequestHandlerInterface
    {
        return new SectionHandler($container->get(TemplateRendererInterface::class));
    }
}
