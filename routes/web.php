<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontPages;
use App\Http\Controllers\DrinkController;
use App\Http\Controllers\SpecialItemController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BeverageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\NotificationController;

use Illuminate\Support\Facades\Auth;




Route::get('/', [BeverageController::class, 'drinks'])->name('drinks');
// Authentication Routes
Auth::routes(['verify' => true]);

// Auth routes for login and register
Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);

// Home route after login
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('verified')->name('beverage');

// Group routes with middleware 'verified'
Route::middleware(['auth', 'verified'])->group(function () {
    // Admin routes
    Route::prefix('admin')->group(function () {
        Route::get('beverages/add', [DashboardController::class, 'dashBoard'])->name('add.beverage');
        Route::get('categories/add', [DashboardController::class, 'category'])->name('add.category');
        Route::get('users/addUser', [DashboardController::class, 'user'])->name('add.user');
        Route::get('beverages', [DashboardController::class, 'beverages'])->name('beverages');
        Route::get('categories', [DashboardController::class, 'categories'])->name('categories');
        Route::get('beverages/{id}/edit', [DashboardController::class, 'editBeverage'])->name('edit.beverage');
        Route::get('categories/{id}/edit', [DashboardController::class, 'editCategory'])->name('edit.category');
        Route::get('users/{id}/edit', [DashboardController::class, 'editUser'])->name('edit.user');
        Route::get('messages', [DashboardController::class, 'messages'])->name('messages.index');
        // Route::get('showMessage', [DashboardController::class, 'showMessage'])->name('showMessage.index');
    });

    // Beverages routes
    Route::prefix('beverages')->group(function () {

        Route::get('/', [BeverageController::class, 'index'])->name('beverages.index');
        Route::get('add', [BeverageController::class, 'create'])->name('beverages.create');
        Route::post('insert', [BeverageController::class, 'store'])->name('beverages.store');
        Route::get('{id}/edit', [BeverageController::class, 'edit'])->name('beverages.edit');
        Route::put('update/{id}', [BeverageController::class, 'update'])->name('beverages.update');
        Route::delete('destroy/{id}', [BeverageController::class, 'destroy'])->name('beverages.destroy');
        Route::get('show/{id}', [BeverageController::class, 'show'])->name('beverages.show');

    });

    // Categories routes
    Route::prefix('categories')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
        Route::get('add', [CategoryController::class, 'create'])->name('categories.add');
        Route::post('insert', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::put('update/{id}', [CategoryController::class, 'update'])->name('categories.update');
        Route::delete('destroy/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    });

    // Users routes
    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::get('addUser', [UserController::class, 'create'])->name('users.create');
        Route::post('addUser', [UserController::class, 'store'])->name('addUser.store');
        Route::get('show/{id}', [UserController::class, 'show'])->name('users.show');
        Route::get('{id}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('users/{id}', [UserController::class, 'update'])->name('users.update');
    });

    // Messages routes
    Route::prefix('messages')->group(function () {
        Route::get('/', [MessageController::class, 'index'])->name('messages.index');
        Route::get('create', [MessageController::class, 'create'])->name('messages.create');
        Route::get('{id}', [MessageController::class, 'show'])->name('messages.show');
        Route::post('/', [MessageController::class, 'store'])->name('messages.store');
        Route::delete('{id}', [MessageController::class, 'destroy'])->name('messages.destroy');
        Route::post('mark-as-read', [NotificationController::class, 'showNotifications']);


    });
});


// routes with the same prefix
Route::prefix('/')->group(function () {
    Route::get('about', [FrontPages::class, 'aboutAS'])->name('aboutAS');
    Route::get('contact', [FrontPages::class, 'contactUs'])->name('contactUs');
    Route::post('contact', [ContactController::class, 'store'])->name('contact.store');
});
// Special items route
Route::get('special-items', [SpecialItemController::class, 'showSpecialItems'])->name('specialItem');