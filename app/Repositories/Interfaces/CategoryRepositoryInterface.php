<?php

namespace App\Repositories\Interfaces;

use App\Models\Category;



interface CategoryRepositoryInterface
{
    public function all();

    public function GetHome();
    
    public function Menu();
    
    public function latest(int $id):array;

    public function getbyid(int $id): Category;

    public function getbySlug($slug):Category;

    public function create($request): Category;

    public function edit(int $id): Category;

    public function update(int $id, $request): Category;

    public function delete(int $id): bool;
}