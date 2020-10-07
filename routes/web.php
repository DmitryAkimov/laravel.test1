<?php

use Illuminate\Support\Facades\Route;
use App\Project;
use App\Employee;
use Illuminate\Support\Facades\Http;

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

Route::resource('project', 'ProjectController');
Route::get('project/all', 'ProjectController@indexAll');
Route::get('projects', 'ProjectController@indexAll');

Route::resource('employee', 'EmployeeController');
Route::resource('staff', 'EmployeeController');

Route::post('funds_request/store', 'FundsRequestController@store');

Route::get('funds_request/handleCreate', 'FundsRequestController@handleCreate');

Route::resource('funds_request', 'FundsRequestController');

Route::get('/demo', function () {

  return view('demo');
});

Route::get('/test', function () {
  //$response1C = Http::withBasicAuth('webreader', 'webreader')->post('http://m1c-dev1/1cdev-zup-uu/hs/funds_request/create?'. http_build_query (['a' => 'b', 'c'=>'d']) );
  $response1C = Http::withBasicAuth('webreader', 'webreader')->post('http://m1c-dev1/1cdev-zup-uu/hs/funds_request/create?', ['a' => 'b', 'c'=>'d'] );

  return  $response1C->body() . $response1C->status()         ;
  //return view('test');
});

Route::get('/info', function () {
  phpinfo();
});

Route::get('/bi', function () {
  return view('bi_index');
});