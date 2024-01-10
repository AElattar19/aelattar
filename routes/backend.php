<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\Home\HomeController;
use App\Http\Controllers\admin\admin\AdminController;
use App\Http\Controllers\admin\Course\TrackController;
use App\Http\Controllers\admin\Course\LessonController;
use App\Http\Controllers\admin\Article\ArticleController;
use App\Http\Controllers\admin\Setting\SettingController;
use App\Http\Controllers\admin\Article\CategoryController;
use App\Http\Controllers\admin\Contact\ContactUsController;

Route::group(['prefix'=>'Administration','middleware'=>['auth','IsAdmin']], function(){

    Route::get('/', [HomeController::class, 'index'])->name('admin.index');
    Route::get('/home', [HomeController::class, 'index'])->name('admin.home');
    Route::get('/Profile', [HomeController::class, 'index'])->name('AdminProfile');
    Route::post('admins/mass', [AdminController::class, 'massDelete'] )->name('admin.massDelete');
    Route::post('category/mass', [CategoryController::class, 'massDelete'] )->name('category.massDelete');
    Route::get('article/category/{id}', [ArticleController::class, 'index'] )->name('ArticleIndex');
    Route::get('/article/category/create/{id}', [ArticleController::class, 'create'] )->name('CreateNewArticle');
    Route::get('/track/courses/{id}', [TrackController::class, 'track'] )->name('SubTrack');
    Route::get('/track/lesson/{id}', [LessonController::class, 'index'] )->name('TrackLessons');

    Route::resources([
        'admins' => AdminController::class,
        'category' => CategoryController::class,
        'article' => ArticleController::class,
        'setting' => SettingController::class,
        'track' => TrackController::class,
        'lesson' => LessonController::class,
        'ContactUs' => ContactUsController::class,
    ]);
});

require __DIR__.'/auth.php';
?>
