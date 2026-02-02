<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products=ProductModel::all();

        return view('/all_products', compact('products'));

    }

    public function delete($product)
    {
        $single_product= ProductModel::where(['id' => $product])->first(); // SELECT * FROM products WHERE id=:product LIMIT 1

        if($single_product === null)
            {
                die ("Product does not exists"); //testing purposes, later fix errors in proper way.
            }

        $single_product->delete();

        return redirect()->back();

    }
}
