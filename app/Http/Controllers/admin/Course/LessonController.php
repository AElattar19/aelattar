<?php

namespace App\Http\Controllers\admin\Course;
use App\Models\Lesson;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLessonRequest;
use App\Http\Requests\UpdateLessonRequest;
use App\Repositories\Interfaces\LessonRepositoryInterface;

class LessonController extends Controller
{
    private LessonRepositoryInterface $LessonRepository;

    /**
     * Display a listing of the resource.
     */
    public function __construct(LessonRepositoryInterface $LessonRepository)
    {
        $this->LessonRepository = $LessonRepository;
    }
    public function index (Request $request, $id)
    {

        if ($request->ajax()) {
    

         $track = $this->LessonRepository->all($id);
         return DataTables::of($track)
            ->addIndexColumn()
            ->addColumn('checkbox', function ($row) {
                return '<input type="checkbox" id="'.$row->id.'" value="'.$row->id.'" name="ids[]"  />';
            })
            ->addColumn('title', function ($row) {
                return $row->title;
            })
            ->addColumn('rank', function ($row) {
                return $row->rank;
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
            ->rawColumns(['checkbox','title','rank','status','action'])
            ->make(true);
}

return view('dashboard.lesson.index', compact('id'));

}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('dashboard.lesson.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'title' => 'required|string|max:255',
            'youtube' => 'required|url',
            'status' => 'required|integer',
            'rank' => 'required|integer',
            'home' => 'required|integer',
        ];
        $validatedData = $request->validate($data);
        $post = $this->LessonRepository->create($request->all());

        return redirect()->route('lesson.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Lesson $lesson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lesson $lesson)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLessonRequest $request, Lesson $lesson)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lesson $lesson)
    {
        //
    }
}
