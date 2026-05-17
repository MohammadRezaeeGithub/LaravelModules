<?php

namespace Database\Seeders;

use App\Models\User;
use App\Modules\AccessControl\Database\seeders\AccessControlSeeder;
use App\Modules\Basket\Database\seeders\BasketSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
            User::factory()
                ->count(5)
                ->create();
            $this->call([
                AccessControlSeeder::class,
                BasketSeeder::class,
            ]);
    }
}
