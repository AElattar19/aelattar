<?php

namespace App\Http\Controllers\front\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\TrackRepositoryInterface;
use App\Repositories\Interfaces\LessonRepositoryInterface;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Repositories\Interfaces\ArticleRepositoryInterface;

class HomeController extends Controller
{
    private CategoryRepositoryInterface $CategoryRepository; 
    private TrackRepositoryInterface $TrackRepository;
    private LessonRepositoryInterface $LessonRepository;
    private ArticleRepositoryInterface $ArticleRepository;

    public function __construct(
        CategoryRepositoryInterface $CategoryRepository, 
        TrackRepositoryInterface $TrackRepository,
        LessonRepositoryInterface $LessonRepository,
        ArticleRepositoryInterface $ArticleRepository
        )
    {
        $this->CategoryRepository = $CategoryRepository;
        $this->TrackRepository = $TrackRepository;
        $this->LessonRepository = $LessonRepository;
        $this->ArticleRepository = $ArticleRepository;
    }
    public function index()
    {
        
        $HomeCategory = $this->CategoryRepository->GetHome();
        $HomeTracks = $this->TrackRepository->GetMaster();

        $TracksNum = $this->TrackRepository->GetNum();
        $CategoriesNum = $this->CategoryRepository->GetNum();

        $LessonsNum = $this->LessonRepository->GetNum();
        $ArticlesNum = $this->ArticleRepository->GetNum();

        $LessonHome = $this->LessonRepository->home();
        $ArticleHome = $this->ArticleRepository->home();
        return view('front.home.index', compact(
            ['HomeTracks','HomeCategory','TracksNum','CategoriesNum','LessonsNum','ArticlesNum','LessonHome','ArticleHome']
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
