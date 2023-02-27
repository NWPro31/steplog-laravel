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
    Route::get('/hostings/{hosting}/edit', 'EditController');
    Route::patch('/hostings/{hosting}', 'UpdateController');
    Route::delete('/hostings/{hosting}', 'DestroyController');
    Route::get('hostings', 'IndexController');
    Route::post('hostings', 'StoreController');
});

Route::group([
    'namespace' => 'App\Http\Controllers\Domain',
    'middleware' => 'api'

], function ($router) {
    Route::get('/domains/{domain}/edit', 'EditController');
    Route::patch('/domains/{domain}', 'UpdateController');
    Route::delete('/domains/{domain}', 'DestroyController');
    Route::get('domains', 'IndexController');
    Route::post('domains', 'StoreController');
});

Route::group([
    'namespace' => 'App\Http\Controllers\Domain\Reg',
    'middleware' => 'api'

], function ($router) {
    Route::get('/domain/regs/{domainReg}/edit', 'EditController');
    Route::patch('/domain/regs/{domainReg}', 'UpdateController');
    Route::delete('/domain/regs/{domainReg}', 'DestroyController');
    Route::get('domain/regs', 'IndexController');
    Route::post('domain/regs', 'StoreController');
});

Route::group([
    'namespace' => 'App\Http\Controllers\Service',
    'middleware' => 'api'

], function ($router) {
    Route::get('/services/{service}/edit', 'EditController');
    Route::patch('/services/{service}', 'UpdateController');
    Route::delete('/services/{service}', 'DestroyController');
    Route::get('services', 'IndexController');
    Route::post('services', 'StoreController');
});

Route::group([
    'namespace' => 'App\Http\Controllers\Service\Order',
    'middleware' => 'api'

], function ($router) {
    Route::get('/order_services/{orderService}/edit', 'EditController');
    Route::get('/order_services/{orderService}', 'ShowController');
    Route::patch('/order_services/{orderService}', 'UpdateController');
    Route::get('order_services', 'IndexController');
    Route::post('order_services', 'StoreController');
});

Route::group([
    'namespace' => 'App\Http\Controllers\Service\Order\Comment',
    'middleware' => 'api'

], function ($router) {
    Route::get('/comment_order_services/{commentOrder}', 'IndexController');
    Route::post('comment_order_services', 'StoreController');
});

/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/
