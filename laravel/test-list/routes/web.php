<?php

use Illuminate\Support\Facades\Route;

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

use Illuminate\Support\Facades\Validator;
use App\Models\Task;

use Illuminate\Http\Request;

/**
 * Display All Tasks
 */
Route::get('/', 'App\Http\Controllers\Task\TaskController@displayTasks' );
    
 //
  


/**
 * Add A New Task
 */
Route::post('/task', 'App\Http\Controllers\Task\TaskController@addTasks');

/**
 * Delete An Existing Task
 */
Route::delete('/task/{id}', 'App\Http\Controllers\Task\TaskController@deleteTasks');