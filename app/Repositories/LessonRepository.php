<?php

namespace App\Repositories;

use App\Models\Lesson;
use App\Repositories\Interfaces\LessonRepositoryInterface;


class LessonRepository implements LessonRepositoryInterface
{
    /**
     * @return string
     *  Return the model
     */
    protected $model;

    public function all():array
    {
       return Lesson::all()->toArray();
    }

    public function latest(int $id):array
    {  
  
       return Lesson::latest()->limit($id)->get()->toArray();
    }    

    public function getbyid(int $id):Lesson
    {
        return Lesson::find($id);
    }

    public function create($request): Lesson
    {
        return Lesson::create($request);
    }

    public function edit(int $id):Lesson
    {
        return $this->getbyid($id);
    }

    public function update(int $id, $request):Lesson
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
