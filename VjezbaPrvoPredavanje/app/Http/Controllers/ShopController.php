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

    public function add_product()
    {
        return view("/add_product");
    }

    public function add_new_product(Request $request)
    {
        $request->validate([
            "name" => "string|required",
            "description" => "string|required|min:5|max:255",
            "amount" => "int|min:1|required",
            "price" => "numeric|gt:0|required",
            "image" => "string|required"
        ]);

        ProductModel::create([
            "name" => $request->get("name"),
            "description" => $request->get("description"),
            "amount" => $request->get("amount"),
            "price" => $request->get("price"),
            "image" => $request->get("image")
        ]);

        return redirect("/admin/add-product");
    }

}
