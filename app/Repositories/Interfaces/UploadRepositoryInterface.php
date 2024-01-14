<?php

namespace App\Repositories\Interfaces;

use App\Models\Upload;



interface UploadRepositoryInterface
{
    public function all();
    
    public function latest(int $id):array;

    public function getbyid(int $id): Upload;

    public function create($request): Upload;

    public function edit(int $id): Upload;

    public function update(int $id, $request): Upload;

    public function delete(int $id): bool;
}