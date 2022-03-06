<?php

use App\Http\Controllers\DiaryPostController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
//use Auth;

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
})->name('welcome');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('diary', DiaryPostController::class)->middleware('auth');

Auth::routes();
