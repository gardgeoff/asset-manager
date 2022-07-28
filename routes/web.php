<?php

use App\Http\Controllers\Admin\AssetControler as AdminAssetController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\UserController;
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


// user routes

// show login
Route::get("/login", [UserController::class, "login"])->name("login");
// authorize login
Route::post("/users/authenticate", [UserController::class, "authenticate"]);
// logout
Route::post("/logout", [UserController::class, "logout"]);
// show register
Route::get("/register", [UserController::class, "create"]);
// register user
Route::post("/users", [UserController::class, "store"]);

Route::get("/", [AssetController::class, "index"]);


// admin routes
Route::name("admin.")->prefix("admin")->middleware(["auth", "auth.isAdmin"])->group(function () {
    Route::resource("/users", AdminUserController::class);
    Route::resource("/assets", AdminAssetController::class);
});