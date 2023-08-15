<?php

use App\Http\Controllers\ApiController;
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

Route::get('/stocks', [ApiController::class, 'stock']);
Route::get('/sales', [ApiController::class, 'sale']);
Route::get('/orders', [ApiController::class, 'order']);
Route::get('/incomes', [ApiController::class, 'income']);
