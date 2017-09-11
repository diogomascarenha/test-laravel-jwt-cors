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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// HOST/api/authenticate
Route::middleware('api')->post('/authenticate','AuthenticateController@authenticate');
// HOST/api//get-authenticated-user
Route::middleware(['before' => 'jwt.auth'])->get('/get-authenticated-user','AuthenticateController@getAuthenticatedUser');

Route::get('/nao-protegida', function (Request $request) {
    return 'não protegida';
});
//Route::middleware(['before' => 'jwt.auth'])->get('/protegida', function (Request $request) {
Route::middleware('jwt.auth')->get('/protegida', function (Request $request) {
    return 'projegida';
});