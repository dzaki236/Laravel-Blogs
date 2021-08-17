<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
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
Route::get('/admin',[AdminController::class,'index'])->name('dashboard')->middleware('role:admin');
// Route::get('/my-dashboard/id/{id}', [UserController::class, 'edit_profile'])->name('my-dashboard');

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
    dd('cleared!');
});
