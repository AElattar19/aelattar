<?php

namespace App\Http\Controllers\front\Course;
use App\Models\Course;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Repositories\Interfaces\TrackRepositoryInterface;
use App\Repositories\Interfaces\CourseRepositoryInterface;

class CourseController extends Controller
{
    private CourseRepositoryInterface $CourseRepository;
    private TrackRepositoryInterface $TrackRepository;

    /**
     * Display a listing of the resource.
     */
    public function __construct(CourseRepositoryInterface $CourseRepository, TrackRepositoryInterface $TrackRepository)
    {
        $this->CourseRepository = $CourseRepository;
        $this->TrackRepository = $TrackRepository;
    }


    public function index ($CourseSlug)
    {
        $data = $this->CourseRepository->getbySlug($CourseSlug);
        return view('front.library.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        //
    }
}
