<?php

use App\Http\Controllers\WeatherController;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';


Route::get('/',[WeatherController::class, 'index'])->middleware('auth')->name('homepage');
Route::get('/forecast/{city}',[WeatherController::class, 'forecast'])->name('forecast');
Route::view('/search','search')->name('search');
Route::get('search_results',[WeatherController::class, 'search'])->name('search-results');

Route::middleware(['auth',\App\Http\Middleware\RoleCheckMiddleware::class])->prefix('admin')->group(function ()
{

    Route::get('/all-cities',[WeatherController::class, 'all_cities'])->name('all-cities');
    Route::view('/add-city', 'admin.add_city')->name('add-city');
    Route::post('/add-new-city' ,[WeatherController::class, 'add_new_city'])->name('add-new-city');
    Route::get('/edit-city/{city}', [WeatherController::class,'edit_city'])->name('edit-city');
    Route::post('/edit-current-city/{city}', [WeatherController::class,'edit_current_city'])->name('edit-current-city');
    Route::get('/delete-city/{city}', [WeatherController::class, 'delete_city'])->name('delete_city');
    Route::get('/weather', [WeatherController::class, 'edit_temperature'])->name('edit_temperature');
    Route::post('/create_temperature', [WeatherController::class, 'create_temperature'])->name('create-temperature');


});

