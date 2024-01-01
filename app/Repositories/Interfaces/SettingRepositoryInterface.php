<?php

namespace App\Repositories\Interfaces;

use App\Models\Setting;



interface SettingRepositoryInterface
{
    public function all():array;
    
    public function latest(int $id):array;

    public function getbyid(int $id): Setting;

    public function create($request): Setting;

    public function edit(int $id): Setting;

    public function update(int $id, $request): Setting;

    public function getLatest(): Setting;

    public function delete(int $id): bool;
}