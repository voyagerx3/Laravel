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

// Route::get('/', function () {
//     return view('welcome');
// });

 

Auth::routes();
Route::group(['middleware'=>'auth'],function(){
    
    Route::name('home')->get('/home', 'HomeController@index');
    Route::name('create_post_path')->get('/post/create', 'PostController@create');
    Route::name('store_post_path')->post('/post', 'PostController@store');
    Route::name('edit_post_path')->get('/post/{post}/edit', 'PostController@edit');
    Route::name('update_post_path')->put('/posts/{post}', 'PostController@update');
    Route::name('delete_post_path')->delete('/posts/{post}', 'PostController@delete');
    Route::name('create_comment_path')->post('/posts/{post}/comments', 'PostCommentsController@create');


});

Route::name('posts_path')->get('/', 'PostController@index');
Route::name('posts_path')->get('/posts','PostController@index');
Route::name('post_path')->get('/post/{post}','PostController@show');

