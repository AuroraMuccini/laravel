<?php
use App\Http\Controllers\CarController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VerificationController;



use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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

//POST http://localhost:8000/api/cars
Route::post('/cars', [CarController::class, 'create']);
//DELETE http://localhost:8000/api/cars/7 
Route::delete('/cars/{id}', [CarController::class, 'delete']);
//GET http://localhost:8000/api/cars/3
Route::get('/cars/{id}', [CarController::class, 'read']);
//GET http://localhost:8000/api/cars
Route::get('/cars', [CarController::class, 'readAll']);
//PUT http://localhost:8000/api/cars/22
Route::put('/cars/{id}', [CarController::class, 'update']);

//POST http://localhost:8000/api/verifications
Route::post('/verifications', [VerificationController::class, 'create']);
//DELETE http://localhost:8000/api/verifications/7 
Route::delete('/verifications/{id}', [VerificationController::class, 'delete']);
//GET http://localhost:8000/api/verifications/3
Route::get('/verifications/{id}', [VerificationController::class, 'read']);
//GET http://localhost:8000/api/verifications
Route::get('/verifications', [VerificationController::class, 'readAll']);
//PUT http://localhost:8000/api/verifications/22
Route::put('/verifications/{id}', [VerificationController::class, 'update']);
