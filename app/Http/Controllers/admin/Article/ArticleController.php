<?php

namespace App\Http\Controllers\admin\Article;
use App\Models\Article;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Repositories\Interfaces\ArticleRepositoryInterface;
use App\Repositories\Interfaces\CategoryRepositoryInterface;



class ArticleController extends Controller
{
    private ArticleRepositoryInterface $ArticleRepository;
    private CategoryRepositoryInterface $CategoryRepository; 

    /**
     * Display a listing of the resource.
     */
    public function __construct(
        CategoryRepositoryInterface $CategoryRepository, 
        ArticleRepositoryInterface $ArticleRepository,
        )
    {
        $this->ArticleRepository = $ArticleRepository;
        $this->CategoryRepository = $CategoryRepository;
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

               ->addColumn('rank', function ($row) {
                return $row->rank ;
                })

               ->addColumn('action', function ($menus) {

                   $html = '<a class="btn btn-info btn-sm" href="' . route('article.edit', $menus->id) . '">
                                   <i class="fas fa-pencil-alt">
                                   </i>
                               </a> &nbsp;';

                       $html .= '<form action="' . route('article.destroy', $menus->id) . '"
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
                ->rawColumns(['title','rank','action'])
                ->make(true);
    }
    
    return view('dashboard.article.index', compact('id'));
        }

   

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $categories = $this->CategoryRepository->all();
        return view('dashboard.article.create', compact(['categories', 'id']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'title' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'des' => 'required|string',
            'status' => 'required|integer',
            'youtube' => 'nullable|string',
            'rank' => 'required|integer',
        ];
        $validatedData = $request->validate($data);
        $post = $this->ArticleRepository->create($request->except('image'));

        $image = $post->addMedia($request->file('image'))
                      ->toMediaCollection('article');

        return redirect()->route(['SubOurService', 'category_id']);


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
    public function edit(Request $request, $id)
    {
        $categories = $this->CategoryRepository->all();
        $data = $this->ArticleRepository->getbyid($id);
        return view('dashboard.article.edit', compact(['categories', 'data']));
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
