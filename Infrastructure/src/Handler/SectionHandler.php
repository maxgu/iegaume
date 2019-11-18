<?php

declare(strict_types=1);

namespace Infrastructure\Handler;

use Domain\Repository\LessonRepositoryInterface;
use Domain\Repository\SectionRepositoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Expressive\Template\TemplateRendererInterface;

class SectionHandler implements RequestHandlerInterface
{
    /**
     * @var TemplateRendererInterface
     */
    private $template;

    /**
     * @var SectionRepositoryInterface
     */
    private $sectionRepository;

    /**
     * @var LessonRepositoryInterface
     */
    private $lessonRepository;

    public function __construct(
        TemplateRendererInterface $template,
        SectionRepositoryInterface $sectionRepository,
        LessonRepositoryInterface $lessonRepository
    ) {
        $this->template = $template;
        $this->sectionRepository = $sectionRepository;
        $this->lessonRepository = $lessonRepository;
    }

    public function handle(ServerRequestInterface $request) : ResponseInterface
    {
        $sectionId = (int)$request->getAttribute('id');

        return new HtmlResponse($this->template->render(
            'app::section',
            [
                'section' => $this->sectionRepository->findById($sectionId),
                'lessons' => $this->lessonRepository->findBySection($sectionId),
            ]
        ));
    }
}
