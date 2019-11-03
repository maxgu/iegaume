<?php

declare(strict_types=1);

namespace Infrastructure\Handler;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Expressive\Template\TemplateRendererInterface;

class LessonHandler implements RequestHandlerInterface
{
    /**
     * @var TemplateRendererInterface
     */
    private $template;

    public function __construct(
        TemplateRendererInterface $template
    ) {
        $this->template = $template;
    }

    public function handle(ServerRequestInterface $request) : ResponseInterface
    {
        $mode = $request->getAttribute('mode');

        if (!in_array($mode, ['cards', 'learn', 'write', 'test'])) {
            $mode = 'cards';
        }

        return new HtmlResponse($this->template->render('app::lesson-' . $mode));
    }
}
