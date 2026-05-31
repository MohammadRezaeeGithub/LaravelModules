<?php

namespace App\Modules\Basket\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected static function newFactory()
    {
        return \App\Modules\Basket\Database\factories\ProductFactory::new();
    }

    //we check if there is enough qunatity of productu in the stock
    public function hasStock(int $quantity)
    {
        return $this->stock >= $quantity;
    }
}
