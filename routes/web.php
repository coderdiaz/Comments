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
use App\Article;


Route::get('/', function () {
    $article = Article::find(1);

    return view('article', [
        'article' => $article
    ]);
});
Route::get('articles', ['uses' => 'ArticlesController@index', 'as' => 'articles']);
Route::post('articles/{info}', 'ArticlesController@store');
Route::post('comments', 'CommentsController@store');