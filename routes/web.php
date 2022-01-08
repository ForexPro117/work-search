<?php

use App\Http\Controllers\ResponseController;
use App\Http\Controllers\WorkController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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


Route::view('/', 'home')
    ->name('main');

Route::view('/s', 'createWork');
Route::view('/ss', 'response');
Route::post('/res/',[WorkController::class, 'list']);
Route::get('/response', [ResponseController::class, 'create'])
    /*->middleware('auth')*/
    ->name('response');
Route::post('/response', [ResponseController::class, 'make'])
    /*->middleware('auth')*/
    ->name('response');

Route::get('/work', [WorkController::class, 'create'])
    /*->middleware('auth')*/
    ->name('work');
Route::post('/work', [WorkController::class, 'make'])
    /*->middleware('auth')*/
    ->name('work');
require __DIR__ . '/auth.php';
