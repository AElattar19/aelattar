<?php

namespace App\Repositories\Interfaces;

use App\Models\Track;



interface TrackRepositoryInterface
{
    public function all();
    
    public function GetOrder();
    
    public function latest(int $id):array;

    public function getbySlug($slug);

    public function getbyid(int $id): Track;

    public function create($request): Track;

    public function edit(int $id): Track;

    public function update(int $id, $request): Track;

    public function delete(int $id): bool;
}