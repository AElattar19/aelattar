<?php

namespace App\Repositories;

use App\Models\Course;
use App\Repositories\Interfaces\CourseRepositoryInterface;


class CourseRepository implements CourseRepositoryInterface
{
    /**
     * @return string
     *  Return the model
     */
    protected $model;

    public function all():array
    {
       return Course::all()->toArray();
    }

    public function latest(int $id):array
    {  
  
       return Course::latest()->limit($id)->get()->toArray();
    }    

    public function getbyid(int $id):Course
    {
        return Course::find($id);
    }

    public function create($request): Course
    {
        return Course::create($request);
    }

    public function edit(int $id):Course
    {
        return $this->getbyid($id);
    }

    public function update(int $id, $request):Course
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
