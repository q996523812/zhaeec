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

Route::get('/print/zczl/{id}', 'PrintsController@zczl');
Route::get('/print/sftz/zbf/{id}', 'PrintsController@sftzZbf');
Route::get('/download', 'DownloadsController@download');
