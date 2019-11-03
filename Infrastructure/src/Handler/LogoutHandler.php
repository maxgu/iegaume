<?php

declare(strict_types=1);

namespace Infrastructure\Handler;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\RedirectResponse;
use Zend\Expressive\Authentication\UserInterface;
use Zend\Expressive\Session\SessionInterface;

class LogoutHandler implements RequestHandlerInterface
{
    public function handle(ServerRequestInterface $request) : ResponseInterface
    {
        /** @var SessionInterface $session */
        $session  = $request->getAttribute('session');

        if ($session->has(UserInterface::class)) {
            $session->unset(UserInterface::class);
        }

        return new RedirectResponse('/');
    }
}
