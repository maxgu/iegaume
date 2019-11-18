<?php


namespace Domain\Entity;


class Lesson
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
     * @var string
     */
    private $indexLetter;

    /**
     * @var string[]
     */
    private $titles;

    /**
     * @var int
     */
    private $wordsCount;

    public function __construct(int $id, int $sectionId, string $indexLetter, array $titles, int $wordsCount)
    {
        $this->id = $id;
        $this->sectionId = $sectionId;
        $this->indexLetter = $indexLetter;
        $this->titles = $titles;
        $this->wordsCount = $wordsCount;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(string $lang): string
    {
        return $this->titles[$lang];
    }

    public function getWordsCount(): int
    {
        return $this->wordsCount;
    }

    public function getIndexLetter(): string
    {
        return $this->indexLetter;
    }
}