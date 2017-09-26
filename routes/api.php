<?php
use Illuminate\Http\Request;

/*
 * |--------------------------------------------------------------------------
 * | API Routes
 * |--------------------------------------------------------------------------
 * |
 * | Here is where you can register API routes for your application. These
 * | routes are loaded by the RouteServiceProvider within a group which
 * | is assigned the "api" middleware group. Enjoy building your API!
 * |
 */

Route::post('/csv/upload', 'people\CSVController@store');

Route::resource('people', 'people\PeopleController');

Route::middleware('auth:api')->get('/user', function (Request $request) {
  return $request->user();
});
