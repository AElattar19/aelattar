<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\front\Home\HomeController;
use App\Http\Controllers\front\Home\SearchController;
use App\Http\Controllers\front\Course\TrackController;
use App\Http\Controllers\front\Article\ArticleController;
use App\Http\Controllers\front\Article\CategoryController;
use App\Http\Controllers\front\Contact\ContactUsController;



Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/Library/{slug}', [CategoryController::class, 'index'] )->name('CategoryHome');
Route::get('/Track/{slug}', [TrackController::class, 'index'] )->name('TracksHome');
Route::get('/Library/Article/{slug}', [ArticleController::class, 'index'] )->name('ArticleDetalies');
Route::get('/ContactUs', [ContactUsController::class, 'index'] )->name('ContactUs');
Route::post('/send', [ContactUsController::class, 'store'] )->name('ContactUsStore');
Route::get('/search', [SearchController::class, 'search'])->name('search');

require __DIR__.'/auth.php';
