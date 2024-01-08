<?php

namespace App\Repositories;

use App\Models\ContactUs;
use App\Repositories\Interfaces\ContactUsRepositoryInterface;


class ContactUsRepository implements ContactUsRepositoryInterface
{
    /**
     * @return string
     *  Return the model
     */
    protected $model;

    public function all()
    {
       return ContactUs::all()->toArray();
      
    }

    public function getbyid(int $id):ContactUs
    {
        return ContactUs::find($id);
    }

    public function create($request): ContactUs
    {
        return ContactUs::create($request);
    }


    public function delete(int $id):bool
    {
        $post = $this->getbyid($id);

        return $post->delete();
    }
}
