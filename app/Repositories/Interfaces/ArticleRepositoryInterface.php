<?php

namespace App\Repositories\Interfaces;

use App\Models\Article;



interface ArticleRepositoryInterface
{
    public function all():array;
    
    public function latest(int $id):array;

    public function getbyid(int $id): Article;

    public function create($request): Article;

    public function edit(int $id): Article;

    public function update(int $id, $request): Article;

    public function delete(int $id): bool;
}