<?php

declare(strict_types=1);

namespace Infrastructure\Handler;

use Domain\Command\Register\RegisterCommand;
use Domain\Command\Register\RegisterContext;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\RedirectResponse;
use Zend\Expressive\Template\TemplateRendererInterface;

class RegisterHandler implements RequestHandlerInterface
{
    /**
     * @var RegisterCommand
     */
    private $registerCommand;

    /**
     * @var LoginHandler
     */
    private $loginHandler;

    /**
     * @var TemplateRendererInterface
     */
    private $template;

    public function __construct(
        RegisterCommand $registerCommand,
        LoginHandler $loginHandler,
        TemplateRendererInterface $template
    ) {
        $this->registerCommand = $registerCommand;
        $this->loginHandler = $loginHandler;
        $this->template = $template;
    }

    public function handle(ServerRequestInterface $request) : ResponseInterface
    {
        if ('POST' === $request->getMethod()) {
            $context = new RegisterContext(
                $request->getParsedBody()['username'],
                $request->getParsedBody()['password']
            );

            if ($this->registerCommand->execute($context)) {
                return $this->loginHandler->handle($request);
            }

            return new HtmlResponse($this->template->render(
                'app::register',
                [
                    'error' => 'User already registered.',
                    'username' => $context->getLogin(),
                    'layout' => 'layout::anonymous',
                ]
            ));
        }

        return new HtmlResponse($this->template->render(
            'app::register',
            ['layout' => 'layout::anonymous']
        ));
    }
}
