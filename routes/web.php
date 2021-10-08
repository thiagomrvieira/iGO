<?php

use App\Http\Controllers\LanguageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\DeliveryManController;
use App\Http\Controllers\Web\PartnerController;
use App\Http\Controllers\Web\PartnerCategoryController;
use App\Http\Controllers\Web\WebContentController;
use App\Http\Controllers\Web\FrontOfficeController;
use App\Http\Controllers\Web\CampaignController;
use App\Http\Controllers\Web\BackofficePartner\ProductController as BackofficeProductController;
use App\Http\Controllers\Web\BackofficePartner\PartnerController as BackofficePartnerController;
use App\Http\Controllers\Web\FeaturedController;
use App\Http\Controllers\Web\ShippingFeeController;

#   ROUTES FOR AUTH
require __DIR__.'/auth.php';

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
    Route::resource('/category',    PartnerCategoryController::class);
    Route::resource('/campaign',    CampaignController::class);
    Route::resource('/featured',    FeaturedController::class);
    Route::resource('/shippingfee', ShippingFeeController::class);

});

#   ROUTES FOR BACKOFICE/PARTNER
Route::group(['prefix' => 'partner', 'middleware' => ['auth','partner']], function() {
    Route::get('/', [BackofficePartnerController::class, 'index'])->name('home');

    Route::get('/business',  [BackofficePartnerController::class, 'createBusinessData'])->name('partner.createBusiness.data');
    Route::post('/business', [BackofficePartnerController::class, 'storeBusinessData' ])->name('partner.storeBusiness.data');

    Route::get('/profile',  [BackofficePartnerController::class, 'edit'])->name('partner.profile.edit');
    Route::patch('/profile/{partner}', [BackofficePartnerController::class, 'update'])->name('partner.profile.update');

    Route::resource('/products',   BackofficeProductController::class);

    Route::get('/dashboard',  [BackofficePartnerController::class, 'dashboard'])->name('partner.dashboard');

    Route::post('/extra/remove', [BackofficeProductController::class, 'removeExtra' ])->name('extra.remove');


    // Route::get('/productdata',  [BackofficeProductController::class, 'createProductData'])->name('partner.createProduct.data');
    // Route::post('/productdata', [BackofficeProductController::class, 'storeProductData' ])->name('partner.storeProduct.data');

});

#   ROUTES FOR BACKOFICE/DELIVERYMAN
Route::group(['prefix' => 'deliveryman', 'middleware' => ['auth','deliveryman']], function() {

    Route::get('/', function () {
        return 'DELIVERYMAN';
    });
});

#   ROUTES FOR FRONTOFFICE

Route::get('/',           [FrontOfficeController::class, 'showHomePage'      ])->name('home');
Route::get('/about',      [FrontOfficeController::class, 'showAboutPage'     ])->name('about');
Route::get('/faq',        [FrontOfficeController::class, 'showFaqPage'       ])->name('faq');
Route::get('/conditions', [FrontOfficeController::class, 'showConditionsPage'])->name('conditions');
Route::get('/contact',    [FrontOfficeController::class, 'showContactsPage'  ])->name('contact');


Route::get('lang/{lang}', [LanguageController::class, 'switchLang'])->name('lang.switch');