<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\TournamentContoller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserRegistrationController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('users', UserController::class);
//Route::get('/users/{id}/registrations', [UserRegistrationController::class, 'index'])->name('users.registration.index');
Route::resource('users.registrations', UserRegistrationController::class)->only(['index']);
Route::resource('/tournaments', TournamentContoller::class)->only(['index']);
Route::post('/register',[AuthController::class,'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware'=>['auth:sanctum'] ], function(){
    Route::resource('/tournaments', TournamentContoller::class)->only(['store','destroy']);
    Route::resource('registrations', RegistrationController::class)->only(['index','update','store','destroy']);
    Route::post('/logout', [AuthController::class, 'logout']);
});


