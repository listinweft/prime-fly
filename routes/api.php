<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CommonController; // Add this line for Location and Service

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
Route::post('/login', [AuthController::class, 'login_normal']);
Route::post('/loginpublic', [AuthController::class, 'login_public']);
Route::post('/logincorporate', [AuthController::class, 'login_corporate']);
Route::post('/registerpublic', [AuthController::class, 'registerpublic']);
Route::post('/registercorporate', [AuthController::class, 'registercorporate']);
Route::post('/forgot-password', [AuthController::class, 'forgot_password']);
Route::post('/logout', [AuthController::class, 'logout']);
// Route::get('/getCartByCustomerId/{user_id}', [AuthController::class, 'getCartByCustomerId']);
Route::get('/getCartByuserid', [AuthController::class, 'getCartByCustomerId']);


// Protected route example to get user data for authenticated users
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); 
  
// Add routes for locations and services
Route::get('/locations', [CommonController::class, 'locations']);
Route::get('/services', [CommonController::class, 'services']);
Route::get('/blogs', [CommonController::class, 'blogs']);
Route::get('/testimonials', [CommonController::class, 'testimonials']);
Route::get('/profile', [CommonController::class, 'getProfileApi']);

Route::post('/profile/update', [CommonController::class, 'updateProfileApi']);
Route::get('/getCartlistByuserid', [CommonController::class, 'getCartData']);
Route::get('/customerorders', [CommonController::class, 'customerorders']);
Route::post('/search-booking-meet-and-greet', [CommonController::class, 'searchBookingAPI']);
Route::post('/search-booking-meet-and-greet-transit', [CommonController::class, 'search_booking_transit_api']);
Route::post('/search-booking_lounch-api', [CommonController::class, 'search_booking_lounch_api']);
Route::post('/search-booking-baggage-api', [CommonController::class, 'searchBookingBaggageApi']);
Route::post('/search-booking-entry-ticket-api', [CommonController::class, 'search_booking_entry_ticket_api']);
Route::post('/search-booking-carparking-api', [CommonController::class, 'search_booking_carparking']);
Route::post('/search-booking-porter-api', [CommonController::class, 'searchBookingPorter']);
Route::post('/search-booking-cloackroom-api', [CommonController::class, 'search_booking_cloakroom_api']);
Route::get('/internationa-airports', [CommonController::class, 'getInternationalAirports']);
Route::get('/single-serviceDetail', [CommonController::class, 'serviceDetailApi']);
Route::get('/single-locationDetail', [CommonController::class, 'locationDetailApi']);
Route::get('/getaddons', [CommonController::class, 'getCartCategories']);
Route::get('/faq', [CommonController::class, 'faq_api']);
Route::get('/main-search', [CommonController::class, 'main_search_api']);
Route::get('/international-airport-search', [CommonController::class, 'international_search']);
Route::get('/homebanner', [CommonController::class, 'get_banner']);
Route::post('/payments/create-order', [CommonController::class, 'createOrder']);
Route::post('cart-add', [CommonController::class, 'cartAddItems_api']);
Route::post('remove-cart', [CommonController::class, 'removeCartItemApi']);


