<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\DeliveryManController;
use App\Http\Controllers\Web\PartnerController;
use App\Http\Controllers\Web\PartnerCategoryController;
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
    Route::resource('/category',    PartnerCategoryController::class);

});


#   ROUTES FOR BACKOFICE/PARTNER
Route::group(['prefix' => 'partner', 'middleware' => ['auth','partner']], function() {
    
    Route::get('/', function () {
        return 'PARTNER';
    });

});

#   ROUTES FOR BACKOFICE/DELIVERYMAN
Route::group(['prefix' => 'deliveryman', 'middleware' => ['auth','deliveryman']], function() {
    
    Route::get('/', function () {
        return 'DELIVERYMAN';
    });
});