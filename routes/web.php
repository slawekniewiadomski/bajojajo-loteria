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
Route::get('/join', [\App\Http\Controllers\Participant\Create::class, 'join']);
Route::post('/join', [App\Http\Controllers\Participant\Create::class, 'store']);
Route::get('/{hash}', [\App\Http\Controllers\Views\Home::class, 'show']);
Route::get('/', [App\Http\Controllers\Views\Home::class, 'index']);

