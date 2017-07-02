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

// Route::middleware('auth')->get('/user', function (Request $request) {
//     // return $request->user();
//     dump_var($request);
//     return 'hi';
// });
// Route::group(['middleware'=>'auth:api'],function() {
// 	Route::get('/user',function(Request $request) {
// 		// var_dump($request);	
// 		return 'hi' ;
// 	});
// });

// Route::get('user', );
Route::get('user','ApiController@show');
Route::post('test','ApiController@testresponse');
Route::post('user','ApiController@show');
