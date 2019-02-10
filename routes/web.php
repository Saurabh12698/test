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
use App\Community;

Route::get('/', function () {
    Community::createIndex($shards = null, $replicas = null);

    Community::putMapping($ignoreConflicts = true);

    Community::addAllToIndex();

    return view('welcome');
});

Route::get('/search', function() {

    $articles = Community::searchByQuery(['match' => ['name' => 'Demetris']]);

    return $articles;
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/new/{post}', 'PostController@show')->name('post');

Route::post('/new/post/img', 'PostController@store')->name('post');


