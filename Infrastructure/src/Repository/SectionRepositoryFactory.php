<?php

declare(strict_types=1);

namespace Infrastructure\Repository;

use Psr\Container\ContainerInterface;
use Zend\Db\TableGateway\TableGateway;

class SectionRepositoryFactory
{
    public function __invoke(ContainerInterface $container) : SectionRepository
    {
        return new SectionRepository(
            new TableGateway('ie_sections', $container->get('Zend\Db\Adapter\Adapter'))
        );
    }
}
