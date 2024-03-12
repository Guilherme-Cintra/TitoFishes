<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FishController;

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

//Fishes
Route::post('/addfish', [ FishController::class,'store']);
Route::get('/find/{id}', [ FishController::class,'findById']);
Route::delete('/delete/{id}', [ FishController::class,'delete']);
Route::put('/update/{id}', [ FishController::class,'update']);

//Categories
Route::post('/category/create', [CategoryController::class, 'post']);
Route::get('/category/getAll', [CategoryController::class, 'getAll']);
Route::put('/category/update/{id}', [CategoryController::class, 'update']);
Route::delete('/category/delete/{id}', [CategoryController::class, 'delete']);
