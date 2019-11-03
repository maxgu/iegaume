<?php


namespace Domain\Repository;


use Domain\Entity\User;

interface UserRepositoryInterface
{
    public function add(User $user): void;

    public function findByLogin(string $login): ?User;
}