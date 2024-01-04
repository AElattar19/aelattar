<?php

namespace App\Http\Controllers\admin\Course;
use App\Models\Course;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Repositories\Interfaces\CourseRepositoryInterface;
use App\Repositories\Interfaces\TrackRepositoryInterface;


class CourseController extends Controller
{
    private CourseRepositoryInterface $repository;
    private TrackRepositoryInterface $TrackRepository;
    /**
     * Display a listing of the resource.
     */
    public function __construct(CourseRepositoryInterface $repository, TrackRepositoryInterface $TrackRepository)
    {
        $this->repository = $repository;
        $this->TrackRepository = $TrackRepository;
      
    }
    public function track (Request $request, $id)
    {
    
        if ($request->ajax()) {
            

            $track = $this->repository->allById($id);
            return DataTables::of($track)
               ->addIndexColumn()
               ->addColumn('checkbox', function ($row) {
                   return '<input type="checkbox" id="'.$row->id.'" value="'.$row->id.'" name="ids[]"  />';
               })
               ->addColumn('title', function ($row) {
                   return $row->title;
               })
               ->addColumn('course', function ($row) {
                   $countNews = Course::where('tracks_id', $row->id)->count();                       
                   return '<h6><a href="track/courses/'. $row->id .'">'. $countNews .'</a></h6>';
                   
               })
               ->addColumn('lession', function ($row) {
                   $countNews = Course::where('tracks_id', $row->id)->count();                       
                   return '<h6><a href="Course/tracks/'. $row->id .'">'. $countNews .'</a></h6>';
                   
               })
               ->addColumn('status', function ($row) {
                   return $row->status == 1 ? "active" : "Inactive";
               })
               ->addColumn('action', function ($track) {

                   $html = '<a class="btn btn-info btn-sm" href="' . route('track.edit', $track->id) . '">
                                   <i class="fas fa-pencil-alt">
                                   </i>
                               </a> &nbsp;';

                   $html .= '<form action="' . route('track.destroy', $track->id) . '"
                               method="post" style="display: inline-block;">
                             ' . method_field('delete') . '
                              ' . csrf_field() . '
                             <button type="submit"
                                     class="btn  modal-effect btn btn-sm btn-danger">
                                 <i class="fas fa-trash">
                                 </i>
                             </button>
                         </form>';    


                   return $html;
               })
               ->rawColumns(['checkbox','title','course','lession','status','action'])
               ->make(true);
   }

   return view('dashboard.course.index', compact('id'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $tracks = $this->TrackRepository->getbyid($id);
        return view('dashboard.course.create', compact(['id', 'tracks']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'tracks_id'=>['required', 'integer'],
            'title' => 'required|string|max:255',
            'status' => 'required|integer',
            'rank' => 'required|integer',
        ];

        $validatedData = $request->validate($data);
        $post = $this->repository->create($request->except('image'));

        $image = $post->addMedia($request->file('image'))
                      ->toMediaCollection('course');
        $image->save();

        //Category::create($validatedData);
        return redirect()->route('SubTrack', $request->tracks_id);
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
