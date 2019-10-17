<?php


namespace Domain\Repository;


use Domain\Entity\User;

interface UserRepositoryInterface
{
    public function add(User $event): void;

    public function findByLogin(string $login): ?User;
}