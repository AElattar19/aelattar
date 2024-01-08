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

    public function all()
    {
        return Track::all();
    }

    public function GetHome()
    {
        return Track::orderBy("rank", 'ASC')->get();
    }

    public function GetMaster()
    {
        return Track::Where('parent', 0)->get();
    }

    public function GetParent(int $id)
    {
        return Track::where('parent', $id)->orderBy("rank", 'ASC')->get();
    }

    public function GetNum()
    {
        return Track::count(); 
    }

    public function CountSub(int $id)
    {
        return Track::where('parent', $id)->count(); 
    }

    public function latest(int $id):array
    {  
  
       return Track::latest()->limit($id)->get()->toArray();
    }    

  

    public function getbySlug($slug)
    {
        return Track::where("slug", $slug)->with('Lessons')->first();
    }


    public function Menu()
    {
       return Track::Where('parent', 0)->with('children')->orderBy("rank", 'ASC')->get();
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
