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


Route::group(['middleware' => ['auth', 'admin']], function () {
	//dashboard routes
	Route::resource('dashboard', 'DashboardController');
	Route::resource('posts', 'PostsController');
	Route::resource('category', 'CategoryController');
	Route::resource('tags', 'TagsController');
	Route::resource('user', 'UserController');
	Route::delete('post/delete', ['uses' => 'PostsController@postDeleteAll', 'as' => 'postDeleteAll']);
	Route::delete('categories/delete', ['uses' => 'CategoryController@categoryDeleteAll', 'as' => 'categoryDeleteAll']);
	Route::delete('tag/delete', ['uses' => 'TagsController@tagsDeleteAll', 'as' => 'tagsDeleteAll']);
});

Route::get('users/logout',function(){
	Auth::logout();
	return redirect('/');
});

//frontend pages
Route::get('auth/login', ['uses' => 'PagesController@login', 'as' => 'login']);
Route::post('auth/login', ['uses' => 'PagesController@authenticate', 'as' => 'authenticate']);
Route::get('auth/logout', ['uses' => 'PagesController@logout', 'as' => 'logout']);

Route::get('/', ['uses' => 'PagesController@home', 'as' => 'home']);
Route::get('/top-posts', ['uses' => 'PagesController@top_posts', 'as' => 'top_post']);
Route::get('latest-posts', ['uses' => 'PagesController@latest', 'as' => 'latest']);
Route::get('post/{id}', ['uses' => 'PagesController@single', 'as' => 'single']);


//installation
Route::get('setup', ['uses' => 'DashboardController@setup', 'as' => 'setup']);
Route::post('install', ['uses' => 'DashboardController@install', 'as' => 'install']);

/**
 * Site part Start
 */
Route::post('post/paginate', ['uses' => 'SitePostsController@getNextPosts']);
Route::post('post/top-posts-paginate', ['uses' => 'SitePostsController@topPostGetNextPosts']);
Route::post('post/like/store', ['uses' => 'LikesController@store']);

Route::post('site-post','SitePostsController@store');

Route::get('user-post/create','SitePostsController@userCreatePost');
Route::get('tag/{tag}','TagsController@relatedTags');
Route::get('search','SitePostsController@search');

Route::get('users/register','SiteUsersController@register');
Route::post('users/register','SiteUsersController@registerAccount');

Route::get('users/login','SiteUsersController@login');
Route::post('users/login','SiteUsersController@loginAccount');
/**
 * Site part End
 */