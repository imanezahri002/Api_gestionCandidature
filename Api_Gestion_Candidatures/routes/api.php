<?php

use App\Http\Controllers\OffreController;
use App\Http\Controllers\PostulationController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('register',[UserAuthController::class,'register']);
Route::post('login',[UserAuthController::class,'login']);
Route::post('logout',[UserAuthController::class,'logout'])->middleware('auth:sanctum');

Route::post('updateUser',[UserController::class,'update'])->middleware('auth:sanctum');
Route::apiResource('offres',OffreController::class)->middleware('auth:sanctum');

// Route::get('/offres',[OffreController::class,'index']);
// Route::get('/offres/{offre:id}',[OffreController::class,'show']);

// Route::post('/offres',[OffreController::class,'store']);

Route::post('/postuler',[PostulationController::class,'store'])->middleware('auth:sanctum');
Route::get('/', function () {
        return view('welcome');
    })->middleware('auth:sanctum');
