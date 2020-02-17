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

	Route::get('/signin', 'HomeController@signin')->name('signin');
	Route::get('/usersignup', 'HomeController@signup')->name('userSignup');
    Route::get('/articles', 'HomeController@index')->name('.articles');
    Route::get('/article/{id}', 'HomeController@article')->name('article');
    Route::get('/articles/{slug}', 'HomeController@getArticleByCategory')->name('articlesByCategory');
    Route::get('/articles/date/{slug}', 'HomeController@getArticleByDate')->name('getArticleByDate');
    Route::get('/articles/tag/{slug}', 'HomeController@getPostsByTags')->name('getPostsByTags');
    Route::post('/post/comment', 'HomeController@postComment')->name('postcomment');
    Route::get('/SearchQuery', 'HomeController@search')->name('search');
    Route::post('/subscribe', 'HomeController@subscribe')->name('subscribe');
    Route::post('/userRegister', 'HomeController@register')->name('.userRegister');
    Route::get('/logout', 'HomeController@logout')->name('Logout');
    Route::post('/userlogin', 'HomeController@login')->name('.userlogin');
    Route::get('/about', 'HomeController@about')->name('about');
    Route::get('/contact', 'HomeController@contact')->name('contact');
    Route::post('/postcontact', 'HomeController@contactMe')->name('contactme');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('posts', 'PostsController');

Route::resource('postCategories', 'PostCategoryController');

Route::resource('comments', 'CommentsController');

Route::resource('tags', 'TagsController');

Route::resource('postTags', 'PostTagsController');

Route::resource('contactMes', 'ContactMeController');

Route::resource('roles', 'RolesController');

Route::resource('permissions', 'PermissionsController');

Route::resource('users', 'UsersController');

Route::resource('userRoles', 'UserRolesController');