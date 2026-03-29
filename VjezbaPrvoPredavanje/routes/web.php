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

Route::view("/about", "about");
Route::get('/', [HomepageController::class,'index']);
Route::get("/shop",[ShopController::class, 'index']);



Route::middleware(['auth', \App\Http\Middleware\AdminCheckMiddleware::class])->prefix('admin')->group(function()
{
    Route::controller(ContactController::class)->prefix('contact')->as('contact.')->group(function() {
        Route::get('all', 'get_all_contacts')->name('all');
        Route::get("delete/{contact}", 'delete')->name('delete');
        Route::post("update/{contact}", 'update_contact')->name('update');
        Route::get("edit/{contact}", 'edit_contact')->name('edit');
    });

    Route::controller(ShopController::class)->prefix('product')->as('product.')->group(function()
    {
        Route::view("add", 'add_product')->name('add');
        Route::post("add-new-product",  'add_new_product')->name('add.new');
    });

    Route::controller(ProductsController::class)->prefix('product')->as('product.')->group(function()
    {
        Route::get('all',  'index')->name('all');
        Route::get("delete/{product}",  'delete')->name('delete');
        Route::get("edit/{product}",  'single_product')->name('edit');
        Route::post("update/{product}",  'update_product')->name('update');
    });
});


Route::controller(ContactController::class)->prefix('contact')->as('contact.')->group(function()
{
    Route::get("", 'index');
    Route::post("send", 'send_contact')->name('send');
});











