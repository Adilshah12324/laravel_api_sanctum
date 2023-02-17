<?php

use App\Http\Controllers\Api\school\SchoolController;
use App\Http\Controllers\Api\student\StudentController;
use App\Http\Controllers\UserController;
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

//register route
Route::post('/register',[UserController::class,'register']);
Route::post('/login',[UserController::class,'login']);

Route::get('schools',[SchoolController::class,'index']);
//protected routes
Route::middleware(['auth:sanctum'])->group(function (){

    Route::post('/logout',[UserController::class,'logout']);
    Route::resource('students',StudentController::class);
});



