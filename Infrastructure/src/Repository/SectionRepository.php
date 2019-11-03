<?php

namespace Infrastructure\Repository;

use Domain\Entity\Section;
use Domain\Repository\SectionRepositoryInterface;
use Zend\Db\Sql\Select;
use Zend\Db\TableGateway\TableGateway;

class SectionRepository implements SectionRepositoryInterface
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

    public function findOne(int $id): Section
    {

    }

    public function findAll(): array
    {
        $select = new Select();
        $select->from($this->tableGateway->getTable());
        $result = $this->tableGateway->selectWith($select)->toArray();

        $sections = [];

        foreach ($result as $item) {
            $sections[$item['id']] = new Section(
                $item['id'],
                [
                    'lv' => $item['title_lv'],
                    'ru' => $item['title_ru'],
                ],
                $item['lessons_count']
            );
        }

        return $sections;
    }
}