<?php

namespace App\Http\Controllers\front\Article;
use App\Models\Article;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Repositories\Interfaces\ArticleRepositoryInterface;
use Illuminate\Support\Facades\Html;



class ArticleController extends Controller
{
    private ArticleRepositoryInterface $ArticleRepository;

    /**
     * Display a listing of the resource.
     */
    public function __construct(ArticleRepositoryInterface $ArticleRepository)
    {
        $this->ArticleRepository = $ArticleRepository;
    }

    public function index($slug)
    {

        $data = $this->ArticleRepository->getbySlug($slug);
        return view('front.article.index', compact('data'));
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
