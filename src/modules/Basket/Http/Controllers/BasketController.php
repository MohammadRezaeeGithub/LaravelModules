<?php

namespace App\Modules\Basket\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Basket\Exceptions\QuantityExceededException;
use App\Modules\Basket\Models\Product;
use App\Modules\Basket\Services\Basket\Basket;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    private $basket;

    public function __construct(Basket $basket)
    {
        $this->basket = $basket;
    }

    public function add(Product $product){
        //when the quantity is superior to quantity of stock we get error
        try {
            //calling the basket service, passing the product and quantity to add to basket
            $this->basket->add($product,1);

            return redirect()->route('products.index');

        } catch (QuantityExceededException $th) {
            return back('error','there is not enough quantity of this product');
        }

    }

    public function index()
    {
        $items = $this->basket->all();
        return view('BasketViews::basket',compact('items'));
    }

    //in basket page,if user wants to modify the quantity of the product,the request comes here
    public function update(Product $product,Request $request)
    {
        $this->basket->update($product,$request->quantity);

        return back();
    }
}
