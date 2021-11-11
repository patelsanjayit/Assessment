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

    Route::get('user/login','Auth\UserAuthController@getLogin')->name('userLogin');
    Route::post('user/login', 'Auth\UserAuthController@postLogin')->name('userLoginPost');
    Route::get('user/logout', 'Auth\UserAuthController@logout')->name('userLogout');

    Route::group(['prefix' => 'user','middleware' => 'userauth'], function () {
        Route::get('dashboard','User\UserController@dashboard')->name('user-dashboard');
        Route::get('profile/{id?}','User\UserController@profile')->name('profile');
        Route::post('user/update','User\UserController@update')->name('update-profile');
    });


    Route::get('admin/login','Auth\AdminAuthController@getLogin')->name('adminLogin');
    Route::post('admin/login', 'Auth\AdminAuthController@postLogin')->name('adminLoginPost');
    Route::get('admin/logout', 'Auth\AdminAuthController@logout')->name('adminLogout');

    Route::group(['prefix' => 'admin','middleware' => 'adminauth'], function () {
    	Route::get('dashboard','AdminController@dashboard')->name('dashboard');
        Route::get('user','UserController@index')->name('user');
        Route::get('user/data','UserController@data')->name('userData');
        Route::get('user/add','UserController@add')->name('addUser');
        Route::post('user/save','UserController@save')->name('saveUser');
        Route::get('user/edit/{id?}','UserController@edit')->name('editUser');
        Route::post('user/update','UserController@update')->name('updateUser');
        Route::get('user/delete/{id}','UserController@delete')->name('deleteUser');

        Route::get('comment','CommentController@index')->name('comment');
        Route::get('comment/data','CommentController@data')->name('commentData');

        Route::get('status','StatusController@index')->name('status');
        Route::get('status/{id}','StatusController@getStatus')->name('getStatus');

        Route::get('setting','SettingController@index')->name('setting');
        Route::post('setting/save','SettingController@save')->name('settingSave');
    });