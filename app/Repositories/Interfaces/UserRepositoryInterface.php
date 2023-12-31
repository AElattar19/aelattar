<?php

namespace App\Repositories\Interfaces;

use App\Models\User;



interface UserRepositoryInterface
{
    public function all();
    
    public function latest(int $id):array;

    public function getbyid(int $id): User;

    public function create($request): User;

    public function edit(int $id): User;

    public function update(int $id, $request): User;

    public function delete(int $id): bool;
}