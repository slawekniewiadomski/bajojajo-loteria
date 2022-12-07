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
Route::get('/', [App\Http\Controllers\LotteryController::class, 'index']);
Route::get('/{lottery:slug}', [\App\Http\Controllers\LotteryController::class, 'show'])->name('lottery.show');
Route::get('/{lottery:slug}/join', [\App\Http\Controllers\ParticipantController::class, 'join']);
Route::post('/{lottery:slug}/join', [\App\Http\Controllers\ParticipantController::class, 'create']);
Route::get('/{lottery:slug}/{participant:hash}', [\App\Http\Controllers\ParticipantController::class, 'show'])->name('participant.show');
