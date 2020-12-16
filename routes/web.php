<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AlbumController;

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
});

Route::get('/posts', [PostController::class, 'list'])
    ->name('post.list');
    
Route::get('/posts/{post}', [PostController::class, 'post'])
    ->name('post.detail');

Route::get('/users', [UserController::class, 'list'])
    ->name('user.list');
    
Route::get('/users/{user}', [UserController::class, 'user'])
    ->name('user.detail');

Route::get('/albums', [AlbumController::class, 'list'])
    ->name('album.list');
    
Route::get('/albums/{album}', [AlbumController::class, 'album'])
    ->name('album.detail');

Route::get('/todos', [TodoController::class, 'list'])
    ->name('todo.list');
    
Route::get('/todos/{todo}', [TodoController::class, 'todo'])
    ->name('todo.detail');
