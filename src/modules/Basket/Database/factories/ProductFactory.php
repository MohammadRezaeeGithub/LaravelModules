<?php

namespace App\Modules\Basket\Database\factories;

use App\Models\Model;
use App\Modules\Basket\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Model>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        $products = [

            [
                'title' => 'Wireless Headphones',
                'description' => 'High quality wireless headphones with deep bass and long battery life.',
                'price' => 120000,
            ],

            [
                'title' => 'Gaming Keyboard',
                'description' => 'Mechanical RGB gaming keyboard with fast response switches.',
                'price' => 250000,
            ],

            [
                'title' => 'Smart Watch',
                'description' => 'Modern smartwatch with heart rate monitor and fitness tracking.',
                'price' => 340000,
            ],

            [
                'title' => 'Bluetooth Speaker',
                'description' => 'Portable bluetooth speaker with powerful sound and waterproof design.',
                'price' => 180000,
            ],

            [
                'title' => 'Laptop Stand',
                'description' => 'Adjustable aluminum laptop stand for comfortable working setup.',
                'price' => 95000,
            ],

            [
                'title' => 'USB-C Hub',
                'description' => 'Multi-port USB-C hub with HDMI, USB 3.0 and SD card support.',
                'price' => 135000,
            ],

            [
                'title' => 'Gaming Mouse',
                'description' => 'Ergonomic gaming mouse with customizable DPI and RGB lighting.',
                'price' => 110000,
            ],

            [
                'title' => 'External SSD',
                'description' => 'Fast portable SSD storage device with USB-C connectivity.',
                'price' => 420000,
            ],

            [
                'title' => '4K Monitor',
                'description' => 'Ultra HD monitor with vibrant colors and thin bezels.',
                'price' => 850000,
            ],

            [
                'title' => 'Webcam HD',
                'description' => '1080p HD webcam ideal for meetings and streaming.',
                'price' => 98000,
            ],

        ];


        $product = fake()->randomElement($products);

        return [

            'title' => $product['title'],

            'description' => $product['description'],

            'image' => 'https://via.placeholder.com/286x180?text=Image',

            'price' => $product['price'],

            'stock' => fake()->numberBetween(1, 100),

        ];
    }
}
