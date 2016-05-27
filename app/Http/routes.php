<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'ShowTimeController@welcome');


// wechat server verify
Route::any('/wechat', 'WechatController@serve');


Route::post('/artwork/add', 'ArtWorkController@add');

Route::get('/artwork/{artwork_md5}', 'ArtWorkController@show');

Route::post('/artwork/like/{artwork_md5}', 'ArtWorkController@addLikeByArtworkMD5');