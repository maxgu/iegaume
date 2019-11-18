<?php

namespace Infrastructure\Repository;

use Domain\Entity\Word;
use Domain\Repository\WordRepositoryInterface;
use Zend\Db\Sql\Select;
use Zend\Db\TableGateway\TableGateway;

class WordRepository implements WordRepositoryInterface
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

    public function findByLesson(int $lessonId): array
    {
        $select = new Select();
        $select->from($this->tableGateway->getTable())
            ->where(['lesson_id' => $lessonId]);
        $result = $this->tableGateway->selectWith($select)->toArray();

        $words = [];

        foreach ($result as $item) {
            $words[$item['id']] = new Word(
                $item['id'],
                $item['section_id'],
                $item['lesson_id'],
                $item['word'],
                $item['translation']
            );
        }

        return $words;
    }
}