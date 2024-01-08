<?php

namespace App\Repositories\Interfaces;

use App\Models\ContactUs;



interface ContactUsRepositoryInterface
{
    public function all();
    
    public function getbyid(int $id): ContactUs;

    public function create($request): ContactUs;

    public function delete(int $id): bool;
}