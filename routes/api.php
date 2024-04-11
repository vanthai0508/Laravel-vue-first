<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Chat\ListController;
use App\Http\Controllers\Chat\SendController;
use App\Http\Controllers\File\UploadController;
use App\Http\Controllers\User\ListUserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', LoginController::class);
Route::post('signup', RegisterController::class);


Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware(['auth', 'cors'])->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/home');
})->middleware(['auth:sanctum','signed'])->name('verification.verify');

Route::group([
    'middleware' => 'auth:sanctum'
], function () {
    Route::group([
        'prefix' => 'users'
    ], function () {
        Route::get('', ListUserController::class);
        Route::post('', 'App\Http\Controllers\UserController@create');
        Route::put('/{id}', 'App\Http\Controllers\UserController@update');
        Route::delete('/{id}', 'App\Http\Controllers\UserController@delete');
    });

    Route::group([
        'prefix' => 'files'
    ], function () {
        Route::post('', UploadController::class);
    });

    Route::group([
        'prefix' => 'chat'
    ], function () {
        Route::post('messages', SendController::class);
        Route::get('messages', ListController::class);
    });
    
});
