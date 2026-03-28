<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\ProductModel;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    private $productRepository;

    public function __construct()
    {
        $this->productRepository = new ProductRepository();
    }

    public function index()
    {
        $products=ProductModel::all();

        return view('/all_products', compact('products'));

    }

    public function single_product(ProductModel $product)
    {
        return view("/edit_product", compact('product'));
    }

    public function update_product(UpdateProductRequest $request, ProductModel $product)
    {
        $product->update($request->validated());
        return redirect()->route('all_products');
    }

    public function delete($product)
    {
        //$single_product= ProductModel::where(['id' => $product])->first(); // SELECT * FROM products WHERE id=:product LIMIT 1

        $single_product = $this->productRepository->getProductById($product);
        if($single_product === null)
            {
                return redirect()->back()->with('error', 'Not valid ID'); //testing purposes, later fix errors in proper way.
            }

        $single_product->delete();

        return redirect()->back();

    }
}
