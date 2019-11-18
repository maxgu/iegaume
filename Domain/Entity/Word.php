<?php


namespace Domain\Entity;


class Word
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $sectionId;

    /**
     * @var int
     */
    private $lessonId;

    /**
     * @var string
     */
    private $word;

    /**
     * @var string
     */
    private $translate;

    public function __construct(int $id, int $sectionId, int $lessonId, string $word, string $translate)
    {
        $this->id = $id;
        $this->sectionId = $sectionId;
        $this->lessonId = $lessonId;
        $this->word = $word;
        $this->translate = $translate;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getWord(): string
    {
        return $this->word;
    }

    public function getTranslate(): string
    {
        return $this->translate;
    }
}