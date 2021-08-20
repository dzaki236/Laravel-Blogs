<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
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
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/{judul}-id={id}', [HomeController::class, 'post'])->name('detail_post');
Route::get('/admin',[AdminController::class,'index'])->name('dashboard')->middleware('role:admin');
Route::get('/writter-dashboard', [WritterController::class, 'index'])->name('writter-dashboard')->middleware('role:writters');
Route::get('/post-writter={id}', [WritterController::class, 'post'])->name('post-dashboard')->middleware('role:writters');
Route::post('/comment',[CommentController::class,'comment'])->name('comment');
Route::delete('/delete-comment/{id}',[CommentController::class,'delete_comment'])->name('delete-comment');
Route::put('/change-role/{id}',[UserController::class,'change_role'])->name('edit-role');
// Route::get('/logout', function(){
//     Auth::logout();
//     return redirect('/');
// });
Route::get('/home', function(){
    // Auth::logout();
    return redirect('/');
});
Route::get('/clear',function(){
    Artisan::call('clear-compiled');
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');

    // dd('cleared!');
});
