<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');


Route::any('/news/list', 'NewsController@getNews');

Route::get('/news/{id}', 'NewsController@getNewById');
Route::post('/news', 'NewsController@postNewById');

Route::post('/news/delete', 'NewsController@delete');

Route::post('/news/update', 'NewsController@update');

Route::post('/news/create', 'NewsController@create');
