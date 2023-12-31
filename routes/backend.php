<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\Home\HomeController;
use App\Http\Controllers\admin\admin\AdminController;
use App\Http\Controllers\admin\Article\ArticleController;
use App\Http\Controllers\admin\Article\CategoryController;

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


Route::group(['prefix'=>'Adminstration','middleware'=>['auth','IsAdmin']], function(){

    Route::get('/', [HomeController::class, 'index'])->name('admin.index');
    Route::get('/home', [HomeController::class, 'index'])->name('admin.home');
    Route::get('/Profile', [HomeController::class, 'index'])->name('AdminProfile');
    Route::post('admins/mass', [AdminController::class, 'massDelete'] )->name('admin.massDelete');

    Route::resources([
        'admins' => AdminController::class,
        'cat' => CategoryController::class,
        'article' => ArticleController::class,



    ]);
});

require __DIR__.'/auth.php';
?>
