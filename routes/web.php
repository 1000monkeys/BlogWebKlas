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

Route::get('/about', function (){
    return View('about');
});


Route::get('/', array(
    'as' => 'index',
    'uses' => 'PostController@index'
));

Route::get('/post/create', array(
    'as' => 'create_post',
    'uses' => 'PostController@create'
));
Route::post('/post/create', array(
    'as' => 'store_post',
    'uses' => 'PostController@store'
));

Route::get('/post/{slug}', array(
    'as' => 'view_post',
    'uses' => 'PostController@show'
));

Route::get('/posts', array(
    'as' => 'list_post',
    'uses' => 'PostController@listPosts'
));


Route::get('/user/create', array(
    'as' => 'create_user',
    'uses' => 'UserController@create'
));
Route::post('/user/create', array(
    'as' => 'store_user',
    'uses' => 'UserController@store'
));

Route::post('/user/login', array(
    'as' => 'login_user',
    'uses' => 'UserController@login'
));
Route::get('/user/logout', array(
    'as' => 'logout_user',
    'uses' => 'UserController@logout'
));

Route::post('/comment/create', array(
    'as' => 'comment_create',
    'uses' => 'CommentController@store'
));

