<?php

use App\Http\Controllers\AdminCategoriesController;
use App\Http\Controllers\AdminMediasController;
use App\Http\Controllers\AdminPostsController;
use App\Http\Controllers\AdminUsersController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('admin/users', AdminUsersController::class)->middleware('admin');
Route::resource('admin/posts', AdminPostsController::class)->middleware('admin');
Route::resource('/admin/categories', AdminCategoriesController::class)->middleware('admin');
Route::resource('/admin/media', AdminMediasController::class)->middleware('admin');
// Route::get('/admin/media/upload', [App\Http\Controllers\AdminMediasController::class, 'store'])->name('admin.media.upload')->middleware('admin');

Route::get('/admin', function () {
    
    return view('admin.index');

})->name('admin');
  