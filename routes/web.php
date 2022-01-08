<?php

use App\Http\Controllers\ResponseController;
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


Route::view('/', 'home')
    ->name('main');

Route::view('/s', 'createWork');
Route::view('/ss', 'response');

Route::get('/response', [ResponseController::class, 'create'])
    /*->middleware('auth')*/
    ->name('response');
Route::post('/response', [ResponseController::class, 'make'])
    /*->middleware('auth')*/
    ->name('response');
require __DIR__ . '/auth.php';
