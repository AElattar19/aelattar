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
            
                 $categories = Category::all();
                 return DataTables::of($categories)
                    ->addIndexColumn()
                    ->addColumn('id', function ($row) {
                        return $row->id;
                    })
                    ->addColumn('Number', function ($row) {
                        $countNews = Article::where('cat_id', $row->id)->count();
                        return $countNews;
                    })
                    ->addColumn('active', function ($row) {
                        return $row->active == 1 ? "active" : "Inactive";
                    })
                    ->addColumn('action', function ($categories) {

                        $html = '<a class="btn btn-info btn-sm" href="' . route('cat.edit', $categories->id) . '">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                    </a> &nbsp;';
    
 
    
                        return $html;
                    })
                    ->rawColumns(['id','news','active','action'])
                    ->make(true);
        }

        return view('dashboard.article.cat.index');
    
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
    public function store(StoreCategoryRequest $request)
    {
        //
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
    public function destroy(Category $category)
    {
        //
    }
}
