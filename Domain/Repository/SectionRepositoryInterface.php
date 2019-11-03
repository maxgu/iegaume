<?php


namespace Domain\Repository;


use Domain\Entity\Section;

interface SectionRepositoryInterface
{
    public function findOne(int $id): Section;

    public function findAll(): array;
}