<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\GetInfoController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\API\RegisterController;
use App\Models\Category;
use App\Models\Order;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::auto('/getinfo', GetInfoController::class);
Route::auto('/order', OrderController::class);
Route::post('register',[RegisterController::class,'register']);
Route::post('login',[RegisterController::class,'login']);




Route::middleware('auth:sanctum')->group(function(){
    Route::apiResource('categories',CategoryController::class);
    Route::apiResource('posts',PostController::class);

});


Route::post('createPhone',[CategoryController::class, 'createPhone']);
Route::get('getPhones',[CategoryController::class, 'getPhones']);
Route::get('filterPhone',[CategoryController::class, 'filterPhone']);
Route::get('yearlyPhones',[CategoryController::class, 'yearlyPhones']);
Route::get('monthlyPhones',[CategoryController::class, 'monthlyPhones']);

/* Route::apiResource('categories',CategoryController::class);
Route::apiResource('posts',PostController::class); */
