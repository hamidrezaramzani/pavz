<?php

use App\Http\Controllers\ApartmentController;
use App\Http\Controllers\AreaController;
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
use App\Http\Controllers\VillaScoreController;
use App\Models\Parking;
use App\Models\Room;
use App\Models\VillaScore;
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
Route::post("/create-villa", [VillasController::class, "createVilla"])->middleware("auth");
Route::post("/update-specification-form", [VillasController::class, "updateSpecificationForm"])->middleware("auth");

Route::get("/edit-villa/{id}", [VillasController::class, "editVilla"])->name("edit-villa")->middleware("auth");
Route::get("/get-cities/{id}", [VillasController::class, "getCities"]);
Route::get("/villa/{id}", [VillasController::class, "getSingleVilla"]);
Route::get("/profile", [UserController::class, "profile"])->name("profile")->middleware("auth")->breadcrumbs(fn (Trail  $trail) => $trail->parent("dashboard")->push("تغییر پروفایل", route("profile")));;
Route::post("/submit-profile-picture", [UserController::class, "submitProfilePicture"])->middleware("auth");
Route::post("/submit-user-info", [UserController::class, "submitUserInfo"])->middleware("auth");


/* VILLA ROUTES */
Route::post("/villa/update/home-info", [VillasController::class, "updateHomeInfo"])->middleware("auth");;
Route::post("/villa/update/spaces", [VillasController::class, "updateSpaceInfo"])->middleware("auth");;
Route::post("/villa/update/possibilities", [VillasController::class, "updatePossibilitiesInfo"])->middleware("auth");;
Route::post("/villa/update/address", [VillasController::class, "updateAddressInfo"])->middleware("auth");;
Route::get("/villa/set-status/{id}", [VillasController::class, "setStatus"])->middleware("auth");;
Route::get("/manage/villas", [VillasController::class, "manageVillas"])->middleware("auth");;
Route::get("/villa/delete/{id}", [VillasController::class, "deleteVillas"])->middleware("auth");;



//  APARTMENT ROUTES
Route::get("/new-apartment", [ApartmentController::class, "newApartment"])->middleware("auth")->name("new-apartment")->breadcrumbs(fn (Trail $trail) => $trail->parent("dashboard")->push("آپارتمان جدید", route("new-apartment")));;
Route::get("/apartment/manage", [ApartmentController::class, "manageApartments"])->middleware("auth");
Route::get("/edit-apartment/{id}", [ApartmentController::class, "editApartment"])->middleware("auth");
Route::get("/apartment/get-home-types/{id}", [ApartmentController::class, "getHomeTypes"])->middleware("auth");
Route::get("/apartment/set-status/{status}/{id}", [ApartmentController::class, "setApartmentStatus"])->middleware("auth");
Route::post("/create-apartment", [ApartmentController::class, "createApartment"])->middleware("auth")->name("create-apartment");
Route::post("/apartment/update/specification", [ApartmentController::class, "updateSpecification"])->middleware("auth");
Route::post("/apartment/update/possibilities", [ApartmentController::class, "updatePossibilities"])->middleware("auth");
Route::post("/apartment/update/address", [ApartmentController::class, "updateAddress"])->middleware("auth");
Route::post("/apartment/update/rent-pricing", [ApartmentController::class, "updateRentPricing"])->middleware("auth");
Route::post("/apartment/update/sold-pricing", [ApartmentController::class, "updateSoldPricing"])->middleware("auth");
Route::get("/apartment/delete/{id}", [ApartmentController::class, "deleteApartment"])->middleware("auth");
Route::get("/apartment/{id}", [ApartmentController::class, "getSingleApartment"]);

// AREA ROUTES
Route::get("/area/new", [AreaController::class, "newArea"])->middleware("auth");
Route::get("/edit-area/{id}", [AreaController::class, "editArea"])->middleware("auth")->name("edit-area");
Route::post("/area/update/specification", [AreaController::class, "updateSpecification"])->middleware("auth");
Route::post("/area/update/documents", [AreaController::class, "updateDocuments"])->middleware("auth");
Route::post("/area/update/address", [AreaController::class, "updateAddress"])->middleware("auth");
Route::post("/area/update/pricing", [AreaController::class, "updatePricing"])->middleware("auth");
Route::get("/area/set-status/{status}/{id}", [AreaController::class, "setAreaStatus"])->middleware("auth");
Route::get("/area/manage", [AreaController::class, "manageAreas"])->middleware("auth");
Route::get("/area/delete/{id}", [AreaController::class, "deleteArea"])->middleware("auth");
Route::get("/area/{id}", [AreaController::class, "getSingleArea"])->middleware("auth");

// ->breadcrumbs(fn (Trail $trail) => $trail->parent("dashboard")->push("ویرایش آگهی", route("edit-area")));



/* SPECIAL PLACES ROUTES */
Route::post("/special-place/new", [SpecialPlaceController::class, "createSpecialPlaceItem"])->middleware("auth");;
Route::get("/special-place/remove/{id}/{villa}", [SpecialPlaceController::class, "removeSpecialPlaceItem"])->middleware("auth");;

/* ROOM ROUTES */
Route::post("/room/new", [RoomController::class, "newRoom"])->middleware("auth");;
Route::get("/room/get/{id}", [RoomController::class, "villaRooms"])->middleware("auth");
Route::get("/room/delete/{id}/{villa_id}", [RoomController::class, "removeRoom"])->middleware("auth");


/* POOL ROUTES */
Route::post("/pool/new", [PoolController::class, "newPool"])->middleware("auth");
Route::get("/pool/delete/{id}/{villa_id}", [PoolController::class, "removePool"])->middleware("auth");


/*  PARKING ROUTES */
Route::post("/parking/new", [ParkingController::class, "newParking"])->middleware("auth");
Route::get("/parking/remove/{id}/{villa_id}", [ParkingController::class, "removeParking"])->middleware("auth");

/*  RULES ROUTES */
Route::post("/rule/update", [RuleController::class, "updateRules"])->middleware("auth");


//  RENT PRICES ROUTES
Route::post("/rent-price/update", [RentPriceController::class, "updatePrices"])->middleware("auth");


/* PICTURE ROUTES */
Route::post("/pictures/villa/cover-update", [PictureController::class, "updateVillaCover"])->middleware("auth");
Route::post("/pictures/villa/pictures-update", [PictureController::class, "updateVillaPictures"])->middleware("auth");
Route::post("/pictures/apartment/pictures-update", [PictureController::class, "updateApartmentPictures"])->middleware("auth");
Route::post("/pictures/area/pictures-update", [PictureController::class, "updateAreaPictures"])->middleware("auth");

Route::post("/pictures/area/cover-update", [PictureController::class, "updateAreaCover"])->middleware("auth");
Route::post("/pictures/apartment/cover-update", [PictureController::class, "updateApartmentCover"])->middleware("auth");
Route::get("/pictures/villa/get/{id}", [PictureController::class, "getVillaPictures"])->middleware("auth");
Route::get("/pictures/apartment/get/{id}", [PictureController::class, "getApartmentPictures"])->middleware("auth");
Route::get("/pictures/area/get/{id}", [PictureController::class, "getAreaPictures"])->middleware("auth");

//  DOCUMENT ROUTES
Route::post("/document/update", [DocumentController::class, "updateDocument"])->middleware("auth");


//  SOLD VILLA PRICES
Route::post("/sold-villa-prices/update", [SoldVillaPriceController::class, "updatePrice"])->middleware("auth");


//  SCORES 
Route::get("/scores/set-accuracy-of-content/{id}/{score}", [VillaScoreController::class, "setScoreAccuracyOfContent"])->middleware("auth");
Route::get("/scores/set-timely-delivery/{id}/{score}", [VillaScoreController::class, "setTimelyDelivery"])->middleware("auth");
Route::get("/scores/set-host-encounter/{id}/{score}", [VillaScoreController::class, "setHostEncounter"])->middleware("auth");
Route::get("/scores/set-quality/{id}/{score}", [VillaScoreController::class, "setQuality"])->middleware("auth");
Route::get("/scores/set-purity/{id}/{score}", [VillaScoreController::class, "setPurity"])->middleware("auth");
Route::get("/scores/set-address/{id}/{score}", [VillaScoreController::class, "setAddress"])->middleware("auth");
Route::get("/scores/get/{id}", [VillaScoreController::class, "getScores"]);
