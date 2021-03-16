<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DvdController;

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

Route::get('/dvds', [DvdController::class, 'index']);
Route::prefix('/dvd')->group(function(){
        Route::post('/store', [DvdController::class, 'store']);
        Route::put('/{id}', [DvdController::class, 'update']);
        Route::delete('/{id}', [DvdController::class, 'destroy']);
    }
);
