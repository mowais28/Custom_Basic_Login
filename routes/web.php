<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Models\User;

// Middleware
use App\Http\Middleware\AuthMiddleware;

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


// Login Route
Route::view("/", "app_pages/login")->name("/");
Route::controller(AuthController::class)->group(function () {
    Route::post("login", "login");
    Route::get("logout", "logout")->name('logout');
});


// Admin Routes
Route::prefix("admin")->group(function () {
    // Create User Route
    Route::view("users/add", "app_pages/admin/app_users_pages/create_user")->name("admin/users/add");
    // Admin Controller
    Route::controller(adminController::class)->group(function () {
        // Admin Dashboard
        Route::get("dashboard", "getUserCount")->name("admin/dashboard");
        Route::post("updateAdmin/{id}", "updateCurrentAdmin");
        // User Info
        Route::post("users/addUserForm", "store");
        Route::get("users/all-users", "getAllUser")->name("admin/users/all-users");
        Route::get("users/deleteUser/{id}", "destroy");
        Route::get("users/status/{id}/{status_code}", "statusChange");
        Route::post("users/update-password/{id}", "UpdatePassword");
    });
});


// User Rotues
Route::prefix("user")->group(function () {
    Route::view('dashboard', 'app_pages/user/dashboard')->name('user/dashboard');
    // User Controller 
    Route::controller(UserController::class)->group(function () {
        Route::post("update-password/{id}", "UpdatePassword");
        Route::post("updateUser/{id}", "updateCurrentUser");
    });
});
