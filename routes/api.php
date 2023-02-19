<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Api\school\SchoolController;
use App\Http\Controllers\Api\student\StudentController;
use App\Http\Controllers\Api\subject\SubjectController;
use App\Http\Controllers\Api\teacher\TeacherController;

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

//protected routes
Route::middleware(['auth:sanctum'])->group(function (){

    Route::post('/logout',[UserController::class,'logout']);
    Route::resource('students',StudentController::class);
    Route::resource('schools',SchoolController::class);
    Route::resource('teachers',TeacherController::class);
    Route::resource('subjects',SubjectController::class);
});



