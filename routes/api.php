<?php

use App\Http\Controllers\Api\CartController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\FrontOfficeController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\PassportAuthController;
use App\Http\Controllers\Api\PartnerController;
use App\Http\Controllers\Api\ShippingFeeController;

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
            'partners'     => PartnerController::class,
            'shippingfees' => ShippingFeeController::class,
            'cart'         => CartController::class,
            // 'orders'       => OrderController::class,
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
        
        Route::get('shippingfees/{from}/{to}',  [ShippingFeeController::class, 'showByFromTo' ]);
        #   Show partner products
        Route::get('partners/{id}/products',    [PartnerController::class, 'showProducts' ]);
        

    });
});
