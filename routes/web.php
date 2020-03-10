<?php

use Illuminate\Support\Facades\Route;

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
    return view('paintjobs.index');
});

Route::resource("paintjobs","PaintJobController");
Route::get('/getPaintJobs','PaintJobController@getPaintJobs');
Route::get('/getPaintQueues','PaintJobController@getPaintQueues');
Route::get('/getShopPerformance','PaintJobController@getShopPerformance');
Route::resource("paintqueues","PaintQueueController");
Route::get('updatejobs/{id}','PaintJobController@updateJobs');