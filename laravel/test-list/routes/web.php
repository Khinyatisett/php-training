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

  
use App\Http\Controllers\Auth\AuthController;
/**
 * Display All Tasks
 */
//Route::get('/tasks', 'App\Http\Controllers\Task\TaskController@displayTasks' );

/**
 * Add A New Task
 */
//Route::post('/task', 'App\Http\Controllers\Task\TaskController@addTasks');

/**
 * Delete An Existing Task
 */
//Route::delete('/task/{id}', 'App\Http\Controllers\Task\TaskController@deleteTasks');

/**for login */


Route::group(['middleware'=>['auth']],function(){
    Route::get('/tasks', 'App\Http\Controllers\Task\TaskController@displayTasks' );
    Route::post('/task', 'App\Http\Controllers\Task\TaskController@addTasks');
    Route::delete('/task/{id}', 'App\Http\Controllers\Task\TaskController@deleteTasks');
});


//Route::get('/tasks','App\Http\Controllers\Task\TaskController@displayTasks')->middleware('auth');

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
Route::get('dashboard', [AuthController::class, 'dashboard']); 
Route::get('logout', [AuthController::class, 'logout'])->name('logout');