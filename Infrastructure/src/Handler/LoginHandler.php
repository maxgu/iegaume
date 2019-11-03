<?php

declare(strict_types=1);

namespace Infrastructure\Handler;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\RedirectResponse;
use Zend\Expressive\Authentication\AuthenticationInterface;
use Zend\Expressive\Authentication\UserInterface;
use Zend\Expressive\Session\SessionInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class LoginHandler implements RequestHandlerInterface
{
    private const REDIRECT_ATTRIBUTE = 'authentication:redirect';

    /**
     * @var AuthenticationInterface
     */
    private $authAdapter;

    /**
     * @var TemplateRendererInterface
     */
    private $template;

    public function __construct(
        AuthenticationInterface $adapter,
        TemplateRendererInterface $template
    ) {
        $this->authAdapter = $adapter;
        $this->template = $template;
    }

    public function handle(ServerRequestInterface $request) : ResponseInterface
    {
        /** @var SessionInterface $session */
        $session  = $request->getAttribute('session');
        $redirect = $this->getRedirect($request, $session);

        if ($session->get(UserInterface::class)) {
            die(var_dump($session->get(UserInterface::class)));
        }

        // Handle submitted credentials
        if ('POST' === $request->getMethod()) {
            // User session takes precedence over user/pass POST in
            // the auth adapter so we remove the session prior
            // to auth attempt
            $session->unset(UserInterface::class);

            // Login was successful
            if ($this->authAdapter->authenticate($request)) {
                $session->unset(self::REDIRECT_ATTRIBUTE);
                $session->persistSessionFor(60 * 60 * 24 * 30); //30 days
                return new RedirectResponse($redirect);
            }

            // Login failed
            return new HtmlResponse($this->template->render(
                'app::login',
                ['error' => 'Invalid credentials; please try again']
            ));
        }

        // Display initial login form
        $session->set(self::REDIRECT_ATTRIBUTE, $redirect);
        return new HtmlResponse($this->template->render(
            'app::login',
            []
        ));
    }

    private function getRedirect(
        ServerRequestInterface $request,
        SessionInterface $session
    ) : string {
        $redirect = $session->get(self::REDIRECT_ATTRIBUTE);

        if (! $redirect) {
            $redirect = $request->getHeaderLine('Referer');
            if (in_array($redirect, ['', '/login'], true)) {
                $redirect = '/dashboard';
            }
        }

        return $redirect;
    }
}
