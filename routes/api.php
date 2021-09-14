<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PassportAuthController;
use App\Http\Controllers\Api\PartnerController;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


# API - Version 01
Route::group(['prefix' => 'v1'], function() 
{
    Route::post('register', [PassportAuthController::class, 'register']);
    Route::post('login',    [PassportAuthController::class, 'login']);
    
    Route::middleware('auth:api')->group(function () {
        Route::apiResources([
            'partners' => PartnerController::class,
        ]);
    });
});
