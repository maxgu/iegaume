<?php

declare(strict_types=1);

namespace Infrastructure\Handler;

use Domain\Command\Login;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\RedirectResponse;
use Zend\Expressive\Template\TemplateRendererInterface;
use Zend\Http\Request;

class LoginHandler implements RequestHandlerInterface
{
    /**
     * @var Login\LoginCommand
     */
    private $command;

    /**
     * @var TemplateRendererInterface
     */
    private $template;

    public function __construct(
        Login\LoginCommand $command,
        TemplateRendererInterface $template
    ) {
        $this->command = $command;
        $this->template = $template;
    }

    public function handle(ServerRequestInterface $request) : ResponseInterface
    {
        if ($request->getMethod() === Request::METHOD_POST) {
            $params = $request->getParsedBody();

            $this->command->execute(
                new Login\LoginContext($params['login'])
            );

            return new RedirectResponse('/training-plan');
        }

        return new HtmlResponse($this->template->render('app::login'));
    }
}
