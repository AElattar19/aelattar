<?php

namespace App\Http\Controllers\admin\Course;
use App\Models\Track;
use App\Models\Article;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTrackRequest;
use App\Http\Requests\UpdateTrackRequest;
use App\Models\Lesson;
use App\Repositories\Interfaces\TrackRepositoryInterface;

class TrackController extends Controller
{
    private TrackRepositoryInterface $repository;

    /**
     * Display a listing of the resource.
     */
    public function __construct(TrackRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
    public function index(Request $request)
    {

        if ($request->ajax()) {
            

                 $track = $this->repository->GetMaster();
                 return DataTables::of($track)
                    ->addIndexColumn()
                    ->addColumn('checkbox', function ($row) {
                        return '<input type="checkbox" id="'.$row->id.'" value="'.$row->id.'" name="ids[]"  />';
                    })
                    ->addColumn('title', function ($row) {
                        return $row->title;
                    })
                    ->addColumn('course', function ($row) {
                        $countNews = $this->repository->CountSub($row->id);
                                             
                        return '<h6><a href="track/courses/'. $row->id .'">'. $countNews .'</a></h6>';
                        //return $row->title; 
                    })
                    ->addColumn('lesson', function ($row) {
                        $countNews = Lesson::where('track_id', $row->id)->count();                       
                        return '<h6><a href="track/lesson/'. $row->id .'">'. $countNews .'</a></h6>';
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
                    ->rawColumns(['checkbox','title','course','lesson','status','action'])
                    ->make(true);
        }

        return view('dashboard.track.index');
    
    }


public function track (Request $request, $id)
{

    if ($request->ajax()) {
        

             $track = $this->repository->GetParent($id);
             return DataTables::of($track)
                ->addIndexColumn()
                ->addColumn('checkbox', function ($row) {
                    return '<input type="checkbox" id="'.$row->id.'" value="'.$row->id.'" name="ids[]"  />';
                })
                ->addColumn('title', function ($row) {
                    return $row->title;
                })
                ->addColumn('lesson', function ($row) {
                    $countNews = Lesson::where('track_id', $row->id)->count();                       
                    return '<h6><a href="track/lesson/'. $row->id .'">'. $countNews .'</a></h6>';
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
                ->rawColumns(['checkbox','title','lesson','status','action'])
                ->make(true);
    }

    return view('dashboard.track.sub', compact('id'));

    }

   
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Tracks = $this->repository->GetMaster();
        return view('dashboard.track.create', compact('Tracks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'title' => 'required|string|max:255',
            'status' => 'required|integer',
            'parent' => 'required|integer',
            'rank' => 'required|integer',
        ];

        $validatedData = $request->validate($data);
        $post = $this->repository->create($request->except('image'));

        $image = $post->addMedia($request->file('image'))
                      ->toMediaCollection('track');
        $image->save();

        //Category::create($validatedData);
        return redirect()->route('track.index'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(Track $track)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $categories = $this->repository->GetMaster();
        $data = $this->repository->getbyid($id);
        return view('dashboard.article.edit', compact(['categories', 'data']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTrackRequest $request, Track $track)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->repository->delete($id);
        session()->flash('edit');
        return redirect()->route('track.index');
    }
}
