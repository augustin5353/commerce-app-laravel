<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Invoice\IndexController;
use App\Http\Controllers\Api\Invoice\StoreController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->group(static function(): void{
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::prefix('invoices')
    ->as('invoices.')
    ->group(static function(): void {

        Route::get('/', IndexController::class)
            ->name('index');
        Route::post('/store', StoreController::class)
            ->name('store');
    });
});
