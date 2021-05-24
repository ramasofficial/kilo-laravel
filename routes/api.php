<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ItemController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'categories', 'as'=>'categories.'], function () {
    Route::post('/', [CategoryController::class, 'store'])->name('store');
    Route::get('/list', [CategoryController::class, 'list'])->name('list');
});

Route::group(['prefix' => 'items', 'as'=>'items.'], function () {
    Route::post('/', [ItemController::class, 'store'])->name('store');
    Route::put('/{id}', [ItemController::class, 'update'])->name('update');
    Route::get('/list/{id}', [ItemController::class, 'list'])->name('list');
    Route::delete('/destroy/{id}', [ItemController::class, 'destroy'])->name('destroy');
});
