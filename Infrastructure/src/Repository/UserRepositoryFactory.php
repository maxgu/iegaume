<?php

declare(strict_types=1);

namespace Infrastructure\Repository;

use Psr\Container\ContainerInterface;
use Zend\Db\TableGateway\TableGateway;

class UserRepositoryFactory
{
    public function __invoke(ContainerInterface $container) : UserRepository
    {
        return new UserRepository(
            new TableGateway('ie_users', $container->get('Zend\Db\Adapter\Adapter'))
        );
    }
}
