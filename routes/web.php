<?php

use Illuminate\Support\Facades\Route;
// Task Controller
use App\Http\Controllers\TaskController;

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

Route::get('/', [TaskController::class, 'index']);

// Creates a new task
Route::post('/task/create', [TaskController::class, 'create']);
// Delete a task
Route::get('/task/delete/{id}', [TaskController::class, 'delete'])->whereNumber('id');
