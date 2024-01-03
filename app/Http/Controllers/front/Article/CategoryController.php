<?php

namespace App\Http\Controllers\front\Article;
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

    public function index ($id, $slug)
    {

       
        return view('front.home.index');
    
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
    public function destroy(Category $category)
    {
        //
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
