<?php

use Illuminate\Support\Facades\Route;
use App\Project;

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

Route::resource('employee', 'EmployeeController');
Route::resource('staff', 'EmployeeController');

Route::get('/demo', function () {
    
    return view('demo');
 });

 Route::get('/test', function () {
    
    Project::testSQL();
 });

 Route::get('/info', function () {
    
   phpinfo();
 });
