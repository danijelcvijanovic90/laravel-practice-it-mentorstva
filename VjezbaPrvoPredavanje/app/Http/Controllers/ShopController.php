<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;

class ShopController extends Controller
{
    public function index()
    {
        $products=ProductModel::all();
        return view("/shop", compact('products'));
    }
}
