<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Admin\DashboardController;

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Posts
Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/show/{id}', [PostController::class, 'show'])->name('posts.show');
Route::get('/posts/all', [HomeController::class, 'allPosts'])->name('posts.all');
Route::get('/posts/edit/{postId}', [PostController::class, 'edit'])->name('posts.edit');
Route::post('/posts/update/{postId}', [PostController::class, 'update'])->name('posts.update');
Route::get('/posts/delete/{postId}', [PostController::class, 'delete'])->name('posts.delete');

// Admin Routes
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->middleware('admin')->name('admin.dashboard');
