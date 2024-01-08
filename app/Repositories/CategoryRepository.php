<?php

namespace App\Repositories;

use App\Models\Category;
use App\Repositories\Interfaces\CategoryRepositoryInterface;


class CategoryRepository implements CategoryRepositoryInterface
{
    /**
     * @return string
     *  Return the model
     */
    protected $model;

    public function all()
    {
       return Category::all();
    }

    public function GetNum()
    {
        return Category::count(); 
    }

    public function GetHome()
    {
        return Category::orderBy("rank", 'ASC')->get();
    }

    public function Menu()
    {
       return Category::orderBy("rank", 'ASC')->get();
    }


    public function latest(int $id):array
    {  
  
       return Category::latest()->limit($id)->get()->toArray();
    }    

    public function getbyid(int $id):Category
    {
        return Category::find($id);
    }

    public function getbySlug($slug):Category
    {
        return Category::where("slug", $slug)->with('Articles')->first();
    }

    public function create($request): Category
    {
        return Category::create($request);
    }

    public function edit(int $id):Category
    {
        return $this->getbyid($id);
    }

    public function update(int $id, $request):Category
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
