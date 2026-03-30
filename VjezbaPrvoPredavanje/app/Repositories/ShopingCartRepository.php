<?php

namespace App\Repositories;

use App\Models\ProductModel;

class ShopingCartRepository
{
    private $productModel;

    public function __construct()
    {
        $this->productModel = New ProductModel();
    }

    public function getAmountOfProduct($product)
    {
        return $this->productModel->where('id', $product)->pluck('amount')->first();
    }
}
