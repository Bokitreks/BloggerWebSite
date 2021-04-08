<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Models\Blog;
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

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/login',[UserController::class,'login'])->name('login');
Route::get('/register',[UserController::class,'register'])->name('register');
Route::get('/myblogs',[BlogController::class,'index'])->name('myblogs');
Route::get('/admin',[AdminController::class,'index'])->name('admin');

Route::post('/registerUser',[UserController::class,'registerUser'])->name('registerUser');
Route::post('/loginUser',[UserController::class,'loginUser'])->name('loginUser');
Route::get('/logout',[UserController::class,'logout'])->name('logout');

Route::post('/createBlog',[BlogController::class,'createBlog'])->name('createBlog');

Route::get('/showBlog/{id}',[BlogController::class,'showBlog'])->name('showBlog');


Route::post('/getApprovedBlogs',[BlogController::class,'getApprovedBlogs']);
Route::post('/getNotApprovedBlogs',[BlogController::class,'getNotApprovedBlogs']);
Route::post('/deleteBlog',[BlogController::class,'deleteBlog']);
Route::get('/showEditBlog/{id}',[BlogController::class,'showEditBlog'])->name('showEditBlog');
Route::post('/updateBlog/{id}',[BlogController::class,'updateBlog']);

Route::get('/getBlogs',[BlogController::class,'getBlogs']);
Route::get('/getUsers',[UserController::class,'getUsers']);

Route::post('/deleteUser',[AdminController::class,'deleteUser']);
Route::post('/deleteBlog',[AdminController::class,'deleteBlog']);
Route::post('/changeBlogStatus',[AdminController::class,'changeBlogStatus']);
