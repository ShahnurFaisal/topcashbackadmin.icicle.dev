<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::get('/category',[ApiController::class,'category']);
Route::get('/subCategory',[ApiController::class,'subCategory']);
Route::get('/offer',[ApiController::class,'offer']);
Route::get('/user',[ApiController::class,'userRegister']);
Route::get('/merchant',[ApiController::class,'merchant']);

