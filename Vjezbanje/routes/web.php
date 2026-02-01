<?php

use App\Http\Controllers\ScoreController;
use Illuminate\Support\Facades\Route;


Route::get('/', [ScoreController::class, 'scores']);
Route::view('/add-score', 'add_score');
Route::post('/add-new-score',[ScoreController::class, 'add_new_score']);
