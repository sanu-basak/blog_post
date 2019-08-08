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

Auth::routes();
Route::post('/blog/{id}','CommentsController@store')->name('add_comment_path');
Route::post('/blog/reply/store','ReplyController@store')->name('add_reply_path');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/blog/list','BlogsController@index')->name('blogs_path');
Route::get('/blogs/create','BlogsController@create')->name('create_blog_path');
Route::post('/blogs/create','BlogsController@store')->name('store.blog.path');
Route::get('/blog/{id}/','BlogsController@show')->name('blog_path');
Route::get('/blogs/{id}/edit','BlogsController@edit')->name('edit_blog_path');
Route::post('/blogs/{id}/edit','BlogsController@update')->name('update_blog_path');
Route::delete('/blogs','BlogsController@destroy')->name('delete_blog_path');
Route::group(['middleware' => ['auth']], function () { 
    
});
