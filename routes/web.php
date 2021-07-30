<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\DeliveryManController;
use App\Http\Controllers\Web\PartnerController;
use App\Http\Controllers\Web\BackofficePartner\PartnerController as BackofficePartnerController;
use App\Http\Controllers\Web\BackofficePartner\ProductController as BackofficeProductController;
use App\Http\Controllers\Web\CategoryController;
use App\Http\Controllers\Web\WebContentController;
use App\Http\Controllers\Web\FrontOfficeController;

require __DIR__.'/auth.php';


#   ROUTES FOR FRONTOFFICE
Route::get('/',           [FrontOfficeController::class, 'showHomePage'      ])->name('home');
Route::get('/about',      [FrontOfficeController::class, 'showAboutPage'     ])->name('about');
Route::get('/faq',        [FrontOfficeController::class, 'showFaqPage'       ])->name('faq');
Route::get('/conditions', [FrontOfficeController::class, 'showConditionsPage'])->name('conditions');
Route::get('/contact',    [FrontOfficeController::class, 'showContactsPage'  ])->name('contact');


#   ROUTES FOR RESOURCES CREATION IN WEB
Route::post('/deliveryman/store', [DeliveryManController::class, 'createDelManFromHome' ])->name('deliveryman.store.home');
Route::post('/partner/store',     [PartnerController::class,     'createPartnerFromHome'])->name('partner.store.home');


#   ROUTES FOR BACKOFICE/ADMIN
Route::group(['prefix' => 'admin', 'middleware' => ['auth','admin']], function() {
    
    Route::get('/', function () {
        return redirect()->route('deliveryman.index');
    })->name('admin');
    
    Route::resource('/deliveryman', DeliveryManController::class);
    Route::resource('/content',     WebContentController::class);
    Route::resource('/partner',     PartnerController::class);
    Route::resource('/category',    CategoryController::class);

});


#   ROUTES FOR BACKOFICE/PARTNER
Route::group(['prefix' => 'partner', 'middleware' => ['auth','partner']], function() {
    Route::get('/', [BackofficePartnerController::class, 'index'])->name('home');
    
    Route::get('/businessdata',  [BackofficePartnerController::class, 'createBusinessData'])->name('partner.createBusiness.data');
    Route::post('/businessdata', [BackofficePartnerController::class, 'storeBusinessData' ])->name('partner.storeBusiness.data');

    Route::get('/productdata',  [BackofficeProductController::class, 'createProductData'])->name('partner.createProduct.data');
    Route::post('/productdata', [BackofficeProductController::class, 'storeProductData' ])->name('partner.storeProduct.data');



});

#   ROUTES FOR BACKOFICE/DELIVERYMAN
Route::group(['prefix' => 'deliveryman', 'middleware' => ['auth','deliveryman']], function() {
    
    Route::get('/', function () {
        return 'DELIVERYMAN';
    });
});