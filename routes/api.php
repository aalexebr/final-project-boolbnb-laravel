<?php

use Illuminate\Http\Request;
use App\Http\Controllers\admin\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ApartmentController;
use Illuminate\Routing\RouteRegistrar;
use App\Http\Controllers\api\ViewController;
use App\Http\Controllers\api\ServicesController;
use App\Http\Controllers\api\MessageController;

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
   // Route::post('/makePayment', [OrderController::class, 'makePayment']);
   
});

Route::get('apartment', [ApartmentController::class, 'index']);
Route::post('apartment', [ApartmentController::class, 'searchApartment']);
Route::post('filterApt', [ApartmentController::class, 'filterApt']);
Route::get('apartment/{apartment}',[ApartmentController::class, 'singleApt']);
Route::post('ip',[ViewController::class,'getIp']);
Route::get('service',[ServicesController::class,'sendServices']);
Route::post('message',[MessageController::class,'getMessage']);