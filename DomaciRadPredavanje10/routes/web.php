<?php

use App\Http\Controllers\UserCityController;
use App\Http\Controllers\WeatherController;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';


Route::get('/',[WeatherController::class, 'index'])->name('homepage');
Route::get('/forecast/{city}',[WeatherController::class, 'forecast'])->name('forecast');
Route::get('/search',[UserCityController::class, 'show'])->name('search');
Route::get('search_results',[WeatherController::class, 'search'])->name('search-results');

Route::get('/cities/favourite/{city}',[UserCityController::class, 'favourite'])->name('user-city.favourite');
Route::delete('/cities/favourite/destroy', [UserCityController::class, 'destroy'])->name('user-city.destroy');



Route::middleware(['auth',\App\Http\Middleware\RoleCheckMiddleware::class])->prefix('admin')->group(function ()
{

    Route::view('/add-city', 'admin.add_city')->name('add-city');
    Route::post('/add-new-city' ,[WeatherController::class, 'add_new_city'])->name('add-new-city');
    Route::get('/edit-city/{city}', [WeatherController::class,'edit_city'])->name('edit-city');
    Route::post('/edit-current-city/{city}', [WeatherController::class,'edit_current_city'])->name('edit-current-city');
    Route::get('/delete-city/{city}', [WeatherController::class, 'delete_city'])->name('delete_city');
    Route::get('/weather', [WeatherController::class, 'edit_temperature'])->name('edit_temperature');
    Route::post('/create_temperature', [WeatherController::class, 'create_temperature'])->name('create-temperature');


});

