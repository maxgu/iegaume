<?php

declare(strict_types=1);

namespace Infrastructure\Handler;

use Infrastructure\Repository\SectionRepository;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Expressive\Template\TemplateRendererInterface;

class DashboardHandler implements RequestHandlerInterface
{
    /**
     * @var SectionRepository
     */
    private $sectionRepository;

    /**
     * @var TemplateRendererInterface
     */
    private $template;

    public function __construct(
        SectionRepository $sectionRepository,
        TemplateRendererInterface $template
    ) {
        $this->template = $template;
        $this->sectionRepository = $sectionRepository;
    }

    public function handle(ServerRequestInterface $request) : ResponseInterface
    {
        return new HtmlResponse($this->template->render(
            'app::dashboard',
            ['sections' => $this->sectionRepository->findAll()]
        ));
    }
}
