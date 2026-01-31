<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;

class HomepageController extends Controller
{
    public function index()
    {
        $hours=date('H');
        $current_time=date('H:i:s');
        $latest_products=ProductModel::orderBy('id', 'desc')->take(6)->get();
        
        return view('welcome', compact("current_time",'hours','latest_products'));
    }
}
