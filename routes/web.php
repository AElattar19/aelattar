<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\front\Home\HomeController;
use App\Http\Controllers\front\Course\TrackController;
use App\Http\Controllers\front\Article\CategoryController;
use App\Http\Controllers\front\Course\CourseController;

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
Route::get('/library/{slug}', [CategoryController::class, 'index'] )->name('CategoryHome');
Route::get('/Track/{slug}', [TrackController::class, 'index'] )->name('TracksHome');
Route::get('/Track/Course/{CourseSlug}', [CourseController::class, 'index'] )->name('CoursesHome');
Route::get('/ContactUs', [HomeController::class, 'contact'] )->name('ContactUs');


require __DIR__.'/auth.php';
