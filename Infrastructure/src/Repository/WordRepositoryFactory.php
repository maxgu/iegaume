<?php

declare(strict_types=1);

namespace Infrastructure\Repository;

use Psr\Container\ContainerInterface;
use Zend\Db\TableGateway\TableGateway;

class WordRepositoryFactory
{
    public function __invoke(ContainerInterface $container) : WordRepository
    {
        return new WordRepository(
            new TableGateway('ie_words', $container->get('Zend\Db\Adapter\Adapter'))
        );
    }
}
