<?php

declare(strict_types=1);

namespace Infrastructure\Handler;

use Domain\Repository\LessonRepositoryInterface;
use Domain\Repository\SectionRepositoryInterface;
use Psr\Container\ContainerInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class SectionHandlerFactory
{
    public function __invoke(ContainerInterface $container) : RequestHandlerInterface
    {
        return new SectionHandler(
            $container->get(TemplateRendererInterface::class),
            $container->get(SectionRepositoryInterface::class),
            $container->get(LessonRepositoryInterface::class)
        );
    }
}
