<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WritterController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
// dd(Auth::routes());
/* All Role */
Route::get('/home', function(){
    // Auth::logout();
    return redirect('/');
});
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/{judul}-c_id={id}', [HomeController::class, 'post'])->name('detail_post');
Route::post('/comment',[CommentController::class,'comment'])->name('comment');
Route::delete('/delete-comment/{id}',[CommentController::class,'delete_comment'])->name('delete-comment');
Route::put('/change-role/{id}',[UserController::class,'change_role'])->name('edit-role');

/* Writters role */
Route::get('/writter-dashboard', [WritterController::class, 'index'])->name('writter_dashboard')->middleware('role:writters');
Route::get('/post-writter={id}', [PostController::class, 'detail_post'])->name('detail_post_dashboard')->middleware('role:writters');
Route::get('/post-writter/', [PostController::class, 'post'])->name('post_dashboard')->middleware('role:writters');
Route::get('/add-post', [PostController::class, 'add_post'])->name('add_post_dashboard')->middleware('role:writters');
Route::post('/post-store', [PostController::class, 'post_store'])->name('post_store')->middleware('role:writters');
Route::get('/post-edit-id={id}', [PostController::class, 'post_edit'])->name('post_edit')->middleware('role:writters');
Route::put('/post-update/{id}', [PostController::class, 'post_update'])->name('post_update')->middleware('role:writters');
Route::get('/archive-post/{id}', [PostController::class, 'archive_post'])->name('archive_post')->middleware('role:writters');
Route::post('/unarchive-post/{id}', [PostController::class, 'unarchive_post'])->name('unarchive_post')->middleware('role:writters');
Route::post('/archive-post/{id}', [PostController::class, 'archive_post'])->name('archive_post')->middleware('role:writters');
Route::delete('/delete-post/{id}', [PostController::class, 'delete_post'])->name('delete_post')->middleware('role:writters');
/* Admin role */
Route::get('/admin',[AdminController::class,'index'])->name('dashboard')->middleware('role:admin');
Route::get('/clear',function(){
    Artisan::call('clear-compiled');
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');

    // dd('cleared!');
});
