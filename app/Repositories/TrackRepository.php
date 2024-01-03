<?php

namespace App\Repositories;

use App\Models\Track;
use App\Repositories\Interfaces\TrackRepositoryInterface;


class TrackRepository implements TrackRepositoryInterface
{
    /**
     * @return string
     *  Return the model
     */
    protected $model;

    public function all():array
    {
       return Track::all()->toArray();
    }

    public function latest(int $id):array
    {  
  
       return Track::latest()->limit($id)->get()->toArray();
    }    

    public function getbySlug($slug)
    {
        return Track::where("slug", $slug)->first();
    }


    public function GetOrder()
    {
       return Track::orderBy("rank", 'ASC')->get();
    }


    public function getbyid(int $id):Track
    {
        return Track::find($id);
    }

    public function create($request): Track
    {
        return Track::create($request);
    }

    public function edit(int $id):Track
    {
        return $this->getbyid($id);
    }

    public function update(int $id, $request):Track
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
