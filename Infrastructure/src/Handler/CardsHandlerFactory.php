<?php

declare(strict_types=1);

namespace Infrastructure\Handler;

use Domain\Repository\WordRepositoryInterface;
use Psr\Container\ContainerInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class CardsHandlerFactory
{
    public function __invoke(ContainerInterface $container) : RequestHandlerInterface
    {
        return new CardsHandler(
            $container->get(TemplateRendererInterface::class),
            $container->get(WordRepositoryInterface::class)
        );
    }
}
