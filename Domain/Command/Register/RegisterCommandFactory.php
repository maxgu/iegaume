<?php

declare(strict_types=1);

namespace Domain\Command\Register;

use Infrastructure\Repository\UserRepository;
use Psr\Container\ContainerInterface;

class RegisterCommandFactory
{
    public function __invoke(ContainerInterface $container) : RegisterCommand
    {
        return new RegisterCommand(
            $container->get(UserRepository::class)
        );
    }
}
