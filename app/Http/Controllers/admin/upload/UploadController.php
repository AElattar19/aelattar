<?php

namespace App\Http\Controllers\admin\upload;

use App\Models\Upload;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use App\Http\Requests\StoreuploadRequest;
use App\Http\Requests\UpdateuploadRequest;
use App\Repositories\Interfaces\UploadRepositoryInterface;


class UploadController extends Controller
{
    private UploadRepositoryInterface $repository;
    /**
     * Display a listing of the resource.
     */
    public function __construct(UploadRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            
            $admins = $this->repository->all();
            return DataTables::of($admins)
               ->addIndexColumn()
               ->addColumn('checkbox', function ($row) {
                   return '<input type="checkbox" id="'.$row->id.'" value="'.$row->id.'" name="ids[]"  />';
               })
               ->addColumn('title', function ($row) {
                return $row->name;
               })
               ->addColumn('url', function ($row) {
                return $row->name;
                })
               ->addColumn('action', function ($admins) {

                   $html = '<a class="btn btn-info btn-sm" href="' . route('upload.edit', $admins->id) . '">
                                   <i class="fas fa-pencil-alt">
                                   </i>
                               </a> &nbsp;';

                       $html .= '<form action="' . route('upload.destroy', $admins->id) . '"
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
               ->rawColumns(['checkbox','title','url','action'])
               ->make(true);
   }

   return view('dashboard.upload.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.upload.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
     
        $data = [
            'name' => 'required|string|max:255',
           // 'file' => 'required|mimes:jpeg,png,jpg,gif,svg|max:10000',
        ];


        $request->validate($data);
        $post = $this->repository->create($request->except('file'));

        $image = $post->addMedia($request->file('file'))
                      ->toMediaCollection('Upload');
        $image->save();

        return redirect()->route('upload.index'); 


    }

    /**
     * Display the specified resource.
     */
    public function show(upload $upload)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(upload $upload)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateuploadRequest $request, upload $upload)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(upload $upload)
    {
        //
    }

    public function massDelete(Request $request)
    {
        $admins = Upload::whereIn('id', $request->get('ids'))->get();

        $admins->each(function ($admin) {
            $admin->delete();
        });

        return redirect()->route('upload.index');
    }
}
