<?php

namespace Infrastructure\ViewHelper;

use Domain\Repository\LessonRepositoryInterface;
use Domain\Repository\SectionRepositoryInterface;
use Zend\View\Helper\AbstractHelper;

class LessonBreadcrumbHelper extends AbstractHelper
{
    /**
     * @var SectionRepositoryInterface
     */
    private $sectionRepository;

    /**
     * @var LessonRepositoryInterface
     */
    private $lessonRepository;

    public function __construct(
        SectionRepositoryInterface $sectionRepository,
        LessonRepositoryInterface $lessonRepository
    ) {
        $this->sectionRepository = $sectionRepository;
        $this->lessonRepository = $lessonRepository;
    }

    public function __invoke(int $sectionId, int $lessonId = null)
    {
        return $this->getView()->render(
            'app::blocks/lesson-breadcrumb',
            [
                'section' => $this->sectionRepository->findById($sectionId),
                'lesson' => $lessonId ? $this->lessonRepository->findById($lessonId) : null,
            ]
        );
    }
}
