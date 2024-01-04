<?php

namespace App\Repositories\Interfaces;

use App\Models\Course;



interface CourseRepositoryInterface
{
    public function all():array;

    public function allById(int $id):array;
    
    public function latest(int $id):array;

    public function getbyid(int $id): Course;

    public function create($request): Course;

    public function edit(int $id): Course;

    public function update(int $id, $request): Course;

    public function delete(int $id): bool;
}