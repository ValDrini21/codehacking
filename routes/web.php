<?php

use App\Http\Controllers\AdminCategoriesController;
use App\Http\Controllers\AdminMediasController;
use App\Http\Controllers\AdminPostsController;
use App\Http\Controllers\AdminUsersController;
use App\Http\Controllers\CommentRepliesController;
use App\Http\Controllers\PostCommentsController;
use App\Models\CommentReply;
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

Route::resource('admin/comments', PostCommentsController::class)->middleware('admin');
Route::resource('admin/comment/replies', CommentRepliesController::class)->middleware('admin');

Route::post('comment/reply', [App\Http\Controllers\CommentRepliesController::class, 'createReply'])->middleware('auth');

Route::get('/post/{id}', [App\Http\Controllers\AdminPostsController::class, 'post'])->name('home.post');

// Route::get('/admin', function () {
    
//     return view('admin.index');

// })->name('admin');
  
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin')->middleware('admin');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::delete('admin/delete/media', [\App\Http\Controllers\AdminMediasController::class, 'deleteMedia']);