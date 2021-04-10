<?php

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

/*
 * トーク画面
 */
//トーク画面
Route::middleware(['auth:sanctum', 'verified'])->get('/chat', function () {
    return view('chat/talk');
})->name('talk');

//コメント登録処理
Route::middleware(['auth:sanctum', 'verified'])->post('/send', 'CommentController@store')->name('send');

//コメント表示用非同期通信処理
Route::get('/result/ajax', 'CommentController@getData');

//コメント編集画面
Route::middleware(['auth:sanctum', 'verified'])->get('/edit{comment_id}', 'CommentController@edit');

//コメント編集処理
Route::post('/update/comment{comment_id}', 'CommentController@update');

//コメント削除処理
Route::get('/delate/comment{comment_id}', 'CommentController@delate');