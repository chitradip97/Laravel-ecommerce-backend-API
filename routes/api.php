<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\userController;


Route::get('/customer-view',[adminController::class,'view_customer']);
Route::delete('/customer-view/{id}',[adminController::class,'view_customer_Del']);
// admin category
Route::post('/category',[adminController::class,'add_category']);
Route::get('/category',[adminController::class,'view_category']);
Route::delete('/category/{id}',[adminController::class,'category_Del']);
Route::put('/category/{id}',[adminController::class,'category_Update']);
// admin products
Route::post('/products',[adminController::class,'add_product']);
Route::get('/products',[adminController::class,'view_product']);
Route::delete('/products/{id}',[adminController::class,'product_Del']);
Route::put('/products/{id}',[adminController::class,'product_Update']);
// admin register
Route::post('/register',[adminController::class,'add_register']);
Route::get('/register',[adminController::class,'view_register']);
// admin Order list
Route::get('/orders',[adminController::class,'view_orders']);





// User Product search
Route::get('/products/{id}',[userController::class,'product_search']);
// user Registration
Route::post('/user-register',[userController::class,'add_user_register']);
Route::get('/user-register',[userController::class,'view_user_register']);
// user Order
Route::post('/orders',[userController::class,'add_order']);
/*`
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('/customer-view',[adminController::class,'view_customer']);

