<?php

declare(strict_types=1);

namespace Infrastructure\ViewHelper;

use Domain\Repository\LessonRepositoryInterface;
use Domain\Repository\SectionRepositoryInterface;
use Psr\Container\ContainerInterface;

class LessonBreadcrumbHelperFactory
{
    public function __invoke(ContainerInterface $container) : LessonBreadcrumbHelper
    {
        return new LessonBreadcrumbHelper(
            $container->get(SectionRepositoryInterface::class),
            $container->get(LessonRepositoryInterface::class)
        );
    }
}
