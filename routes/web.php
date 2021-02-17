<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\API\ApiController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\CountryCotroller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\FluentController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\TestController;
use App\PaymentGatway\Payment;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/{locale}', function ($locale) {
// App::setLocale($locale);
//     return view('welcome');
// });

Route::get('/', function () {
        return view('welcome');
    });
// Route::get("/first-api",[API\ApiController::class,'firstapi']);

Route::get('todolist', [UserController::class,'todolist']);
Route::resource('photos', ApiController::class);
Route::resource('country', CountryCotroller::class);
Route::get('getallpost',[ClientController::class,'getAllPost']);
Route::get('string_operation',[FluentController::class,'string_operation']);
Route::get('session/get',[SessionController::class,'getSession']);
Route::get('session/set',[SessionController::class,'storeSession']);
Route::get('session/delete',[SessionController::class,'deleteSession']);
Route::get('insertRecord',[StudentController::class,'insertRecord']);
Route::get('getStudent',[StudentController::class,'getStudent']);
Route::get('showsaturdaydate',[StudentController::class,'showsaturdaydate']);
Route::get('importForm',[StudentController::class,'importForm']);
Route::post('importcsv',[StudentController::class,'importcsv']);

Route::get('gallery',[GalleryController::class,'gallery']);
Route::get('post',[GalleryController::class,'post']);
Route::get('get-name',[TestController::class,'getFirstLast']);



Route::get('payment',function(){
return Payment::process();
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
