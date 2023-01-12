<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
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


//protected routes
Route::middleware(['auth:sanctum'])->group(function (){
    Route::resource('/students',StudentController::class);
    Route::get('/students/search/{city}',[StudentController::class,'search']);
    Route::post('/logout',[UserController::class,'logout']);
});



