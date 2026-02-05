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

    public function single_product($product)
    {
        $product= ProductModel::where(['id' => $product])->first();
        return view("/edit_product", compact('product'));
    }

    public function update_product(Request $request,$product_id)
    {
        $single_product=ProductModel::where(["id"=>$product_id])->first();

        if($single_product === null)
            {
                die ("Product does not exist");
            }


        $validated=$request->validate([
            "name" => "string|required|unique:products,name," .$product_id, //ignore unique for this id
            "description" => "string|required|min:5|max:255",
            "amount" => "int|min:1|required",
            "price" => "numeric|gt:0|required",
            "image" => "string|required"
        ]);

        $single_product->update($validated);

    
        return redirect()->route('all_products');
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
