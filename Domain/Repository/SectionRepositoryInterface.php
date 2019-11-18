<?php


namespace Domain\Repository;


use Domain\Entity\Section;

interface SectionRepositoryInterface
{
    public function findById(int $id): Section;

    public function findAll(): array;
}