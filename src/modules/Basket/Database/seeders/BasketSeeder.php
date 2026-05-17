<?php

namespace App\Modules\Basket\Database\seeders;

use App\Modules\Basket\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BasketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            Product::factory()
            ->count(10)
            ->create();
    }
}
