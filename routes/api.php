<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
;



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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//Route::any('request_otp', 'Api\UserController@requestOtp');
Route::post('/save-product', 'ProductController@saveProduct');
Route::get('/get-product', 'ProductController@getProduct');
Route::get('/edit-product/{id}', 'ProductController@editProduct');
Route::put('/update-product/{id}', 'ProductController@update');
Route::post('/update-product/{id}', 'ProductController@update');
Route::delete('/delete-product/{id}', 'ProductController@destroy');



