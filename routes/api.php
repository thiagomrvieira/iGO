<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\General\CountyController;
use App\Http\Controllers\Api\General\FrontOfficeController;
use App\Http\Controllers\Api\General\ShippingFeeController;
use App\Http\Controllers\Api\General\ProvinceController;
use App\Http\Controllers\Api\General\PassportAuthController;

use App\Http\Controllers\Api\Client\AddressController       as ClientAddressController;
use App\Http\Controllers\Api\Client\CartController          as ClientCartController;
use App\Http\Controllers\Api\Client\OrderController         as ClientOrderController;
use App\Http\Controllers\Api\Client\ClientController;
use App\Http\Controllers\Api\Client\DeliverymanRatingController;
use App\Http\Controllers\Api\Client\OrderRatingController;
use App\Http\Controllers\Api\Client\PartnerRatingController as ClientPartnerRatingController;
use App\Http\Controllers\Api\Client\ProductRatingController;
use App\Http\Controllers\Api\Client\ReceiptController;
use App\Http\Controllers\Api\Client\PartnerCategoryController;
use App\Http\Controllers\Api\Client\PartnerController;
use App\Http\Controllers\Api\Client\ProductController;

use App\Http\Controllers\Api\Deliveryman\OrderController as DeliverymanOrderController;

use App\Http\Controllers\Api\Partner\OrderController         as PartnerOrderController;
use App\Http\Controllers\Api\Partner\PartnerController       as PartnerProfileController;
use App\Http\Controllers\Api\Partner\PartnerRatingController as PartnerRatingController;


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
    /*
    |--------------------------------------------------------------------------
    | GENERAL ENDPOINTS
    |--------------------------------------------------------------------------
    */ 
    
    #   COUNTIES
    Route::prefix('counties')->group(function () 
    {
        Route::get('/',     [CountyController::class, 'index']);
        Route::get('/{id}', [CountyController::class, 'show' ]);
    });
    
    #   PROVINCES
    Route::prefix('provinces')->group(function () 
    {
        Route::get('/',     [ProvinceController::class, 'index']);
        Route::get('/{id}', [ProvinceController::class, 'show' ]);
    });

    #   WEB CONTENT
    Route::prefix('contents')->group(function () 
    {
        Route::get('/',          [FrontOfficeController::class, 'showContents']);
        Route::get('/{content}', [FrontOfficeController::class, 'showContent' ]);
    });

    #   SHIPPING FEE
    Route::apiResources([
        'shippingfees' => ShippingFeeController::class,
    ]);
    Route::get('shippingfees/{from}/{to}',  [ShippingFeeController::class, 'showByFromTo' ]);

    #   AUTH CLIENT
    Route::post('register', [PassportAuthController::class, 'register']);
    Route::post('login',    [PassportAuthController::class, 'login'   ]);
    Route::post('logout',   [PassportAuthController::class, 'logout'  ])->middleware(['auth:api']);;
    
    /*
    |--------------------------------------------------------------------------
    | AUTH PROTECTED ENDPOINTS
    |--------------------------------------------------------------------------
    */ 
    Route::middleware('auth:api')->group(function () {

        /*
        |--------------------------------------------------------------------------
        | CLIENT ENDPOINTS
        |--------------------------------------------------------------------------
        */
        Route::group(['prefix' => 'client', 'middleware' => ['client']], function() 
        {
            
            #   Get/Update Client personal data
            Route::get('profile',   [ClientController::class, 'getPersonalData'   ]);
            Route::patch('profile', [ClientController::class, 'updatePersonalData']);

            Route::patch('password', [ClientController::class, 'updatePassWord']);
            Route::post('image',     [ClientController::class, 'updateImage'   ]);
            
            #   Favorite/Unfavorite Partner
            Route::post('favorite/{partner}', [ClientController::class, 'favoritePartner']);
            
            #   ADDRESSES
            Route::prefix('addresses')->group(function () 
            {
                Route::get('/',         [ClientAddressController::class, 'index'  ]);
                Route::post('/',        [ClientAddressController::class, 'update' ]);
                Route::delete('{id}',   [ClientAddressController::class, 'destroy']);
            });

            #   Review & Rating
            Route::post('order/{id}/orderrating',       [OrderRatingController::class,         'store']);
            Route::post('order/{id}/deliverymanrating', [DeliverymanRatingController::class,   'store']);
            Route::post('order/{id}/productrating',     [ProductRatingController::class,       'store']);
            Route::post('order/{id}/partnerrating',     [ClientPartnerRatingController::class, 'store']);
            
            Route::apiResources([
                'cart'         => ClientCartController::class,
                'partners'     => PartnerController::class,
                'categories'   => PartnerCategoryController::class,
                'products'     => ProductController::class,
            ]);

            #   CLIENT ORDERS
            Route::prefix('orders')->group(function () 
            {
                Route::get('/',               [ClientOrderController::class, 'index'     ]);
                Route::get('checkout',        [ClientOrderController::class, 'checkout'  ]);
                Route::post('checkout',       [ClientOrderController::class, 'update'    ]);
                Route::post('promocode',      [ClientOrderController::class, 'promocode' ]);
                Route::post('submit',         [ClientOrderController::class, 'submit'    ]);
                Route::get('inprogress',      [ClientOrderController::class, 'inProgress']);
                Route::get('{id}',            [ClientOrderController::class, 'show'      ]);
                Route::post('{id}/replicate', [ClientOrderController::class, 'replicate' ]);
                Route::patch('{id}/cancel',   [ClientOrderController::class, 'cancel'    ]);
                Route::get('{id}/receipt',    [ReceiptController::class,     'show' ]);

            });
            #   Show Main and Sub categories
            Route::get('maincategories', [PartnerCategoryController::class,  'showMain']);
            Route::get('subcategories',  [PartnerCategoryController::class,  'showSub' ]);

            #   Show partner products
            Route::get('partners/{id}/products', [PartnerController::class, 'showProducts']);
            #   Show partner reviews
            Route::get('partners/{id}/reviews',  [PartnerController::class, 'showReviews' ]);
            
            #   Remove all Products from Cart
            Route::delete('cleancart', [ClientCartController::class, 'removeAll']);

        });
        
        /*
        |--------------------------------------------------------------------------
        | DELIVERYMAN ENDPOINTS
        |--------------------------------------------------------------------------
        */ 
        Route::group(['prefix' => 'deliveryman', 'middleware' => ['deliveryman']], function() 
        {
            #   DEIVERYMAN ORDERS
            Route::prefix('orders')->group(function () 
            {
                Route::get('/',           [DeliverymanOrderController::class, 'index'                 ]);
                Route::get('new',         [DeliverymanOrderController::class, 'getNewOrderList'       ]);
                Route::get('inprogress',  [DeliverymanOrderController::class, 'getInProgressOrderList']);
                Route::get('completed',   [DeliverymanOrderController::class, 'getCompletedOrderList' ]);
                Route::get('refused',     [DeliverymanOrderController::class, 'getRefusedOrderList'   ]);
                Route::get('{id}/accept', [DeliverymanOrderController::class, 'acceptOrder'           ]);
            });
        });
        
        
        
        /*
        |--------------------------------------------------------------------------
        | PARTNER ENDPOINTS
        |--------------------------------------------------------------------------
        */
        Route::group(['prefix' => 'partner', 'middleware' => ['partner']], function() 
        {
            #   PARTNER ORDERS
            Route::prefix('orders')->group(function () 
            {
                Route::get('/',             [PartnerOrderController::class, 'index'                 ]);
                Route::get('new',           [PartnerOrderController::class, 'getNewOrderList'       ]);
                Route::get('inprogress',    [PartnerOrderController::class, 'getInProgressOrderList']);
                Route::get('completed',     [PartnerOrderController::class, 'getCompletedOrderList' ]);
                Route::get('refused',       [PartnerOrderController::class, 'getRefusedOrderList'   ]);
                Route::get('{id}',          [PartnerOrderController::class, 'show'                  ]);
                Route::get('{id}/accept',   [PartnerOrderController::class, 'acceptOrder'           ]);
                Route::patch('{id}/refuse', [PartnerOrderController::class, 'refuseOrder'           ]);
                Route::patch('{id}/finish', [PartnerOrderController::class, 'finishOrder'           ]);
            });
        
            #   PARTNER PROFILE
            Route::prefix('profile')->group(function () 
            {
                #   Get/Update Partner data
                Route::get('/',   [PartnerProfileController::class, 'getPartnerData'   ]);
                Route::patch('/', [PartnerProfileController::class, 'updatePartnerData']);
            });
            
            #   PARTNER CONTACTS
            Route::get('/contacts',   [PartnerProfileController::class, 'getPartnerContacts']);

            #   PARTNER REVIEW & RATING
            Route::prefix('reviews')->group(function () 
            {
                #   Get Partner Reviews and Rating
                Route::get('/',     [PartnerRatingController::class, 'index' ]);
                Route::get('/{id}', [PartnerRatingController::class, 'show'  ]);
            });

        });

    });

});
