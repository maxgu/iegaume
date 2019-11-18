<?php


namespace Domain\Repository;


use Domain\Entity\Lesson;

interface LessonRepositoryInterface
{
    public function findById(int $id): Lesson;

    public function findBySection(int $sectionId): array;

    public function findAll(): array;
}