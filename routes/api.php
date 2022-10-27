<?php

use App\Http\Requests\ComplaintRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
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

//Route::get('/complaints/listRecords', 'App\Http\Controllers\Api\ComplaintController@listRecords')->name('complaints.listRecords');

Route::apiResource(name: "complaints", controller: App\Http\Controllers\Api\ComplaintController::class);

Route::get('/complaints/{complaint}', [App\Http\Controllers\Api\ComplaintController::class, 'show'])
        ->missing(function (Request $request) {

            return Redirect::route('complaints.index');
        });


Route::apiResource(name: "pagecontents", controller: App\Http\Controllers\Api\PageContentController::class);
//Route::view("/{any}", "/ims/")->where("any", ".*");
Route::any('/{any}', function () {
    return view('welcome');
})->where(['any' => '.*']);
