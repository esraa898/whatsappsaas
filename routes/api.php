<?php

use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PackageController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/send-message', [ApiController::class,'messageText']);
Route::post('/send-image', [ApiController::class,'messageImage']);
Route::post('/send-button', [ApiController::class,'messageButton']);
Route::post('/send-template', [ApiController::class,'messageTemplate']);
Route::post('/send-document', [ApiController::class,'messageDocument']);

// route to add company by ajax
Route::post('/dashboard',[UserController::class,'store'])->name('addCompany');
Route::get('/company/{id}',[UserController::class,'edit'])->name('editCompany');


Route::post('/home/{id}',[UserController::class,'assignPackageToCompany'])->name('assignPackageToCompany');

// route to add package by ajax
Route::post('/package',[PackageController::class,'store'])->name('addPackage');
Route::get('/package/{id}',[PackageController::class,'edit'])->name('editPackage');



