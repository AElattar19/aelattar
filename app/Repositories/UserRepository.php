<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;


class UserRepository implements UserRepositoryInterface
{
    /**
     * @return string
     *  Return the model
     */
    protected $model;

    public function all()
    {
       //return User::all()->toArray();
       return User::query()->where('is_admin', 1)->get();
    }

    public function latest(int $id):array
    {  
  
       return User::latest()->limit($id)->get()->toArray();
    }    

    public function getbyid(int $id):User
    {
        return User::find($id);
    }

    public function create($request): User
    {
        return User::create($request);
    }

    public function edit(int $id):User
    {
        return $this->getbyid($id);
    }

    public function update(int $id, $request):User
    {
        $post = $this->getbyid($id);

        $input = $request->validated();

        $post->update($input);

        return $post;
    }

    public function delete(int $id):bool
    {
        $post = $this->getbyid($id);

        return $post->delete();
    }
}
