<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\Client\AddressController as ClientAddressController;
use App\Http\Controllers\Api\Client\CartController    as ClientCartController;
use App\Http\Controllers\Api\Client\OrderController   as ClientOrderController;
use App\Http\Controllers\Api\Client\ClientController;
use App\Http\Controllers\Api\Client\DeliverymanRatingController;
use App\Http\Controllers\Api\Client\OrderRatingController;
use App\Http\Controllers\Api\Client\PartnerRatingController;
use App\Http\Controllers\Api\Client\ProductRatingController;
use App\Http\Controllers\Api\Client\ReceiptController;
use App\Http\Controllers\Api\CountyController;
use App\Http\Controllers\Api\FrontOfficeController;
use App\Http\Controllers\Api\PartnerCategoryController;
use App\Http\Controllers\Api\PassportAuthController;
use App\Http\Controllers\Api\PartnerController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ShippingFeeController;

use App\Http\Controllers\Api\Deliveryman\OrderController as DeliverymanOrderController;
use App\Http\Controllers\Web\CampaignController;
use App\Models\Campaign;

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
            'shippingfees' => ShippingFeeController::class,
            
        ]);
        
        #   CLIENT ENDPOINTS
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
            Route::get('addresses',         [ClientAddressController::class, 'index'  ]);
            Route::post('addresses',        [ClientAddressController::class, 'update' ]);
            Route::delete('addresses/{id}', [ClientAddressController::class, 'destroy']);
            
            #   Review & Rating
            Route::post('order/{id}/orderrating',       [OrderRatingController::class,       'store']);
            Route::post('order/{id}/deliverymanrating', [DeliverymanRatingController::class, 'store']);
            Route::post('order/{id}/productrating',     [ProductRatingController::class,     'store']);
            Route::post('order/{id}/partnerrating',     [PartnerRatingController::class,     'store']);

            Route::apiResources([
                'cart'         => ClientCartController::class,
                'partners'     => PartnerController::class,
                'categories'   => PartnerCategoryController::class,
                'products'     => ProductController::class,
                'receipt'      => ReceiptController::class,
            ]);

            #   ORDERS
            Route::get('orders',                [ClientOrderController::class, 'index'     ]);
            Route::get('order/checkout',        [ClientOrderController::class, 'checkout'  ]);
            Route::post('order/checkout',       [ClientOrderController::class, 'update'    ]);
            Route::post('order/promocode',      [ClientOrderController::class, 'promocode' ]);
            Route::post('order/submit',         [ClientOrderController::class, 'submit'    ]);
            Route::get('order/inprogress',      [ClientOrderController::class, 'inProgress']);
            Route::get('order/{id}',            [ClientOrderController::class, 'show'      ]);
            Route::post('order/{id}/replicate', [ClientOrderController::class, 'replicate' ]);
            Route::patch('order/{id}/cancel',   [ClientOrderController::class, 'cancel'    ]);

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

        #   DELIVERYMAN ENDPOINTS
        Route::group(['prefix' => 'deliveryman', 'middleware' => ['deliveryman']], function() 
        {
            #   ORDERS
            Route::get('orders',             [DeliverymanOrderController::class, 'index'                 ]);
            Route::get('orders/new',         [DeliverymanOrderController::class, 'getNewOrderList'       ]);
            Route::get('orders/inprogress',  [DeliverymanOrderController::class, 'getInProgressOrderList']);
            Route::get('orders/completed',   [DeliverymanOrderController::class, 'getCompletedOrderList' ]);
            Route::get('orders/refused',     [DeliverymanOrderController::class, 'getRefusedOrderList'   ]);
            Route::get('orders/{id}/accept', [DeliverymanOrderController::class, 'acceptOrder'           ]);

        });
        
        Route::get('shippingfees/{from}/{to}',  [ShippingFeeController::class, 'showByFromTo' ]);
        
        #   COUNTIES
        Route::get('counties',      [CountyController::class, 'index']);
        Route::get('counties/{id}', [CountyController::class, 'show' ]);

    });
});
