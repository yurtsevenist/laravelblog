<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

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
    return view('main');
});

Route::get('blog',[Controller::class,'blog'])->name('blog');
Route::get('blogdetail/{id}',[Controller::class,'blogdetail'])->name('blogdetail');
Route::get('likeBlog',[Controller::class,'likeBlog'])->name('likeBlog');
Route::get('dislikeBlog',[Controller::class,'dislikeBlog'])->name('dislikeBlog');
Route::post('commentPost',[Controller::class,'commentPost'])->name('commentPost');