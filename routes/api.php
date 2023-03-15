<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CarController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\User as UserResource;

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

Route::get('/', function () {
    return [
        'app' => config('app.name'),
        'version' => '1.0.0',
    ];
});

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('auth/me', function (Request $request) {
        return new UserResource($request->user());
    });

    Route::get('cars', [CarController::class, 'listAll']);
    Route::get('cars/{id}', [CarController::class, 'get']);
});

Route::group(['middleware' => 'guest:api'], function () {
    Route::post('auth/login', [LoginController::class,'login']);
});