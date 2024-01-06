<?php

namespace App\Http\Controllers\front\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Repositories\Interfaces\TrackRepositoryInterface;
class HomeController extends Controller
{
    private CategoryRepositoryInterface $CategoryRepository; 
    private TrackRepositoryInterface $TrackRepository;
    /**
     * Display a listing of the resource.
     */
    public function __construct(
        CategoryRepositoryInterface $CategoryRepository, 
        TrackRepositoryInterface $TrackRepository,
        
        )
    {
        $this->CategoryRepository = $CategoryRepository;
        $this->TrackRepository = $TrackRepository;
    }
    public function index()
    {
        
        $HomeCategory = $this->CategoryRepository->GetHome();
        $HomeTracks = $this->TrackRepository->GetMaster();

        $TracksNum = $this->TrackRepository->GetNum();
        $CategoriesNum = $this->CategoryRepository->GetNum();

        $LessonsNum = $this->TrackRepository->GetMaster();
        $ArticlesNum = $this->TrackRepository->GetMaster();
        return view('front.home.index', compact(
            ['HomeTracks','HomeCategory','TracksNum','CategoriesNum','LessonsNum','ArticlesNum']
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function contact()
    {

        return view('front.contact.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
