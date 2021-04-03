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

//トーク画面
Route::middleware(['auth:sanctum', 'verified'])->get('/chat', function () {
    return view('chat/talk');
})->name('talk');

//コメント登録処理
Route::post('/send', 'CommentController@store')->name('send');

//非同期通信処理
Route::get('/result/ajax', 'CommentController@getData');