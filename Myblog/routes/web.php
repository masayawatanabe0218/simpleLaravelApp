<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('test.test');
});

Route::get('/test', [PostsController::class, 'test'])->name('test');
Route::get('/posts', [PostsController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostsController::class, 'create'])->name('posts.create');
Route::get('/posts/{post}', [PostsController::class, 'show'])->name('posts.show');
Route::get('/posts/{post}/edit', [PostsController::class, 'edit'])->name('posts.edit');
Route::delete('/posts/{post}', [PostsController::class, 'destroy'])->name('posts.destroy');
Route::put('/posts/{post}/update', [PostsController::class, 'update'])->name('posts.update');
Route::post('/posts', [PostsController::class, 'store'])->name('posts.store');
