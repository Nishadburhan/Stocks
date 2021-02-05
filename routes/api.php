<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StockController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::middleware(['auth:sanctum', 'verified'])->group(function() {
// 
    // Route::resource('stock', StockController::class);
    // Route::post('get_stock', [StockController::class, 'stock']);
    // Route::get('sku/{id}', [StockController::class, 'by_sku']);
    // Route::post('get_suggestions', [StockController::class, 'suggestions']);

    Route::get('stocks', [StockController::class, 'index']);
    Route::get('stocks/{stock}', [StockController::class, 'show']);
    Route::get('stocks/sku/{stock}', [StockController::class, 'sku']);
    Route::post('stocks', [StockController::class, 'store']);
    Route::put('stocks/{stock}', [StockController::class, 'update']);
    Route::delete('stocks/{stock}', [StockController::class, 'update']);
// });

