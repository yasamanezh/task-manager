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
Route::group(['middleware' => ['auth']], function () {

    Route::match(['get','post'],'/',[\App\Http\Controllers\TaskController::class,'tasks'])->name('tasks');
    Route::match(['get','post'],'/task/manager',[\App\Http\Controllers\TaskController::class,'taskManager'])->name('taskManager');
    Route::match(['get','post'],'/task/add',[\App\Http\Controllers\TaskController::class,'add'])->name('AddTask');
    Route::match(['get','post'],'/task/changeStatus/{id}',[\App\Http\Controllers\TaskController::class,'changeStatus'])->name('changeStatus');

});



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
