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

Route::group(['namespace' => 'front','middleware'=>'front'], function () {

    Route::get('/articles', 'HomeController@index')->name('.articles');
    Route::get('/article/{id}', 'HomeController@article')->name('article');
    Route::get('/articles/{slug}', 'HomeController@getArticleByCategory')->name('articlesByCategory');
    Route::get('/articles/date/{slug}', 'HomeController@getArticleByDate')->name('getArticleByDate');
    Route::get('/articles/tag/{slug}', 'HomeController@getPostsByTags')->name('getPostsByTags');
    Route::post('/post/comment', 'HomeController@postComment')->name('postcomment');
    Route::get('/SearchQuery', 'HomeController@search')->name('search');
    Route::post('/subscribe', 'HomeController@subscribe')->name('subscribe');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('posts', 'PostsController');

Route::resource('postCategories', 'PostCategoryController');

Route::resource('comments', 'CommentsController');

Route::resource('tags', 'TagsController');

Route::resource('postTags', 'PostTagsController');