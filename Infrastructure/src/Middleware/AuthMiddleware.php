<?php

declare(strict_types=1);

namespace Infrastructure\Middleware;

use Domain\Repository\UserRepositoryInterface;
use Infrastructure\ViewHelper\GetAuthorizedUserHelper;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\RedirectResponse;
use Zend\Expressive\Authentication\UserInterface;
use Zend\Expressive\Session\SessionInterface;

class AuthMiddleware implements MiddlewareInterface
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    /**
     * @var GetAuthorizedUserHelper
     */
    private $authorizedUserHelper;

    public function __construct(
        UserRepositoryInterface $userRepository,
        GetAuthorizedUserHelper $authorizedUserHelper
    ) {
        $this->userRepository = $userRepository;
        $this->authorizedUserHelper = $authorizedUserHelper;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler) : ResponseInterface
    {
        /** @var SessionInterface $session */
        $session  = $request->getAttribute('session');

        $unAuthorizedUris = ['/', '/login', '/register'];

        $uri = $request->getUri()->getPath();

        if ($session->has(UserInterface::class)) {
            if (in_array($uri, $unAuthorizedUris, true)) {
                return new RedirectResponse('/dashboard');
            }

            /** @var array $authenticatedUser */
            $authenticatedUser = $session->get(UserInterface::class);

            $user = $this->userRepository->findByLogin(
                $authenticatedUser['username']
            );

            $this->authorizedUserHelper->setAuthorizedUser($user);

            return $handler->handle($request->withAttribute('myself', $user));
        } else {
            if (!in_array($uri, $unAuthorizedUris, true)) {
                return new RedirectResponse('/login');
            }
        }

        return $handler->handle($request);
    }
}
