<?php

namespace App\Repositories;

use App\Models\Article;
use App\Repositories\Interfaces\ArticleRepositoryInterface;


class ArticleRepository implements ArticleRepositoryInterface
{
    /**
     * @return string
     *  Return the model
     */
    protected $model;

    public function all():array
    {
       return Article::all()->toArray();
    }

    public function latest(int $id):array
    {  
  
       return Article::latest()->limit($id)->get()->toArray();
    }    

    public function getbyid(int $id):Article
    {
        return Article::find($id);
    }

    public function create($request): Article
    {
        return Article::create($request);
    }

    public function edit(int $id):Article
    {
        return $this->getbyid($id);
    }

    public function update(int $id, $request):Article
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
