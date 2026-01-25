<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
   return view('welcome');
});

Route::get("/contact", function()
{
    return view("contact");
});

Route::get("/about", function()
{
    return view("about");
});

//Route::view("/contact", "contact");

Route::get("/shop", function()
{
    return view("shop");
});






