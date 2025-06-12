<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\LegalController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PropertyDetailsController;
use App\Http\Controllers\PropertyInquiryController;
use App\Http\Controllers\PropertyListingController;
use App\Http\Controllers\OurTeamController;
use App\Http\Controllers\UserPermissionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;


Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    return 'All caches cleared!';
});

Route::get('/propertydetails', [
    PropertyDetailsController::class,
    'indexdummy'
])->name('propertydetails.index');

Route::get('/searchs', [
    PropertyDetailsController::class,
    'search'
])->name('propertydetails.search');


Route::get('/', [PropertyListingController::class, 'indexwelcome'])->name('home');
Route::get('/search', [PropertyListingController::class, 'search'])->name('property.search');
Route::get('/fetured-search', [PropertyListingController::class, 'fetured_search'])->name('property.fetured-search');
Route::get('/sell', [PropertyListingController::class, 'sell'])->name('property.sell');
Route::post('/properties/{property}/inquiry', [PropertyInquiryController::class, 'store'])
    ->name('property.inquiry.store');
Route::get('/property/{id}', [PropertyDetailsController::class, 'index'])->name('property.show');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/about-us', [PageController::class, 'aboutus'])->name('aboutus');
Route::get('/our-team', [PageController::class, 'ourteam'])->name('ourteam');
Route::get('/blogs', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blogs/{id}', [BlogController::class, 'details'])->name('blog.details');
Route::get('/join-us', [CareerController::class, 'joinus'])->name('joinus');
Route::post('/join-us/apply', [CareerController::class, 'storeApplication'])->name('joinus.apply');
Route::get('/associates-us', [CareerController::class, 'assosiatewithus'])->name('assosiatewithus');

//  Route::post('/store', [EnquiryController::class, 'store'])->name('property.sell.store');


//  Route::post('/store', [EnquiryController::class, 'store'])->name('property.sell.store');


// Change this line in web.php:
// Route::post('/store', [EnquiryController::class, 'store'])->name('property.sell.store');

// To this:
Route::post('/sell', [EnquiryController::class, 'clientStore'])->name('property.sell.store');
// Add this new route for contact form submissions
Route::post('/contact', [EnquiryController::class, 'contactStore'])->name('contact.store');

// Legal routes
Route::get('/privacy-policy', [LegalController::class, 'privacypolicy'])->name('legal.privacypolicy');
Route::get('/rera-disclaimer', [LegalController::class, 'reradisclaimer'])->name('legal.reradisclaimer');
Route::get('terms-condition', [LegalController::class, 'termscondition'])->name('legal.termscondition');
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
        // Route::get('listofproperties', [PropertyListingController::class, 'list'])->name('admin.listofproperties');

        Route::get('properties', [PropertyListingController::class, 'list'])->name('admin.properties.list');
        Route::get('propertiesfeatured', [PropertyListingController::class, 'indexfetured'])->name('admin.properties.indexfetured');
        Route::get('prelaunch', [PropertyListingController::class, 'prelaunch'])->name('admin.properties.prelaunch');

        Route::get('ourteam', [AdminController::class, 'ourteam'])->name('admin.ourteam');
        Route::get('properties/{property}/edit', [PropertyListingController::class, 'edit'])->name('admin.properties.edit');
        Route::put('properties/{property}/toggle', [PropertyListingController::class, 'toggleStatus'])->name('admin.properties.toggleStatus');
        Route::delete('properties/{property}', [PropertyListingController::class, 'destroy'])->name('admin.properties.destroy');

        Route::get('enquiryformlist', [PropertyInquiryController::class, 'enquiryForm'])->name('admin.enquiryformlist');

        // Route::get('/property/{slug}', [PropertyDetailsController::class, 'index'])->name('admin.propertydetails.index');

        Route::put('properties/{property}', [PropertyListingController::class, 'update'])
            ->name('admin.properties.update');

        Route::delete('properties/images/{image}', [PropertyListingController::class, 'deleteImage'])
            ->name('admin.properties.deleteImage');


        // Blog admin routes
        Route::get('blogs', [BlogController::class, 'admin'])->name('admin.blogs.index'); // admin list view
        Route::get('blogs/home', [BlogController::class, 'indexhome'])->name('admin.blogs.indexhome'); // admin list view
        Route::get('blogs/create', [BlogController::class, 'create'])->name('admin.blogs.create');
        Route::post('blogs', [BlogController::class, 'store'])->name('admin.blogs.store');
        Route::get('blogs/{id}', [BlogController::class, 'show'])->name('admin.blogs.show');
        Route::get('blogs/{id}/edit', [BlogController::class, 'edit'])->name('admin.blogs.edit');
        Route::put('blogs/{id}', [BlogController::class, 'update'])->name('admin.blogs.update');
        Route::delete('blogs/{id}', [BlogController::class, 'destroy'])->name('admin.blogs.destroy');
        Route::put('toggleHomeView/{id}', [BlogController::class, 'toggleHomeView'])->name('admin.blogs.toggleHomeView');


        // Career routes
        Route::get('career/opening', [CareerController::class, 'openingview'])->name('admin.career.opening');
        Route::get('career/opening/create', [CareerController::class, 'create'])->name('admin.career.opening.create');
        Route::post('career/opening/store', [CareerController::class, 'store'])->name('admin.career.opening.store');
        // Edit route (GET)
        Route::get('career/opening/{id}/edit', [CareerController::class, 'edit'])->name('admin.career.opening.edit');

        // Update route (PUT/PATCH)
        Route::put('career/opening/{id}', [CareerController::class, 'update'])->name('admin.career.opening.update');

        // Delete route (DELETE)
        Route::delete('career/opening/{id}', [CareerController::class, 'destroy'])->name('admin.career.opening.destroy');

        // Job applications routes

        Route::get('career/joinussubmitionlist', [CareerController::class, 'joinussubmitionlist'])->name('admin.career.joinussubmitionlist');
        Route::get('career/associateussubmitionlist', [CareerController::class, 'associateussubmitionlist'])->name('admin.career.associateussubmitionlist');
        Route::get('career/applications/{id}', [CareerController::class, 'viewApplication'])->name('admin.career.application.view');
        Route::get('career/applications/{id}/download', [CareerController::class, 'downloadResume'])->name('admin.career.application.download');
        Route::post('career/applications/{id}/status', [CareerController::class, 'updateApplicationStatus'])->name('admin.career.application.status');

        Route::get('/user-permission', [UserPermissionController::class, 'index'])->name('user_permission.index');
        Route::get('/user-permission/create', [UserPermissionController::class, 'create'])->name('user_permission.create');
        Route::post('/user-permission/store', [UserPermissionController::class, 'store'])->name('user_permission.store');
        Route::get('/user-permission/{user}/edit', [UserPermissionController::class, 'edit'])->name('user_permission.edit');
        Route::put('/user-permission/{user}', [UserPermissionController::class, 'update'])->name('user_permission.update');


        // Index - List all team members
        Route::get('/our_team', [OurTeamController::class, 'index'])->name('our_team.index');
        // Create - Show form to add a new member
        Route::get('/our_team/create', [OurTeamController::class, 'create'])->name('our_team.create');
        // Store - Save new member
        Route::post('/our_team', [OurTeamController::class, 'store'])->name('our_team.store');
        // Show - View a single member
        Route::get('/our_team/{our_team}', [OurTeamController::class, 'show'])->name('our_team.show');
        // Edit - Show form to edit an existing member
        Route::get('/our_team/{our_team}/edit', [OurTeamController::class, 'edit'])->name('our_team.edit');
        // Update - Save updated member info
        Route::put('/our_team/{our_team}', [OurTeamController::class, 'update'])->name('our_team.update');
        // Destroy - Delete a member
        Route::delete('/our_team/{our_team}', [OurTeamController::class, 'destroy'])->name('our_team.destroy');


        //Sell

        // Route::get('sell', [EnquiryController::class, 'index'])->name('admin.property.sell');

        // Inside admin routes group
        Route::get('contact', [EnquiryController::class, 'indexcontact'])->name('admin.property.indexcontact');
        Route::prefix('sell')->group(function () {
            Route::get('/', [EnquiryController::class, 'index'])->name('admin.property.sell');
            Route::get('/create', [EnquiryController::class, 'create'])->name('admin.property.sell.create');
            Route::post('/store', [EnquiryController::class, 'store'])->name('admin.property.sell.store');
            Route::get('/{enquiry}', [EnquiryController::class, 'show'])->name('admin.property.sell.show');
            Route::get('/{enquiry}/edit', [EnquiryController::class, 'edit'])->name('admin.property.sell.edit');
            Route::put('/{enquiry}', [EnquiryController::class, 'update'])->name('admin.property.sell.update');
            Route::delete('/{enquiry}', [EnquiryController::class, 'destroy'])->name('admin.property.sell.destroy');
            Route::delete('/{enquiry}/images/{imageIndex}', [EnquiryController::class, 'deleteImage'])
                ->name('admin.property.sell.deleteImage');
        });
    });
});
