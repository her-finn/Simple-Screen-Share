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
    return view('welcome');
});
Route::get('/test', function () {
    return view("test");
});
#Route::get('test-neu/{id}',[App\Http\Controllers\TestneuController::class,"main"]); 

#Neuer Stream
Route::get("new/",[App\Http\Controllers\CreateStreamController::class,"showCreatePage"]);
Route::get("new/{id}/secondClientId",[App\Http\Controllers\CreateStreamController::class,"secondClientId"]);
Route::post("new/",[App\Http\Controllers\CreateStreamController::class,"createStream"]);
Route::put("new/",[App\Http\Controllers\CreateStreamController::class,"firstCreateStream"]);

#Client Stream join
Route::get("stream/{id}",[App\Http\Controllers\ClientController::class,"streamPage"])->where(["id"=>'[0-9]{6}$']);
Route::get("stream/{id}/data",[App\Http\Controllers\ClientController::class,"getStreamData"])->where(["id"=>'[0-9]{6}$']);
Route::post("stream/{id}",[App\Http\Controllers\ClientController::class,"setStreamData"])->where(["id"=>'[0-9]{6}$']);