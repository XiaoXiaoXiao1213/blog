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





Route::get('/userinform','UserController@userinform');
Route::post('/tecconsulting','UserController@Tec_Consulting');
Route::post('/appregistrations','UserController@app_Registrations');
Route::get('/','UserController@notices');
Route::get('/notices','UserController@notices');
Route::get('/notices/inform','UserController@notice');
Route::get('/','UserController@login');
Route::post('/connect','UserController@connect');

Route::get('/','ClassiController@classification');
Route::get('/','ClassiController@newGoods');
Route::get('/','UserController@thech');

Route::get('/','GoodsController@goodsTable');
Route::get('/goods','GoodsController@goods');
Route::get('/goods','GoodsController@goodsdetail');
Route::get('/goodsmore','GoodsController@goodsmore');
Route::get('/allsearch','GoodsController@allsearch');
Route::get('/namesearch','GoodsController@namesearch');
Route::post('/register','RegisterController@create');