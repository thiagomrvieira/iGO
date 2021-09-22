<?php

use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\FrontOfficeController;
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
    #   AUTH CLIENT
    Route::post('register', [PassportAuthController::class, 'register']);
    Route::post('login',    [PassportAuthController::class, 'login'   ]);
    Route::post('logout',   [PassportAuthController::class, 'logout'  ])->middleware(['auth:api']);;
    
    #   WEB CONTENT
    Route::get('/contents/{content}', [FrontOfficeController::class, 'showContent' ]);
    Route::get('/contents',           [FrontOfficeController::class, 'showContents']);

    Route::middleware('auth:api')->group(function () {

        Route::apiResources([
            'partners' => PartnerController::class,
        ]);

        Route::group(['prefix' => 'client'], function() 
        {
            #   Favorite/Unfavorite Partner
            Route::post('favorite/{partner}', [ClientController::class, 'favoritePartner']);
                    
            #   Get/Update Client personal data
            Route::get('profile',   [ClientController::class, 'getPersonalData'   ]);
            Route::patch('profile', [ClientController::class, 'updatePersonalData']);

            #   Get/Create/Update Client Addresses
            Route::get('addresses',  [ClientController::class, 'getAddressData' ]);
            Route::post('addresses', [ClientController::class, 'updateAddressData']);
        });
        
        

    });
});
