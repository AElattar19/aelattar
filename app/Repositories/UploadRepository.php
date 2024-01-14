<?php

namespace App\Repositories;

use App\Models\Upload;
use App\Repositories\Interfaces\UploadRepositoryInterface;


class UploadRepository implements UploadRepositoryInterface
{
    /**
     * @return string
     *  Return the model
     */
    protected $model;

    public function all()
    {
       //return User::all()->toArray();
       return Upload::all();
    }

    public function latest(int $id):array
    {  
  
       return Upload::latest()->limit($id)->get()->toArray();
    }    

    public function getbyid(int $id):Upload
    {
        return Upload::find($id);
    }

    public function create($request): Upload
    {
        return Upload::create($request);
    }

    public function edit(int $id):Upload
    {
        return $this->getbyid($id);
    }

    public function update(int $id, $request):Upload
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
