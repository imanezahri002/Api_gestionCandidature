<?php

use App\Http\Controllers\CompetenceController;
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
})->middleware('auth:api');

Route::post('register',[UserAuthController::class,'register']);
Route::post('login',[UserAuthController::class,'login']);
Route::post('refresh',[UserAuthController::class,'refresh']);
Route::post('logout',[UserAuthController::class,'logout'])->middleware('auth:api');


Route::post('updateUser',[UserController::class,'update'])->middleware('auth:api');
Route::apiResource('offres',OffreController::class)->middleware('auth:api');

Route::get('/competence',[CompetenceController::class,'index'])->middleware('auth:api');
Route::post('/competence',[CompetenceController::class,'store'])->middleware('auth:api');
Route::post('/competence/{competence:id}',[CompetenceController::class,'destroy'])->middleware('auth:api');

// Route::get('/offres',[OffreController::class,'index']);
// Route::get('/offres/{offre:id}',[OffreController::class,'show']);

// Route::post('/offres',[OffreController::class,'store']);

Route::post('/postuler',[PostulationController::class,'store'])->middleware('auth:api');

Route::get('/', function () {
        return view('welcome');
    });
