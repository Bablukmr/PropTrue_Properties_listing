<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PropertyDetailsController;
use App\Http\Controllers\PropertyListingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('/propertydetails', [
    PropertyDetailsController::class,
    'index'
])->name('propertydetails.index');

Route::get('/search', [
    PropertyDetailsController::class,
    'search'
])->name('propertydetails.search');


Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/join-us', [PageController::class, 'joinus'])->name('joinus');
Route::get('/associates-us', [PageController::class, 'assosiatewithus'])->name('assosiatewithus');
Route::get('/about-us', [PageController::class, 'aboutus'])->name('aboutus');
Route::get('/our-team', [PageController::class, 'ourteam'])->name('ourteam');
// Admin routes
Route::group(['prefix' => 'admin'], function () {
    // Routes for guests (e.g., login, register)
    Route::group(['middleware' => 'admin.guest'], function () {
        Route::get('login', [AdminController::class, 'index'])->name('admin.login');
        Route::post('login', [AdminController::class, 'authenticate'])->name('admin.authenticate');
        Route::get('register', [AdminController::class, 'register'])->name('admin.register');
    });

    // Routes for authenticated admins
    Route::group(['middleware' => 'admin.auth'], function () {
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('form', [AdminController::class, 'form'])->name('admin.form');
        Route::get('table', [AdminController::class, 'table'])->name('admin.table');
        Route::get('logout', [AdminController::class, 'logout'])->name('admin.logout');
        Route::get('propertylisting', [PropertyListingController::class, 'index'])->name('admin.propertylisting');
        Route::post('propertylisting/store', [PropertyListingController::class, 'store'])->name('admin.propertylisting.store');
    });
});
