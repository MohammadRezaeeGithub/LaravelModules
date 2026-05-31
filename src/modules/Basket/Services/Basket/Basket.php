<?php

namespace App\Modules\Basket\Services\Basket;

use App\Modules\Basket\Exceptions\QuantityExceededException;
use App\Modules\Basket\Models\Product;
use App\Modules\Basket\Services\Storage\Contracts\StorageInterface;

class Basket
{
    //the type of storage that this class will use, whether sesstion storage or any storage of choice
    private $storage;

    //we pass the StorageInterface to decouple this class from the specific class for storage
    //mybe later we want use database of coockis for storage instead of session
    public function __construct(StorageInterface $storage)
    {
        $this->storage = $storage;
    }


    //adding a product to this basket
    public function add(Product $product, int $quantity)
    {
        //check if the product is already exist, just add the quantity
        if ($this->has($product)) {
            //get method gets the quantity of this product in the basket
            $quantity = $this->get($product)['quantity'] + $quantity;
        }

        //befor adding the product to basket, we check also if there is enough quantity in the basket
        $this->update($product, $quantity);
    }

    //to check if there is enough quantity in the stock and then add it to the basket
    public function update(Product $product, int $quantity)
    {
        //if there is not enough, we throw an exception
        if (!$product->hasStock($quantity)) {
            throw new QuantityExceededException();
        }

        //when user choose the 0 quantity in the basket page,it will remove form the basket with this code.
        //it will unset
        if (!$quantity) {
            return $this->storage->unset($product->id);
        }

        $this->storage->set($product->id, [
            'quantity' => $quantity
        ]);
    }


    // to get the quantity for this product in the basket
    public function get(Product $product)
    {
        return $this->storage->get($product->id);
    }

    //since we have only the id of products in our basket, so we need to get the models of all products in basket for basket details page
    public function all()
    {
        //keys means all the ids, ids are the key in our storage
        //$products -> the models of products in basket, whitout the their quantity
        $products = Product::find(array_keys($this->storage->all()));

        //getting the quantity for each product
        foreach ($products as $product) {
            $product->quantity = $this->get($product)['quantity'];
        }

        return $products;
    }


    //to get the total price of the basket-> basket page detail
    public function subTotal()
    {
        $total = 0;
        foreach ($this->all() as $item) {
            $total += $item->price * $item->quantity;
        }


        return $total;
    }

    //returning the qunatity exist in this basket
    public function itemCount()
    {
        return $this->storage->count();
    }


    //check if the product is already exist in the session.
    public function has(Product $product)
    {
        return $this->storage->exists($product->id);
    }


    public function clear()
    {
        return $this->storage->clear();
    }
}
