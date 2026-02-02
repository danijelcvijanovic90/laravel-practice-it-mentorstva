<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;


Route::get('/', [HomepageController::class,'index']);

Route::view("/about", "about");

Route::get("/contact",[ContactController::class, 'index']);

Route::get("/shop", [ShopController::class, 'index']);

Route::get("/admin/all-contacts", [ContactController::class, 'get_all_contacts']);

Route::post("/send-contact", [ContactController::class,'send_contact']);

Route::get("/admin/add-product", [ShopController::class,'add_product']);

Route::post("/add-new-product", [ShopController::class, 'add_new_product']);

Route::get('/admin/all-products', [ProductsController::class, 'index']);

Route::get("/admin/delete-product/{product}", [ProductsController::class, 'delete'])->name('delete_product');

Route::get("/admin/delete-contact/{contact}", [ContactController::class, 'delete'])->name('delete_contact');






