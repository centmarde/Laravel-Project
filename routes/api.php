<?php

use App\Http\Controllers\Api\CarouselItemsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AuthController;
use App\Models\CarouselItems;

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

//public api
Route::post('/login',[AuthController::class, 'login'])->name('user.login');
Route::post('/user',[AuthController::class, 'store'])->name('user.store'); //register


//private api
Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout',[AuthController::class, 'logout'] );

    Route::controller(CarouselItemsController::class)->group(function () {
        Route::get('carousel','index');
        Route::get('/carousel/{id}','show');
        Route::post('/carousel','store');
        Route::put('/carousel/{id}','update');
        Route::delete('/carousel/{id}','destroy');
    });

    Route::controller(UserController::class)->group(function () {
        Route::get('user','index');
        Route::get('/user/{id}', 'show');
        Route::delete('/user/{id}','destroy');
        Route::put('/user/{id}','update')->name('user.update');
        Route::put('/user/email/{id}', 'email')->name('user.email');
        Route::put('/user/password/{id}', 'password')->name('user.password');
    });
});

// Route::post('/user',[UserController::class, 'store'])->name('user.store');
//manual








