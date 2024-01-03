<?php

namespace App\Http\Controllers\admin\Article;
use App\Models\Article;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Repositories\Interfaces\ArticleRepositoryInterface;



class ArticleController extends Controller
{
    private ArticleRepositoryInterface $repository;

    /**
     * Display a listing of the resource.
     */
    public function __construct(ArticleRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index (Request $request, $id)
    {

        if ($request->ajax()) {

            $menus = Article::query()->where('category_id', $id)->get();
            return DataTables::of($menus)
               ->addIndexColumn()
               ->addColumn('title', function ($row) {
                return $row->title;
                })
                ->addColumn('catogary', function ($row) {
                    return $row->catogary ;
                    })
               ->addColumn('active', function ($row) {
                return $row->rank ;
                })

               ->addColumn('action', function ($menus) {

                   $html = '<a class="btn btn-info btn-sm" href="' . route('news.edit', $menus->id) . '">
                                   <i class="fas fa-pencil-alt">
                                   </i>
                               </a> &nbsp;';

                       $html .= '<form action="' . route('news.destroy', $menus->id) . '"
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
                ->rawColumns(['title','catogary','active','action'])
                ->make(true);
    }
    
    return view('dashboard.article.index', compact('id'));
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
    public function store(StoreArticleRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }
}
