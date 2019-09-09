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
    
    Route::name('home')->get('/home', 'PostController@index');
    Route::name('create_post_path')->get('/post/create', 'PostController@create');
    Route::name('store_post_path')->post('/post', 'PostController@store');
    Route::name('edit_post_path')->get('/post/{post}/edit', 'PostController@edit');
    Route::name('update_post_path')->put('/post/{post}', 'PostController@update');
    Route::name('delete_post_path')->delete('/post/{post}', 'PostController@delete');
    
    
    Route::name('create_category_path')->get('/category/create', 'CategoryController@create');
    Route::name('store_category_path')->post('/category', 'CategoryController@store');
    Route::name('edit_category_path')->get('/category/{category}/edit', 'CategoryController@edit');
    Route::name('update_category_path')->put('/category/{category}', 'CategoryController@update');
    Route::name('delete_category_path')->delete('/category/{category}', 'CategoryController@delete');
     


});

Route::name('posts_path')->get('/', 'PostController@index');
Route::name('posts_path')->get('/posts','PostController@index');
Route::name('post_path')->get('/post/{post}','PostController@show');


Route::name('categories_path')->get('/categories','CategoryController@index');
Route::name('category_path')->get('/category/{category}','CategoryController@show');

