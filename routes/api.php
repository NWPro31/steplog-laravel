<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::group([
    'namespace' => 'App\Http\Controllers',
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});

Route::group([
    'namespace' => 'App\Http\Controllers\User',
    'middleware' => 'api'

], function ($router) {

    Route::post('users', 'IndexController');

});

Route::group([
    'namespace' => 'App\Http\Controllers\Hosting',
    'middleware' => 'api'

], function ($router) {
    Route::get('hostings', 'IndexController');
    Route::post('hostings', 'StoreController');
    Route::get('/hostings/{hosting}/edit', 'EditController');
    Route::patch('/hostings/{product}', 'UpdateController');
});

/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/
