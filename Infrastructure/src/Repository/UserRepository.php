<?php

namespace Infrastructure\Repository;

use Domain\Entity\User;
use Domain\Repository\UserRepositoryInterface;
use Zend\Db\Sql\Select;
use Zend\Db\TableGateway\TableGateway;

class UserRepository implements UserRepositoryInterface
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

    public function add(User $user): void
    {
        $id = $user->getId();

        if (is_null($id)) {
            $this->tableGateway->insert([
                'login' => $user->getLogin(),
                'password' => password_hash($user->getPassword(), PASSWORD_DEFAULT),
            ]);
        } else {
            $this->tableGateway->update(
                [
                    'login' => $user->getLogin(),
                ],
                ['id' => $id]
            );
        }
    }

    public function findByLogin(string $login): ?User
    {
        $select = new Select();
        $select->where->equalTo('login', $login);
        $select->from($this->tableGateway->getTable());
        $select->limit(1)->offset(0);
        $result = $this->tableGateway->selectWith($select)->toArray();

        if (!isset($result[0])) {
            return null;
        }

        return User::fromStorage(
            $result[0]['id'],
            $result[0]['login']
        );
    }
}