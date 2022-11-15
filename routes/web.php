<?php

use App\Http\Controllers\Task1Controller;
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

Route::get('/', function () {
    return view('welcome');
});

/**
 * Route for the first task (task1)
 */
Route::get("/task1",'App\Http\Controllers\Task1Controller@index')->name("task1");
Route::post("/task1/filter",'App\Http\Controllers\Task1Controller@filter')->name("task1.filter");

/**
 * Route for the senconde task (task2)
 */
Route::get("/task2", 'App\Http\Controllers\Task2Controller@index')->name("task2");



Route::get("/dashboard",function(){
    return view("dashboard");
})->name('dashboard');

require __DIR__.'/auth.php';
