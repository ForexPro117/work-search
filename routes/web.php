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
    ->name('home');
Route::view('/q', 'banner');
Route::get('/workList',[WorkController::class, 'list']);

Route::post('/workList',[WorkController::class, 'serachList']);

Route::get('/response', [ResponseController::class, 'create'])
    ->middleware('auth')
    ->name('response');
Route::post('/response', [ResponseController::class, 'make'])
    ->middleware('auth')
    ->name('response');

Route::get('/work', [WorkController::class, 'create'])
    ->middleware('auth','can:create-work')
    ->name('work');
Route::post('/work', [WorkController::class, 'make'])
    ->middleware('auth','can:create-work')
    ->name('work');
require __DIR__ . '/auth.php';
