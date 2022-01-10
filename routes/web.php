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


Route::get('/workUserHistory', [ResponseController::class, 'checkUserHistory'])
    ->middleware('auth', 'can:user-history');

Route::get('/workHistory', [ResponseController::class, 'checkHistory'])
    ->middleware('auth', 'can:create-work');

Route::get('/download', [ResponseController::class, 'download'])
    ->middleware('auth')
    ->name('download');

Route::get('/workList', [WorkController::class, 'list']);

Route::post('/workList', [WorkController::class, 'serachList']);

Route::post('/deleteWork', [WorkController::class, 'delete']);

Route::get('/response', [ResponseController::class, 'create'])
    ->middleware('auth')
    ->name('response');
Route::post('/response', [ResponseController::class, 'make'])
    ->middleware('auth')
    ->name('response');

Route::post('/deleteResponse', [ResponseController::class, 'delete']);

Route::get('/work', [WorkController::class, 'create'])
    ->middleware('auth', 'can:create-work')
    ->name('work');
Route::post('/work', [WorkController::class, 'make'])
    ->middleware('auth', 'can:create-work')
    ->name('work');
require __DIR__ . '/auth.php';
