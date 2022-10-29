<?php

use App\Http\Controllers\API\AuthController as Auth;
use App\Http\Controllers\API\V1\ArticulosController as Articulos;

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

Route::prefix('auth')->group(function () {
    Route::post('login', [Auth::class, 'login'])->name('auth.login');
    Route::post('logout', [Auth::class, 'logout'])->name('auth.logout');
    Route::post('register', [Auth::class, 'register'])->name('auth.register');
});

Route::group(['prefix' => 'v1', 'middleware' => 'auth:api'], function () {
    Route::apiResource('articulos', Articulos::class)->only(['index', 'store']);
    Route::apiResource('compras', Articulos::class)->except(['show']);
});
