<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\front\Home\HomeController;
use App\Http\Controllers\front\Article\CategoryController;

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

// 

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/{slug}', [CategoryController::class, 'index'] )->name('CategoryHome');


require __DIR__.'/auth.php';
