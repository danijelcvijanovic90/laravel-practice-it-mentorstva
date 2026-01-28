<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomepageController::class,'index']);

Route::view("/about", "about");

Route::get("/contact",[ContactController::class, 'index']);

Route::get("/shop", [ShopController::class, 'index']);

Route::get("/admin/all-contacts", [ContactController::class, 'get_all_contacts']);






