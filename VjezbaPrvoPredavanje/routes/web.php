<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ProductsController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/', [HomepageController::class,'index']);

Route::view("/about", "about");

Route::get("/contact",[ContactController::class, 'index']);

Route::get("/shop", [ShopController::class, 'index']);

Route::get("/admin/all-contacts", [ContactController::class, 'get_all_contacts'])->name('all_contacts');

Route::post("/send-contact", [ContactController::class,'send_contact']);

Route::view("/admin/add-product", [ShopController::class,'add_product']);

Route::post("/add-new-product", [ShopController::class, 'add_new_product']);

Route::get('/admin/all-products', [ProductsController::class, 'index'])->name('all_products');

Route::get("/admin/delete-product/{product}", [ProductsController::class, 'delete'])->name('delete_product');

Route::get("/admin/delete-contact/{contact}", [ContactController::class, 'delete'])->name('delete_contact');

Route::get("/admin/edit-product/{product}", [ProductsController::class, 'single_product'])->name('edit_product');

Route::post("/admin/update-product/{product}", [ProductsController::class, 'update_product'])->name('update_product');

Route::get("/admin/edit-contact/{contact}", [ContactController::class, 'edit_contact'])->name('edit_contact');

Route::post("/admin/update-contact/{contact}", [ContactController::class, 'update_contact'])->name('update_contact');
