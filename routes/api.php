<?php

use App\FinanceAnalyzer\Controllers\FinanceAnalyzerController;
use App\FinanceHistory\Controllers\FinanceHistoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/upload', [FinanceAnalyzerController::class, 'upload'])->name('upload');
Route::get('/expenses', [FinanceHistoryController::class, 'getExpenses'])->name('expenses');
