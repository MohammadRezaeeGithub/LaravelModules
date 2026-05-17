<?php

namespace App\Modules\Basket\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Basket\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('BasketViews::layout',compact('products'));
    }
}
