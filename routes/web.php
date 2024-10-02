<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Admin\DashboardController;

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Auth::routes();


Route::get('/posts/show/{id}', [PostController::class, 'show'])->name('posts.show');
Route::get('/posts', [PostController::class, 'index'])->name('posts');

// Posts
Route::group(['middleware' => 'auth'], function(){
Route::get('/posts/manage', [PostController::class, 'manage'])->name('posts.manage');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/edit/{postId}', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/update/{postId}', [PostController::class, 'update'])->name('posts.update');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.delete');

});


Route::group(['middleware' => ['admin'], 'prfix' => 'admin','as' => 'admin.'],function(){
		Route::get('/admin/dashboard', [DashboardController::class, 'index'])->middleware('admin')->name('dashboard');
});
