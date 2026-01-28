<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    protected $table="products";

    protected $fillable=['name','description','amount','price','image'];

    public static function get_latest_products()
    {
        return self::orderBy('created_at','desc')->limit(6)->get();
    }
}
