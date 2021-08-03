<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

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

// 一覧表示
// 下3つは同じ意味
// Route::get('/', ['App\Http\Controllers\PostController', 'index']);
// Route::get('/', [App\Http\Controllers\PostController::class, 'index']);
Route::get('/', [PostController::class, 'index'])
    -> name('posts.index');

// 詳細画面表示
// Route::get('/posts/{id}', [PostController::class, 'show'])
//     -> name('posts.show');
Route::get('/posts/{post}', [PostController::class, 'show'])
    -> name('posts.show')
    -> where('post', '[0-9]+');

// 追加画面
Route::get('/posts/create', [PostController::class, 'create'])
    -> name('posts.create');

// 追加処理
Route::post('/posts/store', [PostController::class, 'store'])
    -> name('posts.store');


// 編集画面
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])
-> name('posts.edit')
-> where('post', '[0-9]+');


// 更新処理
Route::patch('/posts/{post}/update', [PostController::class, 'update'])
-> name('posts.update')
-> where('post', '[0-9]+');


// 更新処理
Route::delete('/posts/{post}/destroy', [PostController::class, 'destroy'])
-> name('posts.destroy')
-> where('post', '[0-9]+');


// コメント新規作成
Route::post('/posts/{post}/comments', [CommentController::class, 'store'])
-> name('comments.store')
-> where('post', '[0-9]+');


// コメント削除
Route::delete('/comments/{comment}/destroy', [CommentController::class, 'destroy'])
-> name('comments.destroy')
-> where('comments', '[0-9]+');
