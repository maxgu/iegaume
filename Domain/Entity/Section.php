<?php


namespace Domain\Entity;


class Section
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string[]
     */
    private $titles;

    /**
     * @var int
     */
    private $lessonsCount;

    public function __construct(int $id, array $titles, int $lessonsCount)
    {
        $this->id = $id;
        $this->titles = $titles;
        $this->lessonsCount = $lessonsCount;
    }

    public function getId(): int
    {
        if ($this->id == 99) {
            return 0;
        }

        return $this->id;
    }

    public function getTitle(string $lang): string
    {
        return $this->titles[$lang];
    }

    public function getLessonsCount(): int
    {
        return $this->lessonsCount;
    }
}