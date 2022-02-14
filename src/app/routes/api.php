<?php

use App\Http\Controllers\VideoController;
use Illuminate\Http\Request;
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

// Videos ...
Route::controller(VideoController::class)->prefix('videos')->group(function (){
    Route::get('', 'index');
    Route::get('/{id}', 'show');
    Route::middleware('auth:sanctum')->group(function (){
        Route::post('', 'store');
        Route::put('/{id}', 'update');
        Route::delete('/{id}', 'delete');
    });
});


