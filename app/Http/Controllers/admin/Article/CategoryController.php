<?php

namespace App\Http\Controllers\admin\Article;
use App\Models\Category;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Article;
use App\Repositories\Interfaces\CategoryRepositoryInterface;


class CategoryController extends Controller
{
    private CategoryRepositoryInterface $repository;

    /**
     * Display a listing of the resource.
     */
    public function __construct(CategoryRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {

       
        if ($request->ajax()) {
            

                 $categories = $this->repository->all();
                 return DataTables::of($categories)
                    ->addIndexColumn()
                    ->addColumn('checkbox', function ($row) {
                        return '<input type="checkbox" id="'.$row->id.'" value="'.$row->id.'" name="ids[]"  />';
                    })
                    ->addColumn('article', function ($row) {
                        $countNews = Article::where('category_id', $row->id)->count();                       
                        return '<h6><a href="article/category/'. $row->id .'">'. $countNews .'</a></h6>';
                    })
                    ->addColumn('status', function ($row) {
                        return $row->status == 1 ? "active" : "Inactive";
                    })
                    ->addColumn('action', function ($categories) {

                        $html = '<a class="btn btn-info btn-sm" href="' . route('category.edit', $categories->id) . '">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                    </a> &nbsp;';

                        $html .= '<form action="' . route('category.destroy', $categories->id) . '"
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
                    ->rawColumns(['checkbox','article','status','action'])
                    ->make(true);
        }

        return view('dashboard.cat.index');
    
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.cat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'title' => 'required|string|max:255',
            'status' => 'required|integer',
            'rank' => 'required|integer',
        ];

        $validatedData = $request->validate($data);
        $post = $this->repository->create($request->except('image'));

        $image = $post->addMedia($request->file('image'))
                      ->toMediaCollection('category');
        $image->save();

        //Category::create($validatedData);
        return redirect()->route('category.index'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
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
        return redirect()->route('category.index');
    }

    public function massDelete(Request $request)
    {
        $admins = Category::whereIn('id', $request->get('ids'))->get();

        $admins->each(function ($admin) {
            $admin->delete();
        });

        return redirect()->route('category.index'); 

    }
}
