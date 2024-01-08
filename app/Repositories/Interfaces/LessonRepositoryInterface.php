<?php

namespace App\Repositories\Interfaces;

use App\Models\Lesson;



interface LessonRepositoryInterface
{
    public function all(int $id):array;

    public function home();
    
    public function latest(int $id):array;

    public function getbyid(int $id): Lesson;

    public function create($request): Lesson;

    public function edit(int $id): Lesson;

    public function update(int $id, $request): Lesson;

    public function delete(int $id): bool;
}