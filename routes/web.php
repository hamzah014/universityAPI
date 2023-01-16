<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentApiController;

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
    return view('auth.login');
});
    
Auth::routes();

Route::group(['middleware' => 'auth'], function() {
    
    Route::get('/', function () {
        return view('home');
    });

    Route::get('/student/list', [StudentController::class, 'index'])->name('student.list');
    Route::get('/student/register', [StudentController::class, 'register'])->name('student.register');
    Route::get('/student/view/{id}', [StudentController::class, 'show'])->name('student.shows');
    Route::get('/student/{id}', [StudentController::class, 'delete'])->name('student.delete');
    Route::get('/home', [HomeController::class, 'index'])->name('home');

});
