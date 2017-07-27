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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::auth();

Route::group(['prefix'=>'admin'],function(){
    Route::group(['prefix'=>'category'],function(){
        Route::get('list',['as'=>'admin.category.list','uses'=>'Admin\CategoryController@index']);
        Route::get('create',['as'=>'admin.category.create','uses'=>'Admin\CategoryController@create']);
        Route::post('store',['as'=>'admin.category.store','uses'=>'Admin\CategoryController@store']);
        Route::get('delete/{id}',['as'=>'admin.category.delete','uses'=>'Admin\CategoryController@destroy']);
        Route::get('edit/{id}',['as'=>'admin.category.edit','uses'=>'Admin\CategoryController@edit']);
        Route::post('update/{id}',['as'=>'admin.category.update','uses'=>'Admin\CategoryController@update']);
    });

    Route::group(['prefix'=>'posttype'],function(){
        Route::get('list',['as'=>'admin.posttype.list','uses'=>'Admin\PosttypeController@index']);
        Route::get('create',['as'=>'admin.posttype.create','uses'=>'Admin\PosttypeController@create']);
        Route::post('store',['as'=>'admin.posttype.store','uses'=>'Admin\PosttypeController@store']);
        Route::get('delete/{id}',['as'=>'admin.posttype.delete','uses'=>'Admin\PosttypeController@destroy']);
        Route::get('edit/{id}',['as'=>'admin.posttype.edit','uses'=>'Admin\PosttypeController@edit']);
        Route::post('update/{id}',['as'=>'admin.posttype.update','uses'=>'Admin\PosttypeController@update']);
    });

    Route::group(['prefix'=>'config'],function(){
        Route::get('list',['as'=>'admin.config.list','uses'=>'Admin\ConfigController@index']);
        Route::get('create',['as'=>'admin.config.create','uses'=>'Admin\ConfigController@create']);
        Route::post('store',['as'=>'admin.config.store','uses'=>'Admin\ConfigController@store']);
        Route::get('delete/{id}',['as'=>'admin.config.delete','uses'=>'Admin\ConfigController@destroy']);
        Route::get('edit/{id}',['as'=>'admin.config.edit','uses'=>'Admin\ConfigController@edit']);
        Route::post('update/{id}',['as'=>'admin.config.update','uses'=>'Admin\ConfigController@update']);
    });

    Route::group(['prefix'=>'post'],function(){
        Route::get('list',['as'=>'admin.post.list','uses'=>'Admin\PostController@index']);
        Route::get('create',['as'=>'admin.post.create','uses'=>'Admin\PostController@create']);
        Route::post('store',['as'=>'admin.post.store','uses'=>'Admin\PostController@store']);
        Route::get('delete/{id}',['as'=>'admin.post.delete','uses'=>'Admin\PostController@destroy']);
        Route::get('edit/{id}',['as'=>'admin.post.edit','uses'=>'Admin\PostController@edit']);
        Route::post('update/{id}',['as'=>'admin.post.update','uses'=>'Admin\PostController@update']);
        Route::get('delImg/{id}',['as'=>'admin.post.delImg','uses'=>'Admin\PostController@getDelImg']);
    });

});

Route::get('/', 'HomeController@index');
