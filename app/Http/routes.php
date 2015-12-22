<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use Illuminate\Http\Request;


Route::get('/', function () {
    return view('welcome');
});

Route::post('/api/register', 'UserController@store');
Route::post('/api/login', 'Auth\AuthenticateController@postLogin');

// test route for jwt auth middleware
Route::get('/api/testJwt', ['middleware'=>'jwt.auth', function(Request $request) {
	return response()->json(['message'=>'Works!', 'username' => $request->user()->username], 200);
}]);
