<?php

use App\Http\Controllers\CardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrganizerController;
use App\Http\Controllers\ResourceController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, "home"]);

Auth::routes(
    [
        "register"=>false,
    ]
);

Route::group(['middleware'=>'admin'], function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource("/resources", ResourceController::class);
    Route::resource("/categories", CategoryController::class);
    Route::resource("/cards", CardController::class);
    Route::resource("/faqs", FaqController::class);
    Route::resource("/organizers", OrganizerController::class);
});
