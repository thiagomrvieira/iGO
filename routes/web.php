<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeliveryManController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\PartnerCategoryController;
use App\Http\Controllers\WebContentController;
use App\Http\Controllers\FrontOfficeController;

require __DIR__.'/auth.php';


#   ROUTES FOR FRONTOFFICE
Route::get('/', [FrontOfficeController::class, 'showHomePage'])->name('home');
Route::get('/about', [FrontOfficeController::class, 'showAboutPage']);
Route::get('/faq', [FrontOfficeController::class, 'showFaqPage']);
Route::get('/conditions', [FrontOfficeController::class, 'showConditionsPage']);
Route::get('/contact', [FrontOfficeController::class, 'showContactsPage']);

#   ROUTES FOR BACKOFICE/ADMIN
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    
    Route::get('/', function () {
        // return view('backoffice.dashboard');
        return redirect()->route('deliveryman.index');
    })->name('admin');
    
    Route::resource('/deliveryman', DeliveryManController::class);
    Route::resource('/content', WebContentController::class);
    Route::resource('/partner', PartnerController::class);
    Route::resource('/category', PartnerCategoryController::class);

});

Route::post('/deliveryman/store', [DeliveryManController::class, 'createDelManFromHome'])->name('deliveryman.store.home');
Route::post('/partner/store', [PartnerController::class, 'createPartnerFromHome'])->name('partner.store.home');

Route::get('/admin/test', [PartnerController::class, 'test'])->name('admin.route')->middleware('admin');
Route::get('/partner/test', [PartnerController::class, 'test'])->name('partner.route')->middleware('partner');
Route::get('/deliveryman/test', [PartnerController::class, 'test'])->name('deliveryman.route')->middleware('deliveryman');