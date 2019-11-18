<?php

namespace Infrastructure\Repository;

use Domain\Entity\Lesson;
use Domain\Repository\LessonRepositoryInterface;
use Zend\Db\Sql\Select;
use Zend\Db\TableGateway\TableGateway;

class LessonRepository implements LessonRepositoryInterface
{
    /**
     * @var TableGateway
     */
    private $tableGateway;

    /**
     * @param TableGateway $tableGateway
     */
    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function findById(int $id): Lesson
    {
        $select = new Select();
        $select->from($this->tableGateway->getTable())
            ->where(['id' => $id]);
        $result = $this->tableGateway->selectWith($select)->toArray();

        $item = $result[0];

        $section = new Lesson(
            $item['id'],
            $item['section_id'],
            $item['index_letter'],
            [
                'lv' => $item['title_lv'],
                'ru' => $item['title_ru'],
            ],
            $item['words_count']
        );

        return $section;
    }

    public function findBySection(int $sectionId): array
    {
        if ($sectionId === 0) {
            $sectionId = 99;
        }

        $select = new Select();
        $select->from($this->tableGateway->getTable())
            ->where(['section_id' => $sectionId]);
        $result = $this->tableGateway->selectWith($select)->toArray();

        $lessons = [];

        foreach ($result as $item) {
            $lessons[$item['id']] = new Lesson(
                $item['id'],
                $item['section_id'],
                $item['index_letter'],
                [
                    'lv' => $item['title_lv'],
                    'ru' => $item['title_ru'],
                ],
                $item['words_count']
            );
        }

        return $lessons;
    }

    public function findAll(): array
    {
        $select = new Select();
        $select->from($this->tableGateway->getTable());
        $result = $this->tableGateway->selectWith($select)->toArray();

        $lessons = [];

        foreach ($result as $item) {
            $lessons[$item['id']] = new Lesson(
                $item['id'],
                $item['section_id'],
                $item['index_letter'],
                [
                    'lv' => $item['title_lv'],
                    'ru' => $item['title_ru'],
                ],
                $item['words_count']
            );
        }

        return $lessons;
    }
}