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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// companies routes
Route::post('/company', 'App\Http\Controllers\CompanyController@create');
Route::get('/companies', 'App\Http\Controllers\CompanyController@getAll')->name('get.company');
Route::get('/company/{id}', 'App\Http\Controllers\CompanyController@getOne');
Route::put('/company/{id}', 'App\Http\Controllers\CompanyController@update');
Route::delete('/company/{id}', 'App\Http\Controllers\CompanyController@delete');

// employees routes
Route::post('/employee', 'App\Http\Controllers\EmployeeController@create');
Route::get('/employees', 'App\Http\Controllers\EmployeeController@getAll');
Route::get('/employee/{id}', 'App\Http\Controllers\EmployeeController@getOne');
Route::put('/employee/{id}', 'App\Http\Controllers\EmployeeController@update');
Route::delete('/employee/{id}', 'App\Http\Controllers\EmployeeController@delete');
