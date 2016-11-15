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



Route::get('/news/{id}'             , 'NewsController@getNewById');
Route::get('/news'                  , 'NewsController@getViewNews');







//Route::any('/news/list'                 , 'NewsController@getNews');
//
//
//Route::post('/news'                     , 'NewsController@postNewById');
//Route::post('/news/create'              , 'NewsController@create');
//Route::post('/news/update'              , 'NewsController@update');
//Route::post('/news/delete'              , 'NewsController@delete');




