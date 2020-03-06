<?php

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

Route::get('/', 'DiaryController@index')->name('diary.index'); //追加
//一覧以外のページはログインしていないと表示（実行）できない様に変更
Route::group(['middleware' =>'auth'], function(){
Route::get('diary/create', 'DiaryController@create')->name('diary.create'); //投稿画面
Route::post('diary/create', 'DiaryController@store')->name('diary.create'); //保存処理

Route::delete('diary/{diary}/delete', 'DiaryController@destroy')->name('diary.destroy');//削除機能
Route::get('diary/{diary}/edit', 'DiaryController@edit')->name('diary.edit');//編集
Route::put('diary/{diary}/update', 'DiaryController@update')->name('diary.update');//更新機能

});


Auth::routes();

