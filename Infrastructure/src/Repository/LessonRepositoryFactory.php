<?php

declare(strict_types=1);

namespace Infrastructure\Repository;

use Psr\Container\ContainerInterface;
use Zend\Db\TableGateway\TableGateway;

class LessonRepositoryFactory
{
    public function __invoke(ContainerInterface $container) : LessonRepository
    {
        return new LessonRepository(
            new TableGateway('ie_lessons', $container->get('Zend\Db\Adapter\Adapter'))
        );
    }
}
