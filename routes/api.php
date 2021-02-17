<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\API\ApiController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\CountryCotroller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentsController;
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


Route::resource('first-api', ApiController::class);
Route::group(['middleware'=>'auth:api'],function(){
    Route::resource('country', CountryCotroller::class);
});

Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class,'register']);
// Route::get('userdetails', [UserController::class,'userdetails']);

Route::group(['middleware' => 'auth:api'], function(){

    Route::get('details', [UserController::class,'details']);
    Route::post('article', [UserController::class,'article']);
    Route::post('article/{a}/comment', [CommentsController::class,'store']);
});

