<?php

declare(strict_types=1);

namespace Infrastructure\Handler;

use Domain\Repository\WordRepositoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Expressive\Template\TemplateRendererInterface;

class CardsHandler implements RequestHandlerInterface
{
    /**
     * @var TemplateRendererInterface
     */
    private $template;

    /**
     * @var WordRepositoryInterface
     */
    private $wordRepository;

    public function __construct(
        TemplateRendererInterface $template,
        WordRepositoryInterface $wordRepository
    ) {
        $this->template = $template;
        $this->wordRepository = $wordRepository;
    }

    public function handle(ServerRequestInterface $request) : ResponseInterface
    {
        $lessonId = (int)$request->getAttribute('lessonId');
        $sectionId = (int)$request->getAttribute('sectionId');

        return new HtmlResponse($this->template->render(
            'app::lesson-cards',
            [
                'words' => $this->wordRepository->findByLesson($lessonId),
                'sectionId' => $sectionId,
                'lessonId' => $lessonId,
            ]
        ));
    }
}
