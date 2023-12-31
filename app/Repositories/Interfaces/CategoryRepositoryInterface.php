<?php

namespace App\Repositories\Interfaces;

use App\Models\Category;



interface CategoryRepositoryInterface
{
    public function all():array;
    
    public function latest(int $id):array;

    public function getbyid(int $id): Category;

    public function create($request): Category;

    public function edit(int $id): Category;

    public function update(int $id, $request): Category;

    public function delete(int $id): bool;
}