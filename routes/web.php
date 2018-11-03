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

Route::get('/', function () {
    return view('welcome');
});

//商家分类
Route::resource('classified','AdminControllers\ClassifiedController');
//商家管理
Route::resource('business','AdminControllers\BusinessController');
//商家审核
Route::resource('examine','AdminControllers\ExamineController');
//管理员
Route::resource('admin','AdminControllers\AdminController');
//禁用商家用户
Route::post('/account/{disable}','AdminControllers\AccountController@disable')->name('account.disable');
//商家用户
Route::resource('account','AdminControllers\AccountController');
//活动管理
Route::resource('activity','AdminControllers\ActivityController');
//管理员登录
Route::get('login.destroy','AdminControllers\loginController@destroy')->name('login');
Route::get('login.edit','AdminControllers\loginController@edit')->name('login/edit');
Route::get('login','AdminControllers\loginController@index')->name('login/index');
Route::post('login.update','AdminControllers\loginController@update')->name('update');
Route::post('login.store','AdminControllers\loginController@store')->name('store');
//Route::resource('login','AdminControllers\LoginController');


