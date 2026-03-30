<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartAddRequest;
use App\Repositories\ShopingCartRepository;
use Illuminate\Support\Facades\Session;


class ShopingCartController extends Controller
{
    private $shopingCartRepository;

    public function __construct()
    {
        $this->shopingCartRepository = new ShopingCartRepository();
    }

    public function index()
    {

        //dd(Session::get('product'));
        return view('cart', [
            'cart' => Session::get('product')
        ]);
    }
    public function addToCart(CartAddRequest $request)
    {

        $amount = $this->shopingCartRepository->getAmountOfProduct($request->id);
        //dd($amount);
        if($amount >= $request->amount)
        {
            Session::push('product', [
                'product_id' => $request->id,
                'amount' => $request->amount,
                'name' => $request->name,
            ]);
        }
        else
        {
            return redirect()->back()->with('error', 'Amount can not be greater than available amount');
        }

        return redirect()->route('cart.index');
    }
}
