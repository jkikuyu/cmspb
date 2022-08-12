<?php

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

Route::controller(App\Http\Controllers\Auth\LoginController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get("/user/randomuserid", [App\Http\Controllers\Api\UserController::class, 'generateRandomUserId']);
Route::apiResource(name: "complaints", controller: App\Http\Controllers\Api\ComplaintController::class);

Route::apiResource(name: "pagecontents", controller: App\Http\Controllers\Api\PageContentController::class);
