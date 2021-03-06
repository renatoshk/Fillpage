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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/post/{id}', ['as'=>'home.post', 'uses'=>'HomeController@post']);
Route::get('/category/{id}', ['as'=>'home.category', 'uses'=>'HomeController@category']);
Route::group(['middleware'=>'admin'], function(){
	   Route::get('/admin', 'AdminController@index');
       Route::resource('/admin/users', 'AdminUsersController');
       Route::resource('/admin/posts', 'AdminPostsController');
       Route::resource('/admin/categories', 'AdminCategoriesController');
       Route::resource('/admin/media', 'AdminMediasController');
       Route::resource('/admin/comments', 'PostsCommentController');
       Route::resource('/admin/comments/replies', 'CommentRepliesController');
  
});
Route::group(['middleware'=>'auth'], function(){
  Route::get('/contact', function(){
    return view('contact');
});
    Route::get('/about', function(){
    return view('about');
});
 Route::post('comment/reply', 'CommentRepliesController@createReply');
 Route::resource('/admin/comments', 'PostsCommentController');


  });
