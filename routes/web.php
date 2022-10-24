<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\blog_controller;

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
    return redirect('/panel');
});

Route::get('/panel', [blog_controller::class, 'index'])->name('admin.panel');
Route::post('/panel/create_user', [blog_controller::class, 'create_user'])->name('panel.create_user');
Route::post('/panel/create_post_with_id', [blog_controller::class, 'create_post_with_id'])->name('panel.create_post_with_id');
Route::post('/panel/create_answer_with_id', [blog_controller::class, 'create_answer_with_id'])->name('panel.create_answer_with_id');

Route::get('/blog', [blog_controller::class, 'blog'])->name('blog');
Route::get('/blog/post_info/{id}', [blog_controller::class, 'post_info'])->name('blog.post_info');