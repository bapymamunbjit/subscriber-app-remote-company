<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubscribersController;
use App\Http\Controllers\KeyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
Route::GET('/', [SubscribersController::class, 'index']);
//Routes for API key
Route::resource('/key', KeyController::class);

//Routes for Subscribers
Route::GET('/subscribers', [SubscribersController::class, 'index']);
Route::GET('/subscribers/getSubscribersData', [SubscribersController::class, 'getSubscribersData']);
Route::POST('/save-subscriber', [SubscribersController::class, 'save']);
Route::PUT('/update-subscriber', [SubscribersController::class, 'update']);
Route::DELETE('/delete-subscriber', [SubscribersController::class, 'delete']);

