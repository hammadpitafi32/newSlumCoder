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



Route::group(['namespace' => 'front','middleware'=>'front'], function () {

	Route::get('/', 'HomeController@index');
	Route::get('/signin', 'HomeController@signin')->name('signin');
	Route::get('/usersignup', 'HomeController@signup')->name('userSignup');
    Route::get('/articles', 'HomeController@index')->name('.articles');
    Route::get('/article/{slug}', 'HomeController@article')->name('article');
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
    Route::get('/policy', 'HomeController@policy')->name('policy');
    Route::get('/contact', 'HomeController@contact')->name('contact');
    Route::post('/postcontact', 'HomeController@contactMe')->name('contactme');

});


Auth::routes();
Route::group(['middleware' => ['role:super-admin|writer']], function () {
    
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/profile', 'HomeController@profile')->name('profile');
    Route::get('/change/password', 'HomeController@changePassword')->name('changepassword');
    Route::any('post/change/password', 'UsersController@postChangePassword')->name('users.postChangePassword');

    Route::resource('posts', 'PostsController');

    Route::resource('postCategories', 'PostCategoryController');

    Route::resource('comments', 'CommentsController');

    Route::resource('tags', 'TagsController');

    Route::resource('postTags', 'PostTagsController');
    Route::any('users/profile/update/{id}', 'UsersController@updateProfile')->name('users.updateProfile');

});

Route::group(['middleware' => ['role:super-admin']], function () {

    Route::resource('users', 'UsersController');
    Route::resource('roles', 'RolesController');
    Route::resource('permissions', 'PermissionsController');
    Route::resource('contactMes', 'ContactMeController');
    Route::resource('userRoles', 'UserRolesController');
    // Route::get('/telescope', 'HomeController@profile')->name('profile');

});