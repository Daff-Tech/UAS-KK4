<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Middleware\CheckIsAdmin;
use App\Http\Middleware\CheckIsCustomer;
use App\Http\Controllers\SewaController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\AuthController;

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

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/user',[AuthController::class, 'user']);



Route::middleware('auth:sanctum')->group(function () {

    Route::middleware([CheckIsAdmin::class])->group(function () {
        Route::post('/mobils', [MobilController::class, 'store']);
        Route::put('/mobils/{id}', [MobilController::class, 'update']);
        Route::delete('/mobils/{id}', [MobilController::class, 'destroy']);
        Route::delete('/sewas/{id}', [SewaController::class, 'destroy']);
    });
    
    Route::middleware([CheckIsCustomer::class])->group(function () {
        Route::post('/sewas', [SewaController::class, 'store']);
        Route::put('/sewas/{id}', [SewaController::class, 'update']);
    });
    
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/sewas', [SewaController::class, 'index']);
    Route::get('/sewas/{id}', [SewaController::class, 'show']);
    

    Route::get('/mobils', [MobilController::class, 'index']);
    Route::get('/mobils/{id}', [MobilController::class, 'show']);
});

