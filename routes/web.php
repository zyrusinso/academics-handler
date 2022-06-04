<?php

use App\Http\Controllers\Dashboard\Settings\ProfileController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReferenceController;
use App\Http\Controllers\Dashboard\DashHomeController;
use App\Http\Controllers\Dashboard\ServiceController;
use App\Http\Controllers\Dashboard\PackageController;
use App\Http\Controllers\Dashboard\EventController;
use App\Http\Controllers\Dashboard\AboutController;
use App\Http\Controllers\Dashboard\Blog\CategoryController;
use App\Http\Controllers\Dashboard\Blog\PostController;
use App\Http\Controllers\Dashboard\Blog\SettingController;


Route::get('/', [HomeController::class, 'welcome'])->name('welcome');

Auth::routes(['verify' => true]);


// FRONT UI
Route::get('/home', function(){
    return redirect(route('welcome'));
})->name('home');
Route::get('/services', [HomeController::class, 'services'])->name('home.services');
Route::get('/about', [HomeController::class, 'about'])->name('home.about');
Route::get('/reference', [ReferenceController::class, 'index'])->name('reference.index');
Route::get('/packages', [HomeController::class, 'package'])->name('home.package');
Route::get('/blog', [HomeController::class, 'blog'])->name('blog.index');
Route::post('/blog', [HomeController::class, 'blogSearch'])->name('blog.search');
Route::get('/blog/{id}', [HomeController::class, 'blogShow'])->name('home.blog');
Route::post('/blog/{id}', [HomeController::class, 'blogAddComment'])->name('blog.comment.add');
Route::get('/blog/category/{id}', [HomeController::class, 'blogCategory'])->name('blog.category');

//Feedback
Route::post('/feedback', [HomeController::class, 'feedbackStore'])->name('feedback.store');

// BACKEND - DASHBOARD
Route::middleware(['admin', 'auth', 'verified'])->prefix('dashboard')->group(function() {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    
    //Dashboard home
    Route::resource('home',DashHomeController::class);
 
    //Services
    Route::prefix('services')->group(function(){
        //Essay or Service Route
        Route::get('/', [ServiceController::class, 'services'])->name('dashboard.services');
        Route::get('/create', [ServiceController::class, 'create'])->name('services.create');
        Route::post('/store', [ServiceController::class, 'store'])->name('services.store');
        Route::get('{id}', [ServiceController::class, 'show'])->name('services.show');
        Route::patch('{id}', [ServiceController::class, 'update'])->name('services.update');
        Route::delete('{id}', [ServiceController::class, 'destroy'])->name('services.destroy');
    });

    //Service-Dissertation Route
    Route::prefix('dissertation')->group(function(){
        Route::get('/', [ServiceController::class, 'Dissertation'])->name('dashboard.dissertation');
        Route::get('/create', [ServiceController::class, 'DissertationCreate'])->name('dissertation.create');
        Route::post('/store', [ServiceController::class, 'DissertationStore'])->name('dissertation.store');
        Route::get('{id}', [ServiceController::class, 'DissertationShow'])->name('dissertation.show');
        Route::patch('{id}', [ServiceController::class, 'DissertationUpdate'])->name('dissertation.update');
        Route::delete('{id}', [ServiceController::class, 'DissertationDestroy'])->name('dissertation.destroy');
    });
    
    //Service-Other Route
    Route::prefix('other')->group(function(){
        Route::get('/', [ServiceController::class, 'Other'])->name('dashboard.other');
        Route::get('/create', [ServiceController::class, 'OtherCreate'])->name('other.create');
        Route::post('/store', [ServiceController::class, 'OtherStore'])->name('other.store');
        Route::get('{id}', [ServiceController::class, 'OtherShow'])->name('other.show');
        Route::patch('{id}', [ServiceController::class, 'OtherUpdate'])->name('other.update');
        Route::delete('{id}', [ServiceController::class, 'OtherDestroy'])->name('other.destroy');
    });

    //Package
    Route::prefix('package')->group(function(){
        Route::get('/', [PackageController::class, 'index'])->name('dashboard.package');
        Route::get('/create', [PackageController::class, 'create'])->name('package.create');
        Route::post('/store', [PackageController::class, 'store'])->name('package.store');
        Route::get('{id}', [PackageController::class, 'show'])->name('package.show');
        Route::patch('{id}', [PackageController::class, 'update'])->name('package.update');
    });

    //About
    Route::resource('about', AboutController::class);

    //Events
    Route::resource('event', EventController::class);

    //Blog-Category
    Route::resource('category', CategoryController::class);
    
    //Blog-Post
    Route::resource('post', PostController::class);

    //Blog-Setting
    Route::get('blog/settings', [SettingController::class, 'index'])->name('blog.settings');
    Route::post('blog/settings', [SettingController::class, 'store'])->name('blog.settings.store');
        
    
    // Settings
    Route::resource('profile', ProfileController::class);
    Route::put('profile/password-update/{profile}', [ProfileController::class, 'password_update'])->name('profile.password.update');

});
