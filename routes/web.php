<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\VillasController;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Tabuna\Breadcrumbs\Trail;

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

Route::get('/about-us', function () {
    return view('about');
});
Route::get('/login', function () {
    return view('login');
})->name("login");
Route::get('/register', [UserController::class, "create"]);
Route::post("/store-user", [UserController::class, "store"]);
Route::post("/active-user", [UserController::class, "activeUser"]);
Route::post("/login-user", [UserController::class, "login"]);
Route::get('/is-phonenumber-duplicate/{phonenumber}', [UserController::class, "isPhoneNumberDuplicate"]);
Route::get("/panel", [UserController::class, "panel"])->name("dashboard")->middleware("auth")->breadcrumbs(fn (Trail  $trail) => $trail->push("پیشخوان", route("dashboard")));
Route::get("/new-rent-villa", [VillasController::class, "newVilla"])->name("new-villa")->middleware("auth")->breadcrumbs(fn (Trail $trail) => $trail->parent("dashboard")->push("ثبت ویلای جدید", route("new-villa")));;
Route::get("/get-cities/{id}", [VillasController::class, "getCities"]);
Route::get("/villa/{id}", [VillasController::class, "getSingleVilla"]);
Route::get("/profile", [UserController::class, "profile"])->name("profile")->middleware("auth")->breadcrumbs(fn (Trail  $trail) => $trail->parent("dashboard")->push("تغییر پروفایل", route("profile")));;
Route::post("/submit-profile-picture", [UserController::class, "submitProfilePicture"])->middleware("auth");
Route::post("/submit-user-info", [UserController::class, "submitUserInfo"])->middleware("auth");
