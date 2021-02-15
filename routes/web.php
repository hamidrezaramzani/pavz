<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\VillasController;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {  
    return view('index');
});
Route::get('/login', function () {
    return view('login');

})->name("login");
Route::get('/register', [UserController::class, "create"]);
Route::post("/store-user", [UserController::class, "store"]);
Route::post("/active-user", [UserController::class, "activeUser"]);
Route::post("/login-user", [UserController::class, "login"]);
Route::get('/is-phonenumber-duplicate/{phonenumber}', [UserController::class, "isPhoneNumberDuplicate"]);
Route::get("/panel" , [UserController::class , "panel"])->middleware("auth");
Route::get("/new-villa" , [VillasController::class , "newVilla"])->middleware("auth");
Route::get("/profile" , [UserController::class , "profile"])->middleware("auth");
Route::post("/submit-profile-picture" , [UserController::class , "submitProfilePicture"])->middleware("auth");
Route::post("/submit-user-info" , [UserController::class , "submitUserInfo"])->middleware("auth");