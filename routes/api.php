<?php

use App\Http\Controllers\Api\ClientController;
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

# API - Version 01
Route::group(['prefix' => 'v1'], function() 
{
    Route::post('register', [PassportAuthController::class, 'register']);
    Route::post('login',    [PassportAuthController::class, 'login'   ]);
    
    Route::middleware('auth:api')->group(function () {
        Route::apiResources([
            'partners' => PartnerController::class,
        ]);
        
        Route::post('favorite/{partner}', [ClientController::class, 'favoritePartner'   ]);
        Route::get('profile',             [ClientController::class, 'getPersonalData'   ]);
        Route::patch('profile',           [ClientController::class, 'updatePersonalData']);
        Route::get('address',             [ClientController::class, 'getAddressData'    ]);

    });
});
