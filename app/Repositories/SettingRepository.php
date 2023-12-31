<?php

namespace App\Repositories;

use App\Models\Setting;
use App\Repositories\Interfaces\SettingRepositoryInterface;


class SettingRepository implements SettingRepositoryInterface
{
    /**
     * @return string
     *  Return the model
     */
    protected $model;

    public function all():array
    {
       return Setting::all()->toArray();
    }

    public function latest(int $id):array
    {  
  
       return Setting::latest()->limit($id)->get()->toArray();
    }    

    public function getbyid(int $id):Setting
    {
        return Setting::find($id);
    }

    public function create($request): Setting
    {
        return Setting::create($request);
    }

    public function edit(int $id):Setting
    {
        return $this->getbyid($id);
    }

    public function update(int $id, $request):Setting
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
