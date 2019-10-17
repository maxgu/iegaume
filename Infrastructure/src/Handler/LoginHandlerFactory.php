<?php

declare(strict_types=1);

namespace Infrastructure\Handler;

//use Domain\Command\AddExpense\AddExpenseCommand;
//use Domain\Repository\EventRepositoryInterface;
use Psr\Container\ContainerInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class LoginHandlerFactory
{
    public function __invoke(ContainerInterface $container) : RequestHandlerInterface
    {
        return new LoginHandler(
//            $container->get(AddExpenseCommand::class),
//            $container->get(EventRepositoryInterface::class),
            $container->get(TemplateRendererInterface::class)
        );
    }
}
