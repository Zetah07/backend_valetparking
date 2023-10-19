<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\VehiclesController;
use App\Http\Controllers\API\ParkingSpacesController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('v1/vehicles')->group(function () {
    Route::get('/', [VehiclesController::class, 'get']);
    Route::post('/', [VehiclesController::class, 'create']);
    Route::get('/{id}', [VehiclesController::class, 'getById']);
    Route::put('/{id}', [VehiclesController::class, 'update']);
    Route::delete('/{id}', [VehiclesController::class, 'delete']);
});

Route::prefix('v1/parking-spaces')->group(function () {
    Route::get('/', [ParkingSpacesController::class, 'get']);
    Route::post('/', [ParkingSpacesController::class, 'create']);
    Route::get('/{id}', [ParkingSpacesController::class, 'getById']);
    Route::put('/{id}', [ParkingSpacesController::class, 'update']);
    Route::delete('/{id}', [ParkingSpacesController::class, 'delete']);
});