<?php


namespace Domain\Repository;


interface WordRepositoryInterface
{
    public function findByLesson(int $lessonId): array;
}