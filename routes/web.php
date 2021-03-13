<?php

use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ParkingController;
use App\Http\Controllers\PictureController;
use App\Http\Controllers\PoolController;
use App\Http\Controllers\RentPriceController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RuleController;
use App\Http\Controllers\SoldVillaPriceController;
use App\Http\Controllers\SpecialPlaceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VillasController;
use App\Models\Parking;
use App\Models\Room;
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
Route::get("/new-villa", [VillasController::class, "newVilla"])->name("new-villa")->middleware("auth")->breadcrumbs(fn (Trail $trail) => $trail->parent("dashboard")->push("ثبت ویلای جدید", route("new-villa")));;
Route::post("/create-villa" , [VillasController::class , "createVilla"])->middleware("auth");
Route::post("/update-specification-form" , [VillasController::class , "updateSpecificationForm"])->middleware("auth");

Route::get("/edit-villa/{id}" , [VillasController::class , "editVilla"])->middleware("auth");
Route::get("/get-cities/{id}", [VillasController::class, "getCities"]);
Route::get("/villa/{id}", [VillasController::class, "getSingleVilla"]);
Route::get("/profile", [UserController::class, "profile"])->name("profile")->middleware("auth")->breadcrumbs(fn (Trail  $trail) => $trail->parent("dashboard")->push("تغییر پروفایل", route("profile")));;
Route::post("/submit-profile-picture", [UserController::class, "submitProfilePicture"])->middleware("auth");
Route::post("/submit-user-info", [UserController::class, "submitUserInfo"])->middleware("auth");


/* VILLA ROUTES */
Route::post("/villa/update/home-info", [VillasController::class, "updateHomeInfo"]);
Route::post("/villa/update/spaces", [VillasController::class, "updateSpaceInfo"]);
Route::post("/villa/update/possibilities", [VillasController::class, "updatePossibilitiesInfo"]);
Route::post("/villa/update/address", [VillasController::class, "updateAddressInfo"]);
Route::get("/villa/set-status/{id}", [VillasController::class, "setStatus"]);


/* SPECIAL PLACES ROUTES */
Route::post("/special-place/new", [SpecialPlaceController::class, "createSpecialPlaceItem"]);
Route::get("/special-place/remove/{id}/{villa}", [SpecialPlaceController::class, "removeSpecialPlaceItem"]);

/* ROOM ROUTES */
Route::post("/room/new", [RoomController::class, "newRoom"]);
Route::get("/room/get/{id}", [RoomController::class, "villaRooms"]);
Route::get("/room/delete/{id}/{villa_id}", [RoomController::class, "removeRoom"]);


/* POOL ROUTES */
Route::post("/pool/new", [PoolController::class, "newPool"]);
Route::get("/pool/delete/{id}/{villa_id}", [PoolController::class, "removePool"]);


/*  PARKING ROUTES */
Route::post("/parking/new", [ParkingController::class, "newParking"]);
Route::get("/parking/remove/{id}/{villa_id}", [ParkingController::class, "removeParking"]);

/*  RULES ROUTES */
Route::post("/rule/update", [RuleController::class, "updateRules"]);


//  RENT PRICES ROUTES
Route::post("/rent-price/update", [RentPriceController::class, "updatePrices"]);


/* PICTURE ROUTES */
Route::post("/pictures/villa/cover-update", [PictureController::class, "updateVillaCover"]);
Route::post("/pictures/villa/pictures-update", [PictureController::class, "updateVillaPictures"]);
Route::get("/pictures/villa/get/{id}", [PictureController::class, "getVillaPictures"]);

//  DOCUMENT ROUTES
Route::post("/document/update", [DocumentController::class, "updateDocument"]);


//  SOLD VILLA PRICES
Route::post("/sold-villa-prices/update", [SoldVillaPriceController::class, "updatePrice"]);
