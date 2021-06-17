<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeliveryManController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\FrontOfficeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


#   ROUTES FOR FRONTOFFICE
Route::get('/', [FrontOfficeController::class, 'showHomePage']);
Route::get('/about', [FrontOfficeController::class, 'showAboutPage']);
Route::get('/faq', [FrontOfficeController::class, 'showFaqPage']);
Route::get('/conditions', [FrontOfficeController::class, 'showConditionsPage']);

#   ROUTES FOR BACKOFICE/ADMIN
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    
    Route::get('/', function () {
        return view('backoffice.dashboard');
    })->name('admin');
    
    Route::resource('/deliveryman', DeliveryManController::class);
    Route::resource('/content', ContentController::class);

});