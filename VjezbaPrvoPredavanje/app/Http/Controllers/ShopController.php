<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveProductRequest;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use App\Models\ProductModel;

class ShopController extends Controller
{

    private $productRepository;

    public function __construct()
    {
        $this->productRepository = new ProductRepository();
    }
    public function index()
    {
        $products=ProductModel::all();
        return view("/shop", compact('products'));
    }

    public function add_product()
    {
        return view("/add_product");
    }

    public function add_new_product(SaveProductRequest $request)
    {
        $this->productRepository->createNew($request);
        return redirect("/admin/all-products");
    }

}
