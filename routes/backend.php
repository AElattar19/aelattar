<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\Home\HomeController;
use App\Http\Controllers\admin\admin\AdminController;
use App\Http\Controllers\admin\Course\TrackController;
use App\Http\Controllers\admin\Article\ArticleController;
use App\Http\Controllers\admin\Setting\SettingController;
use App\Http\Controllers\admin\Article\CategoryController;
use App\Http\Controllers\admin\Course\CourseController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::group(['prefix'=>'Administration','middleware'=>['auth','IsAdmin']], function(){

    Route::get('/', [HomeController::class, 'index'])->name('admin.index');
    Route::get('/home', [HomeController::class, 'index'])->name('admin.home');
    Route::get('/Profile', [HomeController::class, 'index'])->name('AdminProfile');
    Route::post('admins/mass', [AdminController::class, 'massDelete'] )->name('admin.massDelete');
    Route::post('category/mass', [CategoryController::class, 'massDelete'] )->name('category.massDelete');
    Route::get('article/category/{id}', [ArticleController::class, 'index'] )->name('SubOurService');
    Route::get('/article/category/create/{id}', [ArticleController::class, 'create'] )->name('CreateNewArticle');
    Route::get('/track/courses/{id}', [CourseController::class, 'track'] )->name('SubTrack');
    Route::get('/track/courses/create/{id}', [CourseController::class, 'create'] )->name('CreateNewCourse');


    Route::resources([
        'admins' => AdminController::class,
        'category' => CategoryController::class,
        'article' => ArticleController::class,
        'setting' => SettingController::class,
        'track' => TrackController::class,
        'courses' => CourseController::class,

    ]);
});

require __DIR__.'/auth.php';
?>
