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

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();


//ログアウト中のページ
//Controllerとつなげる（ルーティング）
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

//ログイン中のページ
Route::get('/top','PostsController@index');

Route::get('/profile','UsersController@profile');

Route::get('/users/{data}/profile','UsersController@profile')->name('users.profile');
//URLが/profileだった場合、UsersControllerのprofileメソッドを読み込む

Route::get('/search','UsersController@search') ->name('users.search');
//URLが/searchだった場合、UsersControllerのsearchメソッドを読み込む

Route::get('/follow-list','FollowsController@followList');
//URLが/follow-listだった場合、FollowsControllerのfollowListメソッドを読み込む

Route::get('/follower-list','FollowsController@followerList');
//URLが/follower-listだった場合、FollowsControllerのfollowerListメソッドを読み込む

Route::get('/logout','Auth\LoginController@logout');


Route::post('/create','PostsController@create');
//URLが/createだった場合、PostsControllerのcreateメソッドを読み込む

Route::get('/posts/{id}/delete','PostsController@delete');
//URLが/deleteだった場合、PostsControllerのdeleteメソッドを読み込む

Route::get('/post/{id}/update', 'PostsController@update')->name('posts.index');
Route::post('/update','PostsController@update');
//URLが/updateだった場合、PostsControllerのupdateメソッドを読み込む

Route::post('users/{user}/follow', 'FollowsController@follow')->name('follow');
//URLが/follow{user}だった場合、FollowsControllerのfollowsメソッドを読み込む

Route::post('users/{user}/unfollow', 'FollowsController@un_follow')->name('unfollow');
//URLが/un_follow{user}だった場合、FollowsControllerのfollowメソッドを読み込む
