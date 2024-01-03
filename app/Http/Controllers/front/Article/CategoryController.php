<?php

namespace App\Http\Controllers\front\Article;
use App\Models\Category;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Repositories\Interfaces\TrackRepositoryInterface;


class CategoryController extends Controller
{
    private CategoryRepositoryInterface $CategoryRepository; 
    private TrackRepositoryInterface $TrackRepository;

    /**
     * Display a listing of the resource.
     */
    public function __construct(CategoryRepositoryInterface $CategoryRepository, TrackRepositoryInterface $TrackRepository)
    {
        $this->CategoryRepository = $CategoryRepository;
        $this->TrackRepository = $TrackRepository;
    }
    public function index ($slug)
    {
        $Category = $this->CategoryRepository->GetOrder();
        $Tracks = $this->TrackRepository->GetOrder();
        $data = $this->CategoryRepository->getbySlug($slug);
        return view('front.library.index', compact('Category','Tracks','data'));
   }

    /**
     * Show the form for creating a new resource.
     */


    /**
     * Store a newly created resource in storage.
     */


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

}
