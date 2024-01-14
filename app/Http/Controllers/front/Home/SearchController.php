<?php

namespace App\Http\Controllers\front\Home;

use App\Models\Article;
use App\Models\Lesson;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\LessonRepositoryInterface;
use App\Repositories\Interfaces\ArticleRepositoryInterface;

class SearchController extends Controller
{
    //
    private LessonRepositoryInterface $LessonRepository;
    private ArticleRepositoryInterface $ArticleRepository;

    public function __construct(LessonRepositoryInterface $LessonRepository,ArticleRepositoryInterface $ArticleRepository )
    {
        $this->LessonRepository = $LessonRepository;
        $this->ArticleRepository = $ArticleRepository;
    }

    public function search(Request $request)
    {
        
        $validate = $request->validate([
            'search_query' => 'required|string',
            'type' => 'nullable|integer',
        ]);
        $search=$request->search_query;
        $type=$request->type;
        if($request->type==1){
            $results = $this->LessonRepository->search($request->search_query);
        }elseif($request->type==2){
            $results = $this->ArticleRepository->search($request->search_query);
        }else{
            $results = $this->LessonRepository->search($request->search_query);
        }
        
        
        return view('front.search.index', compact( ['search','results','type']));
    }

}
