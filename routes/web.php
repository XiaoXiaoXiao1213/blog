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


Route::get('/',function() {
    return view('welcome');
});

//用户信息查询  数组
Route::get('/userinform','UserController@userinform');
//技术咨询  
Route::post('/tecconsulting','UserController@Tec_Consulting');
//合作登记申请
Route::post('/appregistrations','UserController@app_Registrations');
//公告信息
//首页（传入的数据非0）
Route::get('/u','UserController@notices');
//公告信息
//非首页（传入的数据为0）
Route::get('/notices','UserController@notices');

//公告文件  （传入的是公告标题）
Route::get('/notices/inform','UserController@notice');


//用户登录
Route::get('/u','UserController@login');
//联系我们
Route::post('/connect','UserController@connect');


//首页分类  二维数组  大分类是键名
Route::get('/u','ClassiController@classification');

//新品  传入的是类型 没传入数据默认第一个
Route::get('/u','ClassiController@newGoods');

//首页最下面那个   传入1 2 3 4
Route::get('/u','ClassiController@thech');


//首页那个分类点击进去  传入的是点击的那个
Route::get('/goodssearch','GoodsController@goodsTable');
//商品详情 传入商品名称
Route::get('/goods','GoodsController@goods');
//商品详情下面那个表  传入的是商品名称
Route::get('/goods','GoodsController@goodsdetail');

//传入的是类型  首页新品下面更多产品那个
Route::get('/goodsmore','GoodsController@goodsmore');
//全部搜索 传入搜索内容 （页数 类型 品牌） 后面三个可以为空
Route::get('/allsearch','GoodsController@allsearch');
//名称搜索 同上
Route::get('/namesearch','GoodsController@namesearch');

//注册
Route::post('/register','RegisterController@create');