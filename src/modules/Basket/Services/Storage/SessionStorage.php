<?php

namespace App\Modules\Basket\Services\Storage;

use App\Modules\Basket\Services\Storage\Contracts\StorageInterface;
use Countable;

class SessionStorage implements StorageInterface, Countable
{
    private $bucket;

        //since the session is a key->value array, this name works as a key in session array
    public function __construct($bucket = 'default')
    {
        $this->bucket = $bucket;
    }

    public function get($index)
    {
        return session()->get($this->bucket . '.' . $index);
    }

    //the logic for this method
    // [ this is sesstion array
    //     '$this->bucket'=>[.               'cart' => [
    //         '$index' => $value.                  'items' => 5
    //     ]                                  ]
    // ]
    public function set($index, $value)
    {
        return session()->put($this->bucket . '.' . $index, $value);
    }

    public function all()
    {
        //if the bucket does not exist, it returns null and we get error when we want to show basket's quantity in the nowbar
        //so when it dose not exist we return  an empty array, there for the count method can return zero
        return session()->get($this->bucket) ?? [];
    }

    public function exists($index)
    {
        return session()->has($this->bucket . '.' . $index);
    }

    public function unset($index)
    {
        return session()->forget($this->bucket . '.' . $index);
    }

    public function clear()
    {
        return session()->forget($this->bucket);
    }

    public function count()
    {
        return count($this->all());
    }
}
