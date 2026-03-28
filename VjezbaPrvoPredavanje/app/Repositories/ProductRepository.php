<?php

namespace App\Repositories;

use App\Models\ProductModel;
use Illuminate\Http\Request;

class ProductRepository
{
    //DI - dependency injection
    // Allowing us to have access to ProductModel

    private $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    public function createNew ($request)
    {
        $this->productModel->create([

                "name" => $request->get("name"),
                "description" => $request->get("description"),
                "amount" => $request->get("amount"),
                "price" => $request->get("price"),
                "image" => $request->get("image")
        ]);
    }

    public function getProductById ($product)
    {
        // SELECT * FROM products WHERE id=:product LIMIT 1
        return $this->productModel::where(['id' => $product])->first();
    }


}
