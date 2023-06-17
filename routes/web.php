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

//プロフィール
Route::get('/profile','UsersController@profile');

//プロフィール
Route::get('/users/{data}/profile','UsersController@profile')->name('users.profile');

//ユーザー検索
Route::get('/search','UsersController@search') ->name('users.search');

//フォローリスト
Route::get('/follow-list','FollowsController@followList');

//フォロワーリスト
Route::get('/follower-list','FollowsController@followerList');

//ログイン中のページ
Route::get('/logout','Auth\LoginController@logout');

//投稿を送信する
Route::post('/create','PostsController@create');

//投稿を削除する
Route::get('/posts/{id}/delete','PostsController@delete');

//投稿を編集する
Route::get('/posts/{id}/update', 'PostsController@update')->name('posts.index');
Route::post('/posts/{id}/update', 'PostsController@update')->name('posts.index');

//フォローする
Route::post('/follow', 'FollowsController@follow')->name('follows.follow');

//フォロー解除する
Route::post('/unfollow', 'FollowsController@unfollow')->name('follows.unfollow');
