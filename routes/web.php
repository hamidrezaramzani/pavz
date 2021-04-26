<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApartmentController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\CommentAnswerController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ParkingController;
use App\Http\Controllers\PictureController;
use App\Http\Controllers\PoolController;
use App\Http\Controllers\RateController;
use App\Http\Controllers\RentPriceController;
use App\Http\Controllers\ReserveController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RuleController;
use App\Http\Controllers\SaveController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\SoldVillaPriceController;
use App\Http\Controllers\SpecialPlaceController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VillasController;
use App\Http\Controllers\VillaScoreController;
use App\Http\Controllers\VipController;
use App\Models\Discount;
use App\Models\Index;
use App\Models\Notification;
use App\Models\Parking;
use App\Models\Room;
use App\Models\Ticket;
use App\Models\User;
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

Route::get('/', [IndexController::class, "index"]);

Route::get('/about-us', function () {
    return view('about');
});


Route::get('/faq', function () {
    return view('partials.faq');
});




Route::get('/index/get-by-id/{id}/{type}', [IndexController::class, "getById"]);


Route::get('/logout', [UserController::class, "logout"])->middleware("auth");
Route::get('/login', [UserController::class, "loginForm"])->name("login");
Route::get('/register', [UserController::class, "create"]);
Route::post("/store-user", [UserController::class, "store"]);
Route::post("/active-user", [UserController::class, "activeUser"]);
Route::post("/login-user", [UserController::class, "login"]);
Route::get('/is-phonenumber-duplicate/{phonenumber}', [UserController::class, "isPhoneNumberDuplicate"]);
Route::get("/panel", [UserController::class, "panel"])->name("dashboard")->middleware("auth")->breadcrumbs(fn (Trail  $trail) => $trail->push("پیشخوان", route("dashboard")));
Route::get("/new-villa", [VillasController::class, "newVilla"])->name("new-villa")->middleware("auth")->breadcrumbs(fn (Trail $trail) => $trail->parent("dashboard")->push("ثبت ویلای جدید", route("new-villa")));;
Route::post("/create-villa", [VillasController::class, "createVilla"])->middleware("auth");
Route::post("/update-specification-form", [VillasController::class, "updateSpecificationForm"])->middleware("auth");
Route::post("/user/send-new-code", [UserController::class, "checkPhonenumberAndSendCode"]);
Route::post("/user/reset-password", [UserController::class, "resetPassword"]);



Route::post("/user/change-profile", [UserController::class, "changeUserProfile"]);
Route::get("/user/{id}", [UserController::class, "getUser"]);
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
Route::get("/villa/get-reserves/{id}", [VillasController::class, "getReserves"]);



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
Route::post("/pictures/shop/cover-update", [PictureController::class, "updateShopCover"])->middleware("auth");
Route::post("/pictures/shop/pictures-update", [PictureController::class, "updateShopPictures"])->middleware("auth");



Route::get("/pictures/villa/get/{id}", [PictureController::class, "getVillaPictures"])->middleware("auth");
Route::get("/pictures/apartment/get/{id}", [PictureController::class, "getApartmentPictures"])->middleware("auth");
Route::get("/pictures/area/get/{id}", [PictureController::class, "getAreaPictures"])->middleware("auth");
Route::get("/pictures/shop/get/{id}", [PictureController::class, "getShopPictures"])->middleware("auth");

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

// COMMENT ROUTES
Route::post("/comment/new", [CommentController::class, "newComment"])->middleware("auth");


// Rate 
Route::post("/rate/set-score", [RateController::class, "setScore"])->middleware("auth");

//  RESERVE VILLA
Route::post("/reserve/new", [ReserveController::class, "newReserve"]);
Route::get("/reserves/manage", [ReserveController::class, "getReserves"])->middleware("auth");
Route::get("/reserve/set/{status}/{id}", [ReserveController::class, "setReserveStatus"])->middleware("auth");



// SHOP ROUTES
Route::get("/shop/new", [ShopController::class, "newShop"])->middleware("auth");
Route::get("/shop/edit/{id}", [ShopController::class, "editShop"])->middleware("auth");
Route::post("/shop/create", [ShopController::class, "createShop"])->middleware("auth");
Route::post("/shop/update/specification", [ShopController::class, "updateSpecification"])->middleware("auth");
Route::post("/shop/update/possibilities", [ShopController::class, "updatePossibilities"])->middleware("auth");
Route::post("/shop/update/address", [ShopController::class, "updateAddress"])->middleware("auth");
Route::post("/shop/update/rent-pricing", [ShopController::class, "updateRentPricing"])->middleware("auth");
Route::post("/shop/update/sold-pricing", [ShopController::class, "updateSoldPricing"])->middleware("auth");
Route::get("/shop/set-status/{id}", [ShopController::class, "updateShopStatus"])->middleware("auth");
Route::get("/shop/manage", [ShopController::class, "manageShops"])->middleware("auth");
Route::get("/shop/delete/{id}", [ShopController::class, "deleteShop"])->middleware("auth");
Route::get("/shop/{id}", [ShopController::class, "getShop"]);

// Vip ROUTES
Route::get("/vip/buy", [VipController::class, "newVip"])->middleware("auth");
// SAVE ROUTES
Route::get("/save/{type}/{id}", [SaveController::class, "saveAds"])->middleware("auth");
Route::get("/saves/manage", [SaveController::class, "manageSaves"])->middleware("auth");


// TICKETS
Route::get("/ticket/new", [TicketController::class, "newTicket"])->middleware("auth");
Route::post("/ticket/create", [TicketController::class, "createTicket"])->middleware("auth");
Route::get("/ticket/manage", [TicketController::class, "manageTickets"])->middleware("auth");
Route::get("/tickets/show-answer/{id}", [TicketController::class, "showTicketAnswers"])->middleware("auth");


// SEARCH
Route::get("/search/locations/{text}", [SearchController::class, "getLocations"]);
Route::get("/search/get-all/{type}", [SearchController::class, "getAllData"]);

Route::get("/search", [SearchController::class, "getSearchData"]);

// COMMENT ANSWERS
Route::post("/comment-answer/new", [CommentAnswerController::class, "newAnswer"])->middleware("auth");
Route::get("/comment-answer/delete/{id}", [CommentAnswerController::class, "deleteAnswer"])->middleware("auth");

// ADMIN ROUTES
Route::get("/admin/users", [AdminController::class, "allUsers"])->middleware("admin");
Route::get("/admin/new-comments", [AdminController::class, "newComments"])->middleware("admin");
Route::get("/admin/reject-comments", [AdminController::class, "rejectComments"])->middleware("admin");
Route::get("/admin/published-comments", [AdminController::class, "publishedComments"])->middleware("admin");
Route::get("/admin/publish-comment/{id}", [AdminController::class, "publishComment"])->middleware("admin");
Route::get("/admin/reject-comment/{id}", [AdminController::class, "rejectComment"])->middleware("admin");

Route::get("/admin/new-answer-comments", [AdminController::class, "newAnswerComments"])->middleware("admin");
Route::get("/admin/rejected-answer-comments", [AdminController::class, "rejectedAnswers"])->middleware("admin");
Route::get("/admin/published-answer-comments", [AdminController::class, "publishedAnswers"])->middleware("admin");

Route::get("/admin/publish-answer/{id}", [AdminController::class, "publishAnswer"])->middleware("admin");
Route::get("/admin/reject-answer/{id}", [AdminController::class, "rejectAnswer"])->middleware("admin");


Route::get("/admin/new-villas", [AdminController::class, "requestedVillas"])->middleware("admin");
Route::get("/admin/published-villas", [AdminController::class, "publishedVillas"])->middleware("admin");
Route::get("/admin/rejected-villas", [AdminController::class, "rejectedVillas"])->middleware("admin");
Route::get("/admin/show-villa/{id}", [AdminController::class, "showVilla"])->middleware("admin");
Route::post("/admin/publish-villa", [AdminController::class, "publishVilla"])->middleware("admin");
Route::post("/admin/reject-villa", [AdminController::class, "rejectVilla"])->middleware("admin");

Route::get("/admin/requested-apartments", [AdminController::class, "requestedApartments"])->middleware("admin");
Route::get("/admin/published-apartments", [AdminController::class, "publishedApartments"])->middleware("admin");
Route::get("/admin/rejected-apartments", [AdminController::class, "rejectedApartments"])->middleware("admin");
Route::get("/admin/show-apartment/{id}", [AdminController::class, "showApartment"])->middleware("admin");
Route::post("/admin/publish-apartment", [AdminController::class, "publishApartment"])->middleware("admin");
Route::post("/admin/reject-apartment", [AdminController::class, "rejectApartment"])->middleware("admin");

Route::get("/admin/show-area/{id}", [AdminController::class, "showArea"])->middleware("admin");
Route::post("/admin/publish-area", [AdminController::class, "publishArea"])->middleware("admin");
Route::post("/admin/reject-area", [AdminController::class, "rejectArea"])->middleware("admin");
Route::get("/admin/requested-areas", [AdminController::class, "requestedAreas"])->middleware("admin");

Route::get("/admin/rejected-areas", [AdminController::class, "rejectedAreas"])->middleware("admin");
Route::get("/admin/published-areas", [AdminController::class, "publishedAreas"])->middleware("admin");
Route::get("/admin/requested-shops", [AdminController::class, "requestedShops"])->middleware("admin");
Route::get("/admin/rejected-shops", [AdminController::class, "rejectedShops"])->middleware("admin");
Route::get("/admin/published-shops", [AdminController::class, "publishedShops"])->middleware("admin");
Route::get("/admin/show-shop/{id}", [AdminController::class, "showShop"])->middleware("admin");
Route::post("/admin/publish-shop", [AdminController::class, "publishShop"])->middleware("admin");
Route::post("/admin/reject-shop", [AdminController::class, "rejectShop"])->middleware("admin");

Route::get("/admin/new-tickets", [AdminController::class, "allTickets"])->middleware("admin");
Route::get("/admin/answer-ticket/{id}", [AdminController::class, "getTicketAndAnswer"])->middleware("admin");
Route::post("/admin/answer-to-ticket", [AdminController::class, "answerToTicket"])->middleware("admin");


// NOTIFICATION ROUTES
Route::get("/notification/all", [NotificationController::class, "allNotifications"])->middleware("auth");

// LIKE ROUTES
Route::get("/like/villa/{id}", [LikeController::class, "likeVilla"])->middleware("auth");
Route::get("/like/apartment/{id}", [LikeController::class, "likeApartment"])->middleware("auth");
Route::get("/like/area/{id}", [LikeController::class, "likeArea"])->middleware("auth");
Route::get("/like/shop/{id}", [LikeController::class, "likeShop"])->middleware("auth");


//  DISCOUNT ROUTES
Route::get("/discount/new", [DiscountController::class, "newDiscount"])->middleware("admin");
Route::post("/discount/create", [DiscountController::class, "createDiscount"])->middleware("admin");
Route::get("/discount/manage", [DiscountController::class, "manageDiscounts"])->middleware("admin");
Route::get("/discount/delete/{id}", [DiscountController::class, "deleteDiscount"])->middleware("admin");
Route::get("/discount/apply/{code}", [DiscountController::class, "applyCode"])->middleware("auth");
Route::post("/discount/get-price", [DiscountController::class, "getPrice"])->middleware("auth");
