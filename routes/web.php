<?php

use App\Http\Controllers\Admin\UserController as AdminUserController;
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

Route::get('/', function () {
    return view('welcome');
});
// show login
Route::get("/login", [UserController::class, "login"]);

// logout
Route::post("/logout", [UserController::class, "logout"]);

// authorize login
Route::post("/users/authenticate", [UserController::class, "authenticate"]);


// show register
Route::get("/register", [UserController::class, "create"]);

// register user
Route::post("/users", [UserController::class, "store"]);

// admin routes
Route::name("admin.")->prefix("admin")->group(function () {
    Route::resource("/users", AdminUserController::class);
});